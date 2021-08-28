    <div id="header-wrap">
        <div  id="header" class="clear">
            <a  href="{{url('/')}}">الرئيسية</a>
                
            @foreach(\App\Cat::whereNull('parent_id')->get() as $cat)
            <li class="mainCat">
            <a   data-id="{{$cat->id}}" href="{{url('tags/'$cat->id)}}">{{$cat->name}} </a>
            </li>
            @endif

            
            <a href="{{url('advsearch')}}"> <i class="fa fa-search"></i> البحث</a>

            <a href="{{url('pages/sitemap')}}"><i class="fa fa-sitemap"></i> أقسام أكثر ...</a>
       </div>
    </div>
