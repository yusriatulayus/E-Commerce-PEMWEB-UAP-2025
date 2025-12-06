<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SellerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        // Wajib role member
        if (!$user || $user->role !== 'member') {
            abort(403, 'Akses hanya untuk Penjual.');
        }

        // Wajib punya store
        if (!$user->store) {
            abort(403, 'Anda belum memiliki toko.');
        }

        return $next($request);
    }
}
