<?php
#================ Site Settings Function ========================================

function getSettings($set = 'SiteName'){
    return \App\SiteSetting::where('name',$set)->first()->value;
}
#================ get admins id =================================================

function getAdminId($type = 1){
    return \App\User::where('type',$type)->get();
}
#================ side bar class active =========================================

function setActive($array = null){
    $path = [$array];
    if(!empty($array)){
        if(in_array(Request::segments(),$path)){
            return "active";
        }
    }
}

function setActiveOne($path = null){
    if(!empty($path)){
        if(in_array($path,Request::segments())){
            return "active";
        }else{
            return "nothing";
        }
    }
}

# ======================== 966 format Number =====================

function format_number($number){

    if (strlen($number) == 10 && starts_with($number, '05')){
        return preg_replace('/^0/', '966', $number);
    }elseif (starts_with($number, '00')){
        return preg_replace('/^00/', '', $number);
    }elseif (starts_with($number, '+')){
        return preg_replace('/[+]/', '', $number);
    }
    
    return $number;
}

#================ Users Type =================================================

function usersType(){
    $type = ['0' => 'مدير','1' => 'عضو'];
    return $type;
}
#================ Contacts Type =================================================

function contactType(){
    $type = [
        '1' => 'رسائل الزوار والأعضاء',
        '2' => 'مخالفة الإعلانات',
        '3' => 'تطوير الموقع',
        '11' => ' دعم فني',
        '12' => 'استفسار ',
        '13' => ' شكوي',
    ];
    return $type;
}
#================ Ratings Type =================================================

function ratingType(){
    $type = [
        '1' => 'تقييم إيجابى',
        '0' => 'تقييم سلبى'
    ];
    return $type;
}
#================ TransferS =================================================

function transferDate (){
    $date = [
    '1' => 'تم التحويل اليوم',
    '2' => 'تم التحويل يوم أمس',
    '3' => 'تم التحويل قبل أمس',
    '4' => 'تم التحويل قبل 3 أيام',
    '5' => 'تم التحويل قبل أسبوع',
    '6' => 'تم التحويل قبل شهر',
    '7' => 'لم يتم التحويل',
    ];
    return $date;
}

function transferType(){
    $type = [
    '1' => 'تحويل عمولة',
    '2' => 'اشتراك معارض السيارات 6 شهور',
    '3' => 'اشتراك معارض السيارات سنه'
    ];
    return $type;
}
#================Parent Pages Name ==============================================

function parentPages(){
    $parent=['1' => 'صفحات رئيسية','2' => 'صفحات فرعيه'];
    return $parent;
}
#================Parent Deals Type ==============================================

function parentDeals(){
    $parent=['1' => 'توفير كتب',
    '2' => 'طباعه',
    '3' => 'أخرى',
    ];
    return $parent;
}
#=====================================================================

#================ Date and time  ================================================

function get_date($timestamp,$format = "Y/n/j"){
    return date($format, strtotime($timestamp));
}
function get_time($timestamp){
    return date("G:i", strtotime($timestamp));
}
#================ Images ========================================================

function accessImage($image,$path = '/upload',$folder = '/posts'){
    if($image != null){
        $images = url('/public'.$path.$folder).$image;
    }else{
        $images = Request::root().'/public/upload/logo/no_image.png';
    }
    return $images;
}

