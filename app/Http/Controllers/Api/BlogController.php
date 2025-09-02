<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Get all blogs (no author info)
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return response()->json([
            'message' => 'All Blogs',
            'blogs' => $blogs
        ], 200);
    }
}
