<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model 
{

    protected $table = 'terms';
    public $timestamps = true;
    protected $fillable = ['title','content','active'];

}