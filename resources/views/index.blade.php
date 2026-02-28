@extends('layouts.index')

@section('title', 'Inicio')
@section('meta_description', 'Hotel Daphne Breeze en Omoa, Cortés, Honduras. Barrio La Playa, cerca de la playa y la Fortaleza de San Fernando de Omoa. Piscina, restaurante y bar, billar y juegos para niños. Habitaciones, ofertas y reservas.')
@section('meta_keywords', 'hotel Omoa, hotel Cortés, Honduras, hotel playa Omoa, Fortaleza San Fernando Omoa, hotel con piscina Omoa, restaurante Omoa, alojamiento Omoa, Daphne Breeze, muelle artesanal Omoa, marina Omoa, hotel familia Omoa, billar Omoa, hotel Barrio La Playa')

@push('meta')
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="Daphne Breeze - Inicio">
    <meta property="og:description" content="Hotel Daphne Breeze en Omoa, Cortés, Honduras. Cerca de la playa y la Fortaleza de San Fernando. Piscina, restaurante, billar y juegos para niños. Habitaciones y reservas.">
    <meta property="og:image" content="{{ url(asset('build/assets/logo.webp')) }}">
    <meta property="og:locale" content="es_ES">
    <meta property="og:site_name" content="Daphne Breeze">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Daphne Breeze - Inicio">
    <meta name="twitter:description" content="Hotel Daphne Breeze en Omoa. Piscina, restaurante, playa y Fortaleza de San Fernando cerca. Billar y juegos para niños. Habitaciones y reservas.">
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