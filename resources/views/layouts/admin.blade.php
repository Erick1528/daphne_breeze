<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('build/assets/logo.webp') }}">
    <title>@yield('title') - Admin - Daphne Breeze</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-bgGray font-montserrat p-5 min-h-screen">
    <header>
        <nav class="relative flex justify-between items-center py-[13px] px-5 lg:px-[49px] bg-white rounded-[20px] mb-[22px]">
            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="shrink-0">
                    <img src="{{ asset('build/assets/logo.svg') }}" alt="Daphne Breeze" class="h-12 lg:h-[74px]">
                </a>
                <span class="text-caribeCoffee/50 hidden md:block">|</span>
                <span class="text-caribeCoffee/70 text-sm font-medium hidden md:block">Panel de Administración</span>
            </div>
            <div class="flex items-center gap-4">
                @auth
                    <span class="text-caribeCoffee/70 text-xs md:text-sm hidden sm:block">{{ Auth::user()->email }}</span>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="text-caribeOrange hover:text-caribeCoffee text-xs md:text-sm font-medium transition-colors">
                            Cerrar sesión
                        </button>
                    </form>
                @endauth
            </div>
        </nav>
    </header>

    <main>
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6">
            @yield('content')
        </div>
    </main>

    @livewireScripts
</body>
</html>
