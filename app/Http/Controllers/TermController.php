<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Term;

class TermController extends Controller
{
    public function index(){
        $terms = Term::all();
        $num = 1;
        return view('admin.terms.index',compact('terms','num'));
    }
    
    public function show(){

    }
    
    public function create(){
        $terms = Term::all();
        return view('admin.terms.add',compact('terms'));
    }
    
    public function store(Request $request,Term $term){
            $this->validate($request,[
            'title'             => 'required|max:100',  
            'content'           => 'required',  
        ],[
            'title.required'    => 'إسم الإتفاقية مطلوب',  
            'title.max'         => 'لا يجب أن يزيد إسم الإتفاقية عن 100 حرف',  
            'content.required'  => 'المحتوى مطلوب',  
        ]);
        $active = $request->active;
        $data = [
            'title'     => $request->title,
            'content'   => $request->content,
            'active'    => $active,
            ];
        $term->create($data);
        return redirect('admincp/terms')->withFlashMessage('تمت إضافة الإتفاقية بنجاح');
    }
    public function edit($id){
        $term = Term::find($id);
        return view('admin.terms.edit',compact('term'));
    }
    public function update($id,Request $request){
        $term = Term::find($id);
        $this->validate($request,[
            'title'             => 'required|max:100',  
            'content'           => 'required',  
        ],[
            'title.required'    => 'إسم الإتفاقية مطلوب',  
            'title.max'         => 'لا يجب أن يزيد إسم الإتفاقية عن 100 حرف',  
            'content.required'  => 'المحتوى مطلوب',  
        ]);
        $active = $request->active;
        $term->fill(['active' => $active])->save();
        $term->fill(array_except($request->all(),['active']) )->save();
        return redirect('admincp/terms')->withFlashMessage('تم تعديل البند بنجاح');
    }
    
    public function destroy(Term $term){
        $term->delete();
        return redirect()->back()->withFlashMessage('تم حذف البند بنجاح');
    }
    
    public function activate(Request $request, $id, $active){
         $terms = Term::findOrFail($id);
         $terms->update(['active' => $active]);
         return Redirect('admincp/terms')->withFlashMessage('تم تعديل حاله بند الاتفاقية بنجاح');
    }


}
