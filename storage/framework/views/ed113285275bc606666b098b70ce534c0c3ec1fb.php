<!-- /.modal -->
<div id="addBanks" class="modal fade" tabindex="-1" data-width="400" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<span class="modal-title">إضافة بنك جديد</span>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
	                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/admincp/banks')); ?>">
                        	<?php echo e(csrf_field()); ?>

	                    	<?php echo $__env->make('admin.banks.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	                    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php /**PATH /home/workox0x/public_html/haraj/resources/views/admin/banks/add.blade.php ENDPATH**/ ?>