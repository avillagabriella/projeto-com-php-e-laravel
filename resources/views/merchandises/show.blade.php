@extends('layouts.dashboard')
@section('title', 'Visualizar mercadoria')
@section('content')
<h2>Informações da mercadoria</h2>
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Nome</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $merchandise->name }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Descrição</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $merchandise->description }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Categoria</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ (($merchandise->category)?$merchandise->category->name:'---') }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Quantidade</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $merchandise->amount }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Fornecedor</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $merchandise->supplier }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Codigo de barras</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $merchandise->barcode }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Peso</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $merchandise->weight }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Preço de custo</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $merchandise->cost_price }}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Preço de venda</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $merchandise->sale_price }}</p>
            </div>
        </div>
    </div>
</div>

<div class="w-100 gap-2 d-flex flex-row-reverse" role="group">
    <a href="javascript:void(0)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destroyModal">
        Remover
    </a>

    <a href="{{ route('admin.merchandises.edit',  $merchandise->id) }}" class="btn btn-warning">Editar</a>
</div>

<div class="modal fade" id="destroyModal" tabindex="-1" aria-labelledby="destroyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroyModalLabel">Você tem certeza?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Este produto será excluído
            </div>

            <div class="modal-footer">
                <form action="{{ route('admin.merchandises.destroy', $merchandise->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning">
                        Excluir
                    </button>
                </form>

                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    Manter produto
                </button>
            </div>

        </div>
    </div>
</div>
@endsection