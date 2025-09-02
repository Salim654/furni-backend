@extends('layouts.admin')
@section('title', 'Edit Product')

@section('content')
<div class="container">
    <a href="{{ route('products.index') }}" class="btn btn-dark mb-3">
    ←
</a>
<div class="card">

    <div class="card-header">
        <h4>Edit Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price', $product->price) }}" required>
                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Sale Price</label>
                <input type="number" name="sale_price" class="form-control" step="0.01" value="{{ old('sale_price', $product->sale_price) }}">
                @error('sale_price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
                @error('stock') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">SKU</label>
                <input type="text" name="sku" class="form-control" value="{{ old('sku', $product->sku) }}">
                @error('sku') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Active</label>
                <select name="active" class="form-select">
                    <option value="1" {{ old('active', $product->active) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('active', $product->active) == 0 ? 'selected' : '' }}>No</option>
                </select>
                @error('active') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Current Image Preview --}}
            <div class="mb-3">
                <label class="form-label">Current Image</label><br>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         style="width: 120px; height: 120px; object-fit: cover;">
                @else
                    <span class="text-muted">No Image</span>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Change Image</label>
                <input type="file" name="image" class="form-control">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</div>
@endsection
