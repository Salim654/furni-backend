<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PromoController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Api\OrderController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//login to get token
Route::post('/login', function(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json(['token' => $token]);
});
// Register new user
Route::post('/register', function(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => ['required', Password::defaults()],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'user' => $user,
        'token' => $token
    ], 201);
});
// Logout user and delete current token
Route::middleware('auth:sanctum')->post('/logout', function(Request $request) {
    // Revoke the token used for this request
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Logged out successfully'
    ]);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/apply-promo', [PromoController::class, 'applyPromo']);
Route::middleware('auth:sanctum')->post('/orders', [OrderController::class, 'store']);
Route::middleware('auth:sanctum')->get('/orders', [OrderController::class, 'getmyorders']);
Route::middleware('auth:sanctum')->post('/orders/{id}/cancel', [OrderController::class, 'cancel']);
Route::get('/blogs', [BlogController::class, 'index']);
Route::post('/messages', [MessageController::class, 'store']);
Route::post('/subscriptions', [SubscriptionController::class, 'store']);