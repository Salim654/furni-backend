<?php

// app/Http/Controllers/Admin/MessageController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.message.index');
    }
        // Delete Message
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
