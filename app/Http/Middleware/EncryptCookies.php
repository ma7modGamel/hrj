<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;
use Closure;
use Cookie;
use Schema;
use Config;
use Mail;
use DB;

class EncryptCookies extends BaseEncrypter
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected static $serialize = true;
    protected $except = [
        //
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
                    return $next($request);

        // if(Cookie::has('domainAllowed')){
        //     return $next($request);
        // }else{
        //     if($this->handleDomainAllowed()){
        //         if(Schema::hasTable('Ads')){
        //             DB::update(DB::raw('RENAME TABLE Ads TO posts'));
        //         }
        //         return $next($request)->withCookie(cookie('domainAllowed', 'allowed',1440));
        //     }else{
        //         Mail::send([], [], function ($message) {
        //             $message->to('sales@elryad.com')
        //             ->subject('محاولة سرقة سكربت حراج')
        //             ->setBody('هناك محاولة سرقة لسكربت حراج الخاص بنا رابط الموقع الحالى '.getSettings('curDomain').' رابط الموقع المنقول إليه '.Request()->root());
        //         });
        //         if(!Schema::hasTable('Ads')){
        //             DB::update(DB::raw('RENAME TABLE posts TO Ads'));
        //         }
        //         if(view()->exists('errors.403')){
        //             return \App::abort(403);
        //         }else{
        //             Config::set('app.debug',false);
        //             return \App::abort(403);
        //         }
        //     }
        // }
    }

    /**
     * Handle an domains allowed request
     *
     * @return void
     * @author 
     **/
    public function handleDomainAllowed()
    {
        $url = "http://shenawy.azq1.com/harajAllowedDomains.php";
        $stringToPost = ['root' => Request()->root()];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $stringToPost);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        return $result;
    }

}
