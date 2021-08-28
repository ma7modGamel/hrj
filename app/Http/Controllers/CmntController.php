<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cmnt;

class CmntController extends Controller 
{
  function index(){
      $cmnts = Cmnt::paginate(200);
      $num = 1;
      return view('admin.posts.cmnts',compact('num','cmnts'));
  }

  function show($id){
      $cmntView = Cmnt::findOrFail($id);
      if($cmntView){
        return $cmntView;
      }else{
        return 'error';
      }
  }

  function activeAllCmnts(){
    Cmnt::where('active',0)->update(['active'=>1]); 
    return back()->withFlashMessage('تم تفعيل كل التعليقات بنجاح');
  }

  function activeCmnt($id){
      $cmnt = Cmnt::find($id)->update(['active'=>1]);
      return back()->withFlashMessage('تم تفعيل التعليق بنجاح');
  }

  function destroy($id){
      
    $cmnt = Cmnt::find($id)->delete();
    if(!$cmnt){
      return "error";
    }
    if(Cmnt::count()){
      return "done";
    }else{
      return "empty";
    }
  }
  function delete($id){
      
    $cmnt = Cmnt::find($id)->delete();
    if(!$cmnt){
      return back()->withFlashMessage('تم بنجاح');
    }
    if(Cmnt::count()){
      return back()->withFlashMessage('تم  الحذف بنجاح');
    }else{
      return back()->withFlashMessage('تم بنجاح');
    }
  }
}