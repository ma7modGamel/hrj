<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Post;
use App\Cmnt;
use App\Contact;
use App\Vim;
use App\Rank;
use App\Transfer;

use Carbon\Carbon;

use Mail;
use Hash;

use Notification;
use App\Notifications\followUserNotf;
use Illuminate\Support\Facades\Auth;

use abdullahobaid\mobilywslaraval\Mobily;

class UserController extends Controller
{
    public function index(){
        $users = User::where('type','!=',0)->where('forbidden',0)->get();
        return view('admin.users.index',compact('users'));
    }
#=================================================================================
#================================== very important member ========================
    public function vim($type){
        return view('admin.users.vimShow',compact('type'));
    }

    public function addVim(Request $r){
        $countVim = Vim::where('user_id',$r->user_id)->count();
        if($countVim){
            return 'same';
        }
        Vim::create([
            'user_id'       => $r->user_id,
            'type'          => $r->type,
            'start_date'    => $r->from,
            'end_date'      => $r->to,
        ]);
        return 'done';
    }

    public function vimEdit($id){
        $vim = Vim::findOrFail($id);
        return view('admin.users.vimEdit',compact('vim'));
    }

    public function vimUpdate(Request $r){
        $vim = Vim::findOrFail($r->vim_id);
        $vim->update([
            'type'          => $r->type,
            'start_date'    => $r->from,
            'end_date'      => $r->to,
        ]);
        return 'done';
    }

    public function vimDel($id){
        $vim = Vim::findOrFail($id);
        $vim->delete();
        return 'done';
    }
#=================================================================================
#================================== very important member ========================
    public function addRank(Request $r){
        Rank::create([
            'user_id'       => $r->user_id,
            'type'          => $r->rank_type,
            'rank_title'    => $r->rank_title,
        ]);
        return 'done';
    }

    public function delRank($id,Request $r){
        $rank = Rank::findOrFail($id);
        $rank->delete();
        return 'done';
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
#=================================================================================
#================================== show functions ===============================
  	public function show($type){
  		if($type == 'admins'){
    		$users = User::where('type',0)->get();
  		}elseif($type == 'forbidden'){
            $users = User::where('forbidden',1)->get();
        }elseif($type == 'blocked'){
            $users = User::onlyTrashed()->get();
        }else{
  			Session()->flash('error_flash_message','طلبت رابط خاطئ');
  			return back();
  		}
    	return view('admin.users.index',compact('users'));
  	}
#=================================================================================
#================================== creat new user ===============================

    public function store(Request $request){
        $this->apiValidate($request, [
            'username' => 'required|max:100|unique:users',
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'phone'    => 'required|unique:users',
            'type'     => 'required',
            'password' => 'required|min:6|confirmed',
            'men' 	   => 'required',
        ],[
            'username.required' => 'اسم المستخدم مطلوب',
            'username.unique'   => 'اسم المستخدم موجود مسبقا',
            'name.required'     => 'اسم بالكامل مطلوب',
            'email.required'    => 'البريد الاكترونى مطلوب',
            'email.unique'      => 'البريد الاكترونى موجود مسبقا',
            'phone.required'    => 'رقم الهاتف مطلوب',
            'phone.unique'      => 'رقم الهاتف موجود مسبقا',
            'type.required' => 'صلاحية المستخدم مطلوبه',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.confirmed'=> 'كلمتى المرور غير متطابقتين ',
            'password.min'=> 'كلمتى المرور يجب أن تكون أكثر من 6 خانات ',
        ]);

        $NewUser = User::create([
            'username'  => $request->username,
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'rank'      => $request->rank,
            'men'       => $request->men,
            'type'      => $request->type,
            'active'    => $request->active,
            'password'  => bcrypt($request->password),

        ]);
        if($request->image){
            $image = User::userImg($request->image,$NewUser->id);
            $NewUser->update(['image'=>$image]);
        }
        return back()->withFlashMessage('تمت اإضافة العضو بنجاح');
    }
#================================================================================
#==================== return edit user view =====================================

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }
#================================================================================
#==================== update user info ==========================================

