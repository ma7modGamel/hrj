@extends('layouts.app')
@section('header')
@endsection
@section('title')
عمولة حراج . إن
@endsection
@inject('page','\App\Page')

@section('content')

<body>

    <!--         @if(isset($_GET['plan']) == 1)
        {!! $page->where('pLink','commissionUpPlan1')->first()->content !!}
        @elseif(isset($_GET['plan']) == 2)
        {!! $page->where('pLink','commissionUpPlan2')->first()->content !!}
        @else

        {!! $page->where('pLink','commissionUp')->first()->content !!}


 -->

    <!-- عمولة الموقع -->
    <section class="container center-block">
        <div class="row">
            <div class="col-sm-7 promo">
                <h{{getSettings('cmshn')}} class="title"> عمولة الموقع {{getSettings('cmshn')}}%</h{{getSettings('cmshn')}}>
                <h4 class="title2">لقد تم تحديد عمولة الموقع وهي الأقل على مستوى المواقع الخدمية والتجارية وهي
                    ( {{getSettings('cmshn')}} ) ريال فقط في كل مائة ريال سعودي( 1%) . </h4>

                <h4 class="title3"><strong>مثال : </strong> لو تم بيع سلعة بمبلغ 1000 ريال سعودي فأن عمولة الموقع هي ( عشرة ريالات فقط ) .</h4>
                <div class="pay-btm">
                    <a href="#cal_wrapper" class="pric-button pricing-table__button">حساب العمولة</a>
                    <div class="payment">
                        <img src="{{asset('/public/upload/images/mada.png')}}">
                        <img src="{{asset('/public/upload/images/visa_master.png')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <img class="img-responsive" src="{{asset('/public/upload/images/حراج.png')}}" alt="عمولة-الموقع">
            </div>
        </div>
    </section>
    <!-- عمولة الموقع -->


    <!-- انواع العمولات -->
    <section class="container">
        <div class="pricing-table-wrapper ">
            <ul class="pricing-table">
<!--                <li class="pricing-table__item">-->
<!--                    <img src="{{asset('/public/upload/images/circus.svg')}}" alt="" class="pricing-table__img" />-->
<!--                    <h3 class="pricing-table__title">خدمات نقل الحيوانات</h3>-->
<!--                    <p class="pricing-table__description">-->
<!--                        <span class="pricing-table__price">{{getSettings('cmshn')}}%</span>-->
<!--                    </p>-->
<!--                    <ul class="pricing-table__products">-->
<!--                        <li class="pricing-table__product">-->
<!--<div>إذا تم نقل أي حيوان فالعمولة ما تم ذكرها سابقاً وهي ( {{getSettings('cmshn')}}% ) .                            </div>-->
<!--                        </li>-->
<!--                        <li class="pricing-table__product">-->
<!--<div>إذا كان الحيوان تم بيعه مع مجموعة وسطاء فأن الموقع يكون له نصيب مثل نصيب أي وسيط في العمولة ويعتبر هذا شرطاً ملزماً .                            </div>-->
<!--                        </li>-->

