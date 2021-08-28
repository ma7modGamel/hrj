<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('jwt.auth')->get('/user', function (Request $request) {
    return auth()->user();
});
Route::any('deletemessage/{id}/{userId?}','Api\MessageController@delMsg');

// refresh token
  Route::get('/auth/refresh',  'Api\AuthApiController@refresh');
  //login
  Route::post('/login', 'Api\AuthApiController@login');

  // register
  Route::post('/register', 'Api\AuthApiController@register');
// forget password
  Route::post('/password', 'Api\AuthApiController@forgetPassword');

Route::get('users/{id}','Api\UserController@userView');
Route::get('adsbyusarid/{id}','Api\UserController@userPosts');
 // Route::middleware(['jwt.auth'])->group(function () {
  #=============================================================================
  #=========================== updates =========================================

  #=========================== unsubscribe =====================================

  // Route::get('unsubscribe','Api\UserController@unsubscribe');
  Route::post('unsubscribe','Api\UserController@unsubscribe');

  #=========================== change password =================================

  // Route::get('chgpwd','Api\UserController@chgpwd');
  Route::post('chgpwd','Api\UserController@chgpwd');

  #=========================== update mobile ===================================

  // Route::get('updatemobile','Api\UserController@updatemobile');
  Route::post('updatemobile','Api\UserController@updatemobile');

  #=========================== update name =====================================

  // Route::get('updatename','Api\UserController@updateName');
  Route::post('updatename','Api\UserController@updateName');

  #=========================== update email ====================================

  // Route::get('updateemail','Api\UserController@updatemail');
  Route::post('updateemail','Api\UserController@updatemail');

  #=========================== follow User =====================================

  Route::post('followUser','Api\UserController@followUser');
  Route::post('unfollowUser','Api\UserController@unfollowUser');

  #=========================== follow Brand =====================================

  Route::post('followBrand','Api\UserController@followBrand');
  Route::post('unfollowBrand','Api\UserController@unfollowBrand');

  #=============================================================================
  #=========================== add ads by type =================================
  Route::get('add','PostController@addPostType');
  #=============================================================================
  #=========================== store ads =======================================
  Route::post('createads/{user_id}','Api\PostController@store');
  #=============================================================================
  #=========================== edit ads ========================================
  Route::get('edit/{id}','PostController@edit');
  Route::post('edit/{id}','PostController@update');
  Route::resource('images','ImagesController');
  #=============================================================================
  #=========================== store cmnt ======================================
  Route::post('sendcomment/{id}/{userId}','Api\PostController@addCmnt');
  #=============================================================================
  #=========================== follow Post =====================================
  Route::get('fav/{id}/{user_id}','Api\PostController@followPost');

  Route::get('unfav/{id}/{user_id}','Api\PostController@unfollowPost');

  #=============================================================================
  #=========================== ads update updated_at ===========================
  Route::get('adsUpdated/{id}','PostController@adsUpatedAt');

  #=============================================================================
  #=========================== ads delete ======================================
  Route::get('adsDelete/{id}','PostController@destroy');
  #=============================================================================
  #=========================== update location =================================

  Route::get('updateLocation','PostController@updateAdsLocation');
  Route::post('updateLocation','PostController@updateAdsLocation');

  #=========================== fav ads =========================================
  Route::get('showfav/{id}', 'Api\UserController@getFavs');

  #=========================== follow ads ======================================

  Route::get('follow','PostController@follow');

  #=================================================================================
  #=========================== Messages Area =======================================

  #=========================== send Messages ===================================

  // Route::get('sendMsg/{user_to}','MessageController@sendMsg');
  Route::post('sendmessage/{user_to}','Api\MessageController@sendMsg');

  #=========================== inbox & outbox ==================================

  Route::get('showmessage/{userid}','Api\MessageController@inbox');
  Route::get('showsentmessage/{userid}','Api\MessageController@outbox');
  Route::get('msgandnotficount/{userid}','Api\MessageController@getMessagesAndNotifCount');

  Route::get('readmessage/{id}/{userId}','Api\MessageController@show');

  #=========================== show sonversations ==============================

  Route::get('conv/{id}','Api\MessageController@userconv');

  #=========================== delete messages =================================


  #=================================================================================
  #=========================== notifications Area ==================================


  Route::get('notifications/{user_id}','Api\UserController@notif');

  Route::post('read-notification','Api\UserController@readNotif');
  Route::post('notifications/read','Api\UserController@readNotifs');

  #=============================================================================
  #=========================== del All Notf ====================================
  Route::post('notifications/delete','Api\UserController@delAllNotf');
  Route::post('delete-notification','Api\UserController@deleteNotif');

  Route::get('add-rating/{id}','RatingController@create');
  Route::post('add-rating','RatingController@store');
// });


#=========================== User comments ===================================
Route::get('comments/{id}','Api\UserController@comments');
Route::get('city','Api\UserController@allCities');
Route::get('country','Api\UserController@allCountry');
Route::get('soum','Api\UserController@soum');

