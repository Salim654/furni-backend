@extends('layouts.admin')
@section('title', 'Orders')

@section('content')
<div class="container">
    <h1>Orders</h1>

    {{-- Livewire component renders filter + table + pagination --}}
    @livewire('orders-table')
</div>
@endsection
