@extends('layouts.index')

@section('title', $room->title . ' - Habitaciones')
@section('meta_description', Str::limit(strip_tags($room->description ?? $room->title), 160))

@push('meta')
    <link rel="canonical" href="{{ request()->url() }}">
    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="{{ $room->title }} - Hotel Daphne Breeze">
    <meta property="og:description" content="{{ Str::limit(strip_tags($room->description ?? $room->title), 200) }}">
    <meta property="og:image" content="{{ $room->og_image_path ? url(asset($room->og_image_path)) : url(asset('build/assets/logo.webp')) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="es_ES">
    <meta property="og:site_name" content="Daphne Breeze">
    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $room->title }} - Hotel Daphne Breeze">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($room->description ?? $room->title), 200) }}">
    <meta name="twitter:image" content="{{ $room->og_image_path ? url(asset($room->og_image_path)) : url(asset('build/assets/logo.webp')) }}">
@endpush

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
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-2">
                <h1 class="text-navDark text-2xl md:text-3xl font-semibold flex-1">{{ $room->title }}</h1>
                @if($room->active)
                    <button type="button" id="share-room-btn" class="inline-flex items-center justify-center gap-1.5 text-caribeCoffee/70 text-sm md:text-base hover:text-caribeOrange transition-colors duration-200 border border-caribeCoffee/20 hover:border-caribeOrange/50 rounded-[12px] px-3 py-2 shrink-0 w-fit"
                        aria-label="Compartir esta habitación"
                        data-share-title="{{ $room->title }}"
                        data-share-text="{{ Str::limit(strip_tags($room->description ?? $room->title), 100) }}">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                        </svg>
                        <span class="hidden sm:inline">Compartir</span>
                    </button>
                @endif
            </div>
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

    @if($room->active)
    <script>
        (function () {
            var btn = document.getElementById('share-room-btn');
            if (!btn) return;
            btn.addEventListener('click', function () {
                var url = window.location.href;
                var title = btn.getAttribute('data-share-title') || document.querySelector('h1')?.textContent || '';
                var text = btn.getAttribute('data-share-text') || '';
                if (navigator.share) {
                    navigator.share({ title: title, text: text, url: url }).catch(function () { copyAndNotify(url, btn); });
                } else {
                    copyAndNotify(url, btn);
                }
            });
        })();
        function copyAndNotify(url, btn) {
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(url).then(function () {
                    if (btn) { var t = btn.innerHTML; btn.innerHTML = '¡Enlace copiado!'; btn.disabled = true; setTimeout(function () { btn.innerHTML = t; btn.disabled = false; }, 2000); }
                });
            } else {
                window.prompt('Copia el enlace:', url);
            }
        }
    </script>
    @endif
@endsection
