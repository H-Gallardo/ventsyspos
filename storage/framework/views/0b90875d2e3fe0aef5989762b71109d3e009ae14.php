<?php if(!session('business.enable_price_tax')): ?> 
  <?php
    $default = 0;
    $class = 'hide';
  ?>
<?php else: ?>
  <?php
    $default = null;
    $class = '';
  ?>
<?php endif; ?>

<div class="col-sm-9"><br>
  <div class="table-responsive">
    <table class="table table-bordered add-product-price-table table-condensed <?php echo e($class); ?>">
        <tr>
          <th><?php echo e(app('translator')->getFromJson('product.default_purchase_price')); ?></th>
          <th><?php echo e(app('translator')->getFromJson('product.profit_percent')); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.profit_percent') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
          <th><?php echo e(app('translator')->getFromJson('product.default_selling_price')); ?></th>
        </tr>
        <tr>
          <td>
            <div class="col-sm-6">
              <?php echo Form::label('single_dpp', trans('product.exc_of_tax') . ':*'); ?>


              <?php echo Form::text('single_dpp', $default, ['class' => 'form-control input-sm dpp input_number', 'placeholder' => 'Excluding Tax', 'required']);; ?>

            </div>

            <div class="col-sm-6">
              <?php echo Form::label('single_dpp_inc_tax', trans('product.inc_of_tax') . ':*'); ?>

            
              <?php echo Form::text('single_dpp_inc_tax', $default, ['class' => 'form-control input-sm dpp_inc_tax input_number', 'placeholder' => 'Including Tax', 'required']);; ?>

            </div>
          </td>

          <td>
            <br/>
            <?php echo Form::text('profit_percent', number_format($profit_percent, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input-sm input_number', 'id' => 'profit_percent', 'required']);; ?>

          </td>

          <td>
            <label><span class="dsp_label"><?php echo e(app('translator')->getFromJson('product.exc_of_tax')); ?></span></label>
            <?php echo Form::text('single_dsp', $default, ['class' => 'form-control input-sm dsp input_number', 'placeholder' => 'Excluding tax', 'id' => 'single_dsp', 'required']);; ?>


            <?php echo Form::text('single_dsp_inc_tax', $default, ['class' => 'form-control input-sm hide input_number', 'placeholder' => 'Including tax', 'id' => 'single_dsp_inc_tax', 'required']);; ?>

          </td>
        </tr>
    </table>
    </div>
</div>