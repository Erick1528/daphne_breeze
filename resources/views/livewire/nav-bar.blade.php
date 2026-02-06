@php
    $isHome = url()->current() === route('home');
    $anchor = fn ($hash) => $isHome ? '#' . $hash : route('home') . '#' . $hash;
@endphp
<div class="relative flex justify-between items-center py-[13px] px-5 lg:px-[49px] bg-white rounded-[20px] mb-[22px]"
    x-data="{ open: false }"
    @keydown.escape.window="open = false">

    <a href="/" class="shrink-0">
        <img src="{{ asset('build/assets/logo.svg') }}" alt="Daphne Breeze" class="h-12 lg:h-[74px]">
    </a>

    {{-- Desktop: nav + contacto --}}
    <nav class="hidden lg:block">
        <ul class="flex uppercase text-caribeCoffee gap-x-5 font-bold text-base leading-5">
            <li><a href="/" class="hover:text-caribeOrange transition-colors">Inicio</a></li>
            <li><a href="{{ $anchor('habitaciones') }}" class="hover:text-caribeOrange transition-colors">Habitaciones</a></li>
            <li><a href="{{ $anchor('ofertas') }}" class="hover:text-caribeOrange transition-colors">Ofertas</a></li>
            <li><a href="{{ $anchor('restaurante') }}" class="hover:text-caribeOrange transition-colors">Restaurante</a></li>
            {{-- <li><a href="" class="hover:text-caribeOrange transition-colors">Galería</a></li> --}}
        </ul>
    </nav>

    <div class="hidden lg:block uppercase text-caribeCoffee font-bold text-base leading-5">
        <a href="{{ $anchor('contacto') }}" class="hover:text-caribeOrange transition-colors">Contacto</a>
    </div>

    {{-- Mobile: botón menú --}}
    <button type="button"
        class="lg:hidden p-2 rounded-[12px] text-caribeCoffee hover:bg-bgGray focus:outline-none focus:ring-2 focus:ring-caribeOrange"
        aria-label="Abrir menú"
        aria-expanded="false"
        :aria-expanded="open"
        @click="open = !open">
        <svg x-show="!open" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <svg x-show="open" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    {{-- Mobile: menú desplegable --}}
    <div class="absolute left-5 right-5 top-full mt-2 z-50 lg:hidden"
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        x-cloak
        @click.outside="open = false"
        style="display: none;">
        <nav class="bg-white rounded-[20px] shadow-lg border border-gray-100 py-4 px-4">
            <ul class="flex flex-col uppercase text-caribeCoffee font-bold text-base leading-5 gap-0">
                <li><a href="/" class="block py-3 px-2 hover:bg-bgGray hover:text-caribeOrange rounded-[12px] transition-colors" @click="open = false">Inicio</a></li>
                <li><a href="{{ $anchor('habitaciones') }}" class="block py-3 px-2 hover:bg-bgGray hover:text-caribeOrange rounded-[12px] transition-colors" @click="open = false">Habitaciones</a></li>
                <li><a href="{{ $anchor('ofertas') }}" class="block py-3 px-2 hover:bg-bgGray hover:text-caribeOrange rounded-[12px] transition-colors" @click="open = false">Ofertas</a></li>
                <li><a href="{{ $anchor('restaurante') }}" class="block py-3 px-2 hover:bg-bgGray hover:text-caribeOrange rounded-[12px] transition-colors" @click="open = false">Restaurante</a></li>
                {{-- <li><a href="" class="block py-3 px-2 hover:bg-bgGray hover:text-caribeOrange rounded-[12px] transition-colors" @click="open = false">Galería</a></li> --}}
                <li class="border-t border-gray-100 mt-2 pt-2">
                    <a href="{{ $anchor('contacto') }}" class="block py-3 px-2 hover:bg-bgGray hover:text-caribeOrange rounded-[12px] transition-colors" @click="open = false">Contacto</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
