@extends('admin.layouts.app')

@section('title')
	تعديل بنك
@endsection

@section('header')


@endsection

@section('topMenu')
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
				<li class="classic-menu-dropdown">
					<a href="{{url('/admincp')}}">
						الرئيسية >
					</a>
				</li>
				<li class="classic-menu-dropdown">
					<a href="{{url('/admincp/banks')}}">
						قائمة البنوك >
					</a>
				</li>
				<li class="classic-menu-dropdown active">
					<a href="#">
					تعديل البنك
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
						<a href="{{url('/admincp/banks')}}">قائمة البنوك</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a href="#">تعديل بنك</a>
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
                <span>تعديل</span>
            </div>
        </div>
        <div class="portlet-body form form-horizontal" role="form">
          {!! FORM::model($bank,['route' => ['banks.update' , $bank->id],'method'=> 'PATCH']) !!}
            @include('admin.banks.form')
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

