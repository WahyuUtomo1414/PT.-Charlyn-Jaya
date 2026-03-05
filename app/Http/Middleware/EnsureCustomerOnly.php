<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureCustomerOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && (($user->hasRole('super-admin')) || Auth::id() === 1)) {
            abort(403, 'Akses ditolak. Admin tidak dapat mengakses halaman penawaran customer.');
        }

        return $next($request);
    }
}
