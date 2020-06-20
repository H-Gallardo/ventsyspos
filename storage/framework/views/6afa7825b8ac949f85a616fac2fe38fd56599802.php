<?php $__env->startSection('title', __('role.add_role')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><?php echo e(app('translator')->getFromJson( 'role.add_role' )); ?></h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-body">
      <?php echo Form::open(['url' => action('RoleController@store'), 'method' => 'post', 'id' => 'role_add_form' ]); ?>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label('name', __( 'user.role_name' ) . ':*'); ?>

              <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'user.role_name' ) ]);; ?>

          </div>
        </div>
      </div>
      <?php if(in_array('service_staff', $enabled_modules)): ?>
      <div class="row">
        <div class="col-md-2">
          <h4><?php echo e(app('translator')->getFromJson( 'lang_v1.user_type' )); ?></h4>
        </div>
        <div class="col-md-9 col-md-offset-1">
          <div class="col-md-12">
          <div class="checkbox">
            <label>
              <?php echo Form::checkbox('is_service_staff', 1, false, 
              [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'restaurant.service_staff' )); ?>

            </label>
            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('restaurant.tooltip_service_staff') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
          </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-3">
          <label><?php echo e(app('translator')->getFromJson( 'user.permissions' )); ?>:</label> 
        </div>
      </div>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'role.user' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'user.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.user.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'user.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.user.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'user.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.user.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'user.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.user.delete' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'user.roles' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'roles.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_role' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'roles.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.add_role' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'roles.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.edit_role' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'roles.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.delete_role' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'role.supplier' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'supplier.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.supplier.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'supplier.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.supplier.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'supplier.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.supplier.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'supplier.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.supplier.delete' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'role.customer' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'customer.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.customer.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'customer.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.customer.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'customer.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.customer.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'customer.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.customer.delete' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'business.product' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.delete' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.opening_stock', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.add_opening_stock' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'role.purchase' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase.delete' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.payments', false,['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.purchase.payments')); ?>

              </label>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.purchase_payments') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'sale.sale' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sell.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sell.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sell.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sell.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.delete' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'direct_sell.access', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.direct_sell.access' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sell.payments', false, ['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.sell.payments')); ?>

              </label>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.sell_payments') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'edit_product_price_from_sale_screen', false, ['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.edit_product_price_from_sale_screen')); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'edit_product_discount_from_sale_screen', false, ['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.edit_product_discount_from_sale_screen')); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'role.brand' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'brand.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.brand.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'brand.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.brand.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'brand.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.brand.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'brand.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.brand.delete' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'role.tax_rate' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_rate.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_rate.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_rate.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_rate.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_rate.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_rate.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_rate.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_rate.delete' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'role.unit' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'unit.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.unit.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'unit.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.unit.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'unit.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.unit.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'unit.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.unit.delete' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'category.category' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'category.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.category.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'category.create', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.category.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'category.update', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.category.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'category.delete', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.category.delete' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'role.report' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase_n_sell_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase_n_sell_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'contacts_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.contacts_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'expense_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.expense_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'profit_loss_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.profit_loss_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'stock_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.stock_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'trending_product_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.trending_product_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'register_report.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.register_report.view' )); ?>

              </label>
            </div>
          </div>

          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sales_representative.view', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sales_representative.view' )); ?>

              </label>
            </div>
          </div> 

        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'role.settings' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'business_settings.access', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.business_settings.access' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'barcode_settings.access', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.barcode_settings.access' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'invoice_settings.access', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.invoice_settings.access' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'expense.access', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.expense.access' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row check_group">
        <div class="col-md-3">
          <h4><?php echo e(app('translator')->getFromJson( 'role.dashboard' )); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.dashboard_permission') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h4>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'dashboard.data', true, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.dashboard.data' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <?php if(in_array('tables', $enabled_modules) && in_array('service_staff', $enabled_modules) ): ?>
      <div class="row check_group">
        <div class="col-md-1">
          <h4><?php echo e(app('translator')->getFromJson( 'restaurant.bookings' )); ?></h4>
        </div>
        <div class="col-md-2">
          <div class="checkbox">
              <label>
                <input type="checkbox" class="check_all input-icheck" > <?php echo e(__( 'role.select_all' )); ?>

              </label>
            </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'crud_all_bookings', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'restaurant.add_edit_view_all_booking' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'crud_own_bookings', false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'restaurant.add_edit_view_own_booking' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-3">
          <h4><?php echo e(app('translator')->getFromJson( 'role.access_locations' )); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.access_locations_permission') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h4>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
                <label>
                  <?php echo Form::checkbox('permissions[]', 'access_all_locations', true, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.all_locations' )); ?> 
                </label>
                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.all_location_permission') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
          </div>
          <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('location_permissions[]', 'location.' . $location->id, false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e($location->name); ?>

              </label>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <?php if(count($selling_price_groups) > 0): ?>
      <hr>
      <div class="row">
        <div class="col-md-3">
          <h4><?php echo e(app('translator')->getFromJson( 'lang_v1.access_selling_price_groups' )); ?></h4>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'access_default_selling_price', true, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__('lang_v1.default_selling_price')); ?>

              </label>
            </div>
          </div>
          <?php $__currentLoopData = $selling_price_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selling_price_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('spg_permissions[]', 'selling_price_group.' . $selling_price_group->id, false, 
                [ 'class' => 'input-icheck']);; ?> <?php echo e($selling_price_group->name); ?>

              </label>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <?php endif; ?>
      <?php echo $__env->make('role.partials.module_permissions', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <div class="row">
        <div class="col-md-12">
           <button type="submit" class="btn btn-primary pull-right"><?php echo e(app('translator')->getFromJson( 'messages.save' )); ?></button>
        </div>
      </div>
       
      <?php echo Form::close(); ?>

    </div>
  </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>