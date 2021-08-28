<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Mail;
use App\Transfer;

class TransferController extends Controller
{
	public function index(){

		$transfers = Transfer::orderBy('created_at','desc')->orderBy('active','desc')->get();
		$num = 1;
		// dd($transfers[0]['attributes']['type']);
		return view('admin.transfers.index',compact('transfers','num'));
	}

	public function show($id){

		$transfer = Transfer::find($id);
		Transfer::where('id',$id)->update(['active' => 0]);
		return view('admin.transfers.viewMsg',compact('transfer'));
	}

	public function replay(Request $request){
		$this->validate($request, [
			'email'              => 'required',
			'body'               => 'required',
			],[
			'email.required'     => 'البريد الاكترونى مطلوب',
			'body.required'      => 'أكتب النص مطلوب',
			]);

		Mail::send('mails.transferReplay', ['request' => $request], function ($m) use ($request) {
            $m->to($request->email)->subject(getSettings('SiteName'));
		});

		return back()->withFlashMessage('تم الارسال بنجاح');
	}

	public function commission (Request $r){
		if($r->plan){
			if(Auth()->guest()){
				return redirect()->guest('/login');
			}
			return view('site.transfers.commission');
		}
		return view('site.transfers.commission');
	}

	public function store(Request $request,Transfer $transfer){
		$this->validate($request, [
			'username'         	=> 'required',
			'bank_id'          	=> 'required',
			'post_id'          	=> $request->type != 1 ? '' : 'required|integer',
			'phone'          	=> $request->type != 1 ? 'required' : '',
			'amount'           	=> 'required|integer',
			'date'           	=> 'required',
			'name'           	=> 'required',
			'notes'           	=> 'required',
			],[
			'username.required'	=> 'اسم المستخدم مطلوب',
			'bank_id.required'  => 'اسم البنك مطلوب',
			'post_id.required'  => 'رقم الإعلان مطلوب',
			'post_id.required'  => 'رقم الهاتف مطلوب',
			'post_id.integer'  	=> 'رقم الإعلان لابد أن يكون رقم',
			'amount.required'   => 'المبلغ مطلوب',
			'amount.integer'   	=> 'المبلغ يجب أن يكون أرقام فقط',
			'date.required'     => 'التاريخ مطلوب',
			'name.required'  	=> 'إسم المحول الموضوع',
			'notes.required'    => 'الملاحظات مطلوبه',
			]);

		isset($request->user_id) ? $user_id = $request->user_id : $user_id = 0;

		$newTransfer = Transfer::create([
			'user_id' 	=> $user_id,
			'bank_id'  	=> $request->bank_id,
			'post_id' 	=> $request->post_id ? $request->post_id : 0,
			'phone' 	=> $request->phone ? $request->phone : 0,
			'amount' 	=> $request->amount,
			'type' 		=> $request->type,
			'date'  	=> $request->date,
			'name' 		=> $request->name,
			'notes'    	=> $request->notes,
			'done'  	=> 0,
			'active'  	=> 1,
			]);
		return redirect()->back()->withFlashMessage('تـم الإرسال بنجاح : و رقم التحويل - '.$newTransfer->id);
	}
	public function destroy($id){
		$msg = Transfer::find($id)->delete();
		if(!$msg){
			return "error";
		}
		if(Transfer::count()){
			return "done";
		}else{
			return "empty";
		}
	}

	public function transfersDone (Request $r){
		$trans = Transfer::findOrFail($r->transId);
		if($trans->done == 0){
			if($trans->update(['done' => 1])){
				return 'done';
			}
		}else{
			if($trans->update(['done' => 0])){
				return 'notDone';
			}
		}
		return 'error';
	}

	public function countDoneTrans(){
        $allTrans = Transfer::where('done',1)->where('type',1)->get()->sum(function($allTrans) {
            return $allTrans->amount;
        });
        return $allTrans;
	}


}
