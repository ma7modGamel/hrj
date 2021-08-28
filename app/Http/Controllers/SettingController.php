<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SiteSetting;

class settingController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(SiteSetting $setting){
    $settings = $setting->whereNotIn('type',[10,11,13,16,17,18,111])->orderBy('orderBy','asc')->get();
    return view('admin.settings.index',compact('settings'));
  }

  public function show($type){
    if($type == 'waterMark'){
      $settings = SiteSetting::whereIn('type',[10,11,13,16,17,18])->orderBy('orderBy','asc')->get();
      return view('admin.settings.waterMark',compact('settings'));
    }else{
      Session()->flash('error_flash_message','طلبت صفحة غير موجوده');
      return back();
    }
  }

  public function store(Request $request,SiteSetting $sitesetting){


    if($request->file('logo') != null){
    #=========== custom function in SiteSetting model ================
      SiteSetting::upSetImg($request->file('logo'));
    #=================================================================
    }
    if($request->file('noImage') != null){
    #=========== custom function in SiteSetting model ================
      SiteSetting::upSetImg($request->file('noImage'),'noImage','no_image');
    #=================================================================
    }
    if($request->file('WM_img') != null){
    #=========== custom function in SiteSetting model ================
      SiteSetting::upSetImg($request->file('WM_img'),'WM_img','waterMark');
    #=================================================================
    }
    if($request->file('favicon') != null){
    #=========== custom function in SiteSetting model ================
      SiteSetting::upSetImg($request->file('favicon'),'favicon','favicon');
    #=================================================================
    }
    foreach(array_except($request->toArray(),['_token',
                                              'submit',
                                              'logo',
                                              'noImage',
                                              'favicon',
                                              'WM_img',
                                              'waterMarkTest',
                                              ]) as $key=>$reg){
      $settigsupdate = $sitesetting->where('name',$key)->get()[0];
      $settigsupdate->fill(['value'=>$reg])->save();
    }
    SiteSetting::where('name','curDomain')->first()->update(['value'=>Request()->root()]);

    image_upload($sitesetting,$request->file('waterMarkTest'),NULL,'/website','images');

    return redirect()->back()->withFlashMessage('تم تعديل اعدادات الموقع بنجاح');

  }

  

}
