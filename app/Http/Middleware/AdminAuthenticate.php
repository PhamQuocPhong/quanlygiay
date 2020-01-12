<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!Session::get('admin')) {
            return redirect()->back()->with('Message', 'Bạn vui lòng đăng nhập');
        }
    
        return $next($request);
  
        
    }
}

