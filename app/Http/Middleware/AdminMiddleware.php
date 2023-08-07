<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure(Request): (Response)  $next
     * @param  string  ...$guards
     * @return Response
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if (Auth::user()?->isAdmin()) {
            return $next($request);
        }

        return response()->json(['error' => __('auth.access_error')], Response::HTTP_FORBIDDEN);
    }
}
