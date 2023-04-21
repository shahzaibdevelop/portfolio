<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminAuth
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
        $isAuthenticationAdmin = Auth::check();
        if ($isAuthenticationAdmin) {
            return $next($request);
        }
    
        return redirect()->route('admin_login');
    }
}
