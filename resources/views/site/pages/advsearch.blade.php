@extends('layouts.app')

@section('header')

@endsection

@section('content')
<br>
<br>
<div class="more search_page">
    <div class="container">
        <form class="sawq-b">
            <input type="search" placeholder="ابحث عن سلعة .." class="searchBox searchToremove" autocomplete="off" id="autocomplete" value='' name="key" />
            <button class="button btn-success hideSmall" id="serachBar"><i class="fa fa-search"></i></button>
        </form>
        <br>
        <!--<form class="sawq-b" >-->
        <!--    <div class="sawq-b">-->
        <!--        <select name="city" id="brand">-->
        <!--            <option disabled selected value="#">اختر القسم الرئيسى</option>-->
        <!--            @foreach(\App\Cat::whereIn('parent_id',[0,1000])->get() as $cat)-->
        <!--                <option value="{{$cat->name}}">{{$cat->name}}</option>-->
        <!--            @endforeach-->
        <!--        </select>-->
        <!--        <button class="btn-success" id='carDropSearch'><i class="fa fa-search"></i> </button>-->
        <!--    </div>-->
        <!--    <div class="clear"></div>-->
        <!--</form>-->
        <!--{{--<form class="form-inline sawq-b-w form_search">--}}-->

        <!--<br />-->
        <!--<hr />-->
        <!--<br />-->
        <!--<form class="form-inline form_search2">-->
        <!--    <b>بحث </b>-->
        <!--    <br /> بحث عن:-->
        <!--    <select id="aqarType">-->
        <!--        @foreach(\App\Cat::all() as $cat)-->
        <!--        @if($cat->parent_id == 2)-->
        <!--        <option value="{{$cat->id}}">{{$cat->name}}</option>-->
        <!--        @endif-->
        <!--        @endforeach-->
        <!--    </select>-->
        <!--    <br /> في-->
        <!--    <select id="cities">-->
        <!--        @foreach(\App\Area::all() as $cat)-->
        <!--        @if($cat->parent_id != 0)-->
        <!--        <option value="{{$cat->id}}">{{$cat->name}}</option>-->
        <!--        @endif-->
        <!--        @endforeach-->
        <!--    </select>-->
        <!--    <br />-->
        <!--    <button type="submit" id="aqrDropSearch" class=" btn  btn-success"><i class="fa fa-search"></i></button>-->
        <!--    <br/>-->
        <!--</form>-->
        <!--<br />-->
        <!--<hr />-->
        <!--<br />-->
        <!--<form class="form-inline sawq-b  form_search3">-->
            <form class="form-inline sawq-b">

            <input type="search" id="userNameSearch" placeholder="بحث بأسم العضو" />
            <button type="submit" id="userDropSearch" class=" btn  btn-success"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
<br />
<br />
@endsection


@section('footer')
<script type="text/javascript">

// searchBox
$(document).on("click","#serachBar",function(e) {
    e.preventDefault();
    if($('.searchBox').val() == ''){
        // alert($('.searchBox').val());
        var searchWord = 'empty';
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("برجاء إختيار ماركة أو نوع السياره")
    } else {
        searchWord = $('.searchBox').val();
    }
    url2 = "{{url('tags')}}/"+searchWord;
    window.location = url2;
    window.history.pushState('obj', 'newtitle', url2);
});

$("#markaCopy").hide();
$("#model option").hide();
$(document).on("change","#brand",function() {
    var value=$(this).val();
    $("#model").val('#');
    $("#marka").html(' ');
    $('#marka').append('<option disabled selected value="#">أختر القسم الفرعي </option>');
    $("#marka").val('#');
    $('#marka').append($("#markaCopy option[data-parent=" + value + "]"));
});

$(document).on("change","#marka",function() {
    var value=$(this).val();
    $("#model").val('#');
    $("#model option").show();
    // $('#model').prepend('<option disabled selected value="#">أختر موديل السياره</option>');
});
$(document).on("click","#carDropSearch",function(e) {
    e.preventDefault();//
    $("#cities").val('#');
    if($('#marka').val() == null){
        // var searchWord = $('#brand option:selected').html();
        var searchWord = $('#brand option:selected').val();

    } else if ($('#brand').val() == null) {
        searchWord = 1;
    } else {
        // searchWord = $('#marka option:selected').html();
        searchWord = $('#marka option:selected').val();
    }

    if($('#model').val() != '#'){
        url = "{{url('tags')}}/"+searchWord+"_"+$('#model').val();
    }else{
        url = "{{url('tags')}}/"+searchWord;
    }

    $.get(url, function (data) {
        console.log(data);
        //success data
        if(data.html != ''){
            $(".adsx").empty();
            $(".adsx").append(data.html);
        }else{
            $(".adsx").empty();
            $(".adsx").append('<div class="alert"><center> لا توجد نتائج مطابقه لبحثك </center></div>');
        }
    });
    window.location.replace(url);
    window.history.pushState('obj', 'newtitle', url);
});
$("#markaCopy").hide();
$("#model option").hide();
$(document).on("change","#brand",function() {
    // console.log($('#brand').val());
    var parent_id = $('#brand').val();
    $('#marka option').hide();
    $('#marka').show();
    $('#model').show();
    if ($('.' + parent_id).length > 0 && $('#brand').val() == 1) {
        $('.' + parent_id).show();
    } else {
        $('#marka').hide();
        $('#model').hide();
    }
});
{{--$(document).on("click","#carDropSearch",function(e) {--}}
    {{--e.preventDefault();--}}
    {{--$("#cities").val('#');--}}
    {{--if($('#marka').val() == '#'){--}}
        {{--var searchWord = $('#brand option:selected').html();--}}
    {{--} else if ($('#brand').val() == '#') {--}}
        {{--searchWord = 1;--}}
    {{--} else {--}}
        {{--searchWord = $('#marka option:selected').html();--}}
    {{--}--}}

    {{--if($('#model').val() != '#'){--}}
        {{--url = "{{url('tags')}}/"+searchWord+"_"+$('#model').val();--}}
    {{--} else if($("#brand").val() == '#'){--}}
        {{--url = "{{url('tags')}}/"+1;--}}
    {{--}else{--}}
        {{--url = "{{url('tags')}}/"+searchWord;--}}
    {{--}--}}
    {{--if($("#brand").val() == '#'){--}}
        {{--url = "{{url('tags/1')}}";--}}
    {{--}--}}
    {{--window.location = url;--}}
    {{--window.history.pushState('obj', 'newtitle', url);--}}
{{--});--}}
$(document).on("click","#aqrDropSearch",function(e) {
    e.preventDefault();
    url = "{{Request::root()}}"+"/tags/"+$('#aqarType option:selected').html()+","+$('#cities option:selected').html();
    window.location = url;
});
$(document).on("click","#userDropSearch",function(e) {
    e.preventDefault();
    if($('#userNameSearch').val() == ''){
        alert('فضلا أكتب الإسم');
        return false;
    }
    url = "{{Request::root()}}"+"/tags/"+$('#userNameSearch').val();
    window.location = url;
});

</script>
@endsection







