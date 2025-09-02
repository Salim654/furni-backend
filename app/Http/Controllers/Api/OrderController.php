<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Promo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string|max:255',
            'promo_code' => 'nullable|string|exists:promos,code',
        ]);

        // Calculate total price of items
        $total = 0;
        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);
            $total += $item['quantity'] * $product->price;
        }

        $discount = 0;
        $promo = null;

        if ($request->filled('promo_code')) {
            $promo = Promo::where('code', $request->promo_code)->first();

            $now = Carbon::now();

            // Validate promo conditions
            if (!$promo->active) {
                return response()->json(['error' => 'Promo code is not active.'], 422);
            }

            if ($promo->starts_at && $now->lt($promo->starts_at)) {
                return response()->json(['error' => 'Promo code is not valid yet.'], 422);
            }

            if ($promo->ends_at && $now->gt($promo->ends_at)) {
                return response()->json(['error' => 'Promo code has expired.'], 422);
            }

            // TODO: Implement usage limit check here if needed

            // Calculate discount based on promo type
            if ($promo->type === 'fixed') {
                $discount = $promo->value;
            } elseif ($promo->type === 'percent') {
                $discount = ($promo->value / 100) * $total;
            }

            // Discount can’t be more than total
            $discount = min($discount, $total);
        }

        $finalTotal = $total - $discount;

        // Create the order and link promo by promo_id
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $finalTotal,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'shipping_address' => $request->shipping_address,
            'promo_id' => $promo?->id,
            'discount' => $discount,
        ]);

        // Create order items
        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->price,
            ]);
        }

        // Load items and related product for response
        $order->load('items.product', 'promo');

        return response()->json([
            'message' => 'Order placed successfully',
            'order' => $order,
            'discount' => $discount,
            'final_total' => $finalTotal,
        ], 201);
    }
        public function getmyorders(Request $request)
        {
            $user = $request->user();
            $orders = Order::with(['items.product', 'promo'])
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'message' => 'My Orders',
                'orders' => $orders,
            ]);
        }
    public function cancel(Request $request, $id)
{
    $user = $request->user();
    $order = Order::where('id', $id)->where('user_id', $user->id)->first();

    if (!$order) {
        return response()->json([
            'error' => 'Order not found'
        ], 404);
    }

    // Prevent cancelling if order is already processed
    if (!in_array($order->status, ['pending','processing'])) {
        return response()->json([
            'error' => 'Order cannot be cancelled at this stage.'
        ], 422);
    }

    $order->status = 'cancelled';
    $order->save();

    return response()->json([
        'message' => 'Order cancelled successfully',
        'order' => $order
    ]);
}

}
