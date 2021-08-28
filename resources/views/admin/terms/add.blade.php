@extends('admin.layouts.app')

@section('title')
إضافة اتفاقية جديدة
@endsection

@section('header')


@endsection

@section('megaMenu')
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
				<li class="classic-menu-dropdown">
					<a href="{{url('/admincp/terms')}}">
					    التحكم فى بنود الإتفاقية
					</a>
				</li>
				<li class="classic-menu-dropdown active">
					<a href="#">
					إضافة بند جديد
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
						<a href="{{url('/admincp/terms')}}">بنود الإتفاقية</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a href="#">إضافة بند جديد </a>
						<i class="fa fa-angle-left"></i>
					</li>
				</ul>
			</div>

@endsection

@section('content')

@section('content')

      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_1_1" data-toggle="tab">
               إضافة بند اتفاقية جديدة  </a>
              </li>
            </ul>
            <div class="tab-content">
              	<div class="tab-pane active fontawesome-demo" id="tab_1_1">
                	<div class="portlet box blue">
                  		<div class="portlet-title">
              				<div class="caption col-md-9">
              				إضافة بند اتفاقية جديدة 
              				</div>
                  		</div>
              			<div class="portlet-body">
		                    <form class="form-horizontal" role="form" method="post" action="{{ url('/admincp/terms') }}" enctype="multipart/form-data" >
		                      	{{ csrf_field() }}
		          				@include('admin.terms.form')
			                </form>
    					</div>
    				</div>
            	</div>
            </div>
          </div>
        </div>
      </div>
      <!-- END PAGE CONTENT-->
@endsection

<!-- footer -->
@section('footer')

@endsection
