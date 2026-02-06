<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Admin - Daphne Breeze</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-bgGray font-montserrat min-h-screen flex items-center justify-center p-5">
    <div class="w-full max-w-md">
        <div class="bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-8 shadow-lg">
            <div class="text-center mb-8">
                <h1 class="text-caribeCoffee text-2xl md:text-3xl font-bold mb-2">Admin</h1>
                <p class="text-caribeCoffee/70 text-sm">Inicia sesión para continuar</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-[12px]">
                    <p class="text-red-600 text-sm">{{ $errors->first() }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Correo electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm md:text-base focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                </div>

                <div>
                    <label for="password" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Contraseña</label>
                    <input type="password" id="password" name="password" required
                        class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm md:text-base focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="rounded border-caribeCoffee/15 text-caribeOrange focus:ring-caribeOrange/20">
                    <label for="remember" class="ml-2 text-sm text-caribeCoffee/80">Recordarme</label>
                </div>

                <button type="submit" class="w-full bg-caribeOrange text-white font-medium py-2.5 px-4 rounded-[12px] hover:opacity-90 transition-opacity text-sm md:text-base">
                    Iniciar sesión
                </button>
            </form>
        </div>
    </div>
</body>
</html>
