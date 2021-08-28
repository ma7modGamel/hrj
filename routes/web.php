<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/maintenance',function(){
    return view('maintenance');
});
Route::get('/clear-view',function(){
    \Artisan::call('view:clear');
});
Route::get('/max_upload_size',function(){
    return (int)\App\SiteSetting::where('name','max_upload_size')->first()->value;
});

    Route::get('send','UserController@send');
    
    	Route::get('cmnts/{id}/delete','CmntController@delete');

    // ********** get posts by area *******

Route::post('/postByCity' , 'PostController@getByCity')->name('getPostByCity');
Route::any('/searchByCityAndTime' , 'PostController@CityTimeSearch')->name('searchByCityAndTime');

Route::any('/getSubCat' , 'PostController@getSubCat')->name('getSubCat');
Route::any('/rightMenuSearch' , 'PostController@rightMenuSearch')->name('rightMenuSearch');

#==============================================================================================
#======================================= Site Area ============================================
#==============================================================================================

#========================================================================================
#=========================== users Area =================================================


// routes to filter returned data
    Route::get('getLatestPosts' , 'PostController@getLatestPosts')->name('getLatestPosts');
	Route::get('getOldPosts' , 'PostController@getOldPosts')->name('getOldPosts');
// end filter routes

// getCountry

Route::get('/getcountry' , 'PostController@getCountry')->name('getcountry');

// end country

    Route::get('show/contact','ContactController@showcontact')->name('show-contact');
    Route::post('contact/us','ContactController@contact')->name('contact-us');
    
	Route::get('users/{id}','UserController@userView');
	Route::get('active/{id}','UserController@activeAcc')->name('activeAcc');
	Route::post('active/{id}','UserController@activeAccStore');
	    Route::get('ressend/code/{user_id}','UserController@ressend_code');

	#=============================================================================
Route::post('update/image','UserController@updateImage')->name('update-image');
	#=========================== updates =========================================
 Route::get('autocomplete', 'PostController@search');
	#=========================== unsubscribe =====================================
    	Route::get('php',function(){
			print phpinfo();
        });

	Route::get('unsubscribe','UserController@unsubscribe')->middleware('auth');
	Route::post('unsubscribe','UserController@unsubscribe')->middleware('auth');

	#=========================== change password =================================

	Route::get('chgpwd','UserController@chgpwd')->middleware('auth');
	Route::post('chgpwd','UserController@chgpwd')->middleware('auth');

	#=========================== update mobile ===================================

	Route::get('updatemobile','UserController@updatemobile')->middleware('auth');
	Route::post('updatemobile','UserController@updatemobile')->middleware('auth');

	#=========================== update name =====================================

	Route::get('updatename','UserController@updateName')->middleware('auth');
	Route::post('updatename','UserController@updateName')->middleware('auth');

	#=========================== update email ====================================

	Route::get('changeImg','UserController@changeImg')->middleware('auth');
    Route::any('changeCity','UserController@changeCity')->middleware('auth');
	#=======================================chngimg====================================

        Route::get('updateemail','UserController@updatemail')->middleware('auth');
        Route::post('updateemail','UserController@updatemail')->middleware('auth');


#=========================== follow User =====================================

	Route::post('followUser','UserController@followUser')->middleware('auth');
	Route::post('unfollowUser','UserController@unfollowUser')->middleware('auth');

	#=========================== follow Brand =====================================

	Route::post('followBrand','UserController@followBrand')->middleware('auth');
	Route::post('unfollowBrand','UserController@unfollowBrand')->middleware('auth');

	#=========================== User comments ===================================

	Route::get('comments/{id}','UserController@comments');
	#=============================================================================
	#=========================== black List ======================================

	Route::get('checkacc','UserController@blackList');
	Route::post('checkacc','UserController@blackList');

#=============================================================================
#=========================== new User ========================================
	Route::get('complete/{active}','UserController@authCompleteView');
	Route::post('complete','UserController@authComplete');
	
