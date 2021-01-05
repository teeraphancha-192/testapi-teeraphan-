<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            return $next($request);
        }
 
        return redirect('/not_permitted_to_execute_this_operation');//หากไม่ใช่ Admin ให้ Redirect ไปที่ URL นี้
    }
}
