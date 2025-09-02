@extends('layouts.admin')

@section('title', 'Edit Blog')

@section('content')
<div class="container">
<a href="{{ route('blogs.index') }}" class="btn btn-dark mb-3">
    ←
</a>
<div class="card">
    <div class="card-header">
        <h4>Edit Blog</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Excerpt</label>
                <input type="text" name="excerpt" class="form-control" value="{{ old('excerpt', $blog->excerpt) }}">
                @error('excerpt') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5">{{ old('content', $blog->content) }}</textarea>
                @error('content') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Blog Image</label>
                <input type="file" name="image" class="form-control">
                @if($blog->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image" style="max-width: 200px;">
                    </div>
                @endif
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</div>
@endsection
