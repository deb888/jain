<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   if (Auth::check()) {
		
		
		
		
		
         if (Auth::user()->type != '1')
        {
            return redirect('/admin/login');
        }
		}else{
			return redirect('/admin/login');
			
		}
		
		return $next($request);
    }
}
