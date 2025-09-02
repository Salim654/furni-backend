<div>
    {{-- Filter (Livewire) --}}
    <div class="mb-3 d-flex gap-2 align-items-center">
        <label class="me-2 mb-0">Status</label>
        <select wire:model="status" class="form-select" style="max-width: 220px;">
            <option value="">All Status</option>
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select>

        <button type="button" wire:click="$set('status','')" class="btn btn-outline-secondary ms-2">
            Clear
        </button>
    </div>

    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Promo Code</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr wire:key="order-{{ $order->id }}">
                    <td>{{ $order->id }}</td>
                    <td>{{ optional($order->user)->name ?? '—' }}</td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->promo ? $order->promo->code : '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'completed' ? 'success' : ($order->status == 'processing' ? 'info' : 'danger')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td class="text-center d-inline-flex gap-2">
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary" title="View">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-outline-info" title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                    title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this order?');">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No orders found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Livewire-aware pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $orders->links() }}
    </div>
</div>
