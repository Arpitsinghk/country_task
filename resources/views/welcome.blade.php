<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Advanced UI</title>
    
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <!-- Heroicons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
    <!-- Header -->
    <header class="w-full py-6 px-6 lg:px-16 flex justify-between items-center bg-white dark:bg-gray-800 shadow-md">
        <div class="text-2xl font-bold tracking-tight">  <a href="{{ route('home') }}">🌍 Laravel Explorer </a></div>
        <nav class="flex items-center gap-4 text-sm font-medium">
            {{-- @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="btn-nav">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn-nav">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-nav">Register</a>
                    @endif
                @endauth
            @endif --}}
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="flex flex-col items-center justify-center text-center min-h-[80vh] px-4">
        <h1 class="text-4xl sm:text-5xl font-extrabold mb-6">Discover the World with Laravel</h1>
        <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mb-10">Navigate through countries, states, and cities using Laravel's powerful routing and data structures.</p>

        <div class="flex flex-wrap gap-6 justify-center">
            <a href="{{ url('/countries') }}" class="btn-primary d-flex">
                <i data-feather="globe" class="w-5 h-5 "></i> 
                <span>Countries</span>
            </a>
            <a href="{{ url('/states') }}" class="btn-primary">
                <i data-feather="map" class="w-5 h-5 mr-2"></i> <span>States</span>
            </a>
            <a href="{{ url('/cities') }}" class="btn-primary">
                <i data-feather="map-pin" class="w-5 h-5 mr-2"></i> <span>Cities</span>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-6 border-t border-gray-200 dark:border-gray-700 text-sm text-gray-500 dark:text-gray-400">
        &copy; {{ date('Y') }} Laravel Explorer. Built with ❤️ and Laravel.
    </footer>

    <script>
        feather.replace()
    </script>

   
</body>
</html>
