@extends('layouts.app')

@section('header')

@endsection

@section('content')
<div class="singleContent">
    <h1>اتصل بنا</h1>
    <form action="{{url('contact')}}" method="POST" enctype="multipart/form-data" style="border: 1px solid #eee;">
        {{ csrf_field() }}
        <table class="table  tableMsg table-borderedAds tableextra">
            <tbody>
                @if(Auth::guest())
                <tr>
                    <td width="15%">
                        البريد الإلكتروني
                    </td>
                    <td align="right">
                        <input id="email" type="email" name="email" maxlength="60" value="{{ old('email') }}" class="form-control" required="">
                        <input type="hidden" name="type" value="1">
                        <br> تأكد من صحة بريدك الإلكتروني حتى يتم الرد عليك
                        <br>
                        @if($errors->has('email'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('email')}}</span> 
                        @endif
                    </td>
                </tr>
                @endif
                <tr>
                    <td width="15%">سبب الإتصال</td>
                    <td align="right">
                        <input type="text" name="subject" size="25" class="form-control" value="{{ old('subject') }}">
                        @if($errors->has('subject'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('subject')}}</span> 
                        @endif
                    </td>
                </tr>
                @if(Auth::guest())
                <tr>
                    <td width="15%" style="height: 29px">رقم التحقق :</td>
                    <td>
                        <input type="text" id="verif" name="verif" size="25" value="" class="form-control">
                        <img src="https://www.haraj.com.sa/verificationimage.php?&lt;?php echo rand(0,9999);?&gt;" alt="أكتب الرقم الموجود في الصوره بالحقل المخصص" width="50" height="24" align="absbottom">
                        <span class="label label-danger"> أكتب الرقم الموجود في الصوره بالحقل المخصص.</span>
                    </td>
                </tr>
                @endif
                <tr>
                    <td>نص الرساله
                        <br>
                    </td>
                    <td>
                        <textarea name="body" cols="6" rows="5" id="body" class="form-control"></textarea>
                        @if($errors->has('body'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('body')}}</span> 
                        @endif
                    </td>
                </tr>
                @if(Auth::guest())
                <tr>
                    <td width="15%">
                        رقم جوالك
                        <br>المرتبط بعضويتك
                    </td>
                    <td align="right">
                        <input type="text" pattern="[0-9]*" name="phone" size="15" maxlength="15" class="form-control" value="{{ old('phone') }}" required="">
                        @if($errors->has('phone'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('phone')}}</span> 
                        @endif
                    </td>
                </tr>
                @endif
                @if(Auth::check())
                <input type="hidden" name="type" value="1">
                <input type="hidden" name="name" value="{{Auth::user()->name}}">
                <input type="hidden" name="email" value="{{Auth::user()->email}}">
                <input type="hidden" name="phone" value="{{Auth::user()->phone}}">
                @endif
                <tr>
                    <td class="row4" colspan="2">
                        @if(Auth::guest())
                        <div class="alert alert-warn">
                            اذا كانت لديك عضوية، نرجو مراسلتنا بعد تسجيل الدخول حتى نرد على رسالتك.
                        </div>
                        @else
                        <div class="alert alert-warn">
                            نرجو المراسلة في حالة الضرورة. نعتذر عن الرد على جميع الرسائل.
                        </div>
                        @endif
                        <input class="btn btn-primary" name="submit" type="submit" value="إرســـال">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection

<!-- footer -->
@section('footer')

@endsection

