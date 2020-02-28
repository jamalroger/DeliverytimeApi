<?php

namespace App\Http\Middleware;

use Closure;

class AuthIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!auth()->user()->isAdmin())
            return response(['auth' => 'you should be a administrator']);

        return $next($request);
    }
}
