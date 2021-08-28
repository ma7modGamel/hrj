@foreach($cats as $cat)
	<li class="carModel"><a data-id="{{$cat->id}}" href="{{url('tags/'.$cat->id)}}" class="tagTab">{{$cat->name}}</a></li>

@endforeach