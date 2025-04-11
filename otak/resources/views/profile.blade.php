@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="profile-card">
            <h1>Mi Perfil</h1>
            <p>Nombre: {{ Auth::user()->name }}</p>
            <p>Email: {{ Auth::user()->email }}</p>
            <p>Biografía: {{ Auth::user()->bio }}</p>
            
            <img src="{{ asset(path: 'storage/' . Auth::user()->avatar) }}" alt="Profile Picture" class="img-fluid rounded-circle mb-3" width="150">            <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="profile_picture">Subir Foto de Perfil:</label>
                    <input type="file" name="profile_picture" id="profile_picture" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">Subir</button>
            </form>

            <p>Role: {{ Auth::user()->role }}</p>
            <a href="{{ route('logout') }}" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </div>
@endsection