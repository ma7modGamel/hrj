<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'posts';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $appends = ['image','images','time_ago','comments','city_id','user_name','city_name'];
    protected $fillable = ['user_id', 'del_user', 'cat_id', 'brand', 'model', 'area_id', 'price', 'soum', 'title', 'body', 'lat', 'lng', 'contact', 'top','type','code_number'];


    protected function setPrimaryKey($key){
      $this->primaryKey = $key;
    }
    function getUserNameAttribute(){
      return $this->User->name;
    }
    function getRelatedAttribute(){
      return \App\Post::where('cat_id',$this->cat_id)->where('id','!=',$this->id)->get();
    }
    function getImageAttribute(){
      return image_check_thumps(\App\UpImage::where('post_id',$this->id)->where('type','posts')->pluck('img_name')->first(),'posts');
    }
    function getCommentsAttribute(){
      return $this->Cmnt;
    }
    function getCityNameAttribute(){
      return $this->Area ? $this->Area->name : 'مدينة محذوفة';
    }
    function getImagesAttribute(){
      $z = [];
      foreach(\App\UpImage::where('post_id',$this->id)->get() as $image){
      if($image->type == 'posts'){
        $z[] = image_check($image->img_name,'posts');
      }
    }
    return $z;
    }
    function getTimeAgoAttribute(){
      return $this->created_at->diffForHumans();
    }
    function getCityIdAttribute(){
      return $this->area_id;
    }
    public function Cat(){
        return $this->belongsTo('App\Cat','cat_id');
    }
    public function Brand(){
        return $this->belongsTo('App\Cat','brand');
    }
    public function Cmnt(){
        return $this->hasMany('App\Cmnt','post_id');
    }
    public function Imgs(){
        return $this->hasMany('App\UpImage','post_id')->where('type','posts');
    }
    public function Area(){
        return $this->belongsTo('App\Area','area_id');
    }
    public function User(){
    	return $this->belongsTo('App\User','user_id');
    }
    public function Users(){
        return $this->belongsToMany('App\User','post_user','post_id','user_id')->withTimestamps();
    }
    public function Brands(){
        $this->setPrimaryKey('brand');
        $relation =  $this->belongsToMany('App\User','brand_user','brand','user_id');
        $this->setPrimaryKey('id');
        return $relation;
    }
}
