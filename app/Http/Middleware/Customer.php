<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard("customers")->check() && Auth::guard("customers")->user()) {
            return $next($request);
        } else {
			return $next($request);
            return redirect()->route("getSiteHome");
	    }
    }
}
