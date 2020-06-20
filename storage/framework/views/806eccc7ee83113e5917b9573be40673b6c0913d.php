<li class="treeview <?php echo e($request->segment(1) == 'account' ? 'active active-sub' : ''); ?>">
  <a href="#"><i class="fa fa-money" aria-hidden="true"></i> <span><?php echo e(app('translator')->getFromJson('account::lang.account')); ?></span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
      <li class="<?php echo e($request->segment(1) == 'account' && $request->segment(2) == 'account' ? 'active' : ''); ?>"><a href="<?php echo e(action('\Modules\Account\Http\Controllers\AccountController@index')); ?>"><i class="fa fa-list"></i><?php echo e(app('translator')->getFromJson('account::lang.list_accounts')); ?></a></li>

      <li class="<?php echo e($request->segment(1) == 'account' && $request->segment(2) == 'balance-sheet' ? 'active' : ''); ?>"><a href="<?php echo e(action('\Modules\Account\Http\Controllers\ReportsController@balanceSheet')); ?>"><i class="fa fa-book"></i><?php echo e(app('translator')->getFromJson('account::lang.balance_sheet')); ?></a></li>

      <li class="<?php echo e($request->segment(1) == 'account' && $request->segment(2) == 'trial-balance' ? 'active' : ''); ?>"><a href="<?php echo e(action('\Modules\Account\Http\Controllers\ReportsController@trialBalance')); ?>"><i class="fa fa-balance-scale"></i><?php echo e(app('translator')->getFromJson('account::lang.trial_balance')); ?></a></li>

      <li class="<?php echo e($request->segment(1) == 'account' && $request->segment(2) == 'payment-account-report' ? 'active' : ''); ?>"><a href="<?php echo e(action('\Modules\Account\Http\Controllers\ReportsController@paymentAccountReport')); ?>"><i class="fa fa-file-text-o"></i><?php echo e(app('translator')->getFromJson('account::lang.payment_account_report')); ?></a></li>
  </ul>
</li>