<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Mail;
use App\Rating;
use App\User;

class RatingController extends Controller 
{

  public function index(){
    $ratings = Rating::orderBy('id','desc')->get();
    $num = 1;
    return view('admin.ratings.index',compact('ratings','num'));
  }

  public function show($id)
  {
    $rating = Rating::findOrFail($id);
    return $rating;
  }


  public function create($id){
    $user = Auth()->user();
    if($user->id == $id){
      Session()->flash('error_flash_message','عذرا لا يمكنك تقييم نفسك');
      return back();
    }
    $uRate= User::findOrFail($id);
    return view('site.ratings.add',['userId'=>$user->id,'rateId'=>$uRate->id]);
  }

  public function store(Request $r){

    Rating::create([
      'type'     => $r->type,
      'post_id'  => $r->post_id,
      'buy_date' => $r->buy_date,
      'content'     => $r->body,
      'user_id'  => $r->user_id,
      'rate_id'  => $r->rate_id
    ]);
    Session()->flash('ratingSend',true);
    return back();
  }

  function destroy($id){
    $msg = Rating::find($id)->delete();
    if(!$msg){
      return "error";
    }
    if(Rating::count()){
      return "done";
    }else{
      return "empty";
    }
  }
  
}