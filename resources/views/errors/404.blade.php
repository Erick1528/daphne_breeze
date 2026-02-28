@extends('layouts.index')

@section('title', 'Página no encontrada')
@section('meta_description', 'La página que buscas no existe o ha sido movida.')
@section('meta_robots', 'noindex, follow')

@section('banner')
    {{-- Sin enlace duplicado: solo el botón "Ir al inicio" en el contenido --}}
@endsection

@section('content')
    <section class="mt-[40px] sm:mt-[80px] w-full max-w-7xl mx-auto px-4 sm:px-6 text-center">
        <p class="text-caribeCoffee/50 text-6xl md:text-8xl font-bold mb-4">404</p>
        <h1 class="text-navDark text-2xl md:text-3xl font-bold mb-3">Página no encontrada</h1>
        <p class="text-caribeCoffee/80 text-base md:text-lg max-w-md mx-auto mb-8">
            La página que buscas no existe o ha sido movida. Puedes volver al inicio o explorar habitaciones y ofertas.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-caribeOrange text-white font-semibold px-6 py-3 rounded-[20px] hover:opacity-90 transition-opacity">
                Ir al inicio
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </a>
            <a href="{{ route('offers') }}" class="inline-flex items-center gap-2 text-caribeOrange font-medium border border-caribeOrange/50 px-6 py-3 rounded-[20px] hover:bg-caribeOrange/10 transition-colors">
                Ver ofertas
            </a>
        </div>
    </section>
@endsection
