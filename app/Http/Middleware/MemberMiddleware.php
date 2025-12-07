<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MemberMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'member') {
            abort(403, 'Anda tidak memiliki akses sebagai member.');
        }

        return $next($request);
    }
}
