<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\Product;
use App\Models\Message;
use App\Models\Promo;
use App\Models\Order;
use App\Models\Blog;


class DashboardController extends Controller
{
    public function index()
    {
        $totalSubscriptions = Subscription::count();
        $totalProducts      = Product::count();
        $totalMessages       = Message::count();
        $totalPromos       = Promo::count();
        $totalOrders        = Order::count();
        $totalBlogs        = Blog::count();

        return view('admin.dashboard', compact(
            'totalSubscriptions',
            'totalProducts',
            'totalMessages',
            'totalPromos',
            'totalOrders',
            'totalBlogs'

        ));
    }
}
