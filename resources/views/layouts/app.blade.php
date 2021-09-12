@if( ! Request::segment(2) === 'login'  && getSettings('status') == 0)
     
      <script>window.location = "/maintenance";</script>

@endif
<!doctype html>
<html lang="ar-sa" dir="rtl">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="author" content="Mustafa Fathi Ibrahim (Front End Developer)">
      <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=3.0, user-scalable=no">
      <link rel="shortcut icon" href="{{Request::root()}}/public/upload/logo/favicon.png" />
      <title> @yield('title',getSettings('siteName'))</title>


      <link href="{{ url('public/website/css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
      <link href="{{ url('public/website/css/style.css') }}" rel="stylesheet" type="text/css" >
 
                  <link href="{{ asset('public/website/face.css') }}" rel="stylesheet" type="text/css" >
            <link href="{{ url('public/website/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" >
            <link href="{{ url('public/admin/global/plugins/bootstrap-toastr/toastr-rtl.min.css') }}" rel="stylesheet" type="text/css" >
                  
      
      
      <!-- BEGIN PAGE LEVEL Toastr -->
      {!! HTML::style('public/admin/global/plugins/bootstrap-toastr/toastr-rtl.min.css') !!}
      <!-- END PAGE LEVEL Toastr -->
      {!! HTML::script('public/website/js/jquery.js') !!}
      {!! HTML::script('public/website/js/bootstrap.js') !!}
      
    <script type="text/javascript" src="{{ url('js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/website/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/website/js/bootstrap.js') }}"></script>

      
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootsrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
<!--       <link href="https://www.fontify.me/wf/0d2b0758024a3eb6e9e1a456e481ae51" rel="stylesheet" type="text/css">
 -->      <meta name="description" content="@yield('description',getSettings('metaDesc'))" />
      <meta name="keywords" content="@yield('keywords',getSettings('KeyWords'))" />
      <meta name="twitter:card" content="summary_large_image">
      <meta property="og:title" content="@yield('og_title',getSettings())" />
      <meta property="og:description" content="@yield('og_description',getSettings('metaDesc'))" />
      <meta property="og:site_name" content="{{getSettings()}}" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
             <link href="{{ url('public/website/css/style-responsive.css') }}" rel="stylesheet" type="text/css" >

      <script>
         function myFunction() {
         
             //   $('nav').addClass('navv');
         
             // alert('asxasx');
         
         }
      </script>
      @yield('header')
   </head>
   <body>
       
           <section class="search-bar">
            <div class="container">
                <!-- Start navbar -->
                <nav id="main-nav" class="navbar main-navbar p-0">
                    <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i id="toggler-icon" class="fas fa-bars text-light"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav text-right py-2 px-0">
                            <li class="nav-item px-2">
                                <a class="nav-link" href="{{Auth::user() ? url('users/'.Auth::user()->id) : route('login')}}">
                                    <i class="fas fa-user-check"></i>
                                    <span>تسجيل الدخول</span>
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="nav-item px-2">
                                <a class="nav-link" href="{{url('commission')}}">
                                    <i class="fas fa-money-bill-alt"></i>
                                    <span>حساب عمولة الموقع</span>
                                </a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link" href="{{url('page/discount')}}">
                                    <i class="fas fa-percentage"></i>
                                    <span>نظام الخصم</span>
                                </a>
                            </li>
                            <!--<li class="nav-item px-2">-->
                            <!--    <a class="nav-link" href="#">-->
                            <!--        <i class="fas fa-car"></i>-->
                            <!--        <span>طلب تقرير السيارة</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <div class="dropdown-divider"></div>
                            <!--<li class="nav-item px-2">-->
                            <!--    <a class="nav-link" href="#">-->
                            <!--        <i class="fas fa-hand-paper"></i>-->
                            <!--        <span>قائمة السلع والإعلانات الممنوعة</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <li class="nav-item px-2">
                                <a class="nav-link" href="{{url('checkacc')}}">
                                    <i class="fas fa-ban"></i>
                                    <span>القائمة السوداء</span>
                                </a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link" href="{{url('page/terms')}}">
                                    <i class="fas fa-file-contract"></i>
                                    <span>معاهدة استخدام الخدمة</span>
                                </a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link" href="{{url('show/contact')}}">
                                    <i class="fas fa-envelope"></i>
                                    <span>اتصل بنا</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End navbar -->

                <!-- Start Search From -->
                <form  id="for_m" class="form-inline my-2 mx-2">
                    <input class="form-control mr-sm-2" id="sreachWord" name="sreachWord" type="search" placeholder="ابحث في حراج" aria-label="Search">
                    <div class="controls">
                        <button onclick="mobile-search()" class="search ml-auto" type="button">
                            <i class="fas fa-search"></i>
                        </button>
   
                    </div>
                </form>
                <!-- End Search Form -->
                
                <nav id="filter-nav" class="filter-navbar navbar p-0">
                    <button id="filter-menu-toggler"
                        class="filter-menu-toggler navbar-toggler accordion fas fa-th text-light"
                        type="button"
                        data-toggle="collapse"
                        data-target="#filterCollapse"
                        aria-controls="filterCollapse"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                        ></button>
                    <div class="filter-collapse collapse navbar-collapse" id="filterCollapse">
                      <div class="navbar-nav">
                        <!-- Cars List -->
                        <ul class="text-right list-unstyled py-2 px-0">
                            <li>
                                <a href="df">
                                    <img src="images/cars/chev.png">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/cars/chev.png">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/cars/chev.png">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/cars/chev.png">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/cars/chev.png">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/cars/chev.png">
                                </a>
                            </li>
                        </ul>

                        <!-- Load More Button -->
                        <button class="load-more-btn mb-5">
                            أظهر المزيد
                            <i class="fa fa-chevron-circle-down mr-1"></i>
                        </button>
                        <!-- Devices List -->
                        <ul class="text-right list-unstyled py-2 px-0">
                            <li>
                                <a href="df">
                                    <img src="images/devices/apple.png">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/devices/apple.png">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/devices/apple.png">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/devices/apple.png">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/devices/apple.png">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/devices/apple.png">
                                </a>
                            </li>
                        </ul>

                        <!-- Animals List -->
                        <ul class="text-right list-unstyled py-2 px-0">
                            <li>
                                <a href="df">
                                    <img src="images/animals/cat.jpg">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/animals/cat.jpg">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/animals/cat.jpg">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/animals/cat.jpg">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/animals/cat.jpg">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/animals/cat.jpg">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/animals/cat.jpg">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/animals/cat.jpg">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/animals/cat.jpg">
                                </a>
                            </li>
                            <li>
                                <a href="df">
                                    <img src="images/animals/cat.jpg">
                                </a>
                            </li>
                        </ul>
                      </div>
                    </div>
                </nav>
                
            </div>
        </section>

        <!-- Top Navbar -->
        <section>
            <nav class="top-navbar">
                <ul class="list-unstyled m-0 p-0">
                    <li class="active">
                        <a href="{{url('/')}}">الرئيسية</a>
                    </li>
           
                        @foreach(App\Cat::where('parent_id',null)->where('sort','!=',null)->orderBy('sort','asc')->get() as $cat)
                        <li>
                            <a href="{{url('tags/'.$cat->id)}}">{{$cat->name}}</a>
                        </li>
                        @endforeach

                    <li>
                        <a href="{{url('pages/advsearch')}}">  البحث</a>
                    </li>
                    <!--<li>-->
                    <!--    <a href="{{url('page/sitemap')}}">أقسام أكثر .  </a>-->
                    <!--</li>-->
                    
                </ul>
            </nav>
        </section>

        <!-- Filter Bar -->
        <section class="filter-bar">
            <div class="container">
                <!-- Locations -->
                <div class="custom-modal">
                    <button id="location-select-toggler" data-toggle="locations-modal" class="location-select-toggler modal-toggler">
                        كل المناطق
                        <i class="fas fa-angle-down"></i>
                     </button>
                    <div id="locations-modal" class="bottom-modal locations">
                        <header>
                            <button id="clear-locations" class="clear-btn" data-clear="locations-modal">مسح الكل</button>
                            <h3 class="mb-0">المنطقة</h3>
                            <button class="hide-btn modal-toggler font-weight-bold" data-toggle="locations-modal">
                               x
                            </button>
                        </header>
                        <ul class="list-unstyled mb-0">
                            
                            @foreach(\App\Area::where('parent_id',1)->get() as $area)
 
                            <div class="input-group d-flex align-items-center">
                                <input type="radio" name="optionsRadios" id="optionsRadios{{$loop->index}}" value="{{$area->id}}"  >
                                <label class="mb-0">  {{$area->name}}    </label>
                            </div>
                            
                            @endforeach          
                            
                            <!--<div class="input-group d-flex align-items-center">-->
                            <!--    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>-->
                            <!--    <label class="mb-0"> radio1  </label>-->
                            <!--</div>-->
                            <!--<div class="input-group d-flex align-items-center">-->
                            <!--    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">-->
                            <!--    <label class="mb-0"> radio2 </label>-->
                            <!--</div>-->
                             
                        
                        </ul>
                        <div class="button-wrapper">
                            <button class="btn primary-btn" type="submit">
                                تطبيق (0)
                            </button>
                        </div>
                   </div>
                </div>
                <div class="controls d-flex">
                    <!-- Filter -->
                    <!--<div class="custom-modal">-->
                    <!--    <button id="filter-select-toggler" title="filter" data-toggle="filter-modal" class="control-btn filter-select-toggler modal-toggler fa fa-filter">-->
                    <!--    </button>-->
                        
                    <!--    <div id="filter-modal" class="bottom-modal filters">-->
                    <!--        <header>-->
                    <!--            <button id="clear-filter" class="clear-btn" data-clear="filter-modal">مسح الكل</button>-->
                    <!--            <h3 class="mb-0">تصنيفات إضافية</h3>-->
                    <!--            <button class="hide-btn modal-toggler font-weight-bold" data-toggle="filter-modal">-->
                    <!--               x-->
                    <!--            </button>-->
                    <!--        </header>-->
                    <!--        <ul class="list-unstyled mb-0 custom-check-list">-->
                    <!--            <div class="input-group d-flex align-items-center">-->
                    <!--                <input type="checkbox" value="1">-->
                    <!--                <label class="mb-0">اختيار 1</label>-->
                    <!--            </div>-->
                    <!--            <div class="input-group d-flex align-items-center">-->
                    <!--                <input type="checkbox" value="2">-->
                    <!--                <label class="mb-0">اختيار2</label>-->
                    <!--            </div>-->
                    <!--            <div class="input-group d-flex align-items-center">-->
                    <!--                <input type="checkbox" value="3">-->
                    <!--                <label class="mb-0">اختيار 3</label>-->
                    <!--            </div>-->
                    <!--        </ul>-->
                    <!--        <div class="button-wrapper">-->
                    <!--            <button class="btn primary-btn" type="submit">-->
                    <!--                تطبيق-->
                    <!--            </button>-->
                    <!--        </div>-->
                    <!--   </div>-->
                    <!--</div>-->
                    <!-- Map -->
                    <!--<button class="control-btn">-->
                    <!--    <a href="#">-->
                    <!--        <i class="fa fa-map-marked"></i>-->
                    <!--    </a>-->
                    <!--</button>-->
                    <!-- Grid Layout -->
                    <!--<button class="control-btn">-->
                    <!--    <i class="fa fa-th-large"></i>-->
                    <!--</button>-->
                </div>
            </div>
        </section>

    </header>

    <!-- Bottom Navbar -->
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="list-unstyled m-0 p-0 text-center">
                <li class="nav-item active">
                    <a href="{{url('/')}}">
                        <i class="fas fa-home"></i>
                        <div>حراج</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('fav')}}">
                        <i class="fas fa-heart"></i>
                        <div>المفضلة</div>
                    </a>
                </li>
                <li class="nav-item">
                    <button>
                        <a href="{{Auth::user() ? url('add')  :  url('login/') }}">
                        <!--<a href="https://taathleeth.com/add">-->
                            <i class="fas fa-plus"></i>
                        </a>
                    </button>
                </li>
                <li class="nav-item">
                    <a href="{{url('notifications')}}">
                        <i class="fas fa-bell"></i>
                        <div>إشعارات</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('inbox')}}">
                        <i class="fas fa-envelope"></i>
                        <div>الرسائل</div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
       
      <div id="login"></div>
      <div id="header-wrap">
         <div class="container">
            <div id="headerWarp"  class="clear">
               @if(Session::has('error'))
               {{Session::get('error')}}
               @endif
               <ul style="list-style-type: none;display: flex;">
                  <!--<li style="flex-grow: 1;"><a href="{{url('/')}}">الرئيسية</a></li>-->

               @foreach(\App\Cat::where('parent_id' , null)->get() as $cat)
               <!--<li class="mainCat2" style="flex-grow: 1;" >-->
               <!--     <a  href="{{url("tags/$cat->id")}}" data-id="{{$cat->id}}"   id="{{$cat->id}}" value="{{$cat->id}}">{{$cat->name}}</a>-->
               <!--</li>-->
                @endforeach
                   <!--<li style="flex-grow: 1;"><a href="{{url('page/advsearch')}}"> <i class="fa fa-search"></i> البحث</a></li>-->
                </ul>

               <a href="{{url('/')}}"><i class="fa fa-car"></i>الرئيسية  </a>
                   @foreach(App\Cat::where('parent_id',null)->where('sort','!=',null)->orderBy('sort','asc')->get() as $cat)
                       <a href="{{url('tags/'.$cat->id)}}">{{$cat->name}}</a>
                   @endforeach
               <a href="{{url('pages/advsearch')}}"> <i class="fa fa-search"></i> البحث</a>
               <!--<a href="{{url('page/sitemap')}}"><i class="fa fa-sitemap"></i> أقسام أكثر ...</a>-->
               <!--{{--<a href="{{url('tags/4')}}">المشاريع والمقـاولات</a>-->
               <!--<a href="{{url('tags/546')}}">الموضة</a>-->
               <!--<a href="{{url('tags/549')}}"> مستلزمات الأطفال </a>-->
               <!--<a href="{{url('tags/551')}}">مستلزمات طبية</a>-->
               <!--<a href="{{url('tags/556')}}"> معدات صناعية </a>-->
               <!--<a href="{{url('tags/637')}}"> أسواق أخري </a>-->
               <!--<a href="{{url('commission')}}"> عمولة الموقع </a> --}}-->
            </div>
         </div>
      </div>



