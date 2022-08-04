@extends('layouts.dashboard')
@section('title', 'Usuários')
@section('content')

    <div class="row mb-4">
        <div class="col-md-10">
            <h1 class="container">Listagem de Usuários</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Novo usuário</a>
        </div>
    </div>

    <table class="table container">
        <thead class="table-light">
            <tr>
                <!-- <th scope="col">ID</th> -->
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Data Cadastro</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $user)
                <tr>
                    <!-- <th scope="row">{{ $user->id }}</th> -->
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                    <td><a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info text-white">Visualizar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
