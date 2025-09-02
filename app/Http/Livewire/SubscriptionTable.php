<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Subscription;

class SubscriptionTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        Subscription::findOrFail($id)->delete();
        session()->flash('success', 'Subscription deleted successfully.');
    }

    public function render()
    {
        return view('livewire.subscription-table', [
            'subscriptions' => Subscription::latest()->paginate(10),
        ]);
    }
}
