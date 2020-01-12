<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Authenticate
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

       if (!Session::get('member')) {
            return redirect()->back()->with('Message', 'Bạn vui lòng đăng nhập');
        }
    
        return $next($request);
    }
}
