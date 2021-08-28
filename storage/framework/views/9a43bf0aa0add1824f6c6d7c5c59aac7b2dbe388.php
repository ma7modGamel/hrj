<?php if(Session::has('flash_message')): ?>
<script type="text/javascript">
    toastr.options.timeOut = '6000';
    toastr.options.positionClass = 'toast-bottom-left';
	Command: toastr["<?php echo e(in_array('admincp',Request::segments()) ? 'success' : 'info'); ?>"]("<?php echo e(Session::get('flash_message')); ?>")
</script>
<?php elseif(Session::has('error_flash_message')): ?>
<script type="text/javascript">
    toastr.options.timeOut = '6000';
    toastr.options.positionClass = 'toast-bottom-left';
	Command: toastr["error"]("<?php echo e(Session::get('error_flash_message')); ?>")
</script>
<?php endif; ?>
<?php /**PATH /home/harajfp/public_html/resources/views/admin/layouts/fMsg.blade.php ENDPATH**/ ?>