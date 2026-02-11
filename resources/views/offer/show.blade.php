@extends('layouts.index')

@section('title', $offer->title . ' - Ofertas')

@section('banner')
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 pt-6 sm:pt-8">
        <a href="{{ route('offers') }}" class="group inline-flex items-center gap-1.5 text-caribeCoffee/70 text-sm md:text-base hover:text-caribeOrange transition-colors duration-200 border-b border-transparent group-hover:border-caribeOrange/50">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Volver a ofertas
        </a>
    </div>
@endsection

@section('content')
    <article class="mt-[40px] sm:mt-[60px] w-full max-w-7xl mx-auto px-4 sm:px-6">
        {{-- Imagen: contenedor 16:9, imagen con object-contain --}}
        <div class="rounded-[12px] overflow-hidden aspect-video relative bg-bgGray mb-4 flex items-center justify-center">
            <img src="{{ asset($offer->image) }}" alt="{{ $offer->title }}"
                class="w-full h-full object-contain">
        </div>

        {{-- Título y descuento debajo de la imagen (todos los tamaños) --}}
        <div class="mb-6 mt-4">
            <h1 class="text-navDark text-2xl md:text-3xl font-semibold mb-2">{{ $offer->title }}</h1>
            @if($offer->discount_percent)
                <p class="text-caribeOrange font-semibold">{{ $offer->discount_percent }}% descuento</p>
            @endif
        </div>

        <div class="max-w-3xl">
            @if($offer->description)
                <p class="text-caribeCoffee/90 text-base md:text-lg leading-relaxed">
                    {!! nl2br(e($offer->description)) !!}
                </p>
            @endif

            @if($offer->start_date || $offer->end_date)
                @php
                    $formatFecha = 'j \d\e F \d\e Y';
                @endphp
                <p class="mt-6 text-caribeCoffee/80 text-sm md:text-base">
                    @if($offer->start_date && $offer->end_date)
                        Válida del {{ $offer->start_date->locale('es')->translatedFormat($formatFecha) }} al {{ $offer->end_date->locale('es')->translatedFormat($formatFecha) }}
                    @elseif($offer->start_date)
                        A partir del {{ $offer->start_date->locale('es')->translatedFormat($formatFecha) }}
                    @else
                        Hasta el {{ $offer->end_date->locale('es')->translatedFormat($formatFecha) }}
                    @endif
                </p>
            @endif

            @if($offer->terms)
                <div class="mt-6 p-4 rounded-[12px] bg-bgGray/50 border border-caribeCoffee/10">
                    <h2 class="text-caribeCoffee font-semibold text-sm mb-2">Términos y condiciones</h2>
                    <p class="text-caribeCoffee/90 text-sm leading-relaxed">{!! nl2br(e($offer->terms)) !!}</p>
                </div>
            @endif

            @php
                $hasOferta = stripos($offer->title, 'oferta') !== false;
                $contactMessage = $hasOferta
                    ? 'Quiero saber más de la ' . $offer->title . '. '
                    : 'Quiero saber más de la oferta ' . $offer->title . '. ';
            @endphp
            <div class="mt-8 md:mt-10 flex flex-wrap items-center gap-4">
                <a href="{{ route('home') }}?subject={{ urlencode($offer->title) }}&message={{ urlencode($contactMessage) }}#contacto" class="group flex items-center gap-1.5 w-fit">
                    <span class="bg-caribeOrange text-white text-base md:text-[18px] leading-tight px-8 md:px-[60px] py-3.5 md:py-[14px] rounded-[20px] font-semibold group-hover:opacity-90 transition-opacity inline-flex items-center justify-center">
                        Reservar o consultar
                    </span>
                    <span class="bg-caribeOrange text-white w-12 h-12 md:w-[52px] md:h-[52px] p-3 md:p-[14px] rounded-full flex items-center justify-center group-hover:opacity-90 transition-opacity shrink-0">
                        <img src="{{ asset('build/assets/arrow_outward.svg') }}" alt="" class="w-4 h-4 md:w-5 md:h-5">
                    </span>
                </a>
                @if($offer->link)
                    <a href="{{ $offer->link }}" target="_blank" rel="noopener" class="group inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm md:text-base hover:text-caribeCoffee transition-colors duration-200 border-b border-transparent group-hover:border-caribeOrange/50">
                        Ver más
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
                    </a>
                @endif
                <a href="{{ route('offers') }}" class="group inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm md:text-base hover:text-caribeCoffee transition-colors duration-200 border-b border-transparent group-hover:border-caribeOrange/50">
                    Ver otras ofertas
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
                </a>
            </div>
        </div>
    </article>
@endsection
