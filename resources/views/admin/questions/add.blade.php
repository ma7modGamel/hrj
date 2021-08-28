<!-- /.modal -->
<div id="addQuestion" class="modal fade" tabindex="-1" data-width="400" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<span class="modal-title">إضافة سؤال جديد</span>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
	                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admincp/questions') }}">
                        	{{ csrf_field() }}
	                    	@include('admin.questions.form')
	                    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
