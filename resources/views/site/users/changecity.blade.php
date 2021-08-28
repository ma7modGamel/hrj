@extends('layouts.app')

@section('title')
    تغير المدينه
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <br /> <br /> <br />
        </div>

<form action="{{url('changeCity')}}" method="post">
    <div class="col-md-6 col-md-pull-3">
        <h4 style="text-align: center">اختر الدولة</h4>
        <select class="form-control area-change" name="country" data-level="country">
            <option value="" >اختر دولتك </option>
            @php
                $user_country = Auth::user()->country;
                $user_country = ($user_country !="" && !is_null($user_country ))? $user_country: false;
                $user_city = Auth::user()->city;
                $user_city = ($user_country && $user_city !="" && !is_null($user_city ))? $user_city: false;
            @endphp
            @foreach(\App\Area::where('parent_id','=',0)->get() as $area)
                <option value="{{$area->id}}" @if($user_country && ($user_country == $area->id)) selected @endif>{{$area->name}}</option>
            @endforeach
        </select>
        <br />
        <h4 style="text-align: center">اختر المدينة</h4>
        <select class="form-control area-change" name="city" data-level="city">
            <option value="" >اختر مدينتك </option>
            @if( $user_city )
                @foreach(\App\Area::where('parent_id','=',$user_country)->get() as $area)
                    <option value="{{$area->id}}" @if($user_city == $area->id) selected @endif>{{$area->name}}</option>
                @endforeach
            @endif
        </select>
        <input type="submit" class="btn btn-primary" value="تغير">
    </div>
</form>

    </div>
@endsection
@section('footer')
<script>
jQuery(document).ready(function ($) {

    $(document).on('change', ".area-change",function ()
    {
        if( $(this).data('level') == 'country' ) {
            var id			= $(this).val(),
                nextLevel	= ".area-change[data-level=city]",
                nextMsg		= 'اختر مدينتك';
            $.ajax({
                method: "GET",
                type: "json",
                url: "{{route('get-child')}}",
                data: {id: id},
                success: function (response) {
                    //console.log(response);
                    if (response.status) {
                        $(nextLevel).empty().show().append('<option value="">' + nextMsg + '</option>');

                        $.each(response.result, function (key, value) {
                            $(nextLevel).append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                    else {
                        console.log(response);
                    }
                }
            });
        }
    });
});
</script>
@endsection