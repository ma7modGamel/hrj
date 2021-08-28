<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\MailResetPasswordToken;
use Eloquent;
use Cache;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//class User extends Eloquent implements Authenticatable
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContracts;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Eloquent implements Authenticatable ,CanResetPasswordContracts
//class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use AuthenticableTrait;
    use CanResetPassword;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = ['username', 'name', 'email', 'password', 'phone', 'rank', 'type', 'active', 'active_mail', 'notf', 'forbidden','image','city'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Post(){
        return $this->hasMany('App\Post','user_id');
    }
    
    public function Cmnt(){
        return $this->hasMany('App\Cmnt','user_id')->orderByDesc('created_at');
    }
    public function Vim(){
        return $this->hasMany('App\Vim','user_id');
    }
    public function Rank(){
        return $this->hasMany('App\Rank','user_id');
    }

    public function Message(){
        return $this->hasMany('App\Message', 'user_id');
    }

    public function Rating(){
        return $this->hasMany('App\Rating', 'rate_id');
    }

    public function Posts(){
        return $this->belongsToMany('App\Post','post_user','user_id','post_id')->withTimestamps();
    }

    public function Follows(){
        return $this->belongsToMany('App\User','follow_user','user_id','user_follow')->withTimestamps();
    }

    public function Brands(){
        return  $this->belongsToMany('App\Cat','brand_user','user_id','brand')->withTimestamps();
    }

    public function isOnline(){
        return Cache::has('user-is-online-' . $this->id);
    }

    public static function userImg($requestImg,$userId){
        $image = $requestImg;
        $exten  = array('jpeg','bmp','png','jpg','jpe','gif','svg','svgz');
        if(in_array_ci($image->getClientOriginalExtension(),$exten)){
            $destinationPath = public_path().'/upload/users';
            $imageName = $userId.'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath,$imageName);
            return $imageName;
        }else{
            return 'no_image.png';
        }
    }
    /**
     * Send a password reset email to the user
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }
}
