<?php $__env->startSection('title', __('product.add_new_product')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('product.add_new_product')); ?></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
<?php echo Form::open(['url' => action('ProductController@store'), 'method' => 'post', 
'id' => 'product_add_form','class' => 'product_form', 'files' => true ]); ?>

	<div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('name', __('product.product_name') . ':*'); ?>

              <?php echo Form::text('name', !empty($duplicate_product->name) ? $duplicate_product->name : null, ['class' => 'form-control', 'required',
              'placeholder' => __('product.product_name')]);; ?>

          </div>
        </div>
        <div class="col-sm-4 <?php if(!session('business.enable_brand')): ?> hide <?php endif; ?>">
          <div class="form-group">
            <?php echo Form::label('brand_id', __('product.brand') . ':'); ?>

            <div class="input-group">
              <?php echo Form::select('brand_id', $brands, !empty($duplicate_product->brand_id) ? $duplicate_product->brand_id : null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']);; ?>

            <span class="input-group-btn">
                <button type="button" <?php if(!auth()->user()->can('brand.create')): ?> disabled <?php endif; ?> class="btn btn-default bg-white btn-flat btn-modal" data-href="<?php echo e(action('BrandController@create', ['quick_add' => true])); ?>" title="<?php echo e(app('translator')->getFromJson('brand.add_brand')); ?>" data-container=".view_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('unit_id', __('product.unit') . ':*'); ?>

            <div class="input-group">
              <?php echo Form::select('unit_id', $units, !empty($duplicate_product->unit_id) ? $duplicate_product->unit_id : session('business.default_unit'), ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2', 'required']);; ?>

              <span class="input-group-btn">
                <button type="button" <?php if(!auth()->user()->can('unit.create')): ?> disabled <?php endif; ?> class="btn btn-default bg-white btn-flat btn-modal" data-href="<?php echo e(action('UnitController@create', ['quick_add' => true])); ?>" title="<?php echo e(app('translator')->getFromJson('unit.add_unit')); ?>" data-container=".view_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
              </span>
            </div>
              
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-4 <?php if(!session('business.enable_category')): ?> hide <?php endif; ?>">
          <div class="form-group">
            <?php echo Form::label('category_id', __('product.category') . ':'); ?>

              <?php echo Form::select('category_id', $categories, !empty($duplicate_product->category_id) ? $duplicate_product->category_id : null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']);; ?>

          </div>
        </div>

        <div class="col-sm-4 <?php if(!(session('business.enable_category') && session('business.enable_sub_category'))): ?> hide <?php endif; ?>">
          <div class="form-group">
            <?php echo Form::label('sub_category_id', __('product.sub_category') . ':'); ?>

              <?php echo Form::select('sub_category_id', $sub_categories, !empty($duplicate_product->sub_category_id) ? $duplicate_product->sub_category_id : null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']);; ?>

          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('sku', __('product.sku') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.sku') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::text('sku', null, ['class' => 'form-control',
              'placeholder' => __('product.sku')]);; ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('barcode_type', __('product.barcode_type') . ':*'); ?>

              <?php echo Form::select('barcode_type', $barcode_types, !empty($duplicate_product->barcode_type) ? $duplicate_product->barcode_type : $barcode_default, ['class' => 'form-control select2', 'required']);; ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
          <br>
            <label>
              <?php echo Form::checkbox('enable_stock', 1, !empty($duplicate_product) ? $duplicate_product->enable_stock : true, ['class' => 'input-icheck', 'id' => 'enable_stock']);; ?> <strong><?php echo e(app('translator')->getFromJson('product.manage_stock')); ?></strong>
            </label><?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.enable_stock') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <p class="help-block"><i><?php echo e(app('translator')->getFromJson('product.enable_stock_help')); ?></i></p>
          </div>
        </div>
        <div class="col-sm-4 <?php if(!empty($duplicate_product) && $duplicate_product->enable_stock == 0): ?> hide <?php endif; ?>" id="alert_quantity_div">
          <div class="form-group">
            <?php echo Form::label('alert_quantity',  __('product.alert_quantity') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.alert_quantity') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::number('alert_quantity', !empty($duplicate_product->alert_quantity) ? $duplicate_product->alert_quantity : null , ['class' => 'form-control', 'required',
            'placeholder' => __('product.alert_quantity'), 'min' => '0']);; ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-8">
          <div class="form-group">
            <?php echo Form::label('product_description', __('lang_v1.product_description') . ':'); ?>

              <?php echo Form::textarea('product_description', !empty($duplicate_product->product_description) ? $duplicate_product->product_description : null, ['class' => 'form-control']);; ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('image', __('lang_v1.product_image') . ':'); ?>

            <?php echo Form::file('image', ['id' => 'upload_image', 'accept' => 'image/*']);; ?>

            <small><p class="help-block"><?php echo e(app('translator')->getFromJson('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)])); ?> <br> <?php echo e(app('translator')->getFromJson('lang_v1.aspect_ratio_should_be_1_1')); ?></p></small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <?php if(session('business.enable_product_expiry')): ?>

            <?php if(session('business.expiry_type') == 'add_expiry'): ?>
              <?php
                $expiry_period = 12;
                $hide = true;
              ?>
            <?php else: ?>
              <?php
                $expiry_period = null;
                $hide = false;
              ?>
            <?php endif; ?>
          <div class="col-sm-4 <?php if($hide): ?> hide <?php endif; ?>">
            <div class="form-group">
              <div class="multi-input">
                <?php echo Form::label('expiry_period', __('product.expires_in') . ':'); ?><br>
                <?php echo Form::text('expiry_period', !empty($duplicate_product->expiry_period) ? number_format($duplicate_product->expiry_period, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']) : $expiry_period, ['class' => 'form-control pull-left input_number',
                  'placeholder' => __('product.expiry_period'), 'style' => 'width:60%;']);; ?>

                <?php echo Form::select('expiry_period_type', ['months'=>__('product.months'), 'days'=>__('product.days'), '' =>__('product.not_applicable') ], !empty($duplicate_product->expiry_period_type) ? $duplicate_product->expiry_period_type : 'months', ['class' => 'form-control select2 pull-left', 'style' => 'width:40%;', 'id' => 'expiry_period_type']);; ?>

              </div>
            </div>
          </div>
        <?php endif; ?>

        <div class="col-sm-4">
          <div class="form-group">
          <br>
            <label>
              <?php echo Form::checkbox('enable_sr_no', 1, !(empty($duplicate_product)) ? $duplicate_product->enable_sr_no : false, ['class' => 'input-icheck']);; ?> <strong><?php echo e(app('translator')->getFromJson('lang_v1.enable_imei_or_sr_no')); ?></strong>
            </label><?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.tooltip_sr_no') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
          </div>
        </div>

        <div class="clearfix"></div>

        <!-- Rack, Row & position number -->
        <?php if(session('business.enable_racks') || session('business.enable_row') || session('business.enable_position')): ?>
          <div class="col-md-12">
            <h4><?php echo e(app('translator')->getFromJson('lang_v1.rack_details')); ?>:
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.tooltip_rack_details') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </h4>
          </div>
          <?php $__currentLoopData = $business_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-3">
              <div class="form-group">
                <?php echo Form::label('rack_' . $id,  $location . ':'); ?>

                
                <?php if(session('business.enable_racks')): ?>
                  <?php echo Form::text('product_racks[' . $id . '][rack]', !empty($rack_details[$id]['rack']) ? $rack_details[$id]['rack'] : null, ['class' => 'form-control', 'id' => 'rack_' . $id, 
                    'placeholder' => __('lang_v1.rack')]);; ?>

                <?php endif; ?>

                <?php if(session('business.enable_row')): ?>
                  <?php echo Form::text('product_racks[' . $id . '][row]', !empty($rack_details[$id]['row']) ? $rack_details[$id]['row'] : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.row')]);; ?>

                <?php endif; ?>
                
                <?php if(session('business.enable_position')): ?>
                  <?php echo Form::text('product_racks[' . $id . '][position]', !empty($rack_details[$id]['position']) ? $rack_details[$id]['position'] : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.position')]);; ?>

                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('weight',  __('lang_v1.weight') . ':'); ?>

            <?php echo Form::text('weight', !empty($duplicate_product->weight) ? $duplicate_product->weight : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.weight')]);; ?>

          </div>
        </div>
        <!--custom fields-->
        <div class="clearfix"></div>
        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('product_custom_field1',  __('lang_v1.product_custom_field1') . ':'); ?>

            <?php echo Form::text('product_custom_field1', !empty($duplicate_product->product_custom_field1) ? $duplicate_product->product_custom_field1 : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.product_custom_field1')]);; ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('product_custom_field2',  __('lang_v1.product_custom_field2') . ':'); ?>

            <?php echo Form::text('product_custom_field2', !empty($duplicate_product->product_custom_field2) ? $duplicate_product->product_custom_field2 : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.product_custom_field2')]);; ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('product_custom_field3',  __('lang_v1.product_custom_field3') . ':'); ?>

            <?php echo Form::text('product_custom_field3', !empty($duplicate_product->product_custom_field3) ? $duplicate_product->product_custom_field3 : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.product_custom_field3')]);; ?>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="form-group">
            <?php echo Form::label('product_custom_field4',  __('lang_v1.product_custom_field4') . ':'); ?>

            <?php echo Form::text('product_custom_field4', !empty($duplicate_product->product_custom_field4) ? $duplicate_product->product_custom_field4 : null, ['class' => 'form-control', 'placeholder' => __('lang_v1.product_custom_field4')]);; ?>

          </div>
        </div>
        <!--custom fields-->
      </div>
    </div>
  </div>
  
  <div class="box box-solid">
    <div class="box-body">
      <div class="row">

        <div class="col-sm-4 <?php if(!session('business.enable_price_tax')): ?> hide <?php endif; ?>">
          <div class="form-group">
            <?php echo Form::label('tax', __('product.applicable_tax') . ':'); ?>

              <?php echo Form::select('tax', $taxes, !empty($duplicate_product->tax) ? $duplicate_product->tax : null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2'], $tax_attributes);; ?>

          </div>
        </div>

        <div class="col-sm-4 <?php if(!session('business.enable_price_tax')): ?> hide <?php endif; ?>">
          <div class="form-group">
            <?php echo Form::label('tax_type', __('product.selling_price_tax_type') . ':*'); ?>

              <?php echo Form::select('tax_type', ['inclusive' => __('product.inclusive'), 'exclusive' => __('product.exclusive')], !empty($duplicate_product->tax_type) ? $duplicate_product->tax_type : 'exclusive',
              ['class' => 'form-control select2', 'required']);; ?>

          </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('type', __('product.product_type') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.product_type') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::select('type', ['single' => 'Single', 'variable' => 'Variable'], !empty($duplicate_product->type) ? $duplicate_product->type : null, ['class' => 'form-control select2',
            'required', 'data-action' => !empty($duplicate_product) ? 'duplicate' : 'add', 'data-product_id' => !empty($duplicate_product) ? $duplicate_product->id : '0']);; ?>

          </div>
        </div>

        <div class="form-group col-sm-11 col-sm-offset-1" id="product_form_part"></div>

        <input type="hidden" id="variation_counter" value="1">
        <input type="hidden" id="default_profit_percent" 
          value="<?php echo e($default_profit_percent); ?>">

      </div>
  </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <input type="hidden" name="submit_type" id="submit_type">
      <div class="text-center">
      <div class="btn-group">
        <?php if($selling_price_group_count): ?>
          <button type="submit" value="submit_n_add_selling_prices" class="btn btn-warning submit_product_form"><?php echo e(app('translator')->getFromJson('lang_v1.save_n_add_selling_price_group_prices')); ?></button>
        <?php endif; ?>

        <button id="opening_stock_button" <?php if(!empty($duplicate_product) && $duplicate_product->enable_stock == 0): ?> disabled <?php endif; ?> type="submit" value="submit_n_add_opening_stock" class="btn bg-purple submit_product_form"><?php echo e(app('translator')->getFromJson('lang_v1.save_n_add_opening_stock')); ?></button>

        <button type="submit" value="save_n_add_another" class="btn bg-maroon submit_product_form"><?php echo e(app('translator')->getFromJson('lang_v1.save_n_add_another')); ?></button>

        <button type="submit" value="submit" class="btn btn-primary submit_product_form"><?php echo e(app('translator')->getFromJson('messages.save')); ?></button>
      </div>
      
      </div>
    </div>
  </div>
  <?php echo Form::close(); ?>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
  <?php $asset_v = env('APP_VERSION'); ?>
  <script src="<?php echo e(asset('js/product.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>