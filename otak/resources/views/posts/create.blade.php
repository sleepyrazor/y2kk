@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Post</h1>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
                <label for="contenido">Contenido Multimedia</label>
                <input type="text" name="contenido" id="contenido" class="form-control" required>
                <label for="categoria">Categoria</label>
                <select name="categoria_id" id="categoria_id" class="form-control" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Post</button>
        </form>
    </div>
@endsection