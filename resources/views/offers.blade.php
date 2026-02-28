@extends('layouts.index')

@section('title', 'Ofertas')
@section('meta_description', 'Ofertas y promociones en Hotel Daphne Breeze, Omoa, Cortés. Descuentos en habitaciones y estancias. Hotel con piscina, restaurante y cerca de la playa y la Fortaleza de San Fernando.')
@section('meta_keywords', 'ofertas hotel Omoa, promociones hotel Omoa, descuentos alojamiento Omoa, ofertas Daphne Breeze, hotel Omoa ofertas')

@push('meta')
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="Daphne Breeze - Ofertas">
    <meta property="og:description" content="Ofertas y promociones en Hotel Daphne Breeze, Omoa, Cortés. Descuentos en habitaciones y estancias. Ubicados en Barrio La Playa, junto al muelle artesanal de Omoa.">
    <meta property="og:image" content="{{ url(asset('build/assets/logo.webp')) }}">
    <meta property="og:locale" content="es_ES">
    <meta property="og:site_name" content="Daphne Breeze">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Daphne Breeze - Ofertas">
    <meta name="twitter:description" content="Ofertas en Hotel Daphne Breeze, Omoa. Barrio La Playa, junto al muelle artesanal. Descuentos en habitaciones.">
    <meta name="twitter:image" content="{{ url(asset('build/assets/logo.webp')) }}">
@endpush

@section('content')
    <livewire:offers :showAll="true" />
@endsection
