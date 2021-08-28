@extends('layouts.app')

@section('header')
<style type="text/css">

</style>
@endsection
@section('content')
<div class="body">
    <div class="col-md-12  md-padd_n">
		<div class="alert alert-danger" style="text-align: center;"> {{getSettings('closeMsg')}} </div>
	</div>
</div>
@endsection


@section('footer')
<script type="text/javascript">


</script>

@endsection