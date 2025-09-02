<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;

class BlogTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap'; // Use Bootstrap pagination

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $blogs = Blog::query()
            ->where('title', 'like', '%' . $this->search . '%')
            ->orWhere('excerpt', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('livewire.blog-table', [
            'blogs' => $blogs,
        ]);
    }
}
