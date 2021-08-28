<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model 
{

    protected $table = 'banks';
    public $timestamps = true;
    protected $fillable = ['name', 'u_name', 'acc_num', 'iban'];

}