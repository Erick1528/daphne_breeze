@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mt-[80px] sm:mt-[120px]">
        <div class="mb-8 md:mb-10">
            <h1 class="text-caribeCoffee text-2xl md:text-3xl font-bold">Dashboard</h1>
            <p class="mt-1 text-caribeCoffee/70 italic text-sm md:text-base">Panel de administración</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6 md:gap-8">
            <a href="{{ route('admin.rooms.index') }}" class="group bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6 md:p-8 hover:border-caribeOrange/30 transition-all duration-200">
                <h2 class="text-caribeCoffee text-xl md:text-2xl font-semibold mb-3 group-hover:text-caribeOrange transition-colors">Habitaciones</h2>
                <p class="text-caribeCoffee/70 text-sm md:text-base leading-relaxed">Gestionar habitaciones del hotel, agregar nuevas y editar existentes.</p>
                <div class="mt-4 inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm md:text-base group-hover:text-caribeCoffee transition-colors">
                    Gestionar
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
                </div>
            </a>

            <a href="{{ route('admin.offers.index') }}" class="group bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6 md:p-8 hover:border-caribeOrange/30 transition-all duration-200">
                <h2 class="text-caribeCoffee text-xl md:text-2xl font-semibold mb-3 group-hover:text-caribeOrange transition-colors">Ofertas</h2>
                <p class="text-caribeCoffee/70 text-sm md:text-base leading-relaxed">Gestionar ofertas y promociones especiales para el hotel.</p>
                <div class="mt-4 inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm md:text-base group-hover:text-caribeCoffee transition-colors">
                    Gestionar
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
                </div>
            </a>

            <a href="{{ route('admin.reviews.index') }}" class="group bg-white/60 border border-caribeCoffee/10 rounded-[12px] p-6 md:p-8 hover:border-caribeOrange/30 transition-all duration-200">
                <h2 class="text-caribeCoffee text-xl md:text-2xl font-semibold mb-3 group-hover:text-caribeOrange transition-colors">Reseñas</h2>
                <p class="text-caribeCoffee/70 text-sm md:text-base leading-relaxed">Añadir y gestionar reseñas para la web (manual o copiadas de Google).</p>
                <div class="mt-4 inline-flex items-center gap-1.5 text-caribeOrange font-medium text-sm md:text-base group-hover:text-caribeCoffee transition-colors">
                    Gestionar
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6L16 12l-6 6"/></svg>
                </div>
            </a>
        </div>
    </div>
@endsection
