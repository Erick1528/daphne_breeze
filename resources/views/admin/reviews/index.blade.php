@extends('layouts.admin')

@section('title', 'Reseñas')

@section('content')
    <div class="mt-[80px] sm:mt-[120px]">
        <div class="mb-8 md:mb-10 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div>
                <h1 class="text-navDark text-2xl md:text-3xl font-bold">Reseñas</h1>
                <p class="mt-1 text-navDark/70 italic text-sm md:text-base">Gestionar reseñas para mostrar en la web (manual o copiadas de Google)</p>
            </div>
            <a href="{{ route('admin.reviews.create') }}" class="group inline-flex items-center justify-center gap-2 bg-caribeOrange text-white font-medium px-5 py-2.5 rounded-[12px] hover:opacity-90 transition-all shadow-sm hover:shadow-md text-sm md:text-base w-fit">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Agregar reseña
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-[12px] flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <p class="text-green-700 text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @if ($reviews->isEmpty())
            <div class="bg-white/80 border border-caribeCoffee/10 rounded-[16px] p-12 text-center shadow-sm">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-caribeCoffee/10 flex items-center justify-center">
                    <svg class="w-8 h-8 text-caribeCoffee/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </div>
                <p class="text-caribeCoffee/80 text-base mb-6">Aún no hay reseñas.</p>
                <a href="{{ route('admin.reviews.create') }}" class="inline-flex items-center gap-2 bg-caribeOrange text-white font-medium px-5 py-2.5 rounded-[12px] hover:opacity-90 transition-opacity">
                    Crear primera reseña
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
                </a>
            </div>
        @else
            <div class="space-y-4">
                @foreach ($reviews as $review)
                    <article class="bg-white rounded-[16px] border border-caribeCoffee/10 p-5 shadow-sm hover:shadow-md hover:border-caribeCoffee/20 transition-all duration-200">
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                            <div class="min-w-0 flex-1">
                                <div class="flex flex-wrap items-center gap-2 mb-2">
                                    <h2 class="text-lg font-semibold text-caribeCoffee">{{ $review->author_name }}</h2>
                                    <span class="inline-flex items-center gap-0.5 text-caribeOrange" aria-label="{{ $review->rating }} de 5 estrellas">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-caribeOrange' : 'text-caribeCoffee/20' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @endfor
                                    </span>
                                    @if($review->source)
                                        <span class="text-xs text-caribeCoffee/50 bg-caribeCoffee/5 px-2 py-0.5 rounded">{{ $review->source }}</span>
                                    @endif
                                    <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $review->active ? 'bg-green-500/90 text-white' : 'bg-caribeCoffee/60 text-white' }}">
                                        {{ $review->active ? 'Visible' : 'Oculta' }}
                                    </span>
                                </div>
                                <p class="text-caribeCoffee/80 text-sm md:text-base line-clamp-2">{{ $review->content }}</p>
                                @if($review->review_date)
                                    <p class="mt-1 text-xs text-caribeCoffee/50">{{ $review->review_date->format('d/m/Y') }}</p>
                                @endif
                            </div>
                            <div class="flex items-center gap-3 shrink-0">
                                <a href="{{ route('admin.reviews.edit', $review) }}" class="inline-flex items-center gap-1.5 text-caribeOrange hover:text-caribeCoffee font-medium text-sm transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Editar
                                </a>
                                <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta reseña?');">
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