<!-- start navbar-->
      <nav class="@auth jkllk @endauth" id="mmmmm">
         @if(!request()->is('/'))
         <a href="{{ url()->previous()}}" class="back-btn"><i class="fa fa-arrow-left"></i></a>
         @endif
         <div class="container">
            <div class="row">
               <div class="col-md-4 col-sm-3 col-xs-6">
                  <a class="logo-top" href="{{url('/')}}"><img
                     src="{{Request::root()}}/public/upload/logo/logo.png"> 
                     <!--<span class="website-title">{{getSettings('siteName')}}</span>-->
                     </a>
               </div>
               <div class="col-md-8 col-sm-9 col-xs-6  fixed-nav">
                  <ul class="@auth classs @endauth">


                     @if (Auth::guest())
                     <li class="site-login">
                        @if(!empty(\Auth::user()->image))
                        <img src="{{!empty(\Auth::user()->image)?asset('public').'/'.\Auth::user()->image:''}}"
                           class="img-responsive img-thumbnail img-circle"
                           style="width:40px;height: 40px; margin-bottom: 30px;">
                        @endif
                        <a class="divider" style="display: none;" href="{{Auth::user() ? url('users/'.Auth::user()->id) : route('login')}}">
                        <span> <i class="fa fa-user-plus"></i>
                        {{Auth::user() ? Auth::user()->name : ' جديد   /' }}</span>
                        </a>
                        <a href="{{Auth::user() ? url('users/'.Auth::user()->id) : route('login')}}">
                        <span> <i class="fa fa-sign-in"></i>
                        {{Auth::user() ? Auth::user()->name : ' دخول' }}</span>
                        </a>

                     </li>


                     @else
                     <li><a href="{{url('inbox')}}" class="hideSmall ">
                        @if(isset(Auth::user()->id))
                        @php $userMsgs =
                        \App\Message::where('user_to',Auth::user()->id)->where('status',1)->get() @endphp
                        @if(count($userMsgs))
                        <span class="badge badge-danger">{{count($userMsgs)}}</span>
                        @endif
                        @endif
                        <i class="fa fa-envelope "></i>
                        الرسائل
                        </a>
                     </li>
                     <li>
                        <a href="{{url('notifications')}}" class="hideSmall notificationsa">
                        @if(isset(Auth::user()->unreadNotifications))
                        @if(count(Auth::user()->unreadNotifications))
                        <span
                           class="badge badge-danger notificationsNum">{{count(Auth::user()->unreadNotifications)}}</span>
                        @endif
                        @endif
                        <i class="fa fa-bell"></i>
                        الإشعارات
                        </a>
                     </li>
                     <li><a href="{{url('fav')}}" class="hideSmall"> <i class="fa fa-heart"></i> المفضلة</a></li>
                     <li><a href="{{url('follow')}}" class="hideSmall"><i class="fa fa-rss"></i> المتابعة </a></li>
                     <a href="{{url('inbox')}}" class="hideSmall ">
                     @if(isset(Auth::user()->id))
                     @php $userMsgs = \App\Message::where('user_to',Auth::user()->id)->where('status',1)->get()
                     @endphp
                     @if(count($userMsgs))
                     <span class="badge badge-danger">{{count($userMsgs)}}</span>
                     @endif



                     @endif
                     <i class="fa fa-envelope"></i>
                     الرسائل
                     </a>
                     <a href="{{url('notifications')}}" class="hideSmall notificationsa">
                     @if(isset(Auth::user()->unreadNotifications))
                     @if(count(Auth::user()->unreadNotifications))
                     <span
                        class="badge badge-danger notificationsNum">{{count(Auth::user()->unreadNotifications)}}</span>
                     @endif
                     @endif
                     <i class="fa fa-bell"></i>
                     الإشعارات
                     </a>
                     <a href="{{url('fav')}}" class="hideSmall"> <i class="fa fa-heart"></i> المفضلة</a>
                     <a href="{{url('follow')}}" class="hideSmall"><i class="fa fa-rss"></i> المتابعة</a>
                     <li class="user-name-profile">
                        <a href="{{Auth::user() ? url('users/'.Auth::user()->id) : route('login')}}">
                        <i class="fa fa-user"></i>{{Auth::user() ? Auth::user()->name : 'تسجيل الدخول' }}</a>
                        <div class="dropdown">
                           <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                           <span class="caret"></span></button>
                           <ul class="dropdown-menu">
                              @auth
                              @if(Auth::user()->type == 0)
                              <li class="dropdown-link-hover"><a href="{{ url('admincp') }}"> <i
                                 class="fa fa-cog"></i> الاعدادات</a></li>
                              @else
                              <li class="dropdown-link-hover"><a
                                 href="{{Auth::user() ? url('users/'.Auth::user()->id) : route('login')}}">
                                 <i class="fa fa-cog"></i>الصفحة الشخصية</a>
                              </li>
                              @endif
                              @endauth
                              <li class="dropdown-link-hover">
                                 <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> خروج
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                       style="display: none;">
                                       {{ csrf_field() }}
                                    </form>
                                 </a>
                              </li>
                              @endif
                              <li class="site-langs">
                                 <div class="site-lang">
                                    <div class="lang-inline-box">
                                       @if (Auth::guest())
                                       @else
                                       <span class="it"> اللغه: </span>
                                       @endif
                                       <button class="lang-inline-btn active">عربي</button>
                                       <button class="lang-inline-btn">Eng</button>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </nav>
