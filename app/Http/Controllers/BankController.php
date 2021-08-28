<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bank;

class BankController extends Controller
{
    public function index()
    {
        $num = 1;
        $banks = Bank::all();
        return view('admin.banks.index',compact('banks','num'));
    }

    public function store(Request $request,Bank $bank)
    {
        $this->validate($request, [
            'name' => 'required',
            'u_name' => 'required',
            'acc_num' => 'required',
            'iban' => 'required',
        ],[
            'name.required' => 'إسم البنك مطلوب',
            'u_name.required' => 'إسم الحساب مطلوب',
            'acc_num.required' => 'رقم الحساب مطلوب',
            'iban.required' => 'الإيبان مطلوب',
        ]);
        $bank->create([
            'name' => $request->name,
            'u_name' => $request->u_name,
            'acc_num' => $request->acc_num,
            'iban' => $request->iban,
        ]);
        return back()->withFlashMessage('تم إضافة البنك بنجاح');
    }

    public function edit($id)
    {
        $bank = Bank::find($id);
        return view('admin.banks.edit',compact('bank'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'u_name' => 'required',
            'acc_num' => 'required',
            'iban' => 'required',
        ],[
            'name.required' => 'إسم البنك مطلوب',
            'u_name.required' => 'إسم الحساب مطلوب',
            'acc_num.required' => 'رقم الحساب مطلوب',
            'iban.required' => 'الإيبان مطلوب',
        ]);
        $bank = Bank::find($id);
        $bank->fill($request->all())->save();
        return redirect('/admincp/banks')->withFlashMessage('تم تعديل البنك بنجاح');

    }

    public function destroy($id)
    {
        $bank = Bank::find($id)->delete();
        if(Bank::count()){
            return "done";
        }else{
            return "empty";
        }
    }
}
