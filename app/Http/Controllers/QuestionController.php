<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $num = 1;
        $questions = Question::all();
        return view('admin.questions.index',compact('questions','num'));
    }

    public function store(Request $request,Question $question)
    {
        $this->validate($request, [
            'ask' => 'required',
            'answer' => 'required',
        ],[
            'name.required' => 'السؤال مطلوب',
            'u_name.required' => 'الإجابة مطلوبه',
        ]);
        $question->create([
            'ask' => $request->ask,
            'answer' => $request->answer,

        ]);
        return back()->withFlashMessage('تم إضافة السؤال بنجاح');
    }

    public function edit($id)
    {
        $question = Question::find($id);
        return view('admin.questions.edit',compact('question'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ask' => 'required',
            'answer' => 'required',
        ],[
            'name.required' => 'إسم السؤال مطلوب',
            'u_name.required' => 'الإجابة مطلوبه',
        ]);
        $question = Question::find($id);
        $question->fill($request->all())->save();
        return redirect('/admincp/questions')->withFlashMessage('تم تعديل السؤال بنجاح');

    }

    public function destroy($id)
    {
        $question = Question::find($id)->delete();
        if(Question::count()){
            return "done";
        }else{
            return "empty";
        }
    }
}
