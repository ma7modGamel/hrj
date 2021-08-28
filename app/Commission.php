<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model 
{

    protected $table = 'commissions';
    public $timestamps = true;
    protected $fillable = ['category_id', 'commission'];



    public function cat(){
        return $this->belongsTo('App\Cat','category_id');
    }
    
    
}