@extends('layouts.admin')

@section('title', 'Promo Codes')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
     <h1>Promo Codes</h1>
    <a href="{{ route('promos.create') }}" class="btn btn-primary">Add Promo</a>
</div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @livewire('promo-table')
</div>
@endsection
