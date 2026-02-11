@extends('layouts.admin')

@section('title', 'Habitaciones')

@section('content')
    <div class="mt-[80px] sm:mt-[120px]">
        <div class="mb-8 md:mb-10 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div>
                <h1 class="text-navDark text-2xl md:text-3xl font-bold">Habitaciones</h1>
                <p class="mt-1 text-navDark/70 italic text-sm md:text-base">Gestionar habitaciones del hotel</p>
            </div>
            <a href="{{ route('admin.rooms.create') }}" class="group inline-flex items-center justify-center gap-2 bg-caribeOrange text-white font-medium px-5 py-2.5 rounded-[12px] hover:opacity-90 transition-all shadow-sm hover:shadow-md text-sm md:text-base w-fit">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Agregar habitación
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-[12px] flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <p class="text-green-700 text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @if ($rooms->isEmpty())
            <div class="bg-white/80 border border-caribeCoffee/10 rounded-[16px] p-12 text-center shadow-sm">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-caribeCoffee/10 flex items-center justify-center">
                    <svg class="w-8 h-8 text-caribeCoffee/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <p class="text-caribeCoffee/80 text-base mb-6">Aún no hay habitaciones registradas.</p>
                <a href="{{ route('admin.rooms.create') }}" class="inline-flex items-center gap-2 bg-caribeOrange text-white font-medium px-5 py-2.5 rounded-[12px] hover:opacity-90 transition-opacity">
                    Crear primera habitación
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
                </a>
            </div>
        @else
            <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                @foreach ($rooms as $room)
                    <article class="group bg-white rounded-[16px] border border-caribeCoffee/10 overflow-hidden shadow-sm hover:shadow-md hover:border-caribeCoffee/20 transition-all duration-200">
                        <div class="relative aspect-[4/3] overflow-hidden bg-bgGray/30">
                            @if($room->image)
                                <img src="{{ asset($room->image) }}" alt="{{ $room->title }}" class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-caribeCoffee/30">
                                    <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/></svg>
                                </div>
                            @endif
                            <span class="absolute top-3 right-3 px-2.5 py-1 text-xs font-medium rounded-full {{ $room->active ? 'bg-green-500/90 text-white' : 'bg-caribeCoffee/60 text-white' }}">
                                {{ $room->active ? 'Activa' : 'Inactiva' }}
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <div class="p-5">
                            <h2 class="text-lg font-semibold text-caribeCoffee truncate">{{ $room->title }}</h2>
                            @if($room->description)
                                <p class="mt-1 text-sm text-caribeCoffee/60 line-clamp-2">{{ $room->description }}</p>
                            @endif
                            <div class="mt-4 flex flex-wrap gap-3 text-sm text-caribeCoffee/80">
                                <span class="inline-flex items-center gap-1">
                                    <svg class="w-4 h-4 text-caribeOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                    {{ $room->persons }} {{ $room->persons === 1 ? 'persona' : 'personas' }}
                                </span>
                                <span class="inline-flex items-center gap-1">
                                    <svg class="w-4 h-4 text-caribeOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                    {{ $room->beds_label }}
                                </span>
                            </div>
                            @if($room->price)
                                <p class="mt-2 text-sm font-medium text-caribeCoffee">L. {{ number_format($room->price, 0, ',', '.') }}</p>
                            @endif
                            <div class="mt-5 pt-4 border-t border-caribeCoffee/10 flex items-center justify-between gap-3">
                                <a href="{{ route('admin.rooms.edit', $room) }}" class="inline-flex items-center gap-1.5 text-caribeOrange hover:text-caribeCoffee font-medium text-sm transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Editar
                                </a>
                                <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta habitación? Esta acción no se puede deshacer.');">
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
