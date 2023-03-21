@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Categorias</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">Detalhes</a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('categories.create') }}" class="btn btn-success">Adicionar Categoria</a>
    </div>
@endsection
