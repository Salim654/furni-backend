<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap'; // use bootstrap pagination styles

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('livewire.product-table', [
            'products' => $products,
        ]);
    }
}