    public function update($id,Request $request){
        $userupdate = User::findOrFail($id);
        $userupdate->timestamps = false;
        $this->apiValidate($request, [
            'username' => 'required|max:100|unique:users,username,' . $userupdate->id,
            'name'     => 'required|max:255',
            'email'    => 'required|max:255|unique:users,email,' . $userupdate->id,
            'phone'    => 'required|unique:users,phone,' . $userupdate->id,
            'password' => $request->password ? 'min:6|confirmed' : '',
        ],[
            'username.required' => 'اسم المستخدم مطلوب',
            'username.unique'   => 'اسم المستخدم موجود مسبقا',
            'name.required'     => 'اسم بالكامل مطلوب',
            'email.unique'      => 'البريد الاكترونى موجود مسبقا',
            'phone.unique'      => 'رقم الهاتف موجود مسبقا',
            'password.min'      => 'يجب ألا تقل كلمة المرور عن 6 خانات',
            'password.confirmed'=> 'كلمتى المرور غير متطابقتين',
        ]);
        if($request->image){
            $image = User::userImg($request->image,$id);
            $userupdate->update(['image' => $image]);
        }else{
            $image = 'no_image.png';
        }
        if($request->phone){
            $userupdate->update(['phone' => $request->phone]);
        }
        if ($request->curPassword && !$request->password) {
            $request_act = $request->all();
            $userupdate->fill(array_except($request_act,['password','image','type']))->save();
            session()->flash('error_flash_message','لم يتم تعديل كلمة المرور القديمه');
            return back();
        }
        if(!$request->password){
            if(isset($request->admin)){
                $request_act = $request->all();
                $userupdate->fill(array_except($request_act,['password','image']))->save();
            }else{
                $request_act = $request->all();
                $userupdate->fill(array_except($request_act,['password','image','type']))->save();
            }
            return redirect()->back()->withFlashMessage('تم تعديل بيانات العضو بنجاح');
        }else{
            if(isset($request->admin)){
                $request_act = $request->all();
                $password = bcrypt($request->password);
                $userupdate->fill(['password' => $password])->save();
                $userupdate->fill(array_except($request_act,['password','image']))->save();
            }else{
                if (Hash::check($request->curPassword, $userupdate->password)) {
                    $request_act = $request->all();
                    $password = bcrypt($request->password);
                    $userupdate->fill(['password' => $password])->save();
                    $userupdate->fill(array_except($request_act,['password','image','type']))->save();
                }else{
                    session()->flash('error_flash_message','كلمة المرور القديمة غير صحيحه');
                    return back();
                }
            }
        }

        return redirect()->back()->withFlashMessage('تم تعديل البيانات بنجاح');
    }
#========================================================================================
#===================== deldet users =====================================================

    public function destroy($id){
        if(count(User::all()) < 2){
            session()->flash('error_flash_message','لا يمكنك حذف العضو .. و يرجى عدم التعامل مع الروابط حتى لا يحدث أخطاء نحن فى غنى عنها');
            return redirect()->back();
        }
        if(count(User::find($id)) < 1){
            session()->flash('error_flash_message','لم بتم العثور على العضو المراد حذفه');
            return redirect()->back();
        }
        if(Auth()->user()){
        	if(Auth()->user()->id == $id){
        	    session()->flash('error_flash_message','عذرا لا يمكنك حذف الحساب الخاص بك');
        	    return back();
        	}
        }

        Post::where('user_id',$id)->update(['del_user'=>$id,'user_id'=>0]);
        Cmnt::where('user_id',$id)->update(['del_user'=>$id,'user_id'=>0]);

        $user = User::find($id)->delete();
        if(User::where('type','!=',0)->count()){
        	return "done";
        }else{
        	return "empty";
        }
    }

