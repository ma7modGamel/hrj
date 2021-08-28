<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Page;

class PageController extends Controller
{
    public function index(){
        $pages = Page::all();
        $num = 1;
        return view('admin.pages.index',compact('pages','num'));
    }
    public function show($link){
        $pages = Page::where('pLink',$link)->get();
        return view('site.pages.index',compact('pages'));
    }
    public function create(){
        $pages = Page::all();
        return view('admin.pages.add',compact('pages'));
    }
    public function store(Request $request,Page $page){
        $this->validate($request,[
            'pName'             => 'required|max:100',  
            'pLink'             => 'required|max:100|unique:pages', 
            'content'           => 'required',  
        ],[
            'pName.required'    => 'إسم الصفحة مطلوب',  
            'pName.max'         => 'لا يجب أن يزيد إسم الصفحة عن 100 حرف',  
            'pLink.required'    => 'رابط الصفحة مطلوب', 
            'pLink.max'         => 'لا يجب أن يزيد إسم الصفحة عن 100 حرف',  
            'pLink.unique'      => 'رابط الصفحة مسجل مسبقا', 
            'Content.required'  => 'المحتوى مطلوب',  
        ]);

        $request->active == "" ? $active = 0 : $active = 1;
        $data = [
            'type'      => $request->type,
            'pName'     => $request->pName,
            'pLink'     => $request->pLink,
            'content'   => $request->content,
            'active'    => $active,
            ];
        $page->create($data);
        return redirect('admincp/pages')->withFlashMessage('تمت إضافة الصفحة بنجاح');
    }
    public function edit($id){
        $page = Page::find($id);
        return view('admin.pages.edit',compact('page'));
    }
    public function update($id,Request $request){
        $pageup = Page::find($id);
        $this->validate($request,[
            'type'              => 'required',  
            'pName'             => 'required|max:100',  
            'pLink'             => 'required|max:100|unique:pages,pLink,' . $pageup->id,
            'content'           => 'required',  
        ],[
            'type.required'     => 'مكان الصفحة مطلوب', 
            'pName.required'    => 'إسم الصفحة مطلوب',  
            'pName.max'         => 'لا يجب أن يزيد إسم الصفحة عن 100 حرف',  
            'pLink.required'    => 'رابط الصفحة مطلوب', 
            'pLink.max'         => 'لا يجب أن يزيد إسم الصفحة عن 100 حرف',  
            'pLink.unique'      => 'رابط الصفحة مسجل مسبقا', 
            'arContent.required'=> 'المحتوى مطلوب',  
        ]);

        $request->active == NULL ? $active = 0 : $active = 1;
        $pageup->fill(['active' => $active])->save();
        $pageup->fill(array_except($request->all(),['active']) )->save();
        return redirect()->back()->withFlashMessage('تم تعديل الصفحة بنجاح');
    }
    public function destroy($id){
        $page = Page::find($id);
        if($page->type == 1){
            session()->flash('error_flash_message','عذرا لا يمكنك حذف صفحة رئسيية');
            return back();
        }
        $page->delete();
        return redirect()->back()->withFlashMessage('تم حذف الصفحة بنجاح');
    }
    public function activate(Request $request, $id, $active){
         $pages = Page::findOrFail($id);
         $pages->update(['active' => $active]);
         return Redirect('admincp/pages')->withFlashMessage('تم تعديل حاله الصفحة بنجاح');
    }

}
