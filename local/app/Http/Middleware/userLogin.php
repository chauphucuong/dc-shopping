<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class userLogin
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->nd_lnd_id == 1){
                Auth::logout();
                //return $next($request);
                return redirect()->back()->withErrors('Tên tài khoản hoặc mật khẩu không chính xác');
            }else{
                return $next($request);
            }
        }else{
            return $next($request);
        }
    }
}
