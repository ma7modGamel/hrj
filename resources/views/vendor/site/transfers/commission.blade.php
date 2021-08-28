@extends('layouts.app')

@section('header')
@endsection
@section('title')
عمولة سوق الدولى
@endsection
@inject('page','\App\Page')

@section('content')
<div class="singleContent calc">
    @if(isset($_GET['plan']) == 1)
    {!! $page->where('pLink','commissionUpPlan1')->first()->content !!}
    @elseif(isset($_GET['plan'])  == 2)
    {!! $page->where('pLink','commissionUpPlan2')->first()->content !!}
    @else

    {!! $page->where('pLink','commissionUp')->first()->content !!}
    <br />
    <h3 class="green">حساب العمولة</h3>
    <form class="form-inline">
        <p><b>حساب قيمة العمولة:</b> إذا تم بيع السلعة بسعر
            <input type="text" class="form-control formcommission" size="8" maxlength="10" onkeyup="funCalCommission(this);" /> جنيه فأن العمولة هي:
            <span class="label label-primary" id="cmshnVal"> 0</span> جنيه
        </p>
    </form>
    <br />
    <br />
    <h3 class="green">دفع العموله</h3>
    <h3 class="green">الطريقة الأولى</h3> يمكنك استخدام التحويل البنكي لدفع العموله عن طريق إرسال حواله إلى حساباتنا في البنوك المحليه.
    <hr /> @foreach(\App\Bank::all() as $bank)
    <b>{{$bank->name}}</b>
    <br />
    <span class="black">{{$bank->u_name}}</span>
    <br />
    <b>رقم الحساب </b><span class="blue">{{$bank->acc_num}}</span>
    <br />
    <b>الايبان </b> {{$bank->iban}}
    <br />
    <hr /> @endforeach
    <br /> بعد إرسال المبلغ،يجب مراسلتنا عبر النموذج التالي لأجل تسجيل العمولة بأسم عضويتك ثم الحصول على مميزات الموقع الخاصة بالعملاء:
    @endif
    @if(Auth::check())
    <div class="col-md-11 col-md-offset-1 form_calc">
        <form action="{{url('tranStore')}}" method="post" onsubmit="return formValidate(this);">
            {{ csrf_field() }}
            <table class="table  tableMsg table-borderedAds tableextra">
                <tr>
                    @if(isset($_GET['plan']))
                    <th colspan="4">
                        نموذج تحويل الإشتراك
                    </th>
                    @else
                    <th colspan="4">
                        نموذج تحويل العمولة
                    </th>
                    @endif
                </tr>
                @if(isset($_GET['plan']))
                <tr>
                    <td>
                        <br />
                        <input class="form-control" type="text" placeholder="رقم الجوال" name="phone" size="20" maxlength="60" value="{{Auth::user()->phone}}" />
                        @if($errors->has('phone'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('phone')}}</span> 
                        @endif
                    </td>
                </tr>
                @endif
                <tr>
                    <td>أسم المستخدم :
                        <br />
                        <input class="form-control" type="text" name="username" size="20" maxlength="60" value="{{Auth::user() ? Auth::user()->name : 'Guest'}}" />
                        <input class="hidden" name="user_id" value="{{Auth::user() ? Auth::user()->id : 0}}" />
                        <input class="hidden" name="type" value="{{isset($_GET['plan']) ? $_GET['plan'] == 1 ? 2 : 3 : 1}}" /> 
                        @if($errors->has('username'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('username')}}</span> 
                        @endif
                    </td>
                </tr>
                <tr>
                    @if(isset($_GET['plan']))                    
                    <td>
                    @else
                    <td>مبلغ العمولة :
                    @endif
                        <br />
                        <input class="form-control" type="text" placeholder="{{isset($_GET['plan']) ? 'مبلغ الإشتراك' : 'مبلغ العمولة'}}" size="20" maxlength="60" name="amount" /> 
                        @if($errors->has('amount'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('amount')}}</span> 
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>البنك الذي تم التحويل إليه :
                        <br />
                        <select class="form-control" id="bank_id" name="bank_id">
                            <option value="">أختر أسم البنك</option>
                            @foreach(\App\Bank::all() as $bank)
                            <option value="{{$bank->id}}">{{$bank->name}}</option>
                            @endforeach
                            <option value="0">بنك آخر</option>
                        </select>
                        @if($errors->has('bank_id'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('bank_id')}}</span> 
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>متى تم التحويل؟ :
                        <br />
                        <select class="form-control" name="date">
                            @foreach(transferDate() as $val => $trans)
                            <option value="{{$val}}">{{$trans}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('date'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('date')}}</span> 
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>أسم المحول :
                        <br />
                        <input class="form-control" type="text" size="20" maxlength="60" name="name" /> 
                        @if($errors->has('name'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('name')}}</span> 
                        @endif
                    </td>
                </tr>
                @if(!isset($_GET['plan']))
                <tr>
                    <td>رقم الإعلان :
                        <br />
                        <input class="form-control" type="text" size="20" maxlength="60" name="post_id" /> 
                        @if($errors->has('post_id'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('post_id')}}</span> 
                        @endif
                        <br />
                        <span class="label label-primary" style=" background-color: #d9edf7; color: #212121">نرجو حذف الإعلان بعد الإنتهاء منه.</span>
                    </td>
                </tr>
                @endif
                <tr>
                    <td>ملاحظات
                        <br />
                        <textarea cols="6" rows="5" class="form-control" name="notes"></textarea>
                        @if($errors->has('notes'))
                        <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('notes')}}</span> 
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>&nbsp; نرجو الحرص على أن تكون معلومات التحويل صحيحة ودقيقه
                        <br />
                        <br />
                        <input class="btn btn-primary" name="submit" type="submit" value="إرســـال" style="width:50%" /> 
                    </td>
                </tr>
            </table>
        </form>
    </div>
    @else
    <div class="alert alert-info">يجب عليك <a href="{{url('login')}}" style="color: #19516d">تسجيل الدخول</a> ليتم تحويل العمولة من حسابك بالموقع وذلك لضمان حقك .</div>
    @endif
</div>
@endsection
@section('footer')

<script type="text/javascript">
    
function funCalCommission(cmshn){
    $('#cmshnVal').empty();
    var siteCmshn = "{{getSettings('cmshn')}}";
    var a = $(cmshn).val(),
        r = a * (siteCmshn / 100);
    if (a === "") {
        $('#cmshnVal').append("فضلا تحديد المبلغ");
    } else if (isNaN(a)) {
        $('#cmshnVal').append("يرجى إدخال رقم صحيح");
    } else if (a <= 20) {
        $('#cmshnVal').append("0");
    } else {
        $('#cmshnVal').append(r);
    }
}

function formValidate(form){
    var done = true;
    if($('#bank_id').val() == ''){
        alert('فضلا حدد البنك المحول منه');
        $('#bank_id').focus();
        return done = false;
    }
    return done;
}

</script>

@endsection







