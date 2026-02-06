@extends('layouts.admin')

@section('title', 'Ofertas')

@section('content')
    <div class="mt-[80px] sm:mt-[120px]">
        <div class="mb-8 md:mb-10 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div>
                <h1 class="text-caribeCoffee text-2xl md:text-3xl font-bold">Ofertas</h1>
                <p class="mt-1 text-caribeCoffee/70 italic text-sm md:text-base">Gestionar ofertas y promociones del hotel</p>
            </div>
            <a href="{{ route('admin.offers.create') }}" class="group inline-flex items-center justify-center gap-2 bg-caribeOrange text-white font-medium px-5 py-2.5 rounded-[12px] hover:opacity-90 transition-all shadow-sm hover:shadow-md text-sm md:text-base w-fit">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Agregar oferta
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-[12px] flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <p class="text-green-700 text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @if ($offers->isEmpty())
            <div class="bg-white/80 border border-caribeCoffee/10 rounded-[16px] p-12 text-center shadow-sm">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-caribeCoffee/10 flex items-center justify-center">
                    <svg class="w-8 h-8 text-caribeCoffee/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                </div>
                <p class="text-caribeCoffee/80 text-base mb-6">Aún no hay ofertas registradas.</p>
                <a href="{{ route('admin.offers.create') }}" class="inline-flex items-center gap-2 bg-caribeOrange text-white font-medium px-5 py-2.5 rounded-[12px] hover:opacity-90 transition-opacity">
                    Crear primera oferta
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
                </a>
            </div>
        @else
            <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                @foreach ($offers as $offer)
                    <article class="group bg-white rounded-[16px] border border-caribeCoffee/10 overflow-hidden shadow-sm hover:shadow-md hover:border-caribeCoffee/20 transition-all duration-200">
                        <div class="relative aspect-[4/3] overflow-hidden bg-bgGray/30">
                            @if($offer->image)
                                <img src="{{ asset($offer->image) }}" alt="{{ $offer->title }}" class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-caribeCoffee/30">
                                    <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/></svg>
                                </div>
                            @endif
                            <span class="absolute top-3 right-3 px-2.5 py-1 text-xs font-medium rounded-full {{ $offer->active ? 'bg-green-500/90 text-white' : 'bg-caribeCoffee/60 text-white' }}">
                                {{ $offer->active ? 'Activa' : 'Inactiva' }}
                            </span>
                        </div>
                        <div class="p-5">
                            <h2 class="text-lg font-semibold text-caribeCoffee truncate">{{ $offer->title }}</h2>
                            @if($offer->description)
                                <p class="mt-1 text-sm text-caribeCoffee/60 line-clamp-2">{{ $offer->description }}</p>
                            @endif
                            @if($offer->link)
                                <p class="mt-2 text-xs text-caribeCoffee/50 truncate">Enlace: {{ $offer->link }}</p>
                            @endif
                            <div class="mt-5 pt-4 border-t border-caribeCoffee/10 flex items-center justify-between gap-3">
                                <a href="{{ route('admin.offers.edit', $offer) }}" class="inline-flex items-center gap-1.5 text-caribeOrange hover:text-caribeCoffee font-medium text-sm transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Editar
                                </a>
                                <form action="{{ route('admin.offers.destroy', $offer) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta oferta?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1.5 text-red-600 hover:text-red-700 font-medium text-sm transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
@endsection