    public function restoree($id){

        if(count(User::onlyTrashed()->where('id',$id)->get()) < 1){
            session()->flash('error_flash_message','لم بتم العثور على العضو المراد إسترجاعه');
            return redirect()->back();
        }

        Post::where('user_id',0)->where('del_user',$id)->update(['del_user'=>0,'user_id'=>$id]);
        Cmnt::where('user_id',0)->where('del_user',$id)->update(['del_user'=>0,'user_id'=>$id]);

        $user = User::where('id',$id)->restore();
        return back()->withFlashMessage('تم إسترجاع العضو بنجاح');
    }

    public function force($id){
    	if(Auth()->user()){
	        if(Auth()->user()->id == $id){
	            session()->flash('error_flash_message','عذرا لا يمكنك حذف الحساب الخاص بك');
	            return back();
	        }
	    }
        Post::where('user_id',$id)->orWhere('del_user',$id)->delete();
        Cmnt::where('user_id',$id)->orWhere('del_user',$id)->delete();
        Contact::where('user_id',$id)->delete();

        if($user = User::where('id',$id)){
            $user->forceDelete();
        }else{
            Session()->flash('error_flash_message','لم يتم العثور على العضو المراد حذفه');
            return back();
        }

        return back()->withFlashMessage('تم حذف العضو وجميع بياناته بشكل نهائى');
    }
    function forbidden ($id){
        $user = User::findOrFail($id);
        if($user->forbidden == 0){
            $user->update(['forbidden' => 1]);
            return 'forbidden';
        }else{
            $user->update(['forbidden' => 0]);
            return 'done';
        }
            return 'error';
    }
    function allCities(){
      $cities = \App\Area::where('parent_id','!=',0)->get();
      return response()->json(['success'=>true,'cities'=>$cities]);
    }
    function allCountry(){
      $cities = \App\Area::where('parent_id','=',0)->get();
      return response()->json(['success'=>true,'countries'=>$cities]);
    }
    function soum(){
      return response()->json(['success'=>true,'soum'=>soum()]);
    }
#=================================================================================
#================================== auth Complete ================================

    public function authCompleteView ($link){

        $phone = substr($link, 0,12);
        $activeCode = substr($link, -6);
        $user = User::where('phone',$phone)->where('active',$activeCode)->first();
        if($user){
            if($user->active != 1){
                $user = $user->id;
                return view('auth.complete',compact('phone','activeCode','user'));
            }
        }
        Session()->flash('error_flash_message','لقد اتبعت رابط خاطئ');
        return redirect('/');
    }

    public function authComplete (Request $r){
        $user = User::findOrFail($r->user_id);

        $this->apiValidate($r, [
            'username' => 'required|max:100|unique:users',
            'name'     => 'required|max:255',
            'email'    => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ],[
            'username.required' => 'اسم المستخدم مطلوب',
            'username.unique'   => 'اسم المستخدم موجود مسبقا',
            'name.required'     => 'اسم بالكامل مطلوب',
            'email.required'    => 'البريد الاكترونى مطلوب',
            'email.unique'      => 'البريد الاكترونى موجود مسبقا',
            'password.required' => 'الرقم السرى مطلوب',
            'password.min'      => 'يجب ألا يقل الرقم السرى عن 6 خانات',
            'password.confirmed'=> 'الرقمين غير متطابقين',
        ]);
        $user->update([
            'username' => $r->username,
            'name' => $r->name,
            'email' => $r->email,
            'password' => bcrypt($r->password),
            'active' => 1,
            'auth_complete' => 1,
        ]);
        Auth::login($user, true);
        return redirect('/');
    }

#=================================================================================
#================================== User Page ====================================
    public function userView($id,Request $request){
        $user = User::findOrFail($id);
        $posts = Post::where('user_id',$user->id)->orderBy('updated_at','desc')->paginate(20);

        return response()->json(['user'=>$user]);
    }
    #=================================================================================
    #================================== User Posts ====================================
    public function userPosts($id,Request $request){
        $user = User::findOrFail($id);
        $posts = Post::where('user_id',$id)->orderBy('updated_at','desc')->paginate(20);

        return response()->json(['posts'=>$posts]);
    }
#=================================================================================
#================================== Follow User ==================================
    public function followUser(Request $r){
        $user = Auth()->user();
        $userF = User::findOrFail($r->user_id);
        if($r->status == 1){
            $user->Follows()->attach($userF->id);
            Notification::send($userF,new followUserNotf($userF,Auth()->user()));
            return response()->json(['success'=>true,'msg'=>'followed']);
        }else{
            $user->Follows()->detach($userF->id);
            return response()->json(['success'=>true,'msg'=>'unfollowed']);
        }
        return response()->json(['success'=>false,'msg'=>'error']);
    }
    public function unfollowUser(Request $r){

        $user = Auth()->user();
        if(count($r->ids)){
            $user->Follows()->detach($r->ids);
             return response()->json(['success'=>true,'msg'=>'unfollowed users']);;
        }
        return  response()->json(['success'=>false,'msg'=>'no input']);;

    }


#=================================================================================
#================================== follow Brand =================================

