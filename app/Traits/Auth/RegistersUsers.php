<?php

namespace App\Traits\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Auth\Events\Registered;
// use abdullahobaid\mobilywslaraval\Mobily;
use Validator;
use Twilio;
use Twilio\Rest\Client;
 
use App\User;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
    $this->validate($request, [
            'username' => 'required|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|unique:users',
            'city' => 'required',
            'country' => 'required',
            'key' => 'required'
        ], [
            'username.required' => 'اسم المستخدم مطلوب',
            'username.unique' => 'اسم المستخدم موجود مسبقا',
            'email.required' => 'البريد الاكترونى مطلوب',
            'email.unique' => 'البريد الاكترونى موجود مسبقا',
            'password.required' => 'الرقم السرى مطلوب',
            'password.min' => 'يجب ألا يقل الرقم السرى عن 6 خانات',
            'password.confirmed' => 'الرقمين غير متطابقين',
            'phone.required' => 'رقم الجوال مطلوب',
            'key.required' => 'كود الدولة مطلوب',
            'phone.unique' => 'رقم الجوال مستخدم مسبقا',
        ]);


        
        $user = new User;
        $user->username = $request->username;
        $user->name     = $request->username;
        $user->password    =bcrypt($request->password);
        $user->phone    =$request->phone;
        $user->auth_complete     =1;
        $user->active   = 1 ;
        $user->code_verify =  rand(1,9).rand(2,7).rand(15,33).rand(32,66);

        if(isset($data['image'])) {
            $photo = $data['image'];
            $photo_name = 'uploads/'.time().'.'.$photo->getClientOriginalExtension();

            $save = $photo->move(public_path('uploads'),$photo_name);
            $user->image =$photo_name;
        };
        $user->city = $request->country ? null :null;
        $user->city = $request->city ? null :null;

        //$user->save();

			$user->save();
			    
// 			$message = $user->code_verify .' رمز التفعيل لموقع حراج الأغنام و الإبل' ;

  
//             $client = new \GuzzleHttp\Client();
//             $request = $client->get("https://www.hisms.ws/api.php?send_sms=1?&username=966535315001&password=qn0505709223&numbers=".$user->phone."&sender=Hi-Activate&date&time&=&message=".$message);
//             // $request = $client->get("https://www.hisms.ws/api.php?send_sms=1?&username=966535315001&password=qn0505709223&numbers=".$user->phone."&sender=Hi-Activate&date&time&=".$user->code_verify);
//             $response = $request->getBody();
//             $response =  (explode("<br />",$response));
			    
	
        Auth::login($user);


        return redirect('/');
         $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $r, $user){

    //    $msg = Mobily::send("966548215160", 'active Code is 9987 ');
        $msg = Twilio::message("+201024087434", 'active Code is 9987 ');
        if($msg === true){
            Session()->flash('successSendActiveCode','تم إرسال بيانات التسجل لجوالك');
                 return redirect()->route('activeAcc', ['id' => $user->id]);

        }else{
            User::where('id',$user->id)->first()->forceDelete();
            Session()->flash('error_flash_message',$msg);
            return back();
        }

    }


}
