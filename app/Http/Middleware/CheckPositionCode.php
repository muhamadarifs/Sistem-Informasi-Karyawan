<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPositionCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        $user = Auth::user();

         // Ganti 'posisi_tertentu' dengan nilai yang diizinkan
        if ($user->position_name == 'Machining Supervisor') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
