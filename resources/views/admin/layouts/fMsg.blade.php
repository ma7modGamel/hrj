@if(Session::has('flash_message'))
<script type="text/javascript">
    toastr.options.timeOut = '6000';
    toastr.options.positionClass = 'toast-bottom-left';
	Command: toastr["{{in_array('admincp',Request::segments()) ? 'success' : 'info'}}"]("{{ Session::get('flash_message') }}")
</script>
@elseif(Session::has('error_flash_message'))
<script type="text/javascript">
    toastr.options.timeOut = '6000';
    toastr.options.positionClass = 'toast-bottom-left';
	Command: toastr["error"]("{{ Session::get('error_flash_message') }}")
</script>
@endif
