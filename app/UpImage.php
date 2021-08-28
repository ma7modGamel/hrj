<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpImage extends Model
{
    protected $table = 'images';
    protected $fillable = ['post_id','img_name','type'];
    public $timestamps = true;

}
