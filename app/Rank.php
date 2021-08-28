<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'ranks';
    public $timestamps = true;
    protected $fillable = ['user_id', 'rank_title','type'];

    public function User(){
    	return $this->belongsTo('App\User','user_id');
    }
}
