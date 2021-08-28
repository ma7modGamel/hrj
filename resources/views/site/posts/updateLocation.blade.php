@extends('layouts.app')

@section('title')
تعديل موقع السلعه
@endsection
@section('content')
<div class="singleContent ">
  <h3> » تحديد موقع السلعة </h3>
  <span class="pull-left setSelectLocation" style="color: #0473c0"> تغيير المدينة؟</span>
  <form action="{{url('updateLocation')}}" method="post" class="form">
  <div class="col-xs-12 col-md-3" id="selectLocation">
    <select class="form-control" name="country" id="country">
      <option value="#">أختر الدولة</option>
      @foreach($areas as $area)
      @if($area->parent_id == 0)
      <option {{$areas->find($post->area_id)->parent_id == $area->id ? 'selected' : '' }} value="{{$area->id}}">{{$area->name}}</option>
      @endif
      @endforeach
    </select>
    <br>
    <select class="form-control" name="area_id" id="area_id">
      @foreach($areas as $area)
      @if($area->parent_id != 0)
      <option {{$area->id == $post->area_id ? 'selected' : ''}} data-parent="{{$area->parent_id}}" value="{{$area->id}}">{{$area->name}}</option>
      @endif
      @endforeach
    </select>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
    {{ csrf_field() }}
    <div id="mapContent">
      <center>
        <div id="latlongmap" style="height:450px;width: 80%;"></div>
      </center>
      <br>
      <span class="inst " style=""> حرك المؤشر الى مكان العرض</span><br>
      <br><br>

      <input class="hidden" name="post_id" value="{{$_GET['ad_Id']}}">
      <input class="hidden" name="lat" id="lat" value="">
      <input class="hidden" name="lng" id="lng" value="">

      <button id="submit" name="submit" class="button  btn-success btn-large" type="submit" value="تعديل" style="">تعديل </button>
      <br> <br>
      <span class=" label label-info">ملاحظة</span> موقعك الدقيق لايظهر في إعلانك. يظهر فقط أسم المحافظه.
    </div>
  </form>
</div>
@endsection
@section('footer')
<script type="text/javascript">

  $("#selectLocation").hide();
  $(document).on("click",".setSelectLocation",function() {
    $(".setSelectLocation").hide();
    $("#selectLocation").show();
  });

  $("#area_id option").hide();
  $("#area_id option[data-parent=" + $('#country').val() + "]").show();
  $(document).on("change","#country",function() {
    var value=$(this).val();
    $("#area_id").show();
    $("#area_id option").hide();
    $('#area_id').prepend('<option disabled selected value="#">أختر المحافظه</option>');
    $("#area_id option[data-parent=" + value + "]").show();
  });

  function initialize() {
    var e = new google.maps.LatLng(24.701925,46.675415), t = {
      zoom: 5,
      center: e,
      panControl: !0,
      scrollwheel: 1,
      scaleControl: !0,
      overviewMapControl: !0,
      overviewMapControlOptions: {opened: !0},
      mapTypeId: google.maps.MapTypeId.terrain
    };
    map = new google.maps.Map(document.getElementById("latlongmap"), t), geocoder = new google.maps.Geocoder, marker = new google.maps.Marker({
      position: e,
      map: map
    }), map.streetViewControl = !1, infowindow = new google.maps.InfoWindow({content: "(24.701925,46.675415))"}), google.maps.event.addListener(map, "click", function (e) {
      marker.setPosition(e.latLng);
      var t = e.latLng, o = "(" + t.lat().toFixed(6) + ", " + t.lng().toFixed(6) + ")";
      infowindow.setContent(o),
      document.getElementById("lat").value = t.lat().toFixed(6),
      document.getElementById("lng").value = t.lng().toFixed(6)
    })
  }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwqrlZASdsR2P-KqDBBaGQrVFb7Uom2Uk&language=ar&callback=initialize"></script>
@endsection