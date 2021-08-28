<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{

    protected $table = 'contacts';
    protected $fillable = ['name', 'email', 'phone', 'type', 'subject', 'body', 'active', 'user_id'];
    public $timestamps = true;

}