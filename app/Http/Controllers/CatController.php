<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller 
{
    public function index(){
        $num = 1;
        $cats = Cat::all();
        return view('admin.cats.index', compact('cats','num'));
    }
    public function show($id){
        $num = 1;
        $cats = Cat::all();
        return view('admin.cats.index', compact('cats','id','num'));
    }

    public function store(Request $request){
            // return $request->all();

        $this->validate($request, [
            'name' => 'required|max:100',
        ],
        [
            'name.required' => 'اسم القسم مطلوب',
        ]);
 if (request()->file('image')) {
     $license_img=$request['image'];
            $file_name     = 'image'.   rand(1, 15). rand(155, 200) . rand(25, 55). '.png';

              	                    $license_img->move(base_path('/public/cats/'), $file_name);

            $data = [
                'parent_id' => $request->parent_id ? $request->parent_id : null,
                'name' => $request->name,
                'logo' => $file_name
            ];
        
        }else{
            $data = [
                'parent_id' => $request->parent_id ? $request->parent_id : null,
                'name' => $request->name,
                'icon' => $request->icon,
            ];
        }
        Cat::create($data);
        if($request->parent_id == 0){
            return redirect('/admincp/cats')->withFlashMessage('تم اضافة القسم بنجاح');
        }else{
            return redirect('/admincp/cats/'.$request->parent_id)->withFlashMessage('تم اضافة القسم بنجاح');
        }
    }
    public function edit($id){
        $cats = Cat::findOrFail($id);
     // echo dd($cats->parent_id);
        return view('admin.cats.edit',compact('cats'));
    }
    public function update($id,Request $request){
        $this->validate($request,[
            'name' => 'required|max:100',
        ],
        [
            'name.required' => 'اسم القسم مطلوب',
        ]);
        $catsup = Cat::findOrFail($id);
        $catsup->name = $request->name;
        $catsup->parent_id = $request->parent_id;
        $catsup->icon = $request->icon;

      
      	          if($request->hasFile('image')) 
                    {
                     $license_img=$request['image'];
  	                  if($license_img)
  	                  {
  	                    $img_name ='cat_img'.rand(0,999). '.' . $license_img->getClientOriginalExtension();
  	                    $license_img->move(base_path('/public/cats/'), $img_name);
  	                    //$avatar = $img_name;
                         $catsup->logo =  $img_name; 
  	                  }
                    }
                    
        if($catsup->update()){
            if($request->parent_id == 0){
                  return redirect('/admincp/cats')->withFlashMessage('تم التعديل على القسم بنجاح');
            }else{
                  return redirect('/admincp/cats/'.$request->parent_id)->withFlashMessage('تم التعديل على القسم بنجاح');
            }
        }
       
        
    }
    
            public function destroy($id)
    {
        if(Cat::findOrFail($id)->delete()){
        return redirect()->back()->withFlashMessage('تم الحذف بنجاح');
        }else{
        return redirect()->back()->withFlashMessage('تم الحذف بنجاح');
        }
    }
    
    public function getIndexCatAjaX($parent_id){
        $cats = Cat::where('parent_id',$parent_id)->get();
        $view = view('site.ajaxData.getIndexCatAjaX',compact('cats'))->render();
        return response()->json(['html'=>$view]);
    }

}