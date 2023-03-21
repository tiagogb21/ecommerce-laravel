@extends('layouts.app')

@section('content')
    <h1>Produto cadastrado com sucesso!</h1>

    <a href="{{ route('products.index') }}" class="btn btn-primary">Voltar para lista de produtos</a>
@endsection
