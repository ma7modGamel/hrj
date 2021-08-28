<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{

    protected $table = 'cats';
    public $timestamps = true;
    protected $appends = ['models'];
    protected $fillable = ['parent_id','name','logo'];
    function getModelsAttribute(){
      $types = Cat::where('parent_id',$this->id)->get();
      return $types;
    }
    public function children() {
    return $this->hasMany(Cat::class, 'parent_id', 'id');
    }

    public function parent() {
    return $this->belongsTo(Cat::class, 'parent_id', 'id');
    }
}
