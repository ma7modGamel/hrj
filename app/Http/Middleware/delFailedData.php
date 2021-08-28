<?php

namespace App\Http\Middleware;

use Closure;
class delFailedData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){


        // if(method_exists(new EncryptCookies,'handleDomainAllowed')){
        //     dd('founded');
        //     if(view()->exists('errors.403')){
        //         return \App::abort(403);
        //     }else{
        //         Config::set('app.debug',false);
        //         return \App::abort(403);
        //     }
        // }else{
        //     dd('not found');
        // }

        #===================== Delete From VIM =========================================
        \App\Vim::where('end_date','<=',\Carbon\Carbon::now())->delete();

        #===================== Delete not active Users =================================
        // \App\User::where('created_at','<=',\Carbon\Carbon::now()->addDays(-getSettings('delFailedUsers')))->where('active','!=',1)->forceDelete();
        
        return $next($request);
    }
}
