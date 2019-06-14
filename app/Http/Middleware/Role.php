<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Role
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
        if ( Auth::check() && Auth::user()->role_id == 3 )
        {
            return redirect('/childcare-dashboard');
        }
        else if(Auth::check() && Auth::user()->role_id == 4)
        {
            return redirect('/nany-dashboard');
        }
    }
}
