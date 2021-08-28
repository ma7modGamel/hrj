<?php

namespace App\Traits\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use abdullahobaid\mobilywslaraval\Mobily;
use Twilio;

trait SendsPasswordResetEmails
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $token = str_random(64);
        $email = $request->email;
        $mobile = $request->email;
        
   if(filter_var( $email , FILTER_VALIDATE_EMAIL ) && \App\User::where('email',$email)->first()){
     
     $pw_reset = \DB::table('password_resets')->where('email', $email)->get();
        
    if(count($pw_reset)){
            \DB::table('password_resets')->where('email', $email)->delete();
        }
     

        \DB::table('password_resets')->insert([
        'email' => $email,
        'token' => bcrypt($token),
        'created_at' => \Carbon\Carbon::now()
    ]);
    
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );



            
return back()->withFlashMessage('تم إرسال البيانات لبريدك');

   }elseif(!filter_var( $email , FILTER_VALIDATE_EMAIL ) && \App\User::where('phone',$email)->first()){

       
            \DB::table('password_resets')->insert([
                'mobile' => $email,
                'token' => bcrypt($token),
                'created_at' => \Carbon\Carbon::now()
            ]);
       
           $key = '+966';


            $message = 'اهلا بك  فى حراج الأغنام و الإبل اضغط هنا لإسترجاع الرقم السرى '.$request->root().'/password/reset/'.$token;

  
            $client = new \GuzzleHttp\Client();
            $request = $client->get("https://www.hisms.ws/api.php?send_sms=1?&username=966535315001&password=qn0505709223&numbers=".$email."&sender=Hi-Activate&date&time&=&message=".$message);
            // $request = $client->get("https://www.hisms.ws/api.php?send_sms=1?&username=966535315001&password=qn0505709223&numbers=".$user->phone."&sender=Hi-Activate&date&time&=".$user->code_verify);
            $response = $request->getBody();
            $response =  (explode("<br />",$response));


            return back()->withFlashMessage('تم إرسال البيانات لجوالك');

       
   }


   
          Session()->flash('error_flash_message',' هذاالحساب غير موجود ');

          return redirect('password/reset')->withFlashMessage(' هذاالحساب غير موجود ');

          return redirect('password/reset')->withFlashMessage('تم إرسال البيانات لجوالك');


        // return $response == Password::RESET_LINK_SENT
        //             ? $this->sendResetLinkResponse($response)
        //             : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Validate the email for the given request.
     *
     * @param \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required']);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }
    
    
    ///////////////////////////////////////////// Other Methods /////////////////////////////////////////////
    
    
    
             // $msg = Twilio::message($key.$userPhone->phone, 'اهلا بك  فى '.getSettings().'
            //  اضغط هنا لإسترجاع الرقم السرى '.$request->root().'/password/reset/'.$token);

            // if($msg->status == 'queued'){
            //     return back()->withFlashMessage('تم إرسال البيانات لجوالك');
            // }else{
            //     Session()->flash('error_flash_message',$msg);
            //     return back();
            // }
            


//                 try {
//                 Session()->flash('successSendActiveCode','تم إرسال بيانات التسجل لجوالك');
//                 return back()->withFlashMessage('تم إرسال البيانات لجوالك');
// 			} catch (\Exceptions $e){
// 				 $message = 'الرقم غير صحيح يرجي اعادة كتابته';
// 				 session()->flash('error_flash_message', $message);
// 				 return redirect()->back();
// 			} 
			

}