<!-- end navbar-->



      @if (Auth::guest())
      @else
      <div class="mobile-nav-menu">
         <a href="{{url('inbox')}}" class="hideSmall ">
         @if(isset(Auth::user()->id))
         @php $userMsgs = \App\Message::where('user_to',Auth::user()->id)->where('status',1)->get() @endphp
         @if(count($userMsgs))
         <span class="badge badge-danger">{{count($userMsgs)}}</span>
         @endif
         @endif
         <i class="fa fa-envelope "></i>
         </a>
         <a href="{{url('notifications')}}" class="hideSmall notificationsa">
         @if(isset(Auth::user()->unreadNotifications))
         @if(count(Auth::user()->unreadNotifications))
         <span class="badge badge-danger notificationsNum">{{count(Auth::user()->unreadNotifications)}}</span>
         @endif
         @endif
         <i class="fa fa-bell"></i>
         </a>
         <a href="{{url('fav')}}" class="hideSmall"> <i class="fa fa-heart"></i> </a>
         <a href="{{url('follow')}}" class="hideSmall"><i class="fa fa-rss"></i> </a>
         <a href="{{url('/')}}" class="hideSmall "><i class="fa fa-th-large"></i></a>
      </div>
      @endif
      <div class="clearfix"></div>
      @yield('content')
      <div class="clearfix"></div>
      <!-- Footer -->
      <footer class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="download-buttons">
                     <a href="#" class="download-btn apple">
                     <img src="{{Request::root()}}/public/upload/app-store-badge.png">
                     </a>
             {{--                     <a href="#" class="download-btn google">--}}
{{--                     <img src="{{Request::root()}}/public/upload/google-play-badge.png">--}}
{{--                     </a>--}}
                  </div>
               </div>
               <div class="col-md-3">
                  <ul class="footer-list">
                      @if(Auth::guest())
                     <li class="flist">
                         <a class="divider" href="{{route('register')}}">
                        <i class="fa fa-user-plus"></i>تسجيل </a></li>
                     @endif
                     <li class="flist"><a href="{{url('commission')}}"> <i class="fa fa-cc-mastercard "></i> حساب وسداد العمولة</a></li>
                     <li class="flist"><a href="{{url('checkacc')}}"> <i class="star fa fa-star "> </i> القائمة
                        السوداء</a>
                     </li>
                     @if(!Auth::guest())
                     <li class="flist"><a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa fa-sign-out"></i> تسجيل الخروج</a></li>
                     @endif
                     <li class="flist"><a href="{{url('show/contact')}}"> <i class="star fa fa-star "> </i> اتصل
                        بنا</a>
                     </li>
                     <li class="flist"><a href="{{url('page/notallowed')}}"> <i class="star fa fa-star "> </i> قائمة
                        السلع والإعلانات الممنوعة</a>
                     </li>
                     <li class="flist"><a href="#"> <i class="star fa fa-star "> </i> تطبيق حراج</a></li>
                  </ul>
               </div>
               <div class="col-md-3">
                  <ul class="footer-list">
                 
                 
                     <li class="flist"><a href="{{url('checkacc')}}"> <i class="star fa fa-star "> </i> القائمة
                        السوداء</a>
                     </li>
                 
                     <li class="flist"><a href="{{url('page/discount')}}"> <i class="star fa fa-star "> </i> نظام
                        الخصم</a>
                     </li>
                     <!--<li class="flist"><a href="#"> <i class="star fa fa-star "> </i> نظام التقييم</a></li>-->

                                          <li class="flist"><a href="{{url('commission')}}"> <i class="fa fa-home"></i> عمولة الموقع</a>
                     </li>
             
                  </ul>
               </div>
               <div class="col-md-3">
                  <ul class="footer-list">
                   
                   @foreach(\App\Page::where('active',1)->get() as $page)
                   
                                        <li class="flist"><a href="{{url('page/'.$page->pLink)}}"> <i class="star fa fa-star "> </i> 
                         {{$page->pName}} </a>
                     </li>
                     
                   @endforeach
                   
                     <!--<li class="flist"><a href="{{url('pages/member')}}"> <i class="star fa fa-star "> </i> عضوية-->
                     <!--   مكاتب العقارات </a>-->
                     <!--</li>-->
                     <!--<li class="flist"><a href="#"> <i class="star fa fa-star "> </i> الإعلانات المميزة</a></li>-->

                     <!--<li class="flist"><a href="{{url('page/rules')}}"> <i class="fa fa-home"></i> معاهدة إستخدام-->
                     <!--   الموقع</a>-->
                     <!--</li>-->
                     <!--<li class="flist"><a href="{{url('page/terms')}}"> <i class="fa fa-home"></i> شروط استخدام-->
                     <!--   الموقع </a>-->
                     <!--</li>-->
                     
                     <!--                     <li class="flist"><a href="{{url('page/n')}}"> <i class="star fa fa-star "> </i> رسوم الخدمات-->
                     <!--   المكررة</a>-->
                     <!--</li>-->
                     <!--<li class="flist"><a href="{{url('pages/member')}}"> <i class="star fa fa-star "> </i> العضوية-->
                     <!--   الذهبيه </a>-->
                     <!--</li>-->
                     
                  </ul>
               </div>
                              <div class="col-md-3">
                              <div class="row logos-hh">
                <div class="col-md-6">
                    <a href="#" class="download-btn apple">
                        <img src="{{Request::root().'/public/upload/logo/'.getSettings('techLogo')}}" width="150px">
                    </a>


                </div>
                    <div class="col-md-6">
                        <a href="#" class="download-btn apple">
                            <img src="{{Request::root().'/public/upload/logo/'.getSettings('footerLogo')}}" width="200px">
                        </a>
                    </div>

                    </div>
                <!-- /.row -->
                 <div class="col-md-12">
                     <h4 class="h4">رقم معروف :{{getSettings('MaroofNumber')}}</h4>
