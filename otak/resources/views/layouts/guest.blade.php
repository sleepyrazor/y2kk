<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(entrypoints: ['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">MyApp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">


                        <div class="d-flex ms-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        </div>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/series') }}">Series</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/movies') }}">Películas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/categories') }}">Categorías</a>
                        </li>
                        <li class="nav-item"></li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

 

    <footer class="bg-light text-center py-3">
        <p>&copy; {{ date('Y') }} Y2000k. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>