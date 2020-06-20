<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name', 'POS')); ?></title> 

    <?php echo $__env->make('layouts.partials.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Jquery Steps -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/jquery.steps/jquery.steps.css?v=' . $asset_v)); ?>">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition register-page">
    <?php if(session('status')): ?>
        <input type="hidden" id="status_span" data-status="<?php echo e(session('status.success')); ?>" data-msg="<?php echo e(session('status.msg')); ?>">
    <?php endif; ?>

    <?php if(!isset($no_header)): ?>
        <?php echo $__env->make('layouts.partials.header-auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
    
    <?php echo $__env->make('layouts.partials.javascripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script src="<?php echo e(asset('plugins/jquery.steps/jquery.steps.min.js?v=' . $asset_v)); ?>"></script>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/login.js?v=' . $asset_v)); ?>"></script>
    <?php echo $__env->yieldContent('javascript'); ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.select2_register').select2();
        });
    </script>
</body>

</html>