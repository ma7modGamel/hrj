<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Mail;
use App\Contact;

class ContactController extends Controller 
{
  public function index(){
    $contacts = Contact::orderBy('id','desc')->orderBy('active','asc')->get();
    $num = 1;
    return view('admin.contacts.index',compact('contacts','num'));
  }

  public function show($id){

    $contact = Contact::find($id);
    Contact::where('id',$id)->update(['active' => 0]);
    return view('admin.contacts.viewMsg',compact('contact'));
  }

  public function replay(Request $request){
    $this->validate($request, [
      'email'              => 'required',
      'body'               => 'required',
      ],[
      'email.required'     => 'البريد الاكترونى مطلوب',
      'body.required'      => 'أكتب النص مطلوب',
      ]);

    Mail::send('mails.contactReplay', ['request' => $request], function ($m) use ($request) {
      $m->to($request->email)->subject(getSettings('SiteName'));
    });

    return back()->withFlashMessage('تم الارسال بنجاح');

  }

  public function create(){
    return view('site.contact.add');
  }

  public function store(Request $request,Contact $contact){

    $this->validate($request, [
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
    return redirect()->back()->withFlashMessage('تـم الإرسال بنجاح : رقم رسالتك - '.$newContact->id);
  }


public function showcontact(){
      return view('site.pages.contact');
}
  public function contact( Request $request){
      $this->validate($request,[
         'name'=>'required',
         'phone' =>'required',
         'contact'=>'required',
         'descrption' =>'required',

      ],[
          'name.required'=>'الاسم مطلوب ',
          'phone.required'=>'الرقم  مطلوب ',
          'contact.required'=>'نوع الشكوي مطلوب ',
          'descrption.required'=>'نص مطلوب ',
      ]);
      $contact = new Contact();
      $contact->name = $request->input('name');
      $contact->email = $request->input('email');
      $contact->phone = $request->input('phone');
      $contact->type = $request->input('contact');
      $contact->body	 = $request->input('descrption');
      $contact->subject	 = 'اتصل بنا ';
      $contact->save();

      session()->flash('success','تم ارسال الرساله بنجاح ');
      return back();
  }


  function destroy($id){
    $msg = Contact::find($id)->delete();
    if(!$msg){
      return "error";
    }
    if(Contact::count()){
      return "done";
    }else{
      return "empty";
    }
  }
}
