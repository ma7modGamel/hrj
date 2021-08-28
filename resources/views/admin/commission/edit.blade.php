@extends('admin.layouts.app')

@section('title')
	تعديل العمولة {{$commission->name}}
@endsection

@section('header')


@endsection

@section('megaMenu')
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
	            <li class="classic-menu-dropdown" aria-haspopup="true">
	                <a href="{{url('admincp')}}"> رئيسية لوحة التحكم
	                    <i class="fa fa-angle-left"></i>
	                </a>
	            </li>
	            <li class="classic-menu-dropdown active">
	                <a>
	                    العمولات <span class="selected">
	                    </span>
	                    <i class="fa fa-angle-left"></i>
	                </a>
	            </li>
				<li class="classic-menu-dropdown active">
					<a href="{{url('/admincp/commission/'.$commission->id.'/edit')}}">
					تعديل العمولة / {{$commission->name}}
					<span class="selected"></span>
					</a>
				</li>
			</ul>
		</div>
@endsection

@section('pageHeader')
			<div class="page-bar hidden-md hidden-lg">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{url('/admincp')}}">الرئيسية</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a href="{{url('/admincp/commission')}}">العمولات</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a href="{{url('/admincp/commission/'.$commission->id.'/edit')}}">تعديل العمولة / {{$commission->name}}</a>
						<i class="fa fa-angle-left"></i>
					</li>
				</ul>
			</div>

@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content">
  <div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption col-md-9">
                <span>تعديل العمولة {{$commission->name}}</span>
            </div>
        </div>
        <div class="portlet-body form form-horizontal" role="form">
	                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admincp/commission/'.$commission->id.'/update') }}"  enctype="multipart/form-data">



{{ csrf_field() }}
<div class="form-body">
   
   

       
            
            
                    <div class="form-group{{ $errors->has('category_id') ? 'has-error' : '' }}">
                        <label class="col-md-2 control-label">اختر القسم الرئيسي</label>
                        <div class="col-md-9">
                           <div class="input-group">
                                <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                                </span>
              <select required name="category_id" class="form-control">  
                

@php
$maincommissions = \App\Cat::where('parent_id',null)->get();

@endphp



 @foreach($maincommissions as $category)
        
        


<option {{$category->id == $commission->category_id ? 'selected' : '' }} value="{{$category->id}}"> {{ $category->name}} </option>


        @endforeach
             </select>
            </div>
            @if ($errors->has('parent_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
    
  

                    <div class="form-group{{ $errors->has('commission') ? 'has-error' : '' }}">
        <label class="col-md-2 control-label"> العمولة</label>
        <div class="col-md-9">
           <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-map-marker"></i>
                </span>

                                <textarea required class="form-control" name="commission" rows="4" cols="50">{{$commission->commission}} </textarea>
            </div>
              @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('commission') }}</strong>
                </span>
            @endif
                    </div>
    </div>
       
            
         


    

    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn green"> تنفيذ </button>
            </div>
        </div>
    </div>
</div>









</form>        </div>
      </div>
    </div>
  </div>
</section>
@endsection

<!-- footer -->
@section('footer')

@endsection

