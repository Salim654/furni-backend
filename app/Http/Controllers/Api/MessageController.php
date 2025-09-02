<?php

// app/Http/Controllers/Api/MessageController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email',
            'message'    => 'required|string',
        ]);

        Message::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Message received successfully.',
        ], 201);
    }
}
