@extends('layouts.index')

@section('title', $room->title . ' - Habitaciones')

@section('banner')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 pt-6 sm:pt-8">
        <a href="{{ route('home') }}#habitaciones" class="group inline-flex items-center gap-1.5 text-caribeCoffee/70 text-sm md:text-base hover:text-caribeOrange transition-colors duration-200 border-b border-transparent group-hover:border-caribeOrange/50">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Volver a habitaciones
        </a>
    </div>
@endsection

@section('content')
    <article class="mt-[40px] sm:mt-[60px] w-full max-w-7xl mx-auto px-4 sm:px-6">
        {{-- Imagen: contenedor 16:9, imagen con object-contain --}}
        <div class="rounded-[12px] overflow-hidden aspect-video relative bg-bgGray mb-4 flex items-center justify-center">
            <img src="{{ asset($room->image) }}" alt="{{ $room->title }}"
                class="w-full h-full object-contain">
        </div>

        {{-- Título y datos debajo de la imagen (todos los tamaños) --}}
        <div class="mb-6 mt-4">
            <h1 class="text-navDark text-2xl md:text-3xl font-semibold mb-2">{{ $room->title }}</h1>
            <p class="text-caribeCoffee/80 italic text-sm md:text-base">
                {{ $room->persons }} {{ $room->persons === 1 ? 'persona' : 'personas' }} · {{ $room->beds_label }}
            </p>
        </div>

        <div class="max-w-3xl">
            @if($room->description)
                <p class="text-caribeCoffee/90 text-base md:text-lg leading-relaxed">
                    {!! nl2br(e($room->description)) !!}
                </p>
            @endif

            @if($room->price !== null && $room->price > 0)
                <p class="mt-6 text-caribeCoffee text-xl md:text-2xl font-semibold">
                    Desde <span class="text-caribeOrange">{{ number_format($room->price, 0, ',', '.') }} €</span> / noche
                </p>
            @endif

            {{-- CTA al estilo hero (botón naranja + flecha) y enlace al estilo ofertas --}}
            <div class="mt-8 md:mt-10 flex flex-wrap items-center gap-4">
                @php
    $hasHabitacion = stripos($room->title, 'habitación') !== false || stripos($room->title, 'habitacion') !== false;
    $contactMessage = $hasHabitacion
        ? 'Quiero saber más de la ' . $room->title . '. '
        : 'Quiero saber más de la habitación ' . $room->title . '. ';
@endphp
                <a href="{{ route('home') }}?subject={{ urlencode($room->title) }}&message={{ urlencode($contactMessage) }}#contacto" class="group flex items-center gap-1.5 w-fit">
                    <span class="bg-caribeOrange text-white text-base md:text-[18px] leading-tight px-8 md:px-[60px] py-3.5 md:py-[14px] rounded-[20px] font-semibold group-hover:opacity-90 transition-opacity inline-flex items-center justify-center">
                        Reservar o consultar
                    </span>
                    <span class="bg-caribeOrange text-white w-12 h-12 md:w-[52px] md:h-[52px] p-3 md:p-[14px] rounded-full flex items-center justify-center group-hover:opacity-90 transition-opacity shrink-0">
                        <img src="{{ asset('build/assets/arrow_outward.svg') }}" alt="" class="w-4 h-4 md:w-5 md:h-5">
                    </span>
                </a>
                <a href="{{ route('home') }}#habitaciones" class="group inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm md:text-base hover:text-caribeCoffee transition-colors duration-200 border-b border-transparent group-hover:border-caribeOrange/50">
                    Ver otras habitaciones
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
                </a>
            </div>
        </div>
    </article>
@endsection
