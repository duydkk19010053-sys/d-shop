<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNoAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->is('admin') || $request->is('admin/*')){
            if(!Auth::guard('admin')->check()){
               return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập để để vào trang quản trị');
            }
        }else{
            if(!Auth::guard('web')->check()){
                return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để sử dụng chức năng này');
            }
        }
        return $next($request);
    }
}
