<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminLoginMiddleware
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
        if(Auth::check()) {
            if( Auth::User()->nd_lnd_id != 1) {
                Auth::logout();
                return redirect('admin/dangnhap');
            }else{
                return $next($request);
            }
        }else{
            return redirect('admin/dangnhap');
        }
    }
}
