@extends('layouts.admin')

@section('title', 'Crear Reseña')

@section('content')
    <div class="mt-[80px] sm:mt-[120px]">
        <div class="mb-8 md:mb-10 flex items-center justify-between">
            <div>
                <h1 class="text-navDark text-2xl md:text-3xl font-bold">Crear Reseña</h1>
                <p class="mt-1 text-navDark/70 italic text-sm md:text-base">Añadir una reseña (manual o copiada de Google)</p>
            </div>
            <a href="{{ route('admin.reviews.index') }}" class="inline-flex items-center gap-1.5 text-caribeCoffee/70 hover:text-caribeCoffee text-sm font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Volver a la lista
            </a>
        </div>

        <form action="{{ route('admin.reviews.store') }}" method="POST" class="bg-white/80 border border-caribeCoffee/10 rounded-[16px] p-6 md:p-8 shadow-sm w-full">
            @csrf

            <div class="space-y-5">
                <div>
                    <label for="author_name" class="block text-caribeCoffee font-medium text-sm mb-1.5">Nombre del autor <span class="text-red-500">*</span></label>
                    <input type="text" name="author_name" id="author_name" value="{{ old('author_name') }}" required
                        class="w-full rounded-[12px] border border-caribeCoffee/20 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm md:text-base focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                    @error('author_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block text-caribeCoffee font-medium text-sm mb-1.5">Texto de la reseña <span class="text-red-500">*</span></label>
                    <textarea name="content" id="content" rows="4" required
                        class="w-full rounded-[12px] border border-caribeCoffee/20 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm md:text-base focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="rating" class="block text-caribeCoffee font-medium text-sm mb-1.5">Valoración (1-5) <span class="text-red-500">*</span></label>
                    <select name="rating" id="rating" required
                        class="w-full rounded-[12px] border border-caribeCoffee/20 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm md:text-base focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                        @foreach([1,2,3,4,5] as $n)
                            <option value="{{ $n }}" {{ old('rating', 5) == $n ? 'selected' : '' }}>{{ $n }} {{ $n == 1 ? 'estrella' : 'estrellas' }}</option>
                        @endforeach
                    </select>
                    @error('rating')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="review_date" class="block text-caribeCoffee font-medium text-sm mb-1.5">Fecha de la reseña (opcional)</label>
                    <input type="date" name="review_date" id="review_date" value="{{ old('review_date') }}"
                        class="w-full rounded-[12px] border border-caribeCoffee/20 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm md:text-base focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                    @error('review_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="source" class="block text-caribeCoffee font-medium text-sm mb-1.5">Origen (opcional)</label>
                    <select name="source" id="source"
                        class="w-full rounded-[12px] border border-caribeCoffee/20 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm md:text-base focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                        <option value="">— Sin especificar —</option>
                        <option value="manual" {{ old('source') === 'manual' ? 'selected' : '' }}>Manual</option>
                        <option value="google" {{ old('source') === 'google' ? 'selected' : '' }}>Google</option>
                    </select>
                    @error('source')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap gap-6">
                    <div class="flex items-center gap-2">
                        <input type="hidden" name="active" value="0">
                        <input type="checkbox" name="active" id="active" value="1" {{ old('active', true) ? 'checked' : '' }}
                            class="rounded border-caribeCoffee/30 text-caribeOrange focus:ring-caribeOrange/30">
                        <label for="active" class="text-caribeCoffee text-sm font-medium">Visible en la web</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <label for="order" class="text-caribeCoffee font-medium text-sm">Orden</label>
                        <input type="number" name="order" id="order" value="{{ old('order', 0) }}" min="0"
                            class="w-20 rounded-[12px] border border-caribeCoffee/20 bg-bgGray/30 px-3 py-2 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                    </div>
                </div>
                @error('order')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-8 pt-6 border-t border-caribeCoffee/10">
                <button type="submit" class="inline-flex items-center gap-2 bg-caribeOrange text-white font-medium px-5 py-2.5 rounded-[12px] hover:opacity-90 transition-opacity">
                    Guardar reseña
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </button>
            </div>
        </form>
    </div>
@endsection
