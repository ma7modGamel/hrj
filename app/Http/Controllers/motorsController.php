<?php

namespace App\Http\Controllers;
use App\Motor;

class motorsController extends Controller
{
    public function index()
    {
        $motors = Motor::all();
    return view('admin.motors.page',compact('motors'));
    }

    public function create()
    {

        return view('admin.motors.create');
    }


    public function store()
    {
        $this->validate(request(),[
            'name'=>'required',
            'descrption'=>'required',
            'number'    =>'required',
             'type'     =>'required',
             'place'    =>  'required',
             'image_car'    =>  'required',
        ],[],[
            'name'  =>  'اسم المعرض يجب كتابته',
            'descrption'  =>  'وصف المعرض يجب كتابته',
            'number'  =>  ' عدد السيارات المتاحه يجب كتابته',
            'type'  =>  ' حاله السيارة يجب كتابته',
            'place'  =>  ' المكان يجب كتابته',
            'image_car'  =>  'صورة المعرض  يجب وضعها',
        ]);

        $add = new Motor();
        $add->name = request()->input('name');
        $add->descrption = request()->input('descrption');
        $add->number_cars = request()->input('number');
        $add->type = request()->input('type');
        $add->variableCity = request()->input('place');

        if (request()->hasFile('image_car'))
        {
            $file = request()->file('image_car');
            $destination_path = public_path().'/upload/motors/';
            $files = $file->getClientOriginalName();
            $extention = $file->getClientOriginalExtension();
            $filename = $files . '_' . time() . '.' .$extention;
            $file->move($destination_path,$filename);
            $add->image =$filename;
        }
        $add->save();
        session()->flash('success','تم اضافه المعرض بنجاح');
        return redirect()->route('motors-create');

    }

    public function edit($id)
    {
        $motors =\App\Motor::find($id);
        $value = ['value'=>$motors];
        return view('admin.motors.edit',$value);

    }


    public function update($id)
    {
        $this->validate(request(),[
            'name'=>'required',
            'descrption'=>'required',
            'number'    =>'required',
            'type'     =>'required',
            'place'    =>  'required',
            'image_car'    =>  'required',
        ],[],[
            'name'  =>  'اسم المعرض يجب كتابته',
            'descrption'  =>  'وصف المعرض يجب كتابته',
            'number'  =>  ' عدد السيارات المتاحه يجب كتابته',
            'type'  =>  ' حاله السيارة يجب كتابته',
            'place'  =>  ' المكان يجب كتابته',
            'image_car'  =>  'صورة المعرض  يجب وضعها',
        ]);
        $edit= Motor::find($id);
        $edit->name = request()->input('name');
        $edit->descrption = request()->input('descrption');
        $edit->number_cars = request()->input('number');
        $edit->type = request()->input('type');
        $edit->variableCity = request()->input('place');

        if (request()->hasFile('image_car'))
        {
            $file = request()->file('image_car');
            $destination_path = public_path().'/upload/motors/';
            $files = $file->getClientOriginalName();
            $extention = $file->getClientOriginalExtension();
            $filename = $files . '_' . time() . '.' .$extention;
            $file->move($destination_path,$filename);
            $edit->image =$filename;
        }
        $edit->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        $delete = Motor::find($id);
    }

}

?>