<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

class usersForbidden
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
        if(getSettings('status') == 0){
            if(!in_array('login',Request()->segments())){
                if(!Auth()->guest()){
                    if(Auth()->user()->type == 0){
                        return $next($request);
                    }else{
                        return \App::abort(499);
                    }
                }else{
                    return \App::abort(499);
                }
            }                             
        }

        if(getSettings('status') == 2){
            if(!Auth()->guest()){            
                if(Auth()->user()->type == 0){
                    return $next($request);
                }else{
                    return \App::abort(444);
                }
            }else{
                return \App::abort(444);
            }
        }

        if(Auth::user()){
            if (Auth::user()->forbidden == 1) {
                $forbiddenLinks = ['inbox','outbox','conv','notifications','updatemobile','updatename','updateemail'];
                foreach ($forbiddenLinks as $link) {
                    if(in_array($link,$request->segments())){
                        return redirect('/');
                    }
                }
            }
        }
        return $next($request);
    }
}
