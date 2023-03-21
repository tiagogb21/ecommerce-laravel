@extends('layouts.app')

@section('content')
    <h1>Detalhes do Produto</h1>

    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Nome</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th scope="row">Descrição</th>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <th scope="row">Preço</th>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <th scope="row">Quantidade</th>
                <td>{{ $product->quantity }}</td>
            </tr>
            <tr>
                <th scope="row">Categoria</th>
                <td>{{ $product->category->name }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Editar</a>
    <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display: inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