function image_upload($cntrl,$imageRequest,$post_id="",$path = '/upload',$folder = 'products',$thumps = false,$wMark = true){
    if(empty($cntrl['table'])){
        $cntrl['table'] ='posts';
    }
    if(!empty($imageRequest)){
        /*if(!empty($id)){
            $post_id = $id;
        }else{
            if(isset($cntrl->all()->max()->id)){
                $post_id = $cntrl->all()->max()->id + 1;
            }else{
                $post_id = 1;
            }
        }*/
        $imgnum = 1;
        $exten  = array('jpeg','bmp','png','jpg','jpe','gif','svg','svgz');
        $result = ['names' => [],'imgExt' => []]; 
        require('I18N/Arabic.php');
        $Arabic = new I18N_Arabic('Glyphs');
        foreach ($imageRequest as $image) {
            if(in_array_ci($image->extension(),$exten)){            
                $destinationPath = public_path().$path."/".$folder;
                if(in_array("settings",Request::segments())){
                    $imageName = 'waterMarkTest.png';
                }else{
                    $totalNum = time() + $imgnum;
                    $imageName = 'image_'.$post_id.'_'.$totalNum.'.'.$image->getClientOriginalExtension();
                    \App\UpImage::create([
                        'post_id' => $post_id,
                        'img_name' => $imageName,
                        'type' => $cntrl['table']
                        ]);
                }
                $image->move($destinationPath,$imageName);
                #======================== water mark ========================
                if($wMark == true){
                    if(getSettings('WM_active') == 1){
//dd('kmnk');
                        if(getSettings('WM_type') == 1){
                
                         $oldWMStr = public_path().'/upload/logo/waterMarkMake.png';
                            $newWMStr = public_path().'/upload/logo/'.getSettings('WM_img');
                            \Illuminate\Support\Facades\File::delete($oldWMStr);
                            \Illuminate\Support\Facades\File::copy($newWMStr,$oldWMStr);
                            
                            $wmImage = \Intervention\Image\Facades\Image::make(public_path('upload/logo/waterMarkMake.png'))
                            ->resize(getSettings('WM_imgWidth'), getSettings('WM_imgHeight'))
                            ->opacity(getSettings('WM_opacity'))
                            ->save();
                           

                            $wmImage = \Intervention\Image\Facades\Image::make(public_path('upload/logo/waterMark.PNG'))
                            ->resize(getSettings('WM_imgWidth'), getSettings('WM_imgHeight'))
                            ->opacity(getSettings('WM_opacity'))
                            ->save();    
                          //  dd('d');
//                            $wmImage = \Intervention\Image\Facades\Image::make(public_path('upload/logo/waterMarkMake.png'))
//                                ->resize(107, 40)
//                                ->opacity(getSettings('WM_opacity'))
//                                ->save();

                            \Intervention\Image\Facades\Image::make($destinationPath.'/'.$imageName)
                            ->insert($wmImage,getSettings('WM_position'), 10, 10)
                            ->save();
                            

                        }else{

                            $oldWMStr = public_path().'/upload/images/WMStr.png';
                            $newWMStr = public_path().'/upload/images/WM-copied.png';
                            \Illuminate\Support\Facades\File::delete($oldWMStr);
                            \Illuminate\Support\Facades\File::copy($newWMStr,$oldWMStr);

                            $opacity = getSettings('WM_opacity') / 100;

                            $text = getSettings('WM_str'); 
                            $text = $Arabic->utf8Glyphs($text); 

                            $draw = new ImagickDraw();
                            $draw->setFillColor(getSettings('WM_strColor'));
                            $draw->setFont(public_path().'/upload/fonts/DroidKufi-Regular.ttf');
                            $draw->setFontSize(getSettings('WM_strSize')); //use a large font-size
                            $draw->setStrokeColor(getSettings('WM_setStrokeColor'));
                            $draw->setStrokeWidth(1);
                            $draw->setStrokeAntialias(true);  //try with and without
                            $draw->setTextAntialias(true);  //try with and without
                            $draw->setFillOpacity($opacity);

                            $outputImage = new Imagick();
                            $outputImage->newImage(1400,1400, "transparent");  //transparent canvas
                            $outputImage->annotateImage($draw, 100, 100, getSettings('WM_strAngle'), $text);
                            $outputImage->trimImage(0); //Cut off transparent border
                            $outputImage->setsize(1000,1000); //Sets the size of the Gmagick object

                            \Intervention\Image\Facades\Image::make($destinationPath.'/'.$imageName)
                            ->insert($outputImage,getSettings('WM_position'),10, 10)
                            ->save();
                        }
                    }
                }
                #============================================================
                $result['names'][] =  $imageName;
                $imgnum++;
            }else{
                $result['imgExt'][] = $image->getClientOriginalName();
            }
        }
        if($thumps === true){
            foreach ($result['names'] as $name) {
                $thumpsPath = public_path().'/upload/'.$folder.'/thumps/thumps_'.$name;
                \Intervention\Image\Facades\Image::make($destinationPath.'/'.$name)->save($thumpsPath,100);
            }
        }
        return $result;
    }
}
function image_check($imageName,$folder = 'products'){
    $path = public_path().'/upload/'.$folder.'/'.$imageName;
    if($imageName == ''){
        return Request::root().'/public/upload/logo/no_image.png';
    }
    if(file_exists($path)){
        return Request::root().'/public/upload/'.$folder.'/'.$imageName;
    }else{
        return Request::root().'/public/upload/logo/no_image.png';
    }
}
function image_check_thumps($imageName,$folder = 'products'){
    $path = public_path().'/upload/'.$folder.'/thumps/thumps_'.$imageName;
    if($imageName == ''){
        return Request::root().'/public/upload/logo/no_image.png';
    }
    if(file_exists($path)){
        return Request::root().'/public/upload/'.$folder.'/thumps/thumps_'.$imageName;
    }else{
        return Request::root().'/public/upload/logo/no_image.png';
    }
}

