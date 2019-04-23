<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddlware
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
        if (session('uname')) {
            return $next($request);
        } else {
            
            return redirect('/admin/login');
        }
    }
}
