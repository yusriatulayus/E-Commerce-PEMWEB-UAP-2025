<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasStore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ➜ Tambahan: cek user login
        $user = auth()->user();

        // Kalau user tidak login
        if (!$user) {
            return redirect()->route('login');
        }

        // ➜ Tambahan: cek apakah user punya store
        if (!$user->store) {
            return redirect()
                ->route('member.dashboard')
                ->with('error', 'Anda belum memiliki toko.');
        }

        // Kalau user punya store → lanjutkan
        return $next($request);
    }
}
