@extends('layouts.dashboard')
@section('title', 'Visualizar usuário')
@section('content')
    <h2>Informações pessoas</h2>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Nome</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->name }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Telefone</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->phone_number }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Data de nascimento</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->birth_date }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">CPF / CNPJ</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $user->document_id }}</p>
                </div>
            </div>
        </div>
    </div>

  

    <div class="w-100 gap-2 d-flex flex-row-reverse" role="group">
        <a href="javascript:void(0)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destroyModal">
            Remover
        </a>
        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-warning">Editar</a>
    </div>

    <div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroyModalLabel">Você tem certeza?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Este usuário será excluído
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.users.destroy', ['id' => $user->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning">
                            Excluir
                        </button>
                    </form>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        Manter usuário
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
