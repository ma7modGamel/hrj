{!! \App\Page::where('pLink','commissionUp')->first()->content !!}
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
