<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UpImage;
use Illuminate\Support\Facades\File;

class ImagesController extends Controller
{
    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function destroy ($id){
    	$image= UpImage::findOrFail($id);
        $delImage = public_path().'/upload/posts/'.$image->img_name;
        File::delete($delImage);
        $image->delete();
    	return 'done';
    }	
}
