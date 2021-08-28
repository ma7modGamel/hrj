<!-- /.modal -->
<div id="addArea" class="modal fade" tabindex="-1" data-width="400" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            	@if(isset($id))
				<span class="modal-title">إضافة منطقه جديده</span>
				@else
				<span class="modal-title">إضافة دولة جديده</span>
				@endif
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
	                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admincp/areas') }}">
	                    	@include('admin.areas.form')
	                    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
