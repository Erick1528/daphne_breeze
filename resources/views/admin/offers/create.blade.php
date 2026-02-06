@extends('layouts.admin')

@section('title', 'Crear Oferta')

@section('content')
    <div class="mt-[80px] sm:mt-[120px]">
        <div class="mb-8 md:mb-10 flex items-center justify-between">
            <div>
                <h1 class="text-caribeCoffee text-2xl md:text-3xl font-bold">Crear Oferta</h1>
                <p class="mt-1 text-caribeCoffee/70 italic text-sm md:text-base">Agregar una nueva oferta o promoción</p>
            </div>
            <a href="{{ route('admin.offers.index') }}" class="inline-flex items-center gap-1.5 text-caribeCoffee/70 hover:text-caribeCoffee text-sm font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Volver a la lista
            </a>
        </div>

        <livewire:admin.offer-create />
    </div>
@endsection
