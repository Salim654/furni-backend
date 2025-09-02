<div>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>From</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $msg)
                <tr>
                    <td>{{ $msg->id }}</td>
                    <td>{{ $msg->first_name }} {{ $msg->last_name }}</td>
                    <td>{{ $msg->email }}</td>
                    <td>{{ Str::limit($msg->message, 50) }}</td>
                    <td>{{ $msg->created_at->format('d M Y, H:i') }}</td>
                    <td class="text-center">
                        <!-- Edit button -->
                        <a href="{{ route('messages.edit', $msg->id) }}" 
                            class="btn btn-sm btn-outline-info"
                           title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <!-- Delete button with confirm -->
                            <form action="{{ route('messages.destroy', $msg) }}" method="POST" class="delete-form d-inline">
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
                    <td colspan="6">No messages found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $messages->links() }}
</div>
