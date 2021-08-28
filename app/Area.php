<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model 
{

    protected $table = 'areas';
    public $timestamps = true;
    protected $fillable = ['parent_id','name'];
	
	public function sub()
	{
		return $this->hasMany('App\Area', 'parent_id', 'id');
	}
}