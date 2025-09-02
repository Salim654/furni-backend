@extends('layouts.admin')
@section('title', 'Add Product')

@section('content')
<div class="container">
<a href="{{ route('products.index') }}" class="btn btn-dark mb-3">
    ←
</a>
<div class="card">
    <div class="card-header">
        <h4>Add New Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Sale Price</label>
                <input type="number" name="sale_price" class="form-control" step="0.01" value="{{ old('sale_price') }}">
                @error('sale_price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', 0) }}" required>
                @error('stock') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">SKU</label>
                <input type="text" name="sku" class="form-control" value="{{ old('sku') }}">
                @error('sku') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Active</label>
                <select name="active" class="form-select">
                    <option value="1" {{ old('active') == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>No</option>
                </select>
                @error('active') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</div>
@endsection
