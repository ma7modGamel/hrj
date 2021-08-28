<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use App\Commission;
use Illuminate\Support\Facades\Storage;

class CommissionController extends Controller 
{
    public function index(){
        $num = 1;
        $commissions = Commission::all();
        return view('admin.commission.index', compact('commissions','num'));
    }
 
 
    public function store(Request $request){
            return $request->all();

        $this->validate($request, [
            'category_id' => 'required|max:100',
            'commission' => 'required|max:100',
        ],
        [
            'commission.required' => 'العمولة مطلوبة ',
            'commission.required' => 'القسم مطلوب  ',
        ]);
        
        
          $data = [
                'category_id' => $request->category_id ,
                'commission' => $request->commission,
            ];
        
        
        Commission::create($data);
        if($request->parent_id == 0){
            return redirect('/admincp/commission')->withFlashMessage('تم اضافة العمولة بنجاح');
        }else{
            return redirect('/admincp/commission/'.$request->parent_id)->withFlashMessage('تم اضافة العمولة بنجاح');
        }
    }
    public function edit($id){
        $commission = Commission::findOrFail($id);
     // echo dd($cats->parent_id);
        return view('admin.commission.edit',compact('commission'));
    }
    public function update($id,Request $request){

     $this->validate($request, [
            'category_id' => 'required|max:100',
            'commission' => 'required|max:100',
        ],
        [
            'commission.required' => 'العمولة مطلوبة ',
            'commission.required' => 'القسم مطلوب  ',
        ]);
        $commission = Commission::findOrFail($id);
        $commission->commission = $request->commission;
        $commission->category_id = $request->category_id;
$commission->update();
                  return redirect('/admincp/commission')->withFlashMessage('تم التعديل على العمولة بنجاح');

        
    }
    
            public function destroy($id)
    {
        if(Commission::findOrFail($id)->delete()){
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