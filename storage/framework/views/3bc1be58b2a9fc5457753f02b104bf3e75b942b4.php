<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Main Header -->
  <header class="main-header no-print">
    <a href="/home" class="logo">
      
      <span class="logo-lg"><?php echo e(Session::get('business.name')); ?></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <?php if(Module::has('Superadmin')): ?>
        <?php echo $__env->make('superadmin::layouts.partials.active_subscription', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endif; ?>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">

        

        <button id="btnCalculator" title="<?php echo e(app('translator')->getFromJson('lang_v1.calculator')); ?>" type="button" class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10 popover-default" data-toggle="popover" data-trigger="click" data-content='<?php echo $__env->make("layouts.partials.calculator", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>' data-html="true" data-placement="bottom">
            <strong><i class="fa fa-calculator fa-lg" aria-hidden="true"></i></strong>
        </button>
        
        <?php if($request->segment(1) == 'pos'): ?>
          <button type="button" id="register_details" title="<?php echo e(__('cash_register.register_details')); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10 btn-modal" data-container=".register_details_modal" 
          data-href="<?php echo e(action('CashRegisterController@getRegisterDetails')); ?>">
            <strong><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></strong>
          </button>
          <button type="button" id="close_register" title="<?php echo e(__('cash_register.close_register')); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-danger btn-flat pull-left m-8 hidden-xs btn-sm mt-10 btn-modal" data-container=".close_register_modal" 
          data-href="<?php echo e(action('CashRegisterController@getCloseRegister')); ?>">
            <strong><i class="fa fa-window-close fa-lg"></i></strong>
          </button>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
          <a href="<?php echo e(action('SellPosController@create')); ?>" title="POS" data-toggle="tooltip" data-placement="bottom" class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10">
            <strong><i class="fa fa-th-large"></i> &nbsp; POS</strong>
          </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profit_loss_report.view')): ?>
          <button type="button" id="view_todays_profit" title="<?php echo e(__('home.todays_profit')); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10">
            <strong><i class="fa fa-money fa-lg"></i></strong>
          </button>
        <?php endif; ?>

        <!-- Help Button -->
        <?php if(auth()->user()->hasRole('Admin#' . auth()->user()->business_id)): ?>
          <button type="button" id="start_tour" title="<?php echo e(app('translator')->getFromJson('lang_v1.application_tour')); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10">
            <strong><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></strong>
          </button>
        <?php endif; ?>

        <div class="m-8 pull-left mt-15 hidden-xs" style="color: #fff;"><strong><?php echo e(\Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format'))); ?></strong></div>

        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span><?php echo e(Auth::User()->first_name); ?> <?php echo e(Auth::User()->last_name); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <?php if(!empty(Session::get('business.logo'))): ?>
                  <img src="<?php echo e(url( 'uploads/business_logos/' . Session::get('business.logo') )); ?>" alt="Logo"></span>
                <?php endif; ?>
                <p>
                  <?php echo e(Auth::User()->first_name); ?> <?php echo e(Auth::User()->last_name); ?>

                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo e(action('UserController@getProfile')); ?>" class="btn btn-default btn-flat"><?php echo e(app('translator')->getFromJson('lang_v1.profile')); ?></a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo e(action('Auth\LoginController@logout')); ?>" class="btn btn-default btn-flat"><?php echo e(app('translator')->getFromJson('lang_v1.sign_out')); ?></a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>