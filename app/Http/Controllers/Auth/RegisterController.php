<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\Auth\RegistersUsers;
use Illuminate\Http\Request;

use App\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:100|unique:users',
            // 'email' => 'max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|digits_between:10,20|unique:users',
            'image' => 'required',
            'city' => 'required',
            'country' => 'required',
        ], [
            'username.required' => 'اسم المستخدم مطلوب',
            'username.unique' => 'اسم المستخدم موجود مسبقا',
            'email.required' => 'البريد الاكترونى مطلوب',
            'email.unique' => 'البريد الاكترونى موجود مسبقا',
            'password.required' => 'الرقم السرى مطلوب',
            'password.min' => 'يجب ألا يقل الرقم السرى عن 6 خانات',
            'password.confirmed' => 'الرقمين غير متطابقين',
            'phone.required' => 'رقم الجوال مطلوب',
            'phone.unique' => 'رقم الجوال مستخدم مسبقا',
            'image' => 'الصورة الشخصيه مطلوبه',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)

    {
//        $path = '';
//        if (request()->image) {
//            $file = request()->image;
//            $file_name = md5((string)mt_rand(1000000, 10000000)) . '.' . $file->getClientOriginalExtension();
//            $destinationPath = public_path('uploads/');
//            $file->move($destinationPath, $file_name);
//            $path = 'uploads/' . $file_name;//picture
//
//        }
//        $photo = request()->file('image');
//        $photo_name = 'uploads/'.time().'.'.$photo->getClientOriginalExtension();
//        $save = $photo->move(public_path('uploads'),$photo_name);
//
//

//        return User::create([
//            'username' => $data['username'],
//            'name' => $data['username'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//            'active' => 1,
//            'auth_complete' => 1,
//            'phone' => format_number($data['phone']),
//            'image'=>$photo_name,
        // ]);

//         $user = new User;
//         $user->username =$data['username'];
//         $user->name     =$data['username'];
//         $user->password    =bcrypt($data['password']);
//         // $user->email    =$data['email'];
//         $user->phone    =$data['phone'];
//         $user->auth_complete     =1;
//         // $data->men      =request()->input('men');

//         $user->active   =0;
//         $user->code_verify =  rand(1,9).rand(2,7).rand(15,33).rand(32,66);
// //        $user->image    =request()->input('image');

//         if(isset($data['image'])) {
//             $photo = $data['image'];
//             $photo_name = 'uploads/'.time().'.'.$photo->getClientOriginalExtension();

//             $save = $photo->move(public_path('uploads'),$photo_name);
//             $user->image =$photo_name;
//         };
//         $user->city = $data['country'] ? null :null;
//          $user->city = $data['city'] ? null :null;

//         $user->save();
//         return $user;

   // dd($data);

    }

}