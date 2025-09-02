@extends('layouts.admin')

@section('title', 'Add Blog')

@section('content')
<div class="container">
<a href="{{ route('blogs.index') }}" class="btn btn-dark mb-3">
    ←
</a>
<div class="card">
    <div class="card-header">
        <h4>Add New Blog</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Excerpt</label>
                <input type="text" name="excerpt" class="form-control" value="{{ old('excerpt') }}">
                @error('excerpt') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5">{{ old('content') }}</textarea>
                @error('content') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Blog Image</label>
                <input type="file" name="image" class="form-control">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</div>
@endsection