#=================================================================================
#=========================== ads Area ============================================

	Route::get('/','PostController@viewAds');
	Route::get('ads-images','PostController@adsImg');
	#=============================================================================
    Route::get('child','PostController@getchild')->name('get-child');
	Route::get('soum','PostController@getsoum')->name('soum');
	#=========================== view one ads ====================================

	Route::get('ads/{id}/{title?}','PostController@viewAd');
	#=============================================================================
	#=========================== add ads by type =================================
	Route::get('add','PostController@addPostType')->middleware('auth');
	#=============================================================================
	#=========================== store ads =======================================
	Route::post('add','PostController@store')->middleware('auth');
	#=============================================================================
	#=========================== store ads =======================================
	#=============================================================================
	#=========================== edit ads ========================================
	Route::get('edit/{id}','PostController@edit')->middleware('auth');
	Route::post('edit/{id}','PostController@update')->middleware('auth');
	Route::resource('images','ImagesController');
	#=============================================================================
	#=========================== store cmnt ======================================
	Route::post('addCmntPost','PostController@addCmnt')->middleware('auth');
	#=============================================================================
	#=========================== follow Post =====================================
	Route::post('followPost','PostController@followPost')->middleware('auth');
	#=============================================================================
	#=========================== ads update updated_at ===========================
	Route::get('adsUpdated/{id}','PostController@adsUpatedAt')->middleware('auth');
	#=============================================================================
	#=========================== ads report ======================================
	Route::get('adsReport','PostController@report');
	Route::post('adsReport','PostController@report');
	#=============================================================================
	#=========================== ads delete ======================================
	Route::get('adsDelete/{id}','PostController@destroy')->middleware('auth');
	#=============================================================================
	#=========================== update location =================================

	Route::get('updateLocation','PostController@updateAdsLocation')->middleware('auth');
	Route::post('updateLocation','PostController@updateAdsLocation')->middleware('auth');

	#=========================== fav ads =========================================
	Route::get('fav', function(){
        return view('site.posts.fav');
    })->middleware('auth');

	#=========================== follow ads ======================================

	Route::get('follow','PostController@follow')->middleware('auth');
	#=============================================================================
	#=========================== get City Name ===================================
	Route::get('getCityName','PostController@getCityName');
	Route::post('getCityName','PostController@getCityName');


#=================================================================================
#=========================== Messages Area =======================================

	#=========================== send Messages ===================================

	Route::get('sendMsg/{user_to}','MessageController@sendMsg')->middleware('auth');
	Route::post('sendMsg/{user_to}','MessageController@sendMsg')->middleware('auth');

	#=========================== inbox & outbox ==================================

	Route::get('inbox','MessageController@inbox')->middleware('auth');
	Route::get('outbox','MessageController@outbox')->middleware('auth');

	#=========================== show sonversations ==============================

	Route::get('conv/{id}','MessageController@userconv')->middleware('auth');

	#=========================== delete messages =================================

	Route::post('delMessages','MessageController@delMsg')->middleware('auth');

#=================================================================================
#=========================== notifications Area ==================================


	Route::get('notifications','UserController@notif')->middleware('auth');


	#=============================================================================
	#=========================== del All Notf ====================================
	Route::get('delAllNotf','UserController@delAllNotf')->middleware('auth');

#=================================================================================
#=========================== transfers Area ======================================

	#=============================================================================
	#=========================== store ===========================================
	Route::get('commission','TransferController@commission');
	Route::post('tranStore','TransferController@store');
#=================================================================================
#=========================== rating Area =========================================
	Route::get('add-rating/{id}','RatingController@create')->middleware('auth');
	Route::post('add-rating','RatingController@store')->middleware('auth');
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

	Route::get('tags/{sreachWord}','PostController@tagsSearch')->name('tags.search');
    Route::get('search/{code}','PostController@searchCode')->name('post.search.index');
	Route::get('tag','PostController@space');

	#================================new word===================================#
Route::get('new/{word}','PostController@news');

#=========================== get motors Area ==================================
    Route::get('automotor','motorsController@index')->name('motors');
    Route::get('automotor/create','motorsController@create')->name('motors-create');
    Route::get('automotor/{id}/edit','motorsController@edit')->name('motors-edit');
    Route::post('automotor/store','motorsController@store')->name('motors-store');
    Route::put('automotor/{id}/edit','motorsController@update')->name('motors-update');
    Route::delete('automotor/{id}','motorsController@destroy')->name('motors-delete');
	#=============================================================================

	#=========================== get posts by city ===============================

	Route::get('city/{sreachWord}','PostController@citySearch');
#=================================================================================
#=========================== Pages Area ==========================================

        Route::get('pages/{pageName}',function($pageName){
            if(view()->exists('site.pages.'.$pageName)){
                return view('site.pages.'.$pageName);
            }
            return \App::abort(404);

        });

	Route::get('page/{pageName}',function($pageName){
		if(\App\Page::where('pLink',$pageName)->count()){
			return view('site.pages.page',compact('pageName'));
		}
		return \App::abort(404);
	});

