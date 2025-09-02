@extends('layouts.admin')
@section('title', 'Edit Order')

@section('content')
<div class="container">
<a href="{{ route('orders.index') }}" class="btn btn-dark mb-3">
    ←
</a>
<div class="card">
    <div class="card-header">Edit Order #{{ $order->id }}</div>
    <div class="card-body">
        <form action="{{ route('orders.update', $order) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="pending" {{ $order->status=='pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status=='processing' ? 'selected' : '' }}>Processing</option>
                    <option value="completed" {{ $order->status=='completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $order->status=='cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Order</button>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</div>
@endsection
