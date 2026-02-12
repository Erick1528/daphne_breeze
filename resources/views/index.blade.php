@extends('layouts.index')

@section('title', 'Inicio')
@section('meta_description', 'Hotel Daphne Breeze en Omoa, Cortés, Honduras. Barrio La Playa, a una cuadra del muelle artesanal y junto a la marina. Habitaciones, restaurante y bar, ofertas y reservas.')

@push('meta')
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="Daphne Breeze - Inicio">
    <meta property="og:description" content="Hotel Daphne Breeze en Omoa, Cortés, Honduras. Barrio La Playa, junto al muelle artesanal de Omoa y la marina. Habitaciones, restaurante y bar, ofertas y reservas.">
    <meta property="og:image" content="{{ url(asset('build/assets/logo.webp')) }}">
    <meta property="og:locale" content="es_ES">
    <meta property="og:site_name" content="Daphne Breeze">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Daphne Breeze - Inicio">
    <meta name="twitter:description" content="Hotel Daphne Breeze en Omoa, Cortés. Barrio La Playa, junto al muelle artesanal. Habitaciones, restaurante, ofertas y reservas.">
    <meta name="twitter:image" content="{{ url(asset('build/assets/logo.webp')) }}">
@endpush

@section('banner')
    <livewire:hero>
@endsection

@section('content')
    <livewire:rooms />
    <livewire:restaurant />
    <livewire:offers />
    <livewire:reviews />
    <livewire:map-location />
    <livewire:reservation-options />
    <livewire:contact-form />
@endsection