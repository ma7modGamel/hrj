<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Mail;
use App\Contact;

class ContactController extends Controller
{
  public function apiValidate($request,$rules,$langs = [])
  {
      $validate=\Validator::make($request->all(),$rules,$langs);
      if($validate->fails())
      {
          return  ($validate->messages());
      }
      return null;
  }





  public function store(Request $request,Contact $contact){

    $errors = $this->apiValidate($request, [
      'email'             => 'required',
      'phone'             => 'required',
      'type'              => 'required',
      'subject'           => 'required',
      'body'              => 'required',
    ],[
      'email.required'    => 'البريد الاكترونى مطلوب',
      'phone.required'    => 'رقم الهاتف مطلوب',
      'type.required'     => 'أختر القسم',
      'subject.required'  => 'أكتب عنوان الموضوع',
      'body.required'     => 'أكتب النص مطلوب',
    ]);

    if ($errors) {
      return response()->json(['success'=>false,'errors'=>$errors]);
    }

    if($request->file('image')[0] != null){
      $image = image_upload($contact,$request->file('image'),NULL,'/upload','contact',false,false);
    }else{
      $image = ['names' => [],'imgExt' => []];
    }
    Auth()->check() ? $user = Auth()->user()->id : $user = NULL;
    // isset($request->user_id) ? $user_id = $request->user_id : $user_id = NULL;

    $newContact = Contact::create([
      'name'    => $request->name,
      'email'   => $request->email,
      'phone'   => $request->phone,
      'type'    => $request->type,
      'subject'   => $request->subject,
      'body'      => $request->body,
      'image'   => implode(',',$image['names']),
      'active'    => 1,
      'user_id'   => $user,
      ]);

    return response()->json(['success'=>true,'contact'=>$newContact,'msg'=>'تـم الإرسال بنجاح : رقم رسالتك - '.$newContact->id]);
    // redirect()->back()->withFlashMessage();
  }


}
