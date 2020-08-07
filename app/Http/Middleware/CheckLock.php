<?php

namespace App\Http\Middleware;

use Closure;

class CheckLock
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
        if (intval(auth()->user()->islocked) == 1) {
            return redirect()->route('locked_user');
        }
        return $next($request);
    }
}
