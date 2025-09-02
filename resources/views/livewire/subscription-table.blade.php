<div>
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subscriptions as $sub)
                <tr>
                    <td>{{ $sub->id }}</td>
                    <td>{{ $sub->name }}</td>
                    <td>{{ $sub->email }}</td>
                    <td>{{ $sub->created_at->format('d M Y, H:i') }}</td>
                    <td class="text-center">
                            <form action="{{ route('subscriptions.destroy', $sub) }}" method="POST" class="delete-form d-inline">
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
                    <td colspan="5" class="text-center">No subscriptions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $subscriptions->links() }}
</div>
