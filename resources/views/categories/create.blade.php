@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nova Categoria</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea name="description" id="description" rows="3" class="form-control">
              </textarea>
            </div>

            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" name="slug" id="slug" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">
                Salvar
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
        </form>
    </div>
@endsection
