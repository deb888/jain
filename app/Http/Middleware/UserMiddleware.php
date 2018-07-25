<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Closure;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'frontuser')
    {
        
		if (Auth::guard($guard)->check()) {
		
		
         if (Auth::guard($guard)->user()->type != '2')
        {
            return redirect('login');
        }
		}else{
			return redirect('login');
			
		}
		return $next($request);
    }
}
