<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Application')</title>
     <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <!-- Heroicons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <header class="w-full py-6 px-6 lg:px-16 flex justify-between items-center bg-white dark:bg-gray-800 shadow-md">
        <div class="text-2xl font-bold tracking-tight"> <a href="{{ route('home') }}">🌍 Laravel Explorer </a></div>
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

    <div class="container mt-4">
         {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <main class="flex-grow my-4">

        @yield('content')
        </main>
    </div>
      <!-- Footer -->
<footer class="fixed bottom-0 text-center left-0 w-full p-4 bg-white border-t border-gray-200 shadow-sm">
        &copy; {{ date('Y') }} Laravel Explorer. Built with ❤️ and Laravel.
    </footer>


    <script>
        feather.replace()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
