<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class OrdersTable extends Component
{
    use WithPagination;

    public $status = '';

    // Use bootstrap pagination theme if you're using bootstrap pagination markup
    protected $paginationTheme = 'bootstrap';

    // Keep status synced with query string (but exclude empty to avoid clutter)
    protected $queryString = [
        'status' => ['except' => ''],
    ];

    public function mount()
    {
        // Initialize from query string if present
        $this->status = request()->query('status', $this->status);
    }

    public function updatingStatus()
    {
        // when status changes, reset to page 1
        $this->resetPage();
    }

    public function render()
    {
        $query = Order::with(['user', 'promo'])
            ->when($this->status, function ($q) {
                $q->where('status', $this->status);
            })
            ->latest();

        return view('livewire.orders-table', [
            'orders' => $query->paginate(10),
        ]);
    }
}
