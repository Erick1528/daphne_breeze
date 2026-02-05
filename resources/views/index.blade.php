@extends('layouts.index')

@section('title', 'Inicio')

@section('banner')
    <livewire:hero>
@endsection

@section('content')
    <livewire:rooms />
    <livewire:restaurant />
    <livewire:offers />
    <livewire:map-location />
    <livewire:reservation-options />
    <livewire:contact-form />
@endsection