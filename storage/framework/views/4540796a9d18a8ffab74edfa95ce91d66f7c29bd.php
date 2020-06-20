<?php $request = app('Illuminate\Http\Request'); ?>

<?php
    $pos_layout = true;
?>

<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(in_array(session()->get('user.language', config('app.locale')), config('constants.langs_rtl')) ? 'rtl' : 'ltr'); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(Session::get('business.name')); ?></title> 

        <script src="<?php echo e(asset('AdminLTE/plugins/pace/pace.min.js?v=' . $asset_v)); ?>"></script>
        <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/plugins/pace/pace.css?v='.$asset_v)); ?>">

        <?php echo $__env->make('layouts.partials.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('css'); ?>
    </head>

    <body class="hold-transition lockscreen">
        <div class="wrapper">
            <script type="text/javascript">
                if(localStorage.getItem("upos_sidebar_collapse") == 'true'){
                    var body = document.getElementsByTagName("body")[0];
                    body.className += " sidebar-collapse";
                }
            </script>
        
            <!-- Content Wrapper. Contains page content -->
            <div class="container-fluid">
             <?php echo $__env->make('layouts.partials.header-restaurant', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <!-- Add currency related field-->
                <input type="hidden" id="__code" value="<?php echo e(session('currency')['code']); ?>">
                <input type="hidden" id="__symbol" value="<?php echo e(session('currency')['symbol']); ?>">
                <input type="hidden" id="__thousand" value="<?php echo e(session('currency')['thousand_separator']); ?>">
                <input type="hidden" id="__decimal" value="<?php echo e(session('currency')['decimal_separator']); ?>">
                <input type="hidden" id="__symbol_placement" value="<?php echo e(session('business.currency_symbol_placement')); ?>">
                <!-- End of currency related field-->

                <?php if(session('status')): ?>
                    <input type="hidden" id="status_span" data-status="<?php echo e(session('status.success')); ?>" data-msg="<?php echo e(session('status.msg')); ?>">
                <?php endif; ?>
                <?php echo $__env->yieldContent('content'); ?>
                <?php if(config('constants.iraqi_selling_price_adjustment')): ?>
                    <input type="hidden" id="iraqi_selling_price_adjustment">
                <?php endif; ?>

                <!-- This will be printed -->
                <section class="invoice print_section" id="receipt_section">
                </section>
                
            </div>
            <?php echo $__env->make('home.todays_profit_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /.content-wrapper -->

            <?php echo $__env->make('layouts.partials.footer-restaurant', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>

        <?php echo $__env->make('layouts.partials.javascripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <script src="<?php echo e(asset('js/restaurant.js?v=' . $asset_v)); ?>"></script>
        <div class="modal fade view_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
    </body>

</html>