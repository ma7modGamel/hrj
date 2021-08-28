<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
	protected $fillable = ['slug', 'name', 'value', 'type', 'orderBy'];

    public static function upSetImg($requestImg,$inputName = 'logo',$imgName = 'logo',$folerName ='logo'){
        $image = $requestImg;
        $destinationPath = public_path().'/upload/'.$folerName;
        $imageName = $imgName.'.'.$image->getClientOriginalExtension();
        $image->move($destinationPath,$imageName);
        $settigsupdate = siteSetting::where('name',$inputName)->get()[0];
        $settigsupdate->fill(['value' => $imageName])->save();

    }

}