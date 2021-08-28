<?php

namespace App\Http\Controllers\Api;

use Lang;
use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Utils\ResponseUtil;
use Response;
use App\User;
// use Password;
// use Illuminate\Contracts\Auth\Guard;
// use Illuminate\Contracts\Auth\PasswordBroker;
// use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Controllers\Controller;

/**
 * Class AuthController.
 */
class AuthApiController extends Controller
{
  public function sendResponse($result, $message = 'oki')
  {
      return Response::json(ResponseUtil::makeResponse($message, $result));
  }
  public function sendError($error, $code = 200)
  {
      return Response::json(ResponseUtil::makeError($error), $code);
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
    public function refresh(Request $request)
    {
        try {
            $newToken = JWTAuth::setRequest($request)->parseToken()->refresh();
        } catch (TokenExpiredException $e) {
            return response()->json(['error'=>'token_expired', 'code'=>$e->getStatusCode()]);
        } catch (JWTException $e) {
            return response()->json(['error'=>'token_invalid', 'code'=>$e->getStatusCode()]);
        }
        return response()->json(['token'  => $newToken, 'msg'=>'New Token retrieved successfully']);
    }
    function forgetPassword(Request $request){
      $errors = $this->apiValidate($request, [
            'email' => 'email|required',
        ]);

        if ($errors) {
            return response()->json(['success'=>false,'errors'=>$errors]);
        }
        $link = '';
        if ($user = User::where('email', $request->input('email'))->first()) {
            $token = app('auth.password.broker')->createToken($user);

            DB::table(config('auth.passwords.users.table'))->insert([
                'email' => $user->email,
                'token' => bcrypt($token),
                'created_at' => Carbon::now()
            ]);
            $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . ($_SERVER['HTTP_HOST']) . '/password/reset/' . $token;
            $msg = Mail::send('emails.reset-password', ['user' => $user
                , 'token' => $token, 'link' => $link], function ($message) use ($user) {
                $message->to($user->email, $user->name);
                $message->from('app@email.com');
                $message->subject('Reset Your Password');
            });
            return response()->json(['success' => true]);

        } else {
            return response()->json(['success' => false, 'error' => 'user doesn\'t exist']);

        }

    }
    public function login(Request $request)
    {
        $password = $request['password'];
        $login = $request['email'];
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = ([$field => $login, 'password' => $password]);
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error'=>'User not found or credentials not matched']);
        }
        $user = auth()->user();

        return response()->json(['token'=>$token, 'user'=>$user]);
    }
    public function register(Request $request){
      $errors = $this->ApiValidate($request, [
          'username'  => 'required|max:100|unique:users',
          'email'     => 'required|email|max:255|unique:users',
          'password'  => 'required|min:6|confirmed',
          'phone'     => 'required|digits_between:10,20|unique:users',
      ],[
          'username.required' => 'اسم المستخدم مطلوب',
          'username.unique'   => 'اسم المستخدم موجود مسبقا',
          'email.required'    => 'البريد الاكترونى مطلوب',
          'email.email'=>'صيغة البريد غير صالحة',
          'email.unique'      => 'البريد الاكترونى موجود مسبقا',
          'password.required' => 'الرقم السرى مطلوب',
          'password.min'      => 'يجب ألا يقل الرقم السرى عن 6 خانات',
          'password.confirmed'=> 'الرقمين غير متطابقين',
          'phone.required'    => 'رقم الجوال مطلوب',
          'phone.unique'      => 'رقم الجوال مستخدم مسبقا',
      ]);
      if($errors){
        return $errors;
      }
      $data = $request;
$user =  User::create([
          'username' => $data['username'],
          'name' => $data['username'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'active' => 1,
          'auth_complete' => 1,
          'phone' => format_number($data['phone']),
      ]);
      return response()->json(['success'=>true,'user'=>$user]);
    }

    // public function forgotPassword(Request $request)
    // {
    //     $this->apiValidate($request, ['email' => 'required|email']);

    //     $broker = $this->getBroker();

    //     $response = Password::broker($broker)->sendResetLink($request->only('email'), function (Message $message) {
    //         $message->subject($this->getEmailSubject());
    //     });

    //     switch ($response) {
    //         case Password::RESET_LINK_SENT:
    //             return $this->getSendResetLinkEmailSuccessResponse($response);

    //         case Password::INVALID_USER:
    //         default:
    //             return $this->getSendResetLinkEmailFailureResponse($response);
    //     }
    // }
}
