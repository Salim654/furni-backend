<div>
    <input
        type="text"
        wire:model.debounce.300ms="search"
        placeholder="Search blogs..."
        class="form-control mb-3"
    />

    <table class="table table-bordered table-hover ">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Excerpt</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
                <tr>
                    <td>
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}"
                                 alt="Blog Image"
                                 style="width: 120px; height: 80px; object-fit: cover; border-radius: 6px;">
                        @else
                            <img src="{{ asset('images/default-blog.jpg') }}"
                                 alt="Default"
                                 style="width: 120px; height: 80px; object-fit: cover; border-radius: 6px;">
                        @endif
                    </td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->excerpt }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <!-- Edit button -->
                            <a href="{{ route('blogs.edit', $blog) }}"
                            class="btn btn-sm btn-outline-info"
                            title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <!-- Delete button with confirmation -->
                        <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="delete-form d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-outline-danger delete-btn" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No blogs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $blogs->links() }}
</div>
