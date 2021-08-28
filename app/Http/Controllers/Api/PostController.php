<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

use App\Post;
use App\Cat;
use App\Area;
use App\Cmnt;
use App\Vim;
use Carbon\Carbon;

#========== Notifications =====================
use Notification;
use App\Notifications\newPostNotif;
use App\Notifications\newCmntNotif;
use App\User;
use App\Notifications\followPostnotf;
#==============================================

class PostController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index','show','viewAds','citySearch','tagsSearch']);
    // }
		function getFuckingPictures(){
			$pics = [
			['picture'=>url('public/website/logos/1.png'),'url'=>url('/json/searchads/ميتسوبيشي')],
			['picture'=>url('public/website/logos/2.png'),'url'=>url('/json/searchads/جي ام سي')],
			['picture'=>url('public/website/logos/3.png'),'url'=>url('/json/searchads/نيسان')],
			['picture'=>url('public/website/logos/4.png'),'url'=>url('/json/searchads/اودي')],
			// ['picture'=>url('public/website/logos/5.png'),'url'=>url('/json/searchads/')],
			['picture'=>url('public/website/logos/6.png'),'url'=>url('/json/searchads/مرسيدس')],
			// ['picture'=>url('public/website/logos/7.png'),'url'=>url('/json/searchads/')],
			['picture'=>url('public/website/logos/8.png'),'url'=>url('/json/searchads/بي ام دبليو')],
			['picture'=>url('public/website/logos/9.png'),'url'=>url('/json/searchads/تويوتا')],
			['picture'=>url('public/website/logos/10.png'),'url'=>url('/json/searchads/كاديلاك')],
			['picture'=>url('public/website/logos/11.png'),'url'=>url('/json/searchads/فلوكس واجن')],
			['picture'=>url('public/website/logos/12.png'),'url'=>url('/json/searchads/شيفروليه')],
			// ['picture'=>url('public/website/logos/13.png'),'url'=>url('/json/searchads/')],
			['picture'=>url('public/website/logos/14.png'),'url'=>url('/json/searchads/دودج')],
			['picture'=>url('public/website/logos/15.png'),'url'=>url('/json/searchads/انفينيتي')],
			['picture'=>url('public/website/logos/16.png'),'url'=>url('/json/searchads/فورد')],
			['picture'=>url('public/website/logos/17.png'),'url'=>url('/json/searchads/سوزوكي')],
			['picture'=>url('public/website/logos/18.png'),'url'=>url('/json/searchads/هوندا')],
			['picture'=>url('public/website/logos/19.png'),'url'=>url('/json/searchads/قطع غيار و ملحقات')],
			['picture'=>url('public/website/logos/20.png'),'url'=>url('/json/searchads/هونداي')],
			['picture'=>url('public/website/logos/21.png'),'url'=>url('/json/searchads/بورش')],
			['picture'=>url('public/website/logos/22.png'),'url'=>url('/json/searchads/جيب')],
			['picture'=>url('public/website/logos/23.png'),'url'=>url('/json/searchads/كريزلر')],
			['picture'=>url('public/website/logos/24.png'),'url'=>url('/json/searchads/كيا')],
			['picture'=>url('public/website/logos/25.png'),'url'=>url('/json/searchads/شاحنات و معدات ثقيلة')],
			['picture'=>url('public/website/logos/26.png'),'url'=>url('/json/searchads/لاند روفر')],
			['picture'=>url('public/website/logos/27.png'),'url'=>url('/json/searchads/دبابات')],
			['picture'=>url('public/website/logos/28.png'),'url'=>url('/json/searchads/لكزس')],
			['picture'=>url('public/website/logos/29.png'),'url'=>url('/json/searchads/تراثية')],
			['picture'=>url('public/website/logos/30.png'),'url'=>url('/json/searchads/مازدا')],
			['picture'=>url('public/website/logos/31.png'),'url'=>url('/json/searchads/مصدومه')],
			['picture'=>url('public/website/logos/32.png'),'url'=>url('/json/searchads/همر')],

		];
		return response()->json(['success'=>true,'data'=>$pics]);
		}
		function sections(){
			$makes = \App\Cat::where('parent_id',0)->get();
			$makes->makeHidden(['models']);
			return response()->json(['success'=>true,'sections'=>$makes]);
		}
		function aqarat(){
			$makes = \App\Cat::where('parent_id',2)->get();
			return response()->json(['success'=>true,'sections'=>$makes]);
		}
	public function index(){
		$posts = Post::all();
		return view('admin.posts.index',compact('posts'));
	}
	public function show($type){
		if($type == 'blocked'){
			$posts = Post::onlyTrashed()->get();
		}else{
			Session()->flash('error','طلبت رابط خاطئ');
			return back();
		}
		return view('admin.posts.index',compact('posts'));
	}
