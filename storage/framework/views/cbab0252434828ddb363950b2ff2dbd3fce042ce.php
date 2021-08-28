<!-- /.modal -->
<div id="addArea" class="modal fade" tabindex="-1" data-width="400" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            	<?php if(isset($id)): ?>
				<span class="modal-title">إضافة منطقه جديده</span>
				<?php else: ?>
				<span class="modal-title">إضافة دولة جديده</span>
				<?php endif; ?>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
	                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/admincp/areas')); ?>">
	                    	<?php echo $__env->make('admin.areas.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	                    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php /**PATH /home/harajfp/public_html/resources/views/admin/areas/add.blade.php ENDPATH**/ ?>