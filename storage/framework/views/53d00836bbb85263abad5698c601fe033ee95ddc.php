<script type="text/javascript">
    base_path = "<?php echo e(url('/')); ?>";
</script>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js?v=$asset_v"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js?v=$asset_v"></script>
<![endif]-->

<script src="<?php echo e(asset('AdminLTE/plugins/pace/pace.min.js?v=' . $asset_v)); ?>"></script>

<!-- jQuery 2.2.3 -->
<script src="<?php echo e(asset('AdminLTE/plugins/jQuery/jquery-2.2.3.min.js?v=' . $asset_v)); ?>"></script>
<script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js?v=' . $asset_v)); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js?v=' . $asset_v)); ?>"></script>
<!-- iCheck -->
<script src="<?php echo e(asset('AdminLTE/plugins/iCheck/icheck.min.js?v=' . $asset_v)); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('AdminLTE/plugins/select2/select2.full.min.js?v=' . $asset_v)); ?>"></script>
<!-- Add language file for select2 -->
<script src="<?php echo e(asset('AdminLTE/plugins/select2/lang/' . session()->get('user.language', config('app.locale') ) . '.js?v=' . $asset_v)); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo e(asset('AdminLTE/plugins/datepicker/bootstrap-datepicker.min.js?v=' . $asset_v)); ?>"></script>
<!-- DataTables -->
<script src="<?php echo e(asset('AdminLTE/plugins/DataTables/datatables.min.js?v=' . $asset_v)); ?>"></script>
<script src="<?php echo e(asset('AdminLTE/plugins/DataTables/pdfmake-0.1.32/pdfmake.min.js?v=' . $asset_v)); ?>"></script>
<script src="<?php echo e(asset('AdminLTE/plugins/DataTables/pdfmake-0.1.32/vfs_fonts.js?v=' . $asset_v)); ?>"></script>

<!-- jQuery Validator -->
<script src="<?php echo e(asset('js/jquery-validation-1.16.0/dist/jquery.validate.min.js?v=' . $asset_v)); ?>"></script>
<script src="<?php echo e(asset('js/jquery-validation-1.16.0/dist/additional-methods.min.js?v=' . $asset_v)); ?>"></script>
<?php
    $validation_lang_file = 'messages_' . session()->get('user.language', config('app.locale') ) . '.js';
?>
<?php if(file_exists(public_path() . '/js/jquery-validation-1.16.0/src/localization/' . $validation_lang_file)): ?>
    <script src="<?php echo e(asset('js/jquery-validation-1.16.0/src/localization/' . $validation_lang_file . '?v=' . $asset_v)); ?>"></script>
<?php endif; ?>

<!-- Toastr -->
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js?v=' . $asset_v)); ?>"></script>
<!-- Bootstrap file input -->
<script src="<?php echo e(asset('plugins/bootstrap-fileinput/fileinput.min.js?v=' . $asset_v)); ?>"></script>
<!--accounting js-->
<script src="<?php echo e(asset('plugins/accounting.min.js?v=' . $asset_v)); ?>"></script>

<script src="<?php echo e(asset('AdminLTE/plugins/daterangepicker/moment.min.js?v=' . $asset_v)); ?>"></script>

<script src="<?php echo e(asset('plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js?v=' . $asset_v)); ?>"></script>

<script src="<?php echo e(asset('AdminLTE/plugins/daterangepicker/daterangepicker.js?v=' . $asset_v)); ?>"></script>

<script src="<?php echo e(asset('AdminLTE/plugins/ckeditor/ckeditor.js?v=' . $asset_v)); ?>"></script>

<script src="<?php echo e(asset('plugins/sweetalert/sweetalert.min.js?v=' . $asset_v)); ?>"></script>

<script src="<?php echo e(asset('plugins/bootstrap-tour/bootstrap-tour.min.js?v=' . $asset_v)); ?>"></script>

<script src="<?php echo e(asset('plugins/printThis.js?v=' . $asset_v)); ?>"></script>

<script src="<?php echo e(asset('plugins/screenfull.min.js?v=' . $asset_v)); ?>""></script>
<?php
    $business_date_format = session('business.date_format');
    $datepicker_date_format = str_replace('d', 'dd', $business_date_format);
    $datepicker_date_format = str_replace('m', 'mm', $datepicker_date_format);
    $datepicker_date_format = str_replace('Y', 'yyyy', $datepicker_date_format);

    $moment_date_format = str_replace('d', 'DD', $business_date_format);
    $moment_date_format = str_replace('m', 'MM', $moment_date_format);
    $moment_date_format = str_replace('Y', 'YYYY', $moment_date_format);

    $business_time_format = session('business.time_format');
    $moment_time_format = 'HH:mm';
    if($business_time_format == 12){
        $moment_time_format = 'hh:mm A';
    }

?>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    var financial_year = {
    	start: moment('<?php echo e(Session::get("financial_year.start")); ?>'),
    	end: moment('<?php echo e(Session::get("financial_year.end")); ?>'),
    }
    //Default setting for select2
    $.fn.select2.defaults.set("language", "<?php echo e(session()->get('user.language', config('app.locale'))); ?>");

    var datepicker_date_format = "<?php echo e($datepicker_date_format); ?>";
    var moment_date_format = "<?php echo e($moment_date_format); ?>";
    var moment_time_format = "<?php echo e($moment_time_format); ?>";
</script>

<!-- Scripts -->
<script src="<?php echo e(asset('js/AdminLTE-app.js?v=' . $asset_v)); ?>"></script>

<?php if(file_exists(public_path('js/lang/' . session()->get('user.language', config('app.locale')) . '.js'))): ?>
    <script src="<?php echo e(asset('js/lang/' . session()->get('user.language', config('app.locale') ) . '.js?v=' . $asset_v)); ?>"></script>
<?php else: ?>
    <script src="<?php echo e(asset('js/lang/en.js?v=' . $asset_v)); ?>"></script>
<?php endif; ?>

<script src="<?php echo e(asset('js/functions.js?v=' . $asset_v)); ?>"></script>
<script src="<?php echo e(asset('js/common.js?v=' . $asset_v)); ?>"></script>
<script src="<?php echo e(asset('js/app.js?v=' . $asset_v)); ?>"></script>
<script src="<?php echo e(asset('js/help-tour.js?v=' . $asset_v)); ?>"></script>
<script src="<?php echo e(asset('plugins/calculator/calculator.js?v=' . $asset_v)); ?>"></script>

<?php echo $__env->yieldContent('javascript'); ?>