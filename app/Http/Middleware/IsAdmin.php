<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsAdmin
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
        if(Auth::user()){
            if (Auth::user()->type != 0) {
                return \App::abort(404);
            }
        }else{
            return \App::abort(404);
        }
        return $next($request);
    }
}
