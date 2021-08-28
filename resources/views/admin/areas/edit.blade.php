@extends('admin.layouts.app')

@section('title')
	تعديل {{$areas->name}}
@endsection

@section('header')


@endsection

@section('megaMenu')
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
				<li class="classic-menu-dropdown">
					<a href="{{url('/admincp')}}">
						الرئيسية >
					</a>
				</li>
				<li class="classic-menu-dropdown">
					<a href="{{url('/admincp/areas')}}">
						الاقسام >
					</a>
				</li>
				<li class="classic-menu-dropdown active">
					<a href="{{url('/admincp/areas/'.$areas->id.'/edit')}}">
					تعديل القسم / {{$areas->name}}
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
						<a href="{{url('/admincp/areas')}}">الاقسام</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a href="{{url('/admincp/areas/'.$areas->id.'/edit')}}">تعديل القسم / {{$areas->name}}</a>
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
                <span>تعديل القسم {{$areas->name}}</span>
            </div>
        </div>
        <div class="portlet-body form form-horizontal" role="form">
          {!! FORM::model($areas,['route' => ['areas.update' , $areas->id],'method'=> 'PATCH']) !!}
            @include('admin.areas.form')
          {!! FORM::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

<!-- footer -->
@section('footer')

@endsection

