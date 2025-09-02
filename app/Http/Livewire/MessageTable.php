<?php

// app/Http/Livewire/MessageTable.php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Message;

class MessageTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        Message::findOrFail($id)->delete();
        session()->flash('success', 'Message deleted successfully.');
    }

    public function render()
    {
        return view('livewire.message-table', [
            'messages' => Message::latest()->paginate(10),
        ]);
    }
}