#=================================================================================
#================================== ads Report ===================================
    function report($adsId,$userId,Request $r){
        // if(isset($r->ad_Id)){
        //     return view('site.contact.adReport',['adId' => $r->ad_Id]);
        // }
        $type = 2;
				$user;
				if($userId){
					$user = \App\User::find($userId);
				}
				if(!$r->subject){
					$r->subject = 'إبلاغ عن إعلان مخالف رقم '.$adsId;
				}
        $contact = \App\Contact::create([
            'name'    => $user ? $user->name : 'report',
            'email'   => $user ? $user->email : 'report',
            'phone'   => $user ? $user->phone : 'report',
            'type'    => $type,
            'user_id' => $user ? $user->id : 0,
            'subject' => $r->subject,
            'body'    => $r->body
        ]);
        return response()->json(['success'=>true,'report'=>$contact]);
    }
#=================================================================================
#================================== ads upadte_at ================================
    function adsUpatedAt ($id){
        $post = Post::findOrFail($id);
        if($post->user_id != Auth()->user()->id){
            return \App::abort(401);
        }
        $now = Carbon::now();
        $befor = Carbon::now();
        if($befor->addDays(-getSettings('adsUpdatedAt')) > $post->updated_at){
            $post->setUpdatedAt($now->toDateTimeString());
            $post->save();
            return view('site.posts.updated_at',['done' => true,'post'=>$post]);
        }else{
            return view('site.posts.updated_at',['done' => false,'post'=>$post]);
        }
    }

