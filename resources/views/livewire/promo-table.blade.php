<div>
    <input
        type="text"
        wire:model.debounce.300ms="search"
        placeholder="Search promo codes..."
        class="form-control mb-3"
    />

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Code</th>
                <th>Type</th>
                <th>Value</th>
                <th>Active</th>
                <th>Starts At</th>
                <th>Ends At</th>
                <th>Usage Limit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($promos as $promo)
                <tr>
                    <td>{{ $promo->code }}</td>
                    <td>{{ ucfirst($promo->type) }}</td>
                    <td>{{ $promo->value }}</td>
                    <td>{{ $promo->active ? 'Yes' : 'No' }}</td>
                    <td>{{ $promo->starts_at?->format('Y-m-d') ?? '-' }}</td>
                    <td>{{ $promo->ends_at?->format('Y-m-d') ?? '-' }}</td>
                    <td>{{ $promo->usage_limit ?? '-' }}</td>
                    <td class="text-center">
                        {{-- Edit icon --}}
                        <a href="{{ route('promos.edit', $promo) }}" 
                           class="btn btn-sm btn-outline-info"
                           title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        {{-- Delete icon --}}
                        <form action="{{ route('promos.destroy', $promo) }}" method="POST" class="delete-form d-inline">
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
                    <td colspan="8">No promo codes found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $promos->links() }}
</div>
