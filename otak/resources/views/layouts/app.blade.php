<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(entrypoints: ['resources/sass/navbar.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container">
        <header>
            <div class="nav navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset(path: 'storage/' . 'images/y2k_i.png') }}" alt="Logo" width="120" height="88"
                            class="d-inline-block align-text-top logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">


                            <li class="nav-item">
                                <a class="nav-link boton-azul " href="{{ url('/90') }}">90s</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link boton-azul" href="{{ url('/00') }}">2000s</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link boton-azul" href="{{ url('/2000') }}">2010s</a>
                            </li>
                            @auth

                                <li class="nav-item">
                                    <a class="nav-link boton-verde" href="{{ url('/profile') }}">Mi Perfil</a>
                                </li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="boton-rojo" type="submit">Logout</button>
                                </form>
                            @else
                                <li class="nav-item"><a class="nav-link boton-verde" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item"><a class="nav-link boton-verde"
                                        href="{{ route('register') }}">Register</a></li>
                            @endauth
                            @if (Auth::user() && Auth::user()->role == 'admin')
                                <a class="nav-link" href="{{ url('/users') }}">Test Usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/posts') }}">Test Posts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/comments') }}">Test Comentarios</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <main class="container my-4">
        @yield('content')
    </main>

    <footer class="bg-light text-center py-3">
        <p>&copy; {{ date('Y') }} Y2000k. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>