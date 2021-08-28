<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Message;
use App\User;

use Notification;
use App\Notifications\newMsgNotif;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::withTrashed()->orderBy('id', 'desc')->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function show($id)
    {
        $messages = Message::withTrashed()->where('id',$id)->first();
        return $messages;
    }

    public function convsViews()
    {
        $messagesFrom = Message::where('user_to', Auth()->user()->id)->get();

        $selected_id = Message::select('user_id')->where('user_to', Auth()->user()->id)->get()->toArray();

        $messagesTo = Message::where('user_id', Auth()->user()->id)->whereNotIn('user_to', $selected_id)->get();

        return view('site.messages.index', compact('messagesFrom', 'messagesTo'));
    }

    public function showConv(Request $request, $user_id, $user_to){

        if (!count(\App\User::where('id', $user_to)->withTrashed()->get())) {
            session()->flash('error_flash_message', 'مستخدم غير موجود');
            return  'مستخدم غير موجود';
        }

        if (Auth()->user()->id != $user_id) {
            if (Auth()->user()->type != 0) {
                session()->flash('error_flash_message', 'لا يمكنك الوصول لهذه الصفحة');
                return  'لا يمكنك الوصول لهذه الصفحة';
            }
        }

        if ($user_to == $user_id && in_array('admincp', Request()->segments())) {
            if (Auth()->user()->type != 0) {
                session()->flash('error_flash_message', 'لا يمكنك الوصول لهذه الصفحة');
                return  'لا يمكنك الوصول لهذه الصفحة';
            }
        }

        $messages = Message::where(function($q) use($user_id,$user_to){
            $q->where('user_id',$user_id);
            $q->where('user_to',$user_id);
        })->orWhere(function($q) use($user_id,$user_to){
            $q->where('user_to',$user_to);
            $q->where('user_id',$user_to);
        })->latest()->orderBy('created_at', 'asc')->get();


        $view = view('admin.messages.conv', compact('messages', 'user_id', 'user_to'))->render();
        return response()->json(['html' => $view]);
    }

    function inbox(Request $r){
        $user = Auth()->user();

        // Message::where('user_to', $user->id)->update(['status' => 0]);
        $messages = Message::where('user_to', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        if($r->ajax()){
            $view = view('site.messages.loadMore',compact('messages'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('site.messages.inbox', compact('messages'));
    }

    function outbox(Request $r){
        $user = Auth()->user();

        // Message::where('user_id', $user->id)->update(['status' => 0]);
        $messages = Message::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        if($r->ajax()){
            $view = view('site.messages.loadMore',compact('messages'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('site.messages.outbox', compact('messages'));
    }

    function userconv ($id,Request $r){

        $user_to = User::findOrFail($id);
        $user = Auth()->user();
        $num = 1;

        Message::where('user_id', $user_to->id)->where('user_to',$user->id)->update(['status' => 0]);

        $messages = Message::where(function($q) use($user,$user_to){
            $q->where('user_id',$user->id);
            $q->where('user_to',$user_to->id);
        })->orWhere(function($q) use($user,$user_to){
            $q->where('user_to',$user->id);
            $q->where('user_id',$user_to->id);
        })->orderBy('created_at', 'asc')->get();
        return view('site.messages.conv', compact('messages','num','id'));
    }

    public function sendMsg(Request $request,$user_to){
        $user_id = Auth()->user()->id;
        if(isset($request->ad_Id)){
            return view('site.messages.send',[
                                                'adId'=>$request->ad_id,
                                                'user_id'=>$user_id,
                                                'user_to'=>$user_to
                                            ]);
        }
        if($request->isMethod('get')){
            return view('site.messages.send',[
                                                'user_id'=>$user_id,
                                                'user_to'=>$user_to
                                            ]);
        }
        if ($request->body == '') {
            $msgBody = " ";
        } else {
            $msgBody = $request->body;
        }
        $newMsg = Message::create([
            'user_id' => $user_id,
            'user_to' => $request->user_to,
            'body' => $msgBody,
            'status' => 1
        ]);
        if ($request->ajax()) {
            if($user = \App\User::where('id',$request->user_to)->where('notf','0,1,0')->get()){
                Notification::send($user,new newMsgNotif($newMsg));
            }
            $view = view('site.messages.loadMoreConv',compact('newMsg'))->render();
            $viewFrom = view('site.messages.loadMoreConvFrom',compact('newMsg'))->render();
            pusherFun('Messages','msgSend'.$user_id.'msgReceive'.$user_to,['html'=>$viewFrom]);
            
            return response()->json(['html'=>$view,'data'=>'done']);
        }
        return 'error';
    }

    public function destroy($id)
    {
        if(Message::findOrFail($id)->delete()){
            return 'hide';
        }else{
            return 'error';
        }
    }

    public function delMsg (Request $r){
        if(Message::whereIn('id',$r->msg)->delete()){
            return 'hide';
        }else{
            return 'error';
        }
    }

    public function restoree($id)
    {
        $message = Message::where('id', $id);
        if($message->restore()){
            return 'restore';
        }else{
            return 'error';
        }
    }

    public function forceDel($id)
    {
        $message = Message::where('id', $id);
        $message->forceDelete();
        if(Message::withTrashed()->count() < 1){
            return 'empty';
        }
        return '';
    }

}
