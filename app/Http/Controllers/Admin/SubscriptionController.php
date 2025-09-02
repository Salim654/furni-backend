<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    // Admin view - list all subscriptions
    public function index()
    {
        $subscriptions = Subscription::latest()->get();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    // Delete subscription
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->back()->with('success', 'Subscription deleted successfully.');
    }

    // API endpoint - create subscription
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        $subscription = Subscription::create($request->only(['name','email']));

        return response()->json([
            'success' => true,
            'message' => 'Subscribed successfully!',
            'data' => $subscription,
        ], 201);
    }

}
