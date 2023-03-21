@extends('layouts.app')

@section('content')
    <h1>Editar Produto</h1>

    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}">
        </div>

        <div class="form-group">
            <label for="quantity">Quantidade</label>
            <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}">
        </div>

        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Selecione uma categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
