<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ActiveUser
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
            if(Auth::user()->isActive()){
                return $next($request);
            }else{
                Auth::logout();
                return redirect()->back()->with('alert', 'Je account is geblokkeerd, gelieve de bibliothecaris te contacteren');
            }
        }
        return redirect('/');
    }

}
