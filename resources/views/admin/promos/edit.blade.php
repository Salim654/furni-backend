@extends('layouts.admin')

@section('title', 'Edit Promo')

@section('content')
<div class="container">
<a href="{{ route('promos.index') }}" class="btn btn-dark mb-3">
    ←
</a>
<div class="card">

    <div class="card-header">
        <h4>Edit Promo</h4>
    </div>
    <div class="card-body">

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('promos.update', $promo) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="code" class="form-label">Promo Code</label>
        <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $promo->code) }}" required>
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type" class="form-select" required>
            <option value="fixed" {{ old('type', $promo->type) == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
            <option value="percent" {{ old('type', $promo->type) == 'percent' ? 'selected' : '' }}>Percentage</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="value" class="form-label">Value</label>
        <input type="number" step="0.01" class="form-control" id="value" name="value" value="{{ old('value', $promo->value) }}" required>
    </div>

    <div class="mb-3">
        <label for="starts_at" class="form-label">Start Date</label>
        <input type="date" class="form-control" id="starts_at" name="starts_at" value="{{ old('starts_at', $promo->starts_at ? $promo->starts_at->format('Y-m-d') : '') }}">
    </div>

    <div class="mb-3">
        <label for="ends_at" class="form-label">End Date</label>
        <input type="date" class="form-control" id="ends_at" name="ends_at" value="{{ old('ends_at', $promo->ends_at ? $promo->ends_at->format('Y-m-d') : '') }}">
    </div>

    <div class="mb-3">
        <label for="usage_limit" class="form-label">Usage Limit</label>
        <input type="number" class="form-control" id="usage_limit" name="usage_limit" value="{{ old('usage_limit', $promo->usage_limit) }}">
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="active" name="active" value="1" {{ old('active', $promo->active) ? 'checked' : '' }}>
        <label class="form-check-label" for="active">Active</label>
    </div>

    <button type="submit" class="btn btn-primary">Update Promo</button>
</form>
</div>
</div>
@endsection
