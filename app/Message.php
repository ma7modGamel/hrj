<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $table = 'msgs';
    public $timestamps = true;

    protected $fillable = ['user_id', 'user_to', 'body', 'status'];

    protected $appends = ['user_name'];

    protected $dates = ['deleted_at'];

    function getUserNameAttribute(){
      return $this->User ? $this->User->username : 'مستخدم محذوف';
      // return $this->User->username;
    }
    public function User(){
    	return $this->belongsTo('App\User','user_id');
    }

    public function UserTo(){
    	return $this->belongsTo('App\User','user_to');
    }


}
