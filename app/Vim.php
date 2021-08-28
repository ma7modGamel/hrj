<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vim extends Model
{
    protected $table = 'vims';
    public $timestamps = true;
    protected $fillable = ['user_id', 'type', 'start_date', 'end_date'];

    public function User(){
    	return $this->belongsTo('App\User','user_id');
    }
}
