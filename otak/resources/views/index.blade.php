@extends('layouts.app')

@section('content')
    <main>

        <div class="container text-center">
            <h1 class="mt-5">Bienvenido a Y2000k, <strong>{{ Auth::user() ? Auth::user()->name : 'Invitado' }}</strong></h1>
            <p class="lead">Tu plataforma de entretenimiento favorita.</p>
            {{--
            @auth
            <a href="{{ url('/profile') }}" class="boton">Mi Perfil</a>
            @else
            <a href="{{ route('login') }}" class="boton">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="boton-azul">Registrar</a>
            @endauth
            --}}
        </div>
        <container>
            <div class="contenedor">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <h2>Series</h2>
                        <a href="{{ url('/series') }}"><img src="{{ asset(path: 'storage/images/series.png') }}" alt="Series"
                                class="img-fluid mb-3">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <h2>Películas</h2>
                        <a href="{{ url('/peliculas') }}"><img src="{{ asset(path: 'storage/images/peliculas.png') }}"
                                alt="Películas"  class="img-fluid mb-3"></a>

                    </div>
                    <div class="col-md-4">
                        <h2>Categorías</h2>
                        <a href="{{ url('/categorias') }}"><img src="{{ asset(path: 'storage/images/anime.jpg') }}"
                                alt="Series" class="img-fluid mb-3">
                            </a>
                    </div>
                </div>
            </div>

            <div class="mejores-posts">
                <h1>Mejores posts del momento</h1>

            </div>
        </container>
    </main>
@endsection