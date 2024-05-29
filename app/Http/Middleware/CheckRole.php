<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle($request, \Closure $next, $role)
    {
        if (!$request->user() || $request->user()->role !== $role) {
            return redirect('/');
        }

        return $next($request);
    }
}
