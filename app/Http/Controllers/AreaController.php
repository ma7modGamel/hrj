<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Area;
use DB;
class AreaController extends Controller
{
    public function index(Area $area){
        $num = 1;
        $areas = $area->all();
        return view('admin.areas.index', compact('areas','num'));
    }
    public function show($id){
        $num = 1;
        $areas = Area::all();
        return view('admin.areas.index', compact('areas','id','num'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:100',
        ],
        [
            'name.required' => 'الإسم مطلوب',
        ]);
        $data = [
            'parent_id' => $request->parent_id,
            'name' => $request->name,
        ];
        Area::create($data);
        if($request->parent_id == 0){
            return redirect('/admincp/areas')->withFlashMessage('تم اضافة الدولة بنجاح');
        }else{
            return redirect('/admincp/areas/'.$request->parent_id)->withFlashMessage('تم اضافة المنطقه بنجاح');
        }
    }
    public function edit($id){
        $areas = Area::findOrFail($id);
        return view('admin.areas.edit',compact('areas'));
    }
    public function update($id,Request $request){
        $this->validate($request, [
            'name' => 'required|max:100',
        ],
        [
            'name.required' => 'الإسم مطلوب',
        ]);
        $areasup = Area::findOrFail($id);
        $request_act = $request->all();
        $areasup->fill($request_act)->save();
        return redirect('/admincp/areas')->withFlashMessage('تم التعديل على المنطقه بنجاح');
    }

    public function test($text){
        $areas = DB::select('select * from areas where convert(name USING utf8) LIKE :sreachText', ['sreachText' => '%' . $text . '%']);
        dd($areas);
        return view('test',compact('areas'));
    }
    
        public function destroy($id)
    {
        $area = Area::find($id);
        if($area){
        $area->delete();
            return "done";
        }else{
            return "empty";
        }
    }
}