#================ search at sql text to regx =====================================

function sql_text_to_regx($string){
    $alamat             = array("+","=","-","_",")","(","*","&","^","%","$","#","@","!","/","\\","|",">","<","?","؟");
    $alamat_change      = "";

    $alef               = array("ا","أ","آ","إ");
    $alef_change        = "@@@";
    $alef_last_change   = "(ا|أ|آ|إ)";

    $yeh                = array("ى","ي");
    $yeh_change         = "(ي|ى)";

    $teh                = array("ة","ه");
    $teh_change         = "(ة|ه)";

    $abd                = array("عبد {$alef_change}ل","عبد{$alef_change}ل");
    $abd_change         = "(عبدال|عبد ال)";

    $alfLam                = array("{$alef_change}ل{$alef_change}","{$alef_change}");
    $alfLam_change         = "(ا|أ|آ|إلا|أ|آ|إ|ا|أ|آ|إ)";

    $all_changes        = array($alamat,       $alef       ,$yeh       ,$teh       ,$abd       ,$alfLam       ,$alef_change       );
    $replaces           = array($alamat_change,$alef_change,$yeh_change,$teh_change,$abd_change,$alfLam_change,$alef_last_change  );

    $id = 0;
    foreach ($all_changes as $change) {     
        $string = str_replace($change,$replaces[$id],$string);
        $id++;    
    }
    return $string;
}
#============== search in array by case insensitive ==============================

function in_array_ci($needle, array $haystack, $strict = false) {
    foreach ($haystack as $element) {
        if (gettype($needle) == 'string' && gettype($element) == 'string') {
            if (!strcasecmp($needle, $element)) {
                return true;
            }
        }elseif ($strict) {
            if ($needle === $element) {
                return true;
            }
        }else {
            if ($needle == $element) {
                return true;
            }
        }
    }

    return false;
}


#====================== time to ar srting ==========================================

function timeToStr($timestamp, $num_times = 2) {

    $times = array(
        31536000 => 'سنة',
        2592000 => 'شهر',
        604800 => 'اسبوع',
        86400 => 'يوم',
        3600 => 'س',
        60 => 'د',
        1 => 'ث'
        );

    $now = time() - 3600;
    $timestamp -= 3600;
    $secs = $now - $timestamp;

// Fix so that something is always displayed
    if ($secs == 0) {
        $secs = 1;
    }

    $count = 0;
    $time = '';

    foreach ($times as $key => $value) {
        if ($secs >= $key) {
// time found
            $s = '';
            $time .= floor($secs / $key);

            if ((floor($secs / $key) != 1))
                $s = ' ';

            $time .= ' ' . $value . $s;
            $count ++;
            $secs = $secs % $key;

            if ($count > $num_times - 1 || $secs == 0)
                break;
            else
                $time .= ' ، ';
        }
    }
    $st =  $time;
    return $st;
}

#==================== models Year ====================

function modelYear(){
    $yearArr = [];
    for ($i= getSettings('modelYear'); $i <= date('Y'); $i++) { 
        $yearArr[] = $i;        
    }
    return $yearArr;
}
#====================== url Cut =========================

function get_decorated_diff($old, $new){
    $from_start = strspn($old ^ $new, "\0");        
    $from_end   = strspn(strrev($old) ^ strrev($new), "\0");

    $old_end    = strlen($old) - $from_end;
    $new_end    = strlen($new) - $from_end;

    $start      = substr($new, 0, $from_start);
    $end        = substr($new, $new_end);
    
    $new_diff   = substr($new, $from_start, $new_end - $from_start);  
    $old_diff   = substr($old, $from_start, $old_end - $from_start);

    return $old_diff; 
}

# ================ pusher function ==============================================
function pusherFun($chanel,$event,$data =""){
    $pusher = new \Pusher\Pusher(
        config('broadcasting.connections.pusher.key'),
        config('broadcasting.connections.pusher.secret'),
        config('broadcasting.connections.pusher.app_id'),
        config('broadcasting.connections.pusher.options')
    );
    return $pusher->trigger($chanel,$event,$data);
}

#================ Site Settings Function ========================================
function customTest(){
    echo $_SERVER['SCRIPT_FILENAME'];
}