<br>
                     <a href="#" class="download-btn apple">
                         <img src="{{Request::root().'/public/upload/logo/'.getSettings('MaroofLogo')}}" width="200px">
                     </a>
                 </div>
             </div>
            </div>
         </div>
      </footer>
      @php
      if (isset(auth()->user()->id)){
      $user = auth()->user()->id;
      }
      @endphp
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="text-align: center">الصورة الشخصية</h4>
               </div>
               <div class="modal-body" style="text-align: center">
                  <form method="post" action="{{route('update-image')}}" id="Form" enctype="multipart/form-data">
                     <input type="hidden" name="id" value="{{(isset($user))?$user:''}}">
                     <input type="file" name="image" class=" pull-left" onclick="$(e.preventDefault())">
                  </form>
               </div>
               <div class="modal-footer ">
                  <button type="button" class="btn btn-success pull-left" data-dismiss="modal"
                     onclick="$('#Form').submit()">تعديل</button>
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- BEGIN PAGE LEVEL Toastr -->
      {!! HTML::script('public/admin/global/plugins/bootstrap-toastr/toastr.min.js') !!}
      <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
      <script type="text/javascript">
 
         
         // chrome.tabs.onCreated.addListener(function() {alert('hello new tab')});
         
         Pusher.logToConsole = false;
         
         var pusher = new Pusher('34b9ea6826c359c41c3f', {
         
             cluster: 'eu',
         
             encrypted: true
         
         });
         
         var channel = pusher.subscribe('desktopNotification');
         
         channel.bind('newCmntOnYourPost{{Auth::guest() ?0: Auth::user()->id}}', function (data) {
         
             if ($('.hideSmall').find('span').hasClass('notificationsNum')) {
         
                 $('.notificationsNum').text(parseInt($('.notificationsNum').text()) + 1);
         
             } else {
         
                 $('.notificationsa').prepend('<span class="badge badge-danger notificationsNum">1</span>');
         
             }
         
         });
         
         
         
         if (+localStorage.tabCount > 0) {
         
         } else {
         
             localStorage.tabCount = 0;
         
             channel.bind('newCmntOnYourPost{{Auth::guest() ?0: Auth::user()->id}}', function (data) {
         
                 // request permission on page load
         
                 document.addEventListener('DOMContentLoaded', function () {
         
                     if (Notification.permission !== "granted")
         
                         Notification.requestPermission();
         
                 });
         
         
         
                 if (!Notification) {
         
                     alert('Desktop notifications not available in your browser. Try Chromium.');
         
                     return;
         
                 }
         
         
         
                 if (Notification.permission !== "granted")
         
                     Notification.requestPermission();
         
                 else {
         
                     var notification = new Notification('يوجد رد جديد على إعلان خاص بك', {
         
                         icon: '{{Request::root()}}/public/upload/logo/favicon.png',
         
                         body: "قام " + data.username + " بالرد عى إعلانك " + data.title + " !",
         
                         dir: "rtl",
         
                         lang: "ar-sa",
         
                     });
         
         
         
                     notification.onclick = function () {
         
                         window.open(data.url);
         
                     };
         
                     setTimeout(notification.close.bind(notification), 15000);
         
                 }
         
             });
         
         }
         
         localStorage.tabCount = +localStorage.tabCount + 1;
         
         window.onunload = function () {
         
             localStorage.tabCount = +localStorage.tabCount - 1;
         
         };
      </script>
      <script>
         $(document).ready(function () {
         
             $("#myBtn").click(function (event) {
         
                 event.preventDefault();
         
                 $("#myModal").modal();
         
             });
         
         });
         
         $("#myBtn").one('click', function () {
         
             $("#user").clone().appendTo(".modal-body");
         
         });
         
         
         /* close small screen nav menu on overlay click */
