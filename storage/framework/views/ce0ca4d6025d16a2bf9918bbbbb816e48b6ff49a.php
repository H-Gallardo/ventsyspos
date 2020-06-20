<?php $request = app('Illuminate\Http\Request'); ?>
<div class="col-md-12 no-print pos-header">
  <div class="row">

    <div class="col-md-10">

      <a href="<?php echo e(action('SellPosController@index')); ?>" title="<?php echo e(__('lang_v1.go_back')); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-info btn-flat m-6 btn-xs m-5 pull-right">
        <strong><i class="fa fa-backward fa-lg"></i></strong>
      </a>

      <button type="button" id="close_register" title="<?php echo e(__('cash_register.close_register')); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-danger btn-flat m-6 btn-xs m-5 btn-modal pull-right" data-container=".close_register_modal" 
          data-href="<?php echo e(action('CashRegisterController@getCloseRegister')); ?>">
            <strong><i class="fa fa-window-close fa-lg"></i></strong>
      </button>
      
      <button type="button" id="register_details" title="<?php echo e(__('cash_register.register_details')); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-success btn-flat m-6 btn-xs m-5 btn-modal pull-right" data-container=".register_details_modal" 
          data-href="<?php echo e(action('CashRegisterController@getRegisterDetails')); ?>">
            <strong><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></strong>
      </button>

      <button title="<?php echo e(app('translator')->getFromJson('lang_v1.calculator')); ?>" id="btnCalculator" type="button" class="btn btn-success btn-flat pull-right m-5 btn-xs mt-10 popover-default" data-toggle="popover" data-trigger="click" data-content='<?php echo $__env->make("layouts.partials.calculator", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>' data-html="true" data-placement="bottom">
            <strong><i class="fa fa-calculator fa-lg" aria-hidden="true"></i></strong>
        </button>

      <button type="button" title="<?php echo e(__('lang_v1.full_screen')); ?>" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary btn-flat m-6 hidden-xs btn-xs m-5 pull-right" id="full_screen">
            <strong><i class="fa fa-window-maximize fa-lg"></i></strong>
      </button>

      <button type="button" id="view_suspended_sales" title="<?php echo e(__('lang_v1.view_suspended_sales')); ?>" data-toggle="tooltip" data-placement="bottom" class="btn bg-yellow btn-flat m-6 btn-xs m-5 btn-modal pull-right" data-container=".view_modal" 
          data-href="<?php echo e(action('SellController@index')); ?>?suspended=1">
            <strong><i class="fa fa-pause-circle-o fa-lg"></i></strong>
      </button>

    </div>

    <div class="col-md-2">
      <div class="m-6 pull-right mt-15 hidden-xs"><strong><?php echo e(\Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format'))); ?></strong></div>
    </div>
    
  </div>
</div>
