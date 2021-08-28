@extends('layouts.app')

@section('title')
المتابعه
@endsection

@section('content')
<div class="singleContent">
    <h2>المتابعة</h2> سيتم إشعارك عبر الإشعارات وعبر البريد الإلكتروني عند وجود إعلان جديد عن أي سيارة تقوم بمتابعتها.
    <br>
    <br>
    <form id="unfollowBrandForm" enctype="multipart/form-data" style="border: 1px solid #eee;">
    	{{csrf_field()}}
        <table class="table table-striped" style="margin-bottom: 0!important;">
            <tbody id="unfollowBrandCheck">
                <tr>
                    <th width="5%">اختيار</th>
                    <th>القسم او كلمة البحث</th>
                    <th>تمت المتابعه قبل</th>
                </tr>
                @foreach(Auth::user()->Brands()->orderBy('created_at','desc')->get() as $brand)
                <tr>
                    <td>
                        <input type="checkbox" name="ids[]" value="{{$brand->id}}">
                    </td>
                    <td> <a href="{{url('tags/'.$brand->name)}}" class="tag"> {{$brand->name}}</a></td>
                    <td>{{ timeToStr(strtotime($brand->pivot->created_at))}}</td>
                </tr>
                @endforeach
                <tr>
                    <td class="row4" colspan="6" align="center">&nbsp;
                        <input class="btn btn-danger" type="submit" id="unfollowBrand" value="إلغاء متابعة الإعلانات من القائمة المختارة">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <br>
    <span id="followedBrand"></span>
    <h3 class="green">متابعة سيارة جديدة</h3> لمتابعة سيارة جديدة ، حدد السيارة من القائمة التالية:
    <br>
    <div class="row">
        <div class="col-md-9">
            <form id="followBrandForm">
            	{{csrf_field()}}
                <div class="col-xs-12 col-md-3">
                    <select name="cat_id" id="cat_id" class="form-control">
                        <option value="">أختر ماركة السيارة</option>
						@foreach(\App\Cat::all() as $cat)
						@if($cat->parent_id == 1)
						<option value="{{$cat->id}}">{{$cat->name}}</option>
						@endif
						@endforeach
                    </select>
                </div>
                <div class="col-xs-12 col-md-2">
                    <select id="brand" name="brand" class="form-control">
                        <option value="">أختر نوع السيارة</option>
						@foreach(\App\Cat::all()->where('parent_id','!=',0) as $cat)
						@if(\App\Cat::find(\App\Cat::find($cat->id)->parent_id)->parent_id == 1)
						<option data-parent="{{$cat->parent_id}}" value="{{$cat->id}}">{{$cat->name}}</option>
						@endif
						@endforeach
                    </select>
                </div>
                <input type="submit" id="followBrand" value="متابعة  »" style="width: 132px;" class="button">
                <br>
            </form>
        </div>
    </div>
    <hr>
    <h2>متابعة الاعضاء</h2> سيتم إشعارك عبر الإشعارات عند وجود إعلان جديد لعضو تقوم بمتابعته.
    <br>
    <br>
    <span id="followedUser"></span>
    <form id="unfollowUserForm" enctype="multipart/form-data">
    	{{csrf_field()}}
        <table class="table  table-striped">
            <tbody id="unfollowUserCheck">
                <tr>
                    <th width="5%">اختيار</th>
                    <th>المعلن</th>
                </tr>
                @foreach(Auth::user()->Follows as $user)
                <tr>
                    <td>
                        <input type="checkbox" name="ids[]" value="{{$user->id}}">
                    </td>
                    <td> <a href="{{url('users/'.$user->id)}}" class="username"> {{$user->name}} </a></td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2" align="center">&nbsp;
                        <input class="btn btn-danger" type="submit" id="unfollowUser" value="إلغاء متابعة الاعضاء من القائمة المختارة">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection
@section('footer')
<script type="text/javascript">
	$("#brand option").hide();
	$(document).on("change","#cat_id",function() {
		var value=$(this).val();
		$("#brand option").hide();
		$('#brand').prepend('<option disabled selected value="">أختر نوع السياره</option>');
		$("#brand").val('');		
		$("#brand option[data-parent=" + value + "]").show();
	});
// follow Brand
$('#followBrand').on('click', function (e) {

	if($('#cat_id').val() == ''){
		alert('أختر ماركة السياره');
		$('#cat_id').focus();
		return false;
	}

	if($('#brand').val() == null){
		alert('اختر نوع السياره');
		$('#brand').focus();
		return false;
	}

    e.preventDefault();
    var url     = '{{url("followBrand")}}',
    	data 	= $('#followBrandForm').serialize();

    $.post(url,data,function (data) {
        if(data == 'attach'){
            $('#followedBrand').append('<div class="alert alert-success"> تمت المتابعة نجاح </div>');
        }else if(data == 'same'){
            $('#followedBrand').append('<div class="alert alert-info"> لقد قمت بمتابعة هذه السياره من قبل </div>');
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});

// follow Brand
$('#unfollowBrand').on('click', function (e) {
    e.preventDefault();
    var url   	= '{{url("unfollowBrand")}}',
    	data	= $('#unfollowBrandForm').serialize(),
    	a 		= $(this);
    $.post(url,data,function (data) {
        if(data == 'detach'){
			$('#unfollowBrandCheck input:checked').each(function() {
			    $(this).closest('tr').hide();
			});
            $('#followedBrand').append('<div class="alert alert-success"> تمت إلغاء المتابعه </div>');
        }else if(data == 'empty'){
           alert('فضلا قم بإختيار الماركات المطلوب إلغائها');
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});

// follow Brand
$('#unfollowUser').on('click', function (e) {
    e.preventDefault();
    var url   	= '{{url("unfollowUser")}}',
    	data	= $('#unfollowUserForm').serialize(),
    	a 		= $(this);
    $.post(url,data,function (data) {
        if(data == 'detach'){
			$('#unfollowUserCheck input:checked').each(function() {
			    $(this).closest('tr').hide();
			});
            $('#followedUser').append('<div class="alert alert-success"> تمت إلغاء المتابعه </div>');
        }else if(data == 'empty'){
           alert('فضلا قم بإختيار العضو المطلوب إلغاء متابعته');
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});



</script>
@endsection
