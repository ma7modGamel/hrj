<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cmnt extends Model
{
    protected $table = 'cmnts';
    public $timestamps = true;
    protected $fillable = [ 'user_id', 'del_user', 'post_id', 'body', 'active'];
    protected $appends = [ 'user_name','time_ago'];

    public function User(){
    	return $this->belongsTo('App\User','user_id');
    } 
    function getUserNameAttribute(){
      return $this->User->username;
    }
    public function Post(){
    	return $this->belongsTo('App\Post','post_id');
    }
    function getTimeAgoAttribute(){
      return $this->created_at->diffForHumans();
    }
}