<!--                    </ul>-->
<!--                    <a href="" class="pricing-table__button">للإشتراك</a>-->
<!--                </li>-->
                <li class="pricing-table__item" style="display:none;">
                    <img src="{{asset('/public/upload/images/car.png')}}" alt="" class="pricing-table__img" />
                    <h3 class="pricing-table__title">العمولة في السيارات والشاحنات والمعدات الثقيلة</h3>
                    <p class="pricing-table__description">
                        <span class="pricing-table__price">1%</span>
                    </p>
                    <ul class="pricing-table__products">
                        <li class="pricing-table__product">
                            <div>({{getSettings('cmshn')}}%) تدفع عند بيعها .
                            </div>
                        </li>

                    </ul>
                    <a href="" class="pricing-table__button">للإشتراك</a>
                </li>
                <!--<li class="pricing-table__item">-->
                <!--    <img src="{{asset('/public/upload/images/free.png')}}" alt="" class="pricing-table__img" />-->
                <!--    <h3 class="pricing-table__title">العمولة المجانية</h3>-->
                <!--    <p class="pricing-table__description">-->
                <!--        <span class="pricing-table__price">مجانا</span>-->
                <!--    </p>-->
                <!--    <ul class="pricing-table__products">-->
                <!--        <li class="pricing-table__product">-->
                <!--            <div>أي سلعة أو خدمة تم بيعها عن طريق الموقع ولم يأخذ عليها مقابل مالي تكون مجاناً ليس عليها عمولة .-->
                <!--            </div>-->
                <!--        </li>-->
                <!--        <li class="pricing-table__product">-->
                <!--            <div>جميع الخدمات وبيع السلع للأسر المنتجة مجاناً بدون عمولة .-->
                <!--            </div>-->
                <!--        </li>-->
                <!--        <li class="pricing-table__product">-->
                <!--            <div>المشتركين في الباقة الذهبية ليس عليهم عمولة وقت مدة الإشتراك .-->
                <!--            </div>-->
                <!--        </li>-->

                <!--    </ul>-->
                <!--    <a href="" class="pricing-table__button">للإشتراك</a>-->
                <!--</li>-->
                <!--<li class="pricing-table__item">-->
                <!--    <img src="{{asset('/public/upload/images/on-demand.png')}}" alt="" class="pricing-table__img" />-->
                <!--    <h3 class="pricing-table__title">العمولة على الطلبات</h3>-->
                <!--    <p class="pricing-table__description">-->
                <!--        <span class="pricing-table__price">وقت الطلب</span>-->
                <!--    </p>-->
                <!--    <ul class="pricing-table__products">-->
                <!--        <li class="pricing-table__product">-->
                <!--            <div> تدفع متى ما وجد طلبه .-->
                <!--            </div>-->
                <!--        </li>-->

                <!--    </ul>-->
                <!--    <a href="" class="pricing-table__button">للإشتراك</a>-->
                <!--</li>-->
            </ul>
        </div>
    </section>

    <!-- انواع العمولات -->


    <!-- حساب العمولة -->
    <section class="container center-block commission">
        <div class="row">
            <div class="col-md-12">
                <h2 class="green" id="cal_wrapper">حساب العمولة</h2>
                <p class="form-inline">عمولتنا هي ({{getSettings('cmshn')}}%) فقط </p>
                <form class="form-inline com-form">
                    <div class="form-items">
                        <p>ادخل قيمة السلعه:</p>
                        <input placeholder="السعر" type="text" class="form-control formcommission " size="8" maxlength="10" onkeyup="funCalCommission(this);" /><br>
                    </div>
                    <div class="form-items">
                        <P> فإن العمولة هي:</P>
                        <span class=" result " id="cmshnVal"> 0 ريال</span>
                    </div>

                </form>
            </div>
    </section>
    <!-- حساب العمولة -->


    <!--  دفع العمولة  -->
    <section class="container">
        <div class="row">
            <div class="container">
                <h2 class="green">دفع العموله</h2>
                <h3 class="green fw-400">الطريقة الأولى</h3> يمكنك استخدام التحويل البنكي لدفع العموله عن طريق إرسال حواله إلى حساباتنا في البنوك المحليه.
                <hr />
            </div>
            <div class="banks">
                @foreach(\App\Bank::all() as $bank)
                <div class="col-sm-1 col-md-2 col-lg-4">
                    <div class="bank-item">
                    <img class=" col-md-12 img-responsive bank-img" src="{{asset('/public/upload/images/on-demand.png')}}" alt="...">
                    <div class=" col-md-12 bank-username">{{$bank->u_name}}</div>
                    <div class=" col-md-12 bank-n">رقم الحساب: </div>
                    <div class=" col-md-12 bank-num">{{$bank->acc_num}}</div>
                    <div class=" col-md-12 bank-n">الايبان:</div>
                    <div class=" col-md-12 bank-iban">{{$bank->iban}}</div>
                    <div class=" col-md-12 bank-name">{{$bank->name}}</div>
                </div></div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <!--  دفع العمولة  -->





    <!--  نموزج دفع العمولة  -->
    <section class="container">
        <div class="row">
            @if(Auth::check())
            <div class="col-md-12 col-md-offset-1 form_calc">
                <form class="form-pay" action="{{url('tranStore')}}" method="post" onsubmit="return formValidate(this);">
                    {{ csrf_field() }}
                    <table class="table tableMsg table-borderedAds tableextra">
                        <tr class="col-lg-12 text-center">
                            @if(isset($_GET['plan']))
                            <th colspan="4">
                                نموذج تحويل الإشتراك
                            </th>
                            @else
                            <th class="form-title" colspan="4">
                                نموذج تحويل العمولة
                            </th>
                        </tr>
                        <tr class="col-lg-12 text-center">
                            <th class="green">بعد إرسال المبلغ،يجب مراسلتنا عبر النموذج التالي لأجل تسجيل العمولة بأسم عضويتك ثم الحصول على مميزات الموقع الخاصة بالعملاء:</th>
                        </tr>
                        @endif
                        @if(isset($_GET['plan']))
                        <tr class="col-lg-6">
                            <td>
                                <input required class="form-control" type="text" placeholder="رقم الجوال" name="phone" size="20" maxlength="60" value="{{Auth::user()->phone}}" />
                                @if($errors->has('phone'))
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('phone')}}</span>
                                @endif
                            </td>
                        </tr>
                        @endif
                        <tr class="col-lg-6">
                            <td>أسم المستخدم :
                                <input  class="form-control" type="text" name="username" size="20" maxlength="60" value="{{Auth::user() ? Auth::user()->name : 'Guest'}}" />
                                <input class="hidden" name="user_id" value="{{Auth::user() ? Auth::user()->id : 0}}" />
                                <input class="hidden" name="type" value="{{isset($_GET['plan']) ? $_GET['plan'] == 1 ? 2 : 3 : 1}}" />
                                @if($errors->has('username'))
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('username')}}</span>
                                @endif
                            </td>
                        </tr>
                        <tr class="col-lg-6">
                            @if(isset($_GET['plan']))
                            <td>
                                @else
                            <td>مبلغ العمولة :
                                @endif
                                <input class="form-control" required type="number" placeholder="{{isset($_GET['plan']) ? 'مبلغ الإشتراك' : 'مبلغ العمولة'}}" size="20" maxlength="60" name="amount" />
                                @if($errors->has('amount'))
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('amount')}}</span>
                                @endif
                            </td>
                        </tr>
                        <tr class="col-lg-6">
                            <td>البنك الذي تم التحويل إليه :
                                <select  class="form-control" id="bank_id" name="bank_id">
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
                        <tr class="col-lg-6">
                            <td>متى تم التحويل؟ :

                                <select required class="form-control" name="date">
                                    @foreach(transferDate() as $val => $trans)
                                    <option value="{{$val}}">{{$trans}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('date'))
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('date')}}</span>
                                @endif
                            </td>
                        </tr>
                        <tr class="col-lg-6">
                            <td>أسم المحول :

                                <input required class="form-control" type="text" size="20" maxlength="60" name="name" />
                                @if($errors->has('name'))
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('name')}}</span>
                                @endif
                            </td>
                        </tr>
                        @if(!isset($_GET['plan']))
                        <tr class="col-lg-6">
                            <td>رقم الإعلان :
                                <input required class="form-control" type="number" size="20" maxlength="60" name="post_id" />
                                @if($errors->has('post_id'))
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('post_id')}}</span>
                                @endif

                            </td>
                        </tr>
                        @endif
                        <tr class="col-lg-6">
                            <td>ملاحظات
                                <textarea cols="35" rows="5" class="form-control" name="notes"></textarea>
                                @if($errors->has('notes'))
                                <span class="alert alert-danger" style="color: #a94442;border-color: #ebccd1;">{{$errors->first('notes')}}</span>
                                @endif
                            </td>
                        </tr>

                        <tr class="col-lg-12">
                            <td>
                                <span class="label label-primary" style=" background-color: #d9edf7; color: #212121">نرجو حذف الإعلان بعد الإنتهاء منه.</span> <br>
                                نرجو الحرص على أن تكون معلومات التحويل صحيحة ودقيقه
                            </td>
                        </tr>
                        <tr>
                            <td class="col-lg-12 text-center">

                                <input class="btn submit-btn" name="submit" type="submit" value="إرســـال" />
                                
                                <br>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            @else
            <div class="alert alert-info">يجب عليك <a href="{{url('login')}}" style="color: #19516d">تسجيل الدخول</a> ليتم تحويل العمولة من حسابك بالموقع وذلك لضمان حقك .</div>
            @endif
            <br>
            <div class="text-center">
            <a href="http://haraj-animals.moltaqa.net/page/commesion_terms"> سياسة دفع العمولة</a>
            </div>
            <br>
        </div>
    </section>
    <!--  نموزج دفع العمولة  -->



</body>
@endsection
@section('footer')

<script type="text/javascript">

function percentCalculation(a, b){
  var c = (parseFloat(a)*parseFloat(b))/100;
  return parseFloat(c);
}


    function funCalCommission(cmshn) {
        $('#cmshnVal').empty();
        var siteCmshn = "{{getSettings('cmshn')}}";
        var a = $(cmshn).val(),
            r = percentCalculation($(cmshn).val(), 1);

        console.log(a);
        if (a === "") {
            $('#cmshnVal').append("فضلا تحديد المبلغ");
        } else if (isNaN(a)) {
            $('#cmshnVal').append("يرجى إدخال رقم صحيح");
        } else if (a < 100) {
            $('#cmshnVal').append("0");
        } else {
            $('#cmshnVal').append(r);
        }
    }

    function formValidate(form) {
        var done = true;
        if ($('#bank_id').val() == '') {
            alert('فضلا حدد البنك المحول منه');
            $('#bank_id').focus();
            return done = false;
        }
        return done;
    }
</script>

@endsection