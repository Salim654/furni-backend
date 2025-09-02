<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Promo;

class PromoTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap'; // Use bootstrap pagination styles

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $promos = Promo::query()
            ->where('code', 'like', '%' . $this->search . '%')
            ->orWhere('type', 'like', '%' . $this->search . '%')
            ->orderBy('starts_at', 'desc')
            ->paginate(5);

        return view('livewire.promo-table', [
            'promos' => $promos,
        ]);
    }
}
