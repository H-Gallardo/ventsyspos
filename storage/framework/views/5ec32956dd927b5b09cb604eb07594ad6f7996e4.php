<?php $__env->startSection('title', __('role.edit_role')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><?php echo e(app('translator')->getFromJson( 'role.edit_role' )); ?></h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-body">
      <?php echo Form::open(['url' => action('RoleController@update', [$role->id]), 'method' => 'PUT', 'id' => 'role_form' ]); ?>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label('name', __( 'user.role_name' ) . ':*'); ?>

              <?php echo Form::text('name', str_replace( '#' . auth()->user()->business_id, '', $role->name) , ['class' => 'form-control', 'required', 'placeholder' => __( 'user.role_name' ) ]);; ?>

          </div>
        </div>
      </div>
      
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
                <?php echo Form::checkbox('permissions[]', 'user.view', in_array('user.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.user.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'user.create', in_array('user.create', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.user.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'user.update', in_array('user.update', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.user.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'user.delete', in_array('user.delete', $role_permissions), 
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
                <?php echo Form::checkbox('permissions[]', 'roles.view', in_array('roles.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.view_role' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'roles.create', in_array('roles.create', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.add_role' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'roles.update', in_array('roles.update', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.edit_role' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'roles.delete', in_array('roles.delete', $role_permissions), 
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
                <?php echo Form::checkbox('permissions[]', 'supplier.view', in_array('supplier.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.supplier.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'supplier.create', in_array('supplier.create', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.supplier.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'supplier.update', in_array('supplier.update', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.supplier.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'supplier.delete', in_array('supplier.delete', $role_permissions), 
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
                <?php echo Form::checkbox('permissions[]', 'customer.view', in_array('customer.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.customer.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'customer.create', in_array('customer.create', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.customer.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'customer.update', in_array('customer.update', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.customer.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'customer.delete', in_array('customer.delete', $role_permissions), 
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
                <?php echo Form::checkbox('permissions[]', 'product.view', in_array('product.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.create', in_array('product.create', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.update', in_array('product.update', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.delete', in_array('product.delete', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.product.delete' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'product.opening_stock', in_array('product.opening_stock', $role_permissions), 
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
                <?php echo Form::checkbox('permissions[]', 'purchase.view', in_array('purchase.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.create', in_array('purchase.create', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.update', in_array('purchase.update', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.delete', in_array('purchase.delete', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase.delete' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'purchase.payments', in_array('purchase.payments', $role_permissions),['class' => 'input-icheck']);; ?>

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
                <?php echo Form::checkbox('permissions[]', 'sell.view', in_array('sell.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sell.create', in_array('sell.create', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sell.update', in_array('sell.update', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sell.delete', in_array('sell.delete', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.sell.delete' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'direct_sell.access', in_array('direct_sell.access', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.direct_sell.access' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sell.payments', in_array('sell.payments', $role_permissions), ['class' => 'input-icheck']);; ?>

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
                <?php echo Form::checkbox('permissions[]', 'edit_product_price_from_sale_screen', in_array('edit_product_price_from_sale_screen', $role_permissions), ['class' => 'input-icheck']);; ?>

                <?php echo e(__('lang_v1.edit_product_price_from_sale_screen')); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'edit_product_discount_from_sale_screen', in_array('edit_product_discount_from_sale_screen', $role_permissions), ['class' => 'input-icheck']);; ?>

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
                <?php echo Form::checkbox('permissions[]', 'brand.view', in_array('brand.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.brand.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'brand.create', in_array('brand.create', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.brand.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'brand.update', in_array('brand.update', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.brand.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'brand.delete', in_array('brand.delete', $role_permissions), 
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
                <?php echo Form::checkbox('permissions[]', 'tax_rate.view', in_array('tax_rate.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_rate.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_rate.create', in_array('tax_rate.create', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_rate.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_rate.update', in_array('tax_rate.update', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_rate.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_rate.delete', in_array('tax_rate.delete', $role_permissions), 
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
                <?php echo Form::checkbox('permissions[]', 'unit.view', in_array('unit.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.unit.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'unit.create', in_array('unit.create', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.unit.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'unit.update', in_array('unit.update', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.unit.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'unit.delete', in_array('unit.delete', $role_permissions), 
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
                <?php echo Form::checkbox('permissions[]', 'category.view', in_array('category.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.category.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'category.create', in_array('category.create', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.category.create' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'category.update', in_array('category.update', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.category.update' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'category.delete', in_array('category.delete', $role_permissions), 
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
                <?php echo Form::checkbox('permissions[]', 'purchase_n_sell_report.view', in_array('purchase_n_sell_report.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.purchase_n_sell_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'tax_report.view', in_array('tax_report.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.tax_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'contacts_report.view', in_array('contacts_report.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.contacts_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'expense_report.view', in_array('expense_report.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.expense_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'profit_loss_report.view', in_array('profit_loss_report.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.profit_loss_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'stock_report.view', in_array('stock_report.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.stock_report.view' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'trending_product_report.view', in_array('trending_product_report.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.trending_product_report.view' )); ?>

              </label>
            </div>
          </div>

          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'register_report.view', in_array('register_report.view', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.register_report.view' )); ?>

              </label>
            </div>
          </div>

          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'sales_representative.view', in_array('sales_representative.view', $role_permissions), 
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
                <?php echo Form::checkbox('permissions[]', 'business_settings.access', in_array('business_settings.access', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.business_settings.access' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'barcode_settings.access', in_array('barcode_settings.access', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.barcode_settings.access' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'invoice_settings.access', in_array('invoice_settings.access', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.invoice_settings.access' )); ?>

              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'expense.access', in_array('expense.access', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.expense.access' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-3">
          <h4><?php echo e(app('translator')->getFromJson( 'role.dashboard' )); ?></h4>
        </div>
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <?php echo Form::checkbox('permissions[]', 'dashboard.data', in_array('dashboard.data', $role_permissions), 
                [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.dashboard.data' )); ?>

              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <?php echo Form::checkbox('permissions[]', 'access_all_locations', in_array('access_all_locations', $role_permissions), 
                [ 'class' => 'hide']);; ?>

      <div class="row">
        <div class="col-md-12">
           <button type="submit" class="btn btn-primary pull-right"><?php echo e(app('translator')->getFromJson( 'messages.update' )); ?></button>
        </div>
      </div>
       
      <?php echo Form::close(); ?>

    </div>
  </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>