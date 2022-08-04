@extends('layouts.dashboard')
@section('title', 'Cadastrar')
@section('content')
<h1>Nova Mercadoria</h1>
<form action="{{ route('admin.merchandises.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome da mercadoria">
    </div>
    @error('name')
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('name') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @enderror

    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Descrição da mercadoria">
    </div>
    @error('description')
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('description') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @enderror

    <div class="mb-3">
        <label for="email" class="form-label">Categoria</label>
        <select name="category_id" class="form-control">
            <option value="">Selecione</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    @error('category')
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('category') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @enderror

    <div class="mb-3">
        <label for="password" class="form-label">Quantidade</label>
        <input type="number" class="form-control" id="number" name="amount" placeholder="Quantidade da mercadoria">
    </div>
    @error('password')
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('amount') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @enderror

    <div class="mb-3">
        <label for="barcode" class="form-label">Código de barras</label>
        <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Código de barras">
    </div>
    @error('password')
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('barcode') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @enderror

    <div class="mb-3">
        <label for="supplier" class="form-label">Fornecedor</label>
        <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Fornecedor">
    </div>
    @error('password')
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('supplier') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @enderror

    <div class="mb-3">
        <label for="weight" class="form-label">Peso</label>
        <input type="text" class="form-control" id="weight" name="weight" placeholder="Peso da mercadoria">
    </div>
    @error('password')
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('weight') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @enderror


    <div class="mb-3">
        <label for="number" class="form-label">Preço de custo</label>
        <input type="text" class="form-control money" id="number" name="cost_price" placeholder="Preço de custo da mercadoria">
    </div>
    @error('cost_price')
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('cost_price') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @enderror

    <div class="mb-3">
        <label for="sale_price" class="form-label">Preço de venda</label>
        <input type="text" class="form-control money" id="sale_price" name="sale_price" placeholder="Preço de venda da mercadoria">
    </div>
    @error('sale_price')
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('sale_price') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @enderror

    <div class="mb-3">
        <label for="main_photo" class="form-label">Foto principal</label>
        <input type="file" class="form-control" id="main_photo" name="main_photo" required>
    </div>
    @error('main_photo')
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('main_photo') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @enderror

    <div class="d-flex flex-row-reverse w-100">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="/js/jquery.maskMoney.js" type="text/javascript"></script>

<script>
    $(function() {
        // $('.money').maskMoney();
        $(".money").maskMoney({
            prefix: 'R$ ',
            allowNegative: true,
            thousands: '.',
            decimal: ',',
            affixesStay: false
        });
    })
</script>

@endsection