<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model 
{

    protected $table = 'ratings';
    public $timestamps = true;
    protected $fillable = ['user_id', 'rate_id', 'type', 'content', 'post_id', 'buy_date', 'active'];

    public function User(){
    	return $this->belongsTo('App\User','user_id');
    }
    public function rateUser(){
    	return $this->belongsTo('App\User','rate_id');
    }

}