const navCollabse = document.querySelector("#main-nav .navbar-collapse");

function handleCloseSmallMenu() {
  navCollabse.classList.remove("show");
  handleAnimateToggler();
}

/* Animate main-navbar menu toggler */
const navToggler = document.getElementById("toggler-icon");

navToggler.addEventListener("click", handleAnimateToggler);

function handleAnimateToggler() {
  navToggler.classList.toggle("open");

  const togglerClassList = navToggler.classList;
  const isOpen = togglerClassList.contains("open");

  if (isOpen) {
    createOverlay({ togglerId: "nav-menu", handler: handleCloseSmallMenu });
    togglerClassList.remove("fa-bars");
    togglerClassList.add("fa-arrow-right");
  } else {
    togglerClassList.add("fa-bars");
    togglerClassList.remove("fa-arrow-right");
    removeOverlay("nav-menu");
  }
}

function createOverlay({
  targetId,
  togglerId,
  handler = null,
  classNames = "",
}) {
  const overlay = document.createElement("div");
  overlay.setAttribute("class", "overlay show" + " " + classNames);
  overlay.setAttribute("id", togglerId + "-overlay");
  overlay.addEventListener("click", () => {
    handler ? handler() : toggleElemVisibility(targetId);
    removeOverlay(togglerId);
  });
  document.body.appendChild(overlay);
}

