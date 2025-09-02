@extends('layouts.admin')
@section('title', 'Orders')

@section('content')
<div class="container">
    <h1>Orders</h1>
    @livewire('orders-table')
</div>
@endsection