#=================================================================================
#================================== ads images ===================================
    function adsImg (Request $r){

        $imgsPosts = \App\UpImage::select('post_id')->where('type','posts')->get()->toArray();
        $posts = Post::whereIn('id',$imgsPosts)->orderBy('id','desc')->paginate(30);


        #==================== Request Ajax ========================================

        if ($r->ajax()) {
            $view = view('site.posts.imgLoadMore',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }
        #==========================================================================

        return view('site.posts.imgs',compact('posts'));
    }

#=================================================================================
#================================== creat new post ===============================

    function addPostType(Request $r){
        #=============== check for max posts in day =====================
        $user = Auth()->user();
        $now = Carbon::now();
        $befor = Carbon::now()->addDays(-1);

        $countPost = Post::where('user_id',$user->id)->whereBetween('created_at', [$befor,$now])->count();
        $vim = Vim::where('user_id',$user->id)->where('type',1)->orWhere('type',2)->count();
        if($vim){
            if($countPost >= getSettings('maxPostInDayVim')){
                return redirect('/')->withFlashMessage('لقد وصلت للحد الأقصى للإعلانات المسموح بإضافتها يوميا');
            }
        }else{
            if($countPost >= getSettings('maxPostInDay')){
                return redirect('/')->withFlashMessage('لقد وصلت للحد الأقصى للإعلانات المسموح بإضافتها يوميا');
            }
        }
        #================================================================
        $areas = Area::all();
        $cats = Cat::all();
        if(isset($r->sec)){
            switch ($r->sec) {
                case '1':
                    return view('site.posts.add.addCar',compact('areas','cats'));
                case '2':
                    return view('site.posts.add.addAqar',compact('areas','cats'));
                case '3':
                    return view('site.posts.add.addUnClassified',compact('areas','cats'));
                case '4':
                    return view('site.posts.add.addOrder',compact('areas','cats'));
            }
            Session()->flash('error_flash_message','يرجى إختيار نوع الإعلان من القائمه');
            return redirect('add');
        }
        return view('site.posts.add.add');
    }
    #=================================================================================
    #================================== creat new cmnt ===============================
    function addCmnt($id,$userId,Request $r){
			$r->post_id = $id;
        $this->apiValidate($r, [
            'body'              => 'required',
        ],[
            'body.required'     => 'نص الإعلان مطولب',
        ]);
        $user = Auth()->user() ? Auth()->user() : \App\User::find($userId);
        $post = Post::findOrFail($r->post_id);
        $cmnt = Cmnt::create([
            'user_id' => $user->id,
            'post_id' => $r->post_id,
            'body' => $r->body,
            'active' => 1
        ]);
        $mail = false;

        #============================ notifications ========================================
            $postFollowers = $post->Users->where('id','!=',$user->id);
            Notification::send($postFollowers,new newCmntNotif($cmnt,$mail));
            if($post->user_id != $cmnt->user_id){
                Notification::send($post->User,new newCmntNotif($cmnt,$mail));
            }
            #============================ mail notifications ========================================
            $mailUsers = $post->Users->where('notf','1,0,0');
            if(count($mailUsers)){
                $mail = true;
                Notification::send($mailUsers,new newCmntNotif($cmnt,$mail));
            }
        #===================================================================================
        return response()->json(['success'=>true,'cmnt'=>$cmnt]);
    }
		function makes(){
			$makes = \App\Cat::where('parent_id',1)->get();
			return response()->json(['success'=>true,'makes'=>$makes]);
		}
		function typesByMakeId($makeId){
			$types = \App\Cat::where('parent_id',$makeId)->get();
			return response()->json(['success'=>true,'makes'=>$types]);

		}
    #=================================================================================
    #================================== Follow Post ===============================
		function unfollowPost($id,$user_id,Request $r){
			$post = Post::findOrFail($id);
			$user = \App\User::findOrFail($post->user_id);
			$follower = \App\User::findOrFail($user_id);
			$post->Users()->detach($follower->id);
			return response()->json(['success'=>true,'msg'=>'the ad is now not in your favorites']);
		}
		function followPost($id,$user_id,Request $r){
        $post = Post::findOrFail($id);
        $user = \App\User::findOrFail($post->user_id);
				$follower = \App\User::findOrFail($user_id);

				if($post->Users()->where('user_id',$user_id)->count()){
					$post = Post::findOrFail($id);
					$user = \App\User::findOrFail($post->user_id);
					$follower = \App\User::findOrFail($user_id);
					$post->Users()->detach($follower->id);
					return response()->json(['success'=>true,'fav'=>0]);

				} else {

            $post->Users()->attach($follower->id);
            Notification::send($user,new followPostnotf($post,$follower));
						return response()->json(['success'=>true,'fav'=>1]);
					}
        return response()->json(['success'=>false,'msg'=>'error']);
    }

	public function create(){
        if(Auth()->guest()){
            Session()->flash('error_flash_message','يجب عليك تسجيل الدخول أولا');
            return redirect('login');
        }
		$cats = Cat::all();
		$areas = Area::all();
		return view('admin.posts.add',compact('post','cats','areas'));
	}
	public function apiValidate($request,$rules,$langs = [])
	{
			$validate=\Validator::make($request->all(),$rules,$langs);
			if($validate->fails())
			{
					return  ($validate->messages());
			}
			return null;
	}
    public function store($user_id,Request $request,Post $post)
    {
        $user = User::find($user_id);
        $now = Carbon::now();
        $befor = Carbon::now()->addDays(-1);
        $countPost = $user->Post->where('created_at','>=',$befor)->where('created_at','<=',$now)->count();

        if($countPost > getSettings('maxPostInDay')){
            if($user->type != 0){
                return redirect('/')->withFlashMessage('لقد وصلت للحد الأقصى للإعلانات المسموح بإذافتها يوميا');
            }
        }

        // if($request->file('image')[0] == null){
        //     return redirect()->back()->withInput($request->all())->withErrors(['imageCount'=>'صور الإعلان مطلوبه']);
        // }
				if(!$request['mainCat']){
					$request['mainCat'] = 0;
				}
			  $errors = $this->apiValidate($request, [
            'mainCat'           => 'required',
            'cat_id'            => 'required',
            // 'brand'            	=> $request->mainCat == 1 ? 'required' : '',
            // 'model'            	=> $request->mainCat == 1 ? 'required' : '',
            'country'           => 'required',
            'area_id'           => 'required',
            'contact'           => 'required',
            'title'             => 'required',
            'body'              => 'required',
            'title'             => 'required|max:255',
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
				if(count($errors))
					return response()->json(['success'=>false,$errors]);


				if($request['aqar_type']){
					$request['cat_id'] = $request['aqar_type'];
				}
				if($request['section_id']){
					$request['cat_id'] = $request['section_id'];
				}
				if($request['year_id']){
					$request['model'] = $request['year_id'];
				}
				if(!$request['soum']){
					$request['soum'] = 1;
				}
        $post = Post::create([
            'user_id'       => $user->id,
            'cat_id'        => $request->cat_id,
            'brand'         => $request->brand ? $request->brand : 0,
            'model'         => $request->model ? $request->model : 0,
            'price'         => $request->price,
            'soum'          => $request->soum,
            'country'       => $request->country,
            'area_id'       => $request->area_id,
            'contact'       => $request->contact,
            'title'         => $request->title,
            'body'          => $request->body,
            'lat'           => $request->lat,
            'lng'           => $request->lng,
            'top'           => $request->top ? $request->top : 0,
        ]);

        #============================ upload images ========================================
        if($request->file('images')[0] != null){
            $image = image_upload($post,$request->file('images'),$post->id,'/upload','posts',true,true,90,90);
        }else{
            $image = ['names' => [],'imgExt' => []];
        }

        #============================ notifications ========================================
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


				if(count($image['imgExt']) > 0){
						return response()->json(['success'=>true,'ad'=>$post,'msg'=>'تمت إضافة الإعلان بنجاح ولكن لم يتم إضافه المف '.$image['imgExt'][0]]);
				}
				return response()->json(['success'=>true,'ad'=>$post,'msg'=>'تمت إضافة الإعلان بنجاح']);
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
        $post = Post::findOrFail($id);
        $post->timestamps = false;
        $user = Auth()->user();
        $this->apiValidate($request, [
            'mainCat'           => 'required',
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


        if($request->file('image')[0] != null){
            $image = image_upload($post,$request->file('image'),$id,'/upload','posts',true,true,90,90);
            $post->update([
                'image'             => implode(',',$image['names']),
                ]);
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
        $posts = Post::orderBy('updated_at','desc')->paginate(30);
        $num = 0;

        return response()->json(['success'=>true,'ads'=>$posts->toArray()]);
    }
    public function viewAd($id){
        $post = Post::findOrFail($id);
				$post->related = $post->related;
        return response()->json(['success'=>true,'ad'=>$post]);
    }

    public function citySearch($sreachWord,Request $request){
        $num = 0;
				if(is_numeric($sreachWord)){
					$sreachWord = \App\Area::where('id',$sreachWord)->first() ? \App\Area::where('id',$sreachWord)->first()->name : $sreachWord;
				}
        $posts = Post::whereHas('Area',function($query) use ($sreachWord){
                return $query->whereRaw('name REGEXP "'.sql_text_to_regx($sreachWord).'"');
        })->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);

        #=========================================================================
        #==================== Request Ajax =======================================
        // if ($request->ajax()) {
        //     $view = view('site.posts.loadMore',compact('posts','num'))->render();
        //     return response()->json(['html'=>$view]);
        // }
        #=========================================================================
        #==================== Request get ========================================
        return response()->json(['success'=>true,'ads'=>$posts->toArray()]);
    }
#==================== follow ads =================================================
    function follow (){
        return view('site.posts.follow');
    }
#=================================================================================
	function carSearch($make_id,$model_id,$year){
		$sreachWord = $make_id;
		if($model_id)
		$sreachWord = Cat::where('id',$model_id)->first()->name;
		else {
			$sreachWord = Cat::where('id',$make_id)->first()->name;

		}
		if($year)
		$sreachWord = $sreachWord.'_'.$year;
		// dd($sreachWord);
		return $this->tagsSearch($sreachWord,request());
	}
    public function tagsSearch($sreachWord,Request $request){
        $num = 0;
				// dd(is_numeric($sreachWord));

				if(is_numeric($sreachWord)){
					$bigCat = Cat::where('id',$sreachWord)->where('parent_id','!=',0)->first();
					if($bigCat){
						$sreachWord = $bigCat->name;
					}
				}
        if(is_numeric($sreachWord)){
            $catIds = Cat::select('id')->where('parent_id',$sreachWord)->get()->toArray();
            if(count($catIds)){
                $posts = Post::whereIn('cat_id',$catIds)->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);
            }else{
                $posts = Post::where('cat_id',$sreachWord)->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);
            }
        }else{
            #=============== title or body ===================================

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

            $total          = $postsWord->total() + $postsCat->total() + $postsArea->total() + $postsBrand->total() + $postsUser->total();
            $postMerge       = array_merge($postsWord->items(),$postsCat->items(),$postsArea->items(),$postsBrand->items(),$postsUser->items());

            $postCollection  = collect($postMerge)->sortByDesc('top')->sortByDesc('updated_at')->unique();

            $currentPage    = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();

            $count          = count($postCollection) == 0 ? 1 : count($postCollection);
						$posts = Post::whereIn('id',$postCollection->pluck('id')->toArray())->paginate(30);

            // $posts = new \Illuminate\Pagination\LengthAwarePaginator($postCollection,$total,30,$currentPage);
						// $posts = $posts->paginate(30);

        }
        if(count(explode('_',$sreachWord)) == 2){
            $model = explode('_',$sreachWord)[1];
            $sreachWord = explode('_',$sreachWord)[0];

            $posts = Post::Where('model',$model)
            ->whereHas('Brand',function($query) use ($sreachWord){
                    return $query->where('name','like','%'.$sreachWord.'%');
            })->orderBy('top','desc')->orderBy('updated_at','desc')->paginate(30);

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

        // if ($request->ajax()) {
        //     $postsCount = $posts->count();
        //     $view = view('site.posts.loadMore',compact('posts','num','loadMoreBtn'))->render();
        //     return response()->json(['html'=>$view,'postsCount'=>$postsCount]);
        // }
        #==========================================================================
        #==================== Request get =========================================
				// dd($posts);

				$z = ($posts);
				$x = $z->toArray();
        return response()->json(['success'=>true,'ads'=>$x]);
    }
    public function getCityName (){
        if(Request()->isMethod('get')){
            return view('test');
        }
        $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.Request()->lat.','.Request()->lng.'&sensor=false&language=ar');
        $output= json_decode($geocode);
        return $output->results[1]->address_components[1]->long_name;
    }

}
