@extends('layouts.index')

@section('title', 'Ofertas')

@section('content')
    <livewire:offers :showAll="true" />
@endsection