function toggleElemVisibility(id) {
  const elem = document.getElementById(id);
  console.log(elem);
  elem.classList.toggle("show");
}

function removeOverlay(taretId) {
  const overlay = document.getElementById(taretId + "-overlay");
  const remove = function () {
    overlay.remove();
  };
  console.log(overlay);

  overlay.addEventListener("transitionend", () => {
    remove();
    overlay.removeEventListener("transitionend", remove);
  });

  overlay.classList.remove("show");
}

/* Handle Toggle filter-nav Overlay*/
const filterNavToggler = document.getElementById("filter-menu-toggler");

window.addEventListener("click", toggleNavigationOverlay);

function toggleNavigationOverlay(e) {
  const target = e.target;
  const togglerId = target.id;
  if (target.dataset.toggle && target.classList.contains("navbar-toggler")) {
    const isOpen = target.getAttribute("aria-expanded");
    const targetId = target.dataset.target.replace("#", "");
    if (isOpen != "false") createOverlay({ togglerId, targetId });
    else removeOverlay(togglerId);
  }
}

/* Handle Toggle Bottom Modal */
window.addEventListener("click", handleToggleBottomModal);

function handleToggleBottomModal(e) {
  const target = e.target;
  const modalId = target.dataset.toggle;

  if (modalId && target.classList.contains("modal-toggler")) {
    const modal = document.getElementById(target.dataset.toggle);
    const isVisible = modal.classList.contains("show");
    if (!isVisible) {
      modal.classList.add("show");
      createOverlay({
        togglerId: modalId,
        targetId: modalId,
        handler: () => {
          modal.classList.remove("show");
        },
        classNames: "full",
      });
    } else {
      modal.classList.remove("show");
      removeOverlay(modalId);
    }
  }
}

/* Handle Uncheck All Selected Modal Inputs */
window.addEventListener("click", handleResetSelection);

function handleResetSelection(e) {
  const target = e.target;
  const modalId = target.dataset.clear;
  if (modalId && target.classList.contains("clear-btn")) {
    const selectInputs = document.querySelectorAll("#" + modalId + " input");
    for (let input of selectInputs) {
      input.checked = false;
    }
  }
}
          $('#for_m').submit(function() { 
            console.log($('#sreachWord').val());
         window.location = "{{ url('/tags/') }}"+ '/' + $('#sreachWord').val();
});
          $('#for_m').submit(false);

      </script>
      
      
      
      
      
      
      <script>
          $('.navbar-toggler').click(function(){
                $('.navbar .navbar-collapse').toggleClass('show')
                // if (currentScroll > previousScroll) {
                //     $('.navbar .navbar-collapse').addClass('show');
                // } else {
                //     $(' .navbar .navbar-collapse').removeClass('show');
                // }
            });
      </script>
      
      
      
      
      
      
      
      
      <!-- END PAGE LEVEL Toastr -->
      @include('admin/layouts/fMsg')
      @yield('footer')
            {!! HTML::script('public/website/js/app.js') !!}

   </body>
</html>