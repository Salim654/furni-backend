@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="container">
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@livewire('product-table')
</div>
@endsection
