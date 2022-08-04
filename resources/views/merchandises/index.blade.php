@extends('layouts.dashboard')
@section('title', 'Mercadorias')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="row mb-4">
            <div class="col-md-10">
                <h1 class="container">Listagem de mercadorias</h1>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.merchandises.create') }}" class="btn btn-success">Nova Mercadoria</a>
            </div>
        </div>

        <table class="table container">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço de custo</th>
                    <th scope="col">Preço de venda</th>
                    <th scope="col">Foto principal</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($merchandises as $merchandise)
                <tr>
                    <th scope="row">{{ $merchandise->id }}</th>
                    <td>{{ $merchandise->name }}</td>
                    <td>{{ $merchandise->description }}</td>
                    <td>{{ (($merchandise->category)?$merchandise->category->name:'---') }}</td>
                    <td>{{ $merchandise->amount }}</td>
                    <td>{{ number_format($merchandise->cost_price, 2,',','.') }}</td>
                    <td>{{ number_format($merchandise->sale_price, 2,',','.') }}</td>
                    <td>
                        <img src="/{{ $merchandise->main_photo }}" width="100">
                    </td>
                    <td><a href="{{ route('admin.merchandises.show', $merchandise->id) }}" class="btn btn-info text-white">Visualizar</a></td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        {!! $merchandises->links('pagination::bootstrap-5') !!}
    </div>
</div>

@endsection