Route::get('allyears','Api\UserController@allYears');


#=============================================================================
#=========================== black List ======================================

Route::any('checkacc','Api\UserController@blackList');
// Route::any('blacklist','Api\UserController@blackList');

// #=============================================================================
// #=========================== new User ========================================
// Route::get('complete/{active}','Api\UserController@authCompleteView');
// Route::post('complete','Api\UserController@authComplete');
#=================================================================================
#=========================== ads Area ============================================

Route::get('/allads','Api\PostController@viewAds');
Route::get('ads-images','PostController@adsImg');
#=============================================================================
#=========================== view one ads ====================================

Route::get('ads/{id}/{title?}','PostController@viewAd');
Route::get('findads/{id}/{title?}','Api\PostController@viewAd');

#=============================================================================
#=========================== ads report ======================================
// Route::get('adsReport','PostController@report');
Route::post('sendreport/{adsId}/{userId?}','Api\PostController@report');

#=============================================================================
#=========================== get City Name ===================================
Route::get('getCityName','PostController@getCityName');
Route::post('getCityName','PostController@getCityName');


#=================================================================================
#=========================== transfers Area ======================================

#=============================================================================
#=========================== store ===========================================
// Route::get('commission','Api\TransferController@commission');
Route::post('tranStore','Api\TransferController@store');
#=================================================================================
#=========================== rating Area =========================================

Route::get('allreviews/{id}',function($id){
  $user = \App\User::findOrFail($id);
  return view('site.ratings.allreviews',['user'=>$user]);
});

#=============================================================================
#=========================== store ===========================================
// Route::post('tranStore','TransferController@store');

#=================================================================================
#=========================== Ajax Area ===========================================

#=============================================================================
#=========================== index Cat Area ==================================

Route::get('/getIndexCatAjaX/{parent_id}', 'CatController@getIndexCatAjaX');
#=============================================================================
#=========================== get posts Area ==================================

Route::get('searchads/{sreachWord}','Api\PostController@tagsSearch');

Route::get('makes','Api\PostController@makes');
Route::get('makespics','Api\PostController@getFuckingPictures');

Route::get('allsections','Api\PostController@sections');
Route::get('aqarat','Api\PostController@aqarat');


Route::get('types/{makeId}','Api\PostController@typesByMakeId');
Route::get('adsbymakeid/{sreachWord}','Api\PostController@tagsSearch');
Route::get('adsbymodelid/{sreachWord}','Api\PostController@tagsSearch');
Route::get('adsbysectionid/{sreachWord}','Api\PostController@tagsSearch');


Route::get('adsbycityid/{sreachWord}','Api\PostController@citySearch');
Route::get('adsbyaqarid/{sreachWord}','Api\PostController@tagsSearch');
Route::get('searchcar/{make_id}/{model_id?}/{year?}','Api\PostController@carSearch');



#=============================================================================
#=========================== get posts by city ===============================

Route::get('city/{sreachWord}','Api\PostController@citySearch');
#=================================================================================
#=========================== Pages Area ==========================================

Route::get('forgetpass',function(){
  return redirect('password/reset');
});
Route::get('{pageName}',function($pageName){
  // if(view()->exists('site.pages.'.$pageName)){
  //   return view('site.pages.'.$pageName);
  // }
  if($pageName == 'permission'){
    $pageName = 'rules';

  }
  if($pageName == 'blacklist'){
    $pageName = 'checkacc';
  }

  if(view()->exists('site.pages.'.$pageName)){
    return view('site.pages.'.$pageName);
  }

  if(\App\Page::where('pLink',$pageName)->first()){
    return view('site.pages.page',compact('pageName'));

  }
  if($pageName=='commession'){
    return view('site.transfers.commission',compact('pageName'));

    // $html = view('site.pages.comm')->render();
    // return response()->json(['success'=>true,'content'=>strip_tags($html)]);
  }
  return \App::abort(404);

  // return response()->json(['success'=>true,'content'=>strip_tags(\App\Page::where('pLink',$pageName)->first()->content)]);

  if($pageName == 'member'){
    return view('site.pages.'.$pageName);

  // $html =  \App\Page::where('pLink','memberUp')->first()->content .   \App\Page::where('pLink','memberDown')->first()->content;
  // return response()->json(['success'=>true,'content'=>strip_tags($html)]);

  }

  return view('site.pages.'.$pageName);

  return response()->json(['success'=>false,'msg'=>'page not found']);
});



// Route::get('page/{pageName}',function($pageName){
//   if(\App\Page::where('pLink',$pageName)->count()){
//     return view('site.pages.page',compact('pageName'));
//   }
//   return \App::abort(404);
// });

#=================================================================================
#=========================== contact Area ========================================

// Route::get('contact','Api\ContactController@create');
Route::post('contact','Api\ContactController@store');
#=================================================================================
#=================================================================================
