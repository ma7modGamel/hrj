<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transfer extends Model
{
    use Notifiable;

    protected $table = 'transfers';
    protected $fillable = ['user_id', 'bank_id', 'post_id', 'type', 'amount', 'date', 'name', 'notes','done','active'];
        
    public $timestamps = true;

    public function User(){
        return $this->belongsTo('App\User','user_id');
    }
    public function Bank(){
        return $this->belongsTo('App\Bank','bank_id');
    }
    public function Post(){
        return $this->belongsTo('App\Post','post_id');
    }

}
