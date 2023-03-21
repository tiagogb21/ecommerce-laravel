@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Bem-vindo ao Ecommerce</h1>
            <p class="lead">Encontre os melhores produtos com os melhores preços.</p>
        </div>
    </div>

    <div class="container">
        <h2 class="mb-4">Novidades</h2>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{ $product->image_url }}" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver detalhes</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
