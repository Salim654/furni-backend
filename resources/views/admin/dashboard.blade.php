@extends('layouts.admin') 

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Dashboard</h2>

    <div class="row">
        <!-- Subscriptions -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Subscriptions</h5>
                    <h2 class="text-primary">{{ $totalSubscriptions }}</h2>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Products</h5>
                    <h2 class="text-success">{{ $totalProducts }}</h2>
                </div>
            </div>
        </div>

        <!-- Orders -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Orders</h5>
                    <h2 class="text-danger">{{ $totalOrders }}</h2>
                </div>
            </div>
        </div>
        
        <!-- Orders -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Messages</h5>
                    <h2 class="text-danger">{{ $totalMessages }}</h2>
                </div>
            </div>
        </div>
        
        <!-- Orders -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Promos</h5>
                    <h2 class="text-danger">{{ $totalPromos }}</h2>
                </div>
            </div>
        </div>
        
        <!-- Orders -->
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Blogs</h5>
                    <h2 class="text-danger">{{ $totalBlogs }}</h2>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
