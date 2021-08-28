<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Term;
use App\Post;
use App\Cat;
use App\Area;
use App\Cmnt;
use App\Vim;
use Carbon\Carbon;
use App\UpImage;

#========== Notifications =====================
use Notification;
use App\Notifications\newPostNotif;
use App\Notifications\newCmntNotif;
use App\Notifications\followPostnotf;
#==============================================

class PostController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index','show','viewAds','citySearch','tagsSearch']);
    // }
    public function space()
    {
        return view('page');
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function show($type)
    {
        if ($type == 'blocked') {
            $posts = Post::onlyTrashed()->get();
        } else {
            Session()->flash('error', 'طلبت رابط خاطئ');
            return back();
        }
        return view('admin.posts.index', compact('posts'));
    }
#=================================================================================

  public function search(Request $request)
    {
          $search = $request->get('term');
      
          $result = Post::where('title', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
            
    } 
    
#================================== ads Report ===================================
    function report(Request $r)
    {
        if (isset($r->ad_Id)) {
            return view('site.contact.adReport', ['adId' => $r->ad_Id]);
        }
        \App\Contact::create([
            'name' => $r->name,
            'email' => $r->email,
            'phone' => $r->phone,
            'type' => $r->type,
            'user_id' => $r->user_id,
            'subject' => $r->subject,
            'body' => $r->body
        ]);
        return back()->withFlashMessage('تم الإببلاغ بنجاح');
    }
#=================================================================================
#================================== ads upadte_at ================================
    function adsUpatedAt($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id != Auth()->user()->id) {
            return \App::abort(401);
        }
        $now = Carbon::now();
        $befor = Carbon::now();
        if ($befor->addDays(-getSettings('adsUpdatedAt')) > $post->updated_at) {
            $post->setUpdatedAt($now->toDateTimeString());
            $post->save();
            return view('site.posts.updated_at', ['done' => true, 'post' => $post]);
        } else {
            return view('site.posts.updated_at', ['done' => false, 'post' => $post]);
        }
    }

#=================================================================================
#================================== ads images ===================================
    function adsImg(Request $r)
    {

        $imgsPosts = \App\UpImage::select('post_id')->where('type', 'posts')->get()->toArray();
        $posts = Post::whereIn('id', $imgsPosts)->orderBy('id', 'desc')->paginate(30);


        #==================== Request Ajax ========================================

        if ($r->ajax()) {
            $view = view('site.posts.imgLoadMore', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        #==========================================================================

        return view('site.posts.imgs', compact('posts'));
    }

#=================================================================================
#================================== creat new post ===============================

    function addPostType(Request $r)
    {
                    // $subcat = Cat::whereIn('parent_id',Cat::
                    //      where([['id','!=','1'],['parent_id',null]])->pluck('id')->toArray())->get();
                    //  $cates = Cat::with('children')->where([
                    //     ['id','!=','1'] , ['parent_id',null]
                    //     ])->get();
         $terms = Term::where('active',1)->get();
        #=============== check for max posts in day =====================
        $user = Auth()->user();
        $now = Carbon::now();
        $befor = Carbon::now()->addDays(-1);

        $countPost = Post::where('user_id', $user->id)->whereBetween('created_at', [$befor, $now])->count();
        $vim = Vim::where('user_id', $user->id)->where('type', 1)->orWhere('type', 2)->count();
        if ($vim) {
            if ($countPost >= getSettings('maxPostInDayVim')) {
                return redirect('/')->withFlashMessage('لقد وصلت للحد الأقصى للإعلانات المسموح بإضافتها يوميا');
            }
        } else {
            if ($countPost >= getSettings('maxPostInDay')) {
                return redirect('/')->withFlashMessage('لقد وصلت للحد الأقصى للإعلانات المسموح بإضافتها يوميا');
            }
        }
        
        #================================================================
        $areas = Area::all();
        $cats = Cat::all();
        $sec = 1 ;
        if (isset($sec)) {
			$sel = $r->cat;
            switch ($sec) {
                case '1':
                    return view('site.posts.add.addCar', compact('areas', 'cats', 'sel','terms'));
                case '2':
                    return view('site.posts.add.addAqar', compact('areas', 'cats', 'sel','terms'));
                case '3':
                    return view('site.posts.add.addUnClassified', compact('areas', 'cats', 'sel','terms'));
                case '4':
                    return view('site.posts.add.addOrder', compact('areas', 'cats', 'sel','terms'));
            }
                    return'';

            Session()->flash('error_flash_message', 'يرجى إختيار نوع الإعلان من القائمه');
            return redirect('add');
        }
        return view('site.posts.add.add');
    }
    #=================================================================================
    #================================== creat new cmnt ===============================
    function addCmnt(Request $r)
    {
        $this->validate($r, [
            'body' => 'required',
        ], [
            'body.required' => 'نص الإعلان مطولب',
        ]);
        $user = Auth()->user();
        $post = Post::findOrFail($r->post_id);
        $cmnt = Cmnt::create([
            'user_id' => $user->id,
            'post_id' => $r->post_id,
            'body' => $r->body,
            'active' => 1
        ]);
        $mail = false;

        #============================ notifications ========================================
        $postFollowers = $post->Users->where('id', '!=', $user->id);
        Notification::send($postFollowers, new newCmntNotif($cmnt, $mail));
        if ($post->user_id != $cmnt->user_id) {
            Notification::send($post->User, new newCmntNotif($cmnt, $mail));
        }
        #============================ mail notifications ========================================
        $mailUsers = $post->Users->where('notf', '1,0,0');
        if (count($mailUsers)) {
            $mail = true;
            Notification::send($mailUsers, new newCmntNotif($cmnt, $mail));
        }
        #===================================================================================
        return back()->withFlashMessage('تم إضافة التعليق بنجاح');
    }
    #=================================================================================
    #================================== Follow Post ===============================
    function followPost(Request $r)
    {
        $post = Post::findOrFail($r->post_id);
        $user = \App\User::findOrFail($post->user_id);
        if ($r->status == 1) {
            $post->Users()->attach(Auth()->user()->id);
            Notification::send($user, new followPostnotf($post, Auth()->user()));
            return 'attach';
        } else {
            $post->Users()->detach(Auth()->user()->id);
            return 'detach';
        }
        return 'error';
    }

    public function create()
    {
        if (Auth()->guest()) {
            Session()->flash('error_flash_message', 'يجب عليك تسجيل الدخول أولا');
            return redirect('login');
        }
        $posts = Post::all();
        $cats = Cat::all();
        $areas = Area::all();
        return view('admin.posts.add', compact('posts', 'cats', 'areas'));
    }

    public function store(Request $request, Post $post)
    {
        // return request()->all();

        $user = Auth()->user();
        $now = Carbon::now();
        $befor = Carbon::now()->addDays(-1);
        $countPost = $user->Post->where('created_at', '>=', $befor)->where('created_at', '<=', $now)->count();

        if ($countPost > getSettings('maxPostInDay')) {
            if ($user->type != 0) {
                Alert::error('خطأ','لقد وصلت للحد الأقصى للإعلانات المسموح بإذافتها يوميا');
                return redirect('/')->withFlashMessage('لقد وصلت للحد الأقصى للإعلانات المسموح بإذافتها يوميا');
            }
        }

        // if($request->file('image')[0] == null){
        //     return redirect()->back()->withInput($request->all())->withErrors(['imageCount'=>'صور الإعلان مطلوبه']);
        // }
//        $this->validate($request, [
//            'mainCat' => 'required',
//            'cat_id' => 'required',
//            'brand' => $request->mainCat == 1 ? 'required' : '',
//            'model' => $request->mainCat == 1 ? 'required' : '',
//            'country' => 'required',
//            'area_id' => 'required',
//            'contact' => 'required',
//            'title' => 'required',
//            'body' => 'required',
//            'title' => 'required|max:255',
//            'file_name' => 'required',
//            'uplode'    => 'required',
             //   'price' => 'required',
//        ], [
//            'mainCat.required' => 'القسم الرئيسى مطلوب',
//            'cat_id.required' => 'القسم الفرعى مطلوب',
//            'brand.required' => 'ماركة السياره مطلوبه',
//            'model.required' => 'موديل السياره مطلوبه',
//            'country.required' => 'الدولة مطلوبه',
//            'area_id.required' => 'المنطقه او المدينة مطلوبه',
//            'contact.required' => 'وسبلة الإتصال مطلوبه',
//            'title.required' => 'عنونا الإعلان مطلوب',
//            'body.required' => 'نص الإعلان مطولب',
//            'file_name.required' => 'اضف صورة او فيديو او مقطع صوتي',
//            'uplode.required'    => 'اضف النوع اذا كان صورة ام فيديو ',
        //   'price.required' => 'حدد السعر المطلوب',
//        ]);
        $parent_id = $request->cat_id ? Cat::find($request->cat_id)->parent_id : $request->mainCat;
        $post = Post::create([
            'user_id' => $user->id, 
            'parent_id' => $parent_id,
            'cat_id' => $request->cat_id ? $request->cat_id :  $request->mainCat,
            'brand' => $request->mainCat == 1 ? $request->brand : 0,
            'model' => $request->mainCat == 1 ? $request->model : 0,
            'price' => $request->price,
            'soum' => $request->soum,
            'country' => $request->country,
            'area_id' => $request->area_id,
            'contact' => $request->contact,
            'title' => $request->title,
            'body' => $request->body,
            'code_number' => rand(1,9).rand(2,7).rand(15,33).rand(32,66),
            'lat' => $request->lat,
            'lng' => $request->lng,
            'top' => $request->top ? $request->top : 0,
            'type' => $request->type,
//
        ]);


        #============================ upload images ========================================

       //  if($request->file('file_name')[0] != null){
       //     $image = image_upload($post,$request->file('file_name'),$post->id,'/upload','posts',true,true,90,90);

       // }else{
       //     $image = ['names' => [],'imgExt' => []];
       // }
       
       
        ini_set('max_execution_time', 999999999999999);
        ini_set('post_max_size', '300M');
        ini_set('upload_max_filesize', '300M');



        $imageCount = 1;
        $videoCount = 1;


            if($request->file('file_name')){

                foreach($request->file('file_name') as $image){
                


               if ($imageCount >  (int)\App\SiteSetting::where('name','max_upload_posts_images')->first()->value)
                {
                    session()->flash('error_flash_message', \App\SiteSetting::where('name','max_upload_posts_images_message')->first()->value  );
                    return redirect('/add');
                }

            
                $imageCount++;


                }
                
                   $file2=$request->file('file_name');
                   image_upload(['table'=>'posts'],$file2,$post->id,'/upload','posts');
            }
                
                
                
            if($request->file('videos_files')){

                foreach($request->file('videos_files') as $video){


                //////////////////////////////////////////////////////////// Max Videos Size   ///////////////////////////////////////////////////////////////////////

                    if ((int) number_format($video->getSize() / 1048576,2) >  (int)\App\SiteSetting::where('name','max_upload_size')->first()->value)
                    {
                        session()->flash('error_flash_message', 'لقد وصلت للحد الأقصى لحجم الفديو');
                        return redirect('/add');
                    }
                    
                //////////////////////////////////////////////////////////   Max Videos Number   /////////////////////////////////////////////////////////////////////////
                    if ($videoCount >  (int)\App\SiteSetting::where('name','max_upload_posts_videos')->first()->value)
                  {
                        session()->flash('error_flash_message', \App\SiteSetting::where('name','max_upload_posts_videos_message')->first()->value  );
                        return redirect('/add');
                  }
        

                    $destnation_path = public_path() . '/upload/posts/';
                    $extention = $video->getClientOriginalExtension();
                    $mime = $video->getMimeType();
                    $filename = 'video_'.rand(100,999) . '_' . time() . '.' . $extention;
                    $video->move($destnation_path, $filename);

                    $img11 = new UpImage();
                    $img11->post_id = $post->id;
                    $img11->img_name = $filename;
                    $img11->type = 'posts';
                    $img11->type_way = 'video';
                    
                    $img11->save();
                    $videoCount++;
    
}
                
            
            }



		
		  

            
    
    
//Alert::success('مبارك','تم اضافه الاعلان بنجاح');
       session()->flash('success', 'تم اضافه الاعلان بنجاح');
        if (\App\User::where('type','0')){
            return redirect('ads/'.$post->id.'/'.$post->title);
        }else{
            return redirect('add');
        }





//        #============================ notifications ========================================
        if($user->id != $post->user_id){

            $countFollows = \App\User::whereHas('Follows', function ($query) use ($user) {
                $query->where('user_follow',$user->id);
            })->get();

            Notification::send($countFollows,new newPostNotif($post));

            if($request->mainCat == 1){
                $brandFollows = \App\User::whereHas('Brands', function ($query) use ($user,$post) {
                    $query->where('brand',$post->brand);
                })->get();
                Notification::send($brandFollows,new newPostNotif($post));
            }

            #============================ mail notifications ========================================
            $mailUsers = $post->Users->where('notf','0,0,1');
            if(count($mailUsers)){
                $mail = true;
                Notification::send($mailUsers,new newPostNotif($cmnt,$mail));
            }
        }

        #===================================================================================

//        if(isset($request->admin)){
//            if(count($image['imgExt']) > 0){
//                return redirect('admincp/posts')->withFlashMessage('تمت إضافة الإعلان بنجاح ولكن لم يتم إضافه المف '.$image['imgExt'][0]);
//            }
//            return redirect('admincp/posts')->withFlashMessage('تمت إضافة الإعلان بنجاح');
//        }else{
//            if(count($image['imgExt']) > 0){
//                return redirect('ads/'.$post->id.'/'.$post->title);
//            }
//            return redirect('ads/'.$post->id.'/'.$post->title);
//        }

    }
#================================================================================
#==================== update post ===============================================

    #==================== update location =====================================
    function updateAdsLocation(Request $r){
        if(isset($r->ad_Id)){
            $post = Post::findOrFail($r->ad_Id);
            if($post->user_id != Auth()->user()->id){
                return \App::abort(401);
            }
            $cats = Cat::all();
            $areas = Area::all();
            return view('site.posts.updateLocation',compact('cats','areas','post'));
        }
        // dd($r->area_id);
        $post = Post::findOrFail($r->post_id);
        $post->timestamps = false;
        $post->update([
            'lat' => $r->lat,
            'lng' => $r->lng,
            'area_id' => $r->area_id

        ]);
        return redirect('ads/'.$post->id.'/'.$post->title);
    }
    #==========================================================================

	public function edit($id){
		$post = Post::findOrFail($id);
        if($post->user_id != Auth()->user()->id){
            if(Auth()->user()->type != 0){
                return \App::abort(401);
            }
        }
        $cats = Cat::all();
        $areas = Area::all();
        if(in_array('admincp',Request()->segments())){
          return view('admin.posts.edit',compact('post','cats','areas'));
        }else{
		  return view('site.posts.edit',compact('post','cats','areas'));
        }
	}

    public function update(Request $request, $id)
    {
        // return request()->all();
        $post = Post::findOrFail($id);
        $post->timestamps = false;
        $user = Auth()->user();
        $this->validate($request, [
            // 'mainCat'           => 'required',
            'cat_id'            => 'required',
            'brand'             => $request->mainCat == 1 ? 'required' : '',
            'model'             => $request->mainCat == 1 ? 'required' : '',
            'country'           => 'required',
            'area_id'           => 'required',
            'contact'           => 'required',
            'title'             => 'required',
            'body'              => 'required',
        ],[
            'mainCat.required'  => 'القسم الرئيسى مطلوب',
            'cat_id.required'   => 'القسم الفرعى مطلوب',
            'brand.required'    => 'ماركة السياره مطلوبه',
            'model.required'    => 'موديل السياره مطلوبه',
            'country.required'  => 'الدولة مطلوبه',
            'area_id.required'  => 'المنطقه او المدينة مطلوبه',
            'contact.required'  => 'وسبلة الإتصال مطلوبه',
            'title.required'    => 'عنونا الإعلان مطلوب',
            'body.required'     => 'نص الإعلان مطولب',
        ]);
       
        $count = !empty($request->file('image')); 
//echo dd($request->file('image')[0]);
        if($request->file('image')[0] != null){
            for ($i = 0; $i < count($request->file('image')); $i++) {
                //if ($request->hasFile('image')) {
                    $file = $request->file('image')[$i];

                    $destnation_path = public_path() . '/upload/posts/';
                    $extention = $file->getClientOriginalExtension();
                    $files = $file->getClientOriginalName();
                    $mime = $file->getMimeType();
                    $filename = $files . '_' . time() . '.' . $extention;
                    $file->move($destnation_path, $filename);
//                if ($mime == "video/x-flv" || $mime == "video/mp4" || $mime == "application/x-mpegURL" || $mime == "video/MP2T" || $mime == "video/3gpp" || $mime == "video/quicktime" || $mime == "video/x-msvideo" || $mime == "video/x-ms-wmv") {
                    $image = new UpImage();
                    $image->post_id = $post->id;
                    $image->img_name = $filename;
                    $image->type = 'posts';
                    if(!empty(request()->input('uplode'))){
                        $image->type_way = request()->input('uplode');
                    }
                    
                    $image->save();
//                }

               // }
               $image = ['names' => [],'imgExt' => []];
            }

        }else{
            $image = ['names' => [],'imgExt' => []];
        }
        $post->update([
            'cat_id'        => $request->cat_id,
            'brand'         => $request->mainCat == 1 ? $request->brand : 0,
            'model'         => $request->mainCat == 1 ? $request->model : 0,
            'price'         => $request->price,
            'soum'          => $request->soum,
            'country'       => $request->country,
            'area_id'       => $request->area_id,
            'contact'       => $request->contact,
            'title'         => $request->title,
            'body'          => $request->body,
            'top'           => $request->top ? $request->top : 0,
        ]);

        if(isset($request->admin)){
            if(count($image['imgExt']) > 0){
                return redirect('admincp/posts')->withFlashMessage('تم تعديل الإعلان بنجاح ولكن لم يتم إضافه المف '.$image['imgExt'][0]);
            }
            return redirect('admincp/posts')->withFlashMessage('تم تعديل الإعلان بنجاح');
        }else{         
            if(count($image['imgExt']) > 0){
                return redirect('ads/'.$post->id.'/'.$post->title);
            }
            return redirect('ads/'.$post->id.'/'.$post->title);
        }
    }
#========================================================================================
#===================== deldet Posts =====================================================

    public function destroy($id){
        $post = Post::find($id)->delete();

        if(in_array('admincp',Request()->segments())){
            if(Post::count()){
            	return "done";
            }else{
            	return "empty";
            }
        }else{
          return redirect('/');
        }

    }

    public function restoree($id){


        if(count(Post::onlyTrashed()->where('id',$id)->get()) < 1){
            session()->flash('error_flash_message','لم بتم العثور على الإعلان المراد إسترجاعه');
            return redirect()->back();
        }
        $post = Post::where('id',$id)->restore();
        return back()->withFlashMessage('تم إسترجاع الإعلان بنجاح');
    }

    public function force($id){
        if($post = Post::where('id',$id)){
            foreach (\App\UpImage::where('post_id',$id)->get() as $image) {
                $delImage = public_path().'/upload/posts/'.$image->img_name;
                \Illuminate\Support\Facades\File::delete($delImage);
                $image->delete();
                $delImage = public_path().'/upload/posts/thumps/thumps_'.$image->img_name;
                \Illuminate\Support\Facades\File::delete($delImage);
                $image->delete();
            }
            $post->forceDelete();
        }else{
            Session()->flash('error','لم يتم العثور على الإعلان المراد حذفه');
            return back();
        }

        return back()->withFlashMessage('تم حذف الإعلان بشكل نهائى');
    }

    public function viewAds(Request $request){

        
        
        if(request()->tags1 && !request()->tags2){
                return redirect('tags/'.request()->tags1);
        }
        if(request()->tags1 && request()->tags2){
                return redirect('tags/'.request()->tags2);
        }
        
        $posts = Post::orderBy('updated_at','desc')->paginate(30);
        $num = 0;
        if ($request->ajax()) {
            $view = view('site.posts.loadMore',compact('posts','num'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('welcome',compact('posts','num'));
    }
    public function viewAd($id){
        $post = Post::findOrFail($id);
        return view('site.posts.singleAd',compact('post'));
    }

    public function citySearch($sreachWord,Request $request){
        $num = 0;
        $posts = Post::whereHas('Area',function($query) use ($sreachWord){
                return $query->whereRaw('name REGEXP "'.sql_text_to_regx($sreachWord).'"');
        })->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);

        #=========================================================================
        #==================== Request Ajax =======================================
        if ($request->ajax()) {
            $view = view('site.posts.loadMore',compact('posts','num'))->render();
            return response()->json(['html'=>$view]);
        }
        #=========================================================================
        #==================== Request get ========================================
        return view('welcome',compact('posts','num'));
    }
#==================== follow ads =================================================
    function follow (){
        return view('site.posts.follow');
    }
#=================================================================================
    public function searchCode($code){
        
        
           $post = DB::table('posts')->where('code_number', $code)->get();


             return redirect('/ads/'.$post[0]->id);
        
    }
#=================================================================================
    public function tagsSearch($sreachWord,Request $request){
        //return dd($sreachWord);
        $num = 0;

        if($sreachWord=='all'){
           //return dd($sreachWord);
            $childIds = Cat::pluck('id')->toArray();
            /*
            if(count($catIds)){
                $posts = Post::whereIn('cat_id',$catIds)->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);
            }else{
                $posts = Post::where('cat_id',$sreachWord)->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);
            }
            */
            $posts = Post::orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);
        }elseif(is_numeric($sreachWord)){
           //return dd($sreachWord);
            $childIds = Cat::where('parent_id', $sreachWord)->pluck('id')->toArray();
            /*
            if(count($catIds)){
                $posts = Post::whereIn('cat_id',$catIds)->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);
            }else{
                $posts = Post::where('cat_id',$sreachWord)->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);
            }
            */
            $posts = Post::whereIn('cat_id', array_merge([$sreachWord], $childIds))->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);
        }else{
            #=============== title or body ===================================
           // return dd($sreachWord);
            $postsWord = Post::whereRaw('body REGEXP "'.sql_text_to_regx($sreachWord).'"')->orWhereRaw('title REGEXP "'.sql_text_to_regx($sreachWord).'"')->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);

            #=============== cats ============================================
            $postsCat = Post::whereHas('Cat',function($query) use ($sreachWord){
                    return $query->whereRaw('name REGEXP "'.sql_text_to_regx($sreachWord).'"');
            })->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);


            #=============== Brand ============================================
            $postsBrand = Post::whereHas('Brand',function($query) use ($sreachWord){
                    return $query->whereRaw('name REGEXP "'.sql_text_to_regx($sreachWord).'"');
            })->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);

            #=============== Area =============================================
            $postsArea = Post::whereHas('Area',function($query) use ($sreachWord){
                    return $query->whereRaw('name REGEXP "'.sql_text_to_regx($sreachWord).'"');
            })->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);

            #=============== userName =============================================
            $postsUser = Post::whereHas('User',function($query) use ($sreachWord){
                    return $query->whereRaw('name REGEXP "'.sql_text_to_regx($sreachWord).'"');
            })->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);


            #=============== Merge Collections =================================

            $total      = $postsWord->total() + $postsCat->total() + $postsArea->total() + $postsBrand->total() + $postsUser->total();

            $postMerge       = array_merge($postsWord->items(),$postsCat->items(),$postsArea->items(),$postsBrand->items(),$postsUser->items());

            $postCollection  = collect($postMerge)->sortByDesc('top')->sortByDesc('updated_at')->unique();

            $currentPage    = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();

            $count          = count($postCollection) == 0 ? 1 : count($postCollection);

            $posts = new \Illuminate\Pagination\LengthAwarePaginator($postCollection,$total,30,$currentPage);
        }
        if(count(explode('_',$sreachWord)) == 2){

            $model = explode('_',$sreachWord)[1];


            $sreachWord = explode('_',$sreachWord)[0];



            $posts = Post::Where('model',$model)
            ->whereHas('Cat',function($query) use ($sreachWord){
                    return $query->where('name','like','%'.$sreachWord.'%');
            })->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);
             //return dd($posts);



        }
        if(count(explode(',',$sreachWord)) == 2){
            $area = explode(',',$sreachWord)[1];
            $sreachWord = explode(',',$sreachWord)[0];
            $posts = Post::whereHas('Area',function($query) use ($area){
                return $query->whereRaw('name REGEXP "'.sql_text_to_regx($area).'"');
            })
            ->WhereHas('Cat',function($query) use ($sreachWord){
                return $query->where('name','like','%'.$sreachWord.'%');
            })->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);
            // dd($posts);
            if(!count($posts)){
                $posts = Post::whereHas('Area',function($query) use ($area){
                    return $query->whereRaw('name REGEXP "'.sql_text_to_regx($area).'"');
                })
                ->whereHas('Brand',function($query) use ($sreachWord){
                        return $query->where('name','like','%'.$sreachWord.'%');
                })->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);

            }
            if(is_numeric($sreachWord)){
                $catIds = Cat::select('id')->where('parent_id',$sreachWord)->get()->toArray();
                $posts = Post::whereIn('cat_id',$catIds)->orderBy('updated_at','desc')
                ->whereHas('Area',function($query) use ($area){
                    return $query->whereRaw('name REGEXP "'.sql_text_to_regx($area).'"');
                })->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);
            }
        }
        if(count($posts) >= 30){
            $loadMoreBtn = true;
        }else{
            $loadMoreBtn = false;
        }
        #==========================================================================
        #==================== Request Ajax ========================================

        if ($request->ajax()) {
            //return dd('test');
            $postsCount = $posts->count();
            $view = view('site.posts.loadMore',compact('posts','num','loadMoreBtn'))->render();
            return response()->json(['html'=>$view,'postsCount'=>$postsCount ]);
        }
        #==========================================================================
        #==================== Request get =========================================


        return view('welcome',compact('posts','num','loadMoreBtn'));
    }
    public function getCityName (){
        if(Request()->isMethod('get')){
            return view('test');
        }
        $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.Request()->lat.','.Request()->lng.'&sensor=false&language=ar');
        $output= json_decode($geocode);
        return $output->results[1]->address_components[1]->long_name;
    }

    public function news($word){
        if ($word == 'الكل') {
        $posts = \App\Post::orderBy('id','desc')->get();
        }else{
            $posts = \App\Post::where('type',$word)->get();
        }
        return view('welcome',compact('posts'));
    }
	
    public function getchild(Request $request)
	{
        $result = \App\Area::where('parent_id',$request->id)->get();

        if (!count($result)){
            return response()->json(['status'=>false,'msg'=>'يجب اختيار البلد المطلوب ']);
        }else{
            return response()->json(['status'=>true,'result'=>$result]);
        }
    }
	
    public function getsoum(Request $request)
	{
		$id = $request->id;
		$num = 0;
		$sub1 = \App\Area::where('parent_id', $id)->pluck('id')->toArray();
		$sub2 = \App\Area::whereIn('parent_id', $sub1)->pluck('id')->toArray();


		$posts = Post::where('area_id',  $id)->orderBy('id','DESC')->paginate(5);
		$postsCount = $posts->count();

        $view = view('site.posts.loadMore', compact('posts','num','loadMoreBtn'))->render();
        return response()->json(['html'=>$view,'postsCount'=>$postsCount,'id'=>$id]);
    }
    
    //     public function viewTerms(){
    //     $terms = Term::where('active','1')->get();
    //     return view('site.posts.addPostNotes',compact('terms'));
    // }

    public function getCountry(Request $request)
    {
        $posts = \App\Post::where('area_id', $request->id)->orderBy('id','DESC')->get();

        $result = view('site.posts.folder_content', ['posts' => $posts])->render();
        return response()->json($result);
    }



    public function getLatestPosts(Request $request)
    {
        $posts = \App\Post::orderBy('id' , 'desc')->get();
        $result = view('site.posts.folder_content', ['posts' => $posts])->render();
        return response()->json($result);
    }
    public function getOldPosts(Request $request)
    {
        $posts = \App\Post::orderBy('id' , 'asc')->get();
        $result = view('site.posts.folder_content', ['posts' => $posts])->render();
        return response()->json($result);
    }
    
    // ajax functions 
    
    
    public function getSubCat(Request $request)
    {
        $subCats = Cat::where('parent_id' , $request->selectedCat)->get();
        return response()->json($subCats);
    }
    
    public function rightMenuSearch(Request $request)
    {
       
        if($request->city != null && $request->city != '#' )
        {
            if($request->subCat == 'all' && $request->city == 'all')
            {
                $catIds = Cat::select('id')->where('parent_id', $request->selectedCat)->get()->toArray();
                if(count($catIds)) {
                    	$posts = Post::whereIn('cat_id', $catIds)->orderBy('updated_at', 'desc')->paginate(30);
                }
                else {
        				$posts = Post::where('cat_id', $request->selectedCat)->orderBy('updated_at', 'desc')->paginate(30);
        			}
                
                $result = view('site.posts.folder_content', ['posts' => $posts])->render();
                return response()->json($result);
            }
            else if($request->subCat == 'all' && $request->city != 'all')
            {
                $posts = Post::where([ 
                ['cat_id' , $request->selectedCat],
                ['area_id' , $request->city],
                ])->paginate(30);
                $result = view('site.posts.folder_content', ['posts' => $posts])->render();
                return response()->json($result);
            }
            else if($request->subCat != 'all' && $request->city == 'all')
            {
                $posts = Post::where([ 
                ['cat_id' , $request->subCat],
                ])->paginate(30);
                $result = view('site.posts.folder_content', ['posts' => $posts])->render();
                return response()->json($result);
            }
            else if($request->subCat != 'all' && $request->city != 'all')
            {
                $posts = Post::where([ 
                ['cat_id' , $request->subCat],
                ['area_id' , $request->city]
                ])->paginate(30);
                $result = view('site.posts.folder_content', ['posts' => $posts])->render();
                return response()->json($result);
            }
        }
        
        else if($request->year != '#' && $request->year != null)
        {
            if($request->subCat == 'all' && $request->year == 'all')
            {
                $catIds = Cat::select('id')->where('parent_id', $request->selectedCat)->get()->toArray();
                if(count($catIds)) {
                    	$posts = Post::whereIn('cat_id', $catIds)->orderBy('updated_at', 'desc')->paginate(30);
                }
                else {
        				$posts = Post::where('cat_id', $request->selectedCat)->orderBy('updated_at', 'desc')->paginate(30);
        			}
                
                $result = view('site.posts.folder_content', ['posts' => $posts])->render();
                return response()->json($result);
            }
            
            else if($request->subCat == 'all' && $request->year != 'all')
            {
                $catIds = Cat::select('id')->where('parent_id', $request->selectedCat)->get()->toArray();
                if(count($catIds)) {
                    	$posts = Post::whereIn('cat_id', $catIds)->where('model' , $request->year)->orderBy('updated_at', 'desc')->paginate(30);
                }
                else {
        				$posts = Post::where([['cat_id', $request->selectedCat] , ['model' , $request->year]])->orderBy('updated_at', 'desc')->paginate(30);
        			}
               
                $result = view('site.posts.folder_content', ['posts' => $posts])->render();
                return response()->json($result);
            }
            else if($request->subCat != 'all' && $request->year == 'all')
            {
                $posts = Post::where([ 
                ['model' , $request->subCat],
                ])->paginate(30);
                $result = view('site.posts.folder_content', ['posts' => $posts])->render();
                return response()->json($result);
            }
            else if($request->subCat != 'all' && $request->year != 'all')
            {
                $posts = Post::where([ 
                ['cat_id' , $request->subCat],
                ['model' , $request->year]
                ])->paginate(30);
                $result = view('site.posts.folder_content', ['posts' => $posts])->render();
                return response()->json($result);
            }
        }
    }
}


////////////////////////////////////////////////// Spam ///////////////////////////////////////////////

     
            //     $destnation_path = public_path() . '/upload/posts/';
            //     $extention = $image->getClientOriginalExtension();
            //     $mime = $image->getMimeType();
            //     $filename = 'image_'.rand(100,999) . '_' . time() . '.' . $extention;
            //     $image->move($destnation_path, $filename);

            //   $waterMarkUrl = \Intervention\Image\Facades\Image::make(public_path().'/upload/logo/waterMarkMake.png')->opacity(70);
            //   $image = \Intervention\Image\Facades\Image::make($destnation_path.'/'.$filename);
            //   /* insert watermark at bottom-left corner with 5px offset */
            //   $image->insert($waterMarkUrl, 'bottom-right', 30, 30);
            //   $image->save($destnation_path.'/'.$filename);
           
           
            //     $img11 = new UpImage();
            //     $img11->post_id = $post->id;
            //     $img11->img_name = $filename;
            //     $img11->type = 'posts';
            //     $img11->type_way = 'image';
                
            //     $img11->save();
            
