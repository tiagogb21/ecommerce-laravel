@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Categoria: {{ $category->name }}</h1>
        <p>ID: {{ $category->id }}</p>
        <p>Descrição: {{ $category->description }}</p>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
