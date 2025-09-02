<div>
    <!-- Search bar -->
    <input type="text" wire:model.debounce.300ms="search" 
           placeholder="Search products..." 
           class="form-control mb-3" />

    <table class="table table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             style="width: 60px; height: 60px; object-fit: cover;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->active ? 'Yes' : 'No' }}</td>
                <td class="text-center">
                        {{-- Edit icon --}}
                        <a href="{{ route('products.edit', $product) }}" 
                           class="btn btn-sm btn-outline-info"
                           title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        {{-- Delete icon --}}
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="delete-form d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-outline-danger delete-btn" title="Delete">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        </form>
                        
                    </td>
            </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No products found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $products->links() }}
</div>