#=================================================================================
#=========================== contact Area ========================================

	Route::get('contact','ContactController@create');
	Route::post('contact','ContactController@store');
#=================================================================================
#=================================================================================




#==============================================================================================
#======================================= Admin Area ===========================================
#==============================================================================================
//Route::group(['prefix' => 'admincp' ], function () {
Route::group(['prefix' => 'admincp', 'middleware' => 'admin'], function () {
	Route::get('commission','CommissionController@index')->middleware('auth');
	Route::post('commission/add','CommissionController@store')->middleware('auth');
	Route::get('commission/{id}/edit','CommissionController@edit')->middleware('auth');
// 	Route::get('commission','CommissionController@index')->middleware('auth');
	Route::POST('commission/{id}/update','CommissionController@update')->name('commission.update')->middleware('auth');
	Route::get('commission/{id}/delete','CommissionController@destroy')->name('commission.destroy')->middleware('auth');

#=================================================================================
#=========================== Home Area ===========================================
	route::get('/',function(){
		return view('admin.home.index');
	});
#=================================================================================
#=========================== Site Settings Area ==================================

	Route::resource('settings','SettingController');
    Route::resource('zakaria','SettingController@upSetImg');

#=================================================================================
#=========================== Bank Area ===========================================

	Route::resource('banks','BankController');
#=================================================================================
#=========================== Pages Area ==========================================

	Route::resource('pages','PageController');
	Route::post('pages/{id}/{active}','PageController@activate');
#=================================================================================
#=========================== Payment terms Area ======================================
    Route::resource('terms','TermController');
    Route::post('terms/{id}/{active}','TermController@activate');
#=================================================================================
#=========================== Questions Area ======================================

	Route::resource('questions','QuestionController');
#=================================================================================
#=========================== Areas Area ==========================================

	Route::resource('areas','AreaController');
#=================================================================================
#=========================== Post Images Area ====================================

	Route::resource('images','ImagesController');
#=================================================================================
#=========================== Category Area =======================================

	Route::resource('cats','CatController');
	Route::get('cats/{id}/delete','CatController@destroy');

#=================================================================================
#=========================== Users Area ==========================================

	Route::resource('users','UserController');
	Route::get('users/{id}/rest','UserController@restoree');
	Route::get('users/{id}/delete','UserController@force');
	Route::post('users/{id}/forbidden','UserController@forbidden');

	#======================= VIM =================================================
	Route::get('vimShow/{type}','UserController@vim');
	Route::post('vims/add','UserController@addVim');
	Route::get('vimEdit/{id}','UserController@vimEdit');
	Route::post('vimEdit','UserController@vimUpdate');
	Route::post('vimDel/{id}','UserController@vimDel');

	#======================= rank =================================================
	Route::post('addRank','UserController@addRank');
	Route::post('delRank/{id}','UserController@delRank');

#=================================================================================
#=========================== Posts Area ==========================================

	Route::resource('posts','PostController');
	Route::get('posts/{id}/rest','PostController@restoree');
	Route::get('posts/{id}/delete','PostController@force');
#=================================================================================
#=========================== Comments Area =======================================

	Route::resource('cmnts','CmntController');
#=================================================================================
#=========================== Contact Area ========================================

	Route::resource('contacts','ContactController');
#=================================================================================
#=========================== Rating Area ========================================

	Route::resource('ratings','RatingController');
#==================================================================================
#=========================== Transfers Area =======================================

	Route::resource('transfers','TransferController');
	Route::post('transfersDone','TransferController@transfersDone');
#=================================================================================
#=========================== Messages Area =======================================

	Route::resource('messages','MessageController');
	#================== DEL Messages =============================================

	Route::get('messages/{id}/delete','MessageController@destroy');

	Route::get('messages/{id}/restore','MessageController@restoree');

	Route::get('messages/{id}/forceDelete','MessageController@forceDel');

	#================== show conversation =======================================

	Route::get('conv/{user_id}/{user_to}','MessageController@showConv');
#=================================================================================
    #================== show motors =======================================
    Route::get('motors','motorsController@index');
 
#=================================================================================
#============================ test Area ==========================================

route::get('/test/{text?}',function(){
	$faker = \Faker\Factory::create('ar_SA');
	if(isset($_GET['setSoum'])){
		for ($i=0; $i <= \App\Post::count() ; $i++) {
			\App\Post::withTrashed()->where('price',0)->skip($i)->first()->update(['price'=>$faker->numberBetween(100,20000)]);
		}
	}
	return 'done1';
	return view('test');
});
#=================================================================================
});

 
 
