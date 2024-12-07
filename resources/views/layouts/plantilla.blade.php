<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Marketplace') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="font-sans antialiased bg-white">
    <div class="min-h-screen bg-gray-100">
      
      <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Marketplace</a>
                <!-- Botón de hamburguesa para móviles -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books.crear') }}">Crear</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books.show') }}">Leer</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('dashboard') }}">Login</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    </ul>
                    
                  
                </div>
            </div>
        </nav>
    </header>
    
      
        <!-- Contenido de la página -->
        <main class="container py-4">
            {{ $slot ?? '' }}
            @yield('contenido')
        </main>

        <!-- Footer -->
        <footer class="text-center mt-4">
            <p>&copy; 2024 {{ config('app.name', 'Marketplace') }}. Todos los derechos reservados.</p>
        </footer>
    </div>

    <!-- Bootstrap JS con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