    public function followBrand(Request $r){

        $user = Auth()->user();
        if($user->Brands()->where('brand',$r->brand)->count()){
            return response()->json(['success'=>false,'msg'=>'you are already following brand']);;
        }

        $user->Brands()->attach($r->brand);

        return response()->json(['success'=>true,'msg'=>'followed brand']);;
    }

    public function unfollowBrand(Request $r){

        $user = Auth()->user();
        if(count($r->ids)){
            $user->Brands()->detach($r->ids);
            return response()->json(['success'=>true,'msg'=>'unfollowed brands']);
        }
        return response()->json(['success'=>false,'msg'=>'no input']);

    }
#=================================================================================
#================================== unsubscribe ==================================
    public function unsubscribe(Request $r){

        $user = Auth()->user();

        $r->cmnt == "" ? $r->cmnt = 0 : $r->cmnt;
        $r->msgs == "" ? $r->msgs = 0 : $r->msgs;
        $r->newPost == "" ? $r->newPost = 0 : $r->newPost;

        $user->notf = $r->cmnt.','.$r->msgs.','.$r->newPost;

        if($user->save()){
            return response()->json(['success'=>true,'notf'=>$user->notf]);
        }
    }
    function getFavs($id){
      $user = User::find($id);
      $favs = $user->Posts;
      return response()->json(['success'=>true,'data'=>$favs]);
    }
#=================================================================================
#================================== change pass ==================================
    public function chgpwd (Request $r){
        // if ($r->isMethod('get')) {
        //     return view('site.users.chgpwd');
        // }
        $user = Auth()->user();
        $user->timestamps = false;
        if(isset($r->password)){
            if (Hash::check($r->curPassword, $user->password)) {
                $password = bcrypt($r->password);
                $user->update(['password' => $password]);
                return response()->json(['success'=>true]);
            }else{
              return response()->json(['success'=>false,'msg'=>'wrong password']);

            }
        }
        return response()->json(['success'=>false,'msg'=>'empty password']);

    }
#=================================================================================
#================================== change pass ==================================
    public function updatemobile (Request $r){
        $user = Auth()->user();

        if ($r->isMethod('get')) {
            $befor = Carbon::now();
            // dd($befor->addMonths(-getSettings('updatemobile')),$user->updated_at,getSettings('updatemobile'));
            if($befor->addMonths(-getSettings('updatemobile')) > $user->updated_at) {
                $allowed = true;
            }else{
                $allowed = false;
            }
            return view('site.users.updatemobile',compact('allowed'));
        }

        if(isset($r->phone)){
            if($r->phone == $user->phone){
                return 'same';
            }else{
                $user->update(['phone' => $r->phone]);
                return 'done';
            }
        }
        return 'error';
    }
#=================================================================================
#================================== change name ==================================
    public function updateName (Request $r){
        $user = Auth()->user();
        $user->timestamps = false;
        if ($r->isMethod('get')) {

            $yearsArr = [];
            $userTrans = Transfer::where('user_id',$user->id)->where('done',1)->where('type',1)->get();
            foreach ($userTrans as $value) {
                $date = $value->created_at;
                $yearsArr[] = Carbon::createFromFormat('Y-m-d H:i:s',$date)->year;
            }
            $transYears = array_unique($yearsArr);
            $amounts = [];
            foreach ($transYears as $year) {
                $userTrans = Transfer::where('user_id',$user->id)->where('done',1)->where('type',1)
                ->whereBetween('created_at',[$year.'-01-01 00:00:00',$year.'-12-31 00:00:00'])
                ->get()->sum(function($userTrans) {
                    return $userTrans->amount;
                });
                // $userAmounts = array_sum($userTrans);
                $amounts[$year] = $userTrans;
            }


            if(count($amounts)){$maxAmount = max($amounts);}else{$maxAmount = -10;}

            // dd($maxAmount,getSettings('maxAmountTrans'));
            if($maxAmount >= getSettings('maxAmountTrans')){
                $allowed = true;
            }else{
                $allowed = false;
            }
            return view('site.users.updatename',compact('allowed'));
        }

        if(isset($r->name)){
            if($r->name == $user->name){
                return 'same';
            }else{
                $user->update(['name' => $r->name]);
                return 'done';
            }
        }
        return 'error';
    }
#=================================================================================
#================================== update email =================================
    public function updatemail (Request $r){
        $user = Auth()->user();

        if ($r->isMethod('get')) {
            return view('site.users.updatemail');
        }
        if(isset($r->curPassword)){
            if (Hash::check($r->curPassword, $user->password)) {
                if(isset($r->email)){
                    $uniqueEmail = User::where('email',$r->email)->count();
                    if($uniqueEmail){
                        return 'UnUnique';
                    }else{
                        $user->update(['email' => $r->email]);
                        return 'done';
                    }
                }
            }
            return 'Wrong';
        }
        return 'error';
    }
    function allYears(){
      return response()->json(['success'=>true,'years'=>array_reverse(modelYear())]);
    }
#=================================================================================
#================================== comments =====================================
    public function comments ($id){
        $user = User::findOrFail($id);
        // $userCmnts = $user->Cmnt->take(40);
        return view('site.users.comments',compact('user'));
    }
#=================================================================================
#================================== notifications ================================
    public function notif ($user_id){
      $user = User::find($user_id);
        $notifications = $user->notifications;
        $unreadCount = $user->unreadNotifications->count();
        return response()->json(['success'=>true,'notifications'=>$notifications,'unread_count'=>$unreadCount]);
    }
    // read notf
    public function readNotif (Request $request){
        $notification = Auth::user()->notifications()->where('id',$request['id'])->first();
        if($notification){
          $notification->markAsRead();
          return response()->json(['success'=>true,'notification'=>$notification]);

        }
        return response()->json(['success'=>false,'msg'=>'wrong id']);

    }
    // read all nots
    public function readNotifs (Request $request){
      Auth::user()->unreadNotifications->markAsRead();

          return response()->json(['success'=>true]);


    }
#=================================================================================
#================================== delete all notifications =====================
    public function delAllNotf (){
        Auth()->user()->notifications()->delete();
        return response()->json(['success'=>true]);
    }
    function deleteNotif(Request $request){
      $notification = Auth::user()->notifications()->where('id',$request['id'])->first();
      if($notification){
        $notification->delete();
        return response()->json(['success'=>true,'notification'=>$notification]);

      }
      return response()->json(['success'=>false,'msg'=>'wrong id']);
    }
#=================================================================================
#============================== check for user at blacl list =====================
    public function blackList (Request $r){
        // if($r->isMethod('get')){
        //     return view('site.pages.checkacc');
        // }
        $user = User::where('phone',$r->acc_num)->orWhere('id',$r->acc_num)->onlyTrashed()->count();
        if($user){
            return response()->json(['success'=>true,'msg'=>'user found']);
        }else{
          return response()->json(['success'=>true,'msg'=>'user not found']);
        }
        return response()->json(['success'=>false,'msg'=>'user error']);
    }
}
