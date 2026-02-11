@extends('layouts.admin')

@section('title', 'Editar Habitación')

@section('content')
    <div class="mt-[80px] sm:mt-[120px]">
        <div class="mb-8 md:mb-10 flex items-center justify-between">
            <div>
                <h1 class="text-navDark text-2xl md:text-3xl font-bold">Editar Habitación</h1>
                <p class="mt-1 text-navDark/70 italic text-sm md:text-base">Modificar información de la habitación</p>
            </div>
            <a href="{{ route('admin.rooms.index') }}" class="inline-flex items-center gap-1.5 text-caribeCoffee/70 hover:text-caribeCoffee text-sm font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Volver a la lista
            </a>
        </div>

        <form action="{{ route('admin.rooms.update', $room) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid lg:grid-cols-3 gap-6">
                {{-- Columna principal --}}
                <div class="lg:col-span-2 space-y-6">
                    {{-- Información básica --}}
                    <div class="bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6">
                        <h2 class="text-caribeCoffee text-lg font-semibold mb-4 pb-2 border-b border-caribeCoffee/10">Información básica</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="title" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Título *</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $room->title) }}"
                                    class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Descripción *</label>
                                <textarea id="description" name="description" rows="4" placeholder="Descripción de la habitación..."
                                    class="w-full rounded-[12px] border @error('description') border-red-600 @else border-caribeCoffee/15 @enderror bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20 resize-none">{{ old('description', $room->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Capacidad y camas --}}
                    <div class="bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6">
                        <h2 class="text-caribeCoffee text-lg font-semibold mb-4 pb-2 border-b border-caribeCoffee/10">Capacidad</h2>
                        
                        <div class="grid md:grid-cols-3 gap-4">
                            <div>
                                <label for="persons" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Personas *</label>
                                <input type="number" id="persons" name="persons" value="{{ old('persons', $room->persons) }}" min="1" required
                                    class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                                @error('persons')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="beds" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Número de camas *</label>
                                <input type="number" id="beds" name="beds" value="{{ old('beds', $room->beds) }}"
                                    class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                                @error('beds')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="beds_label" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Etiqueta de camas *</label>
                                <input type="text" id="beds_label" name="beds_label" value="{{ old('beds_label', $room->beds_label) }}" placeholder="Ej: 1 cama doble"
                                    class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                                @error('beds_label')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Precio y configuración --}}
                    <div class="bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6">
                        <h2 class="text-caribeCoffee text-lg font-semibold mb-4 pb-2 border-b border-caribeCoffee/10">Configuración</h2>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label for="price" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Precio</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-caribeCoffee/60 text-sm">L.</span>
                                    <input type="number" id="price" name="price" value="{{ old('price', $room->price) }}" step="0.01" placeholder="0.00"
                                        class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 pl-8 pr-4 py-2.5 text-caribeCoffee placeholder-caribeCoffee/40 text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                                </div>
                                @error('price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="order" class="block text-caribeCoffee/90 font-medium text-sm mb-1.5">Orden de visualización</label>
                                <input type="number" id="order" name="order" value="{{ old('order', $room->order) }}"
                                    class="w-full rounded-[12px] border border-caribeCoffee/15 bg-bgGray/30 px-4 py-2.5 text-caribeCoffee text-sm focus:border-caribeOrange/50 focus:outline-none focus:ring-2 focus:ring-caribeOrange/20">
                                <p class="mt-1 text-xs text-caribeCoffee/60">Menor número = aparece primero</p>
                                @error('order')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="active" value="1" {{ old('active', $room->active) ? 'checked' : '' }} 
                                    class="rounded border-caribeCoffee/15 text-caribeOrange focus:ring-caribeOrange/20 w-4 h-4">
                                <span class="ml-2 text-sm text-caribeCoffee/90">Habitación activa (visible en el sitio)</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Columna lateral - Imagen con Livewire --}}
                <div class="lg:col-span-1">
                    <livewire:admin.room-form :room="$room" />
                </div>
            </div>

            {{-- Botones de acción --}}
            <div class="mt-6 flex gap-4 justify-end">
                <a href="{{ route('admin.rooms.index') }}" class="bg-bgGray/30 text-caribeCoffee font-medium px-6 py-2.5 rounded-[12px] hover:bg-bgGray/50 transition-colors">
                    Cancelar
                </a>
                <button type="submit" class="bg-caribeOrange text-white font-medium px-6 py-2.5 rounded-[12px] hover:opacity-90 transition-opacity">
                    Actualizar habitación
                </button>
            </div>
        </form>
    </div>

@endsection
