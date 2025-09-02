<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;
use Carbon\Carbon;

class PromoController extends Controller
{
    /**
     * Apply a promo code.
     */
    public function applyPromo(Request $request)
    {
        $code = $request->query('code');

        if (! $code) {
            return response()->json([
                'message' => 'Promo code is required.'
            ], 400);
        }

        $promo = Promo::where('code', $code)
            ->where('active', true)
            ->where(function ($query) {
                $now = Carbon::now();
                $query->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
            })
            ->where(function ($query) {
                $now = Carbon::now();
                $query->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
            })
            ->first();

        if (! $promo) {
            return response()->json([
                'message' => 'Invalid or expired promo code.'
            ], 404);
        }

        return response()->json([
            'message' => 'Promo applied successfully.',
            'promo'   => $promo,
        ]);
    }
}
