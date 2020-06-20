<div class="row">
  <div class="col-md-12">
    <hr>
    <h3><?php echo e(app('translator')->getFromJson('lang_v1.product_sold_details_register')); ?></h3>
    <table class="table">
      <tr>
        <th>#</th>
        <th><?php echo e(app('translator')->getFromJson('brand.brands')); ?></th>
        <th><?php echo e(app('translator')->getFromJson('sale.qty')); ?></th>
        <th><?php echo e(app('translator')->getFromJson('sale.total_amount')); ?></th>
      </tr>
      <?php
        $total_amount = 0;
        $total_quantity = 0;
      ?>
      <?php $__currentLoopData = $details['product_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td>
            <?php echo e($loop->iteration); ?>.
          </td>
          <td>
            <?php echo e($detail->brand_name); ?>

          </td>
          <td>
            <?php echo e($detail->total_quantity); ?>

            <?php
              $total_quantity += $detail->total_quantity;
            ?>
          </td>
          <td>
            <span class="display_currency" data-currency_symbol="true">
              <?php echo e($detail->total_amount); ?>

            </span>
            <?php
              $total_amount += $detail->total_amount;
            ?>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      
      <?php
        $total_amount += ($details['transaction_details']->total_tax - $details['transaction_details']->total_discount);
      ?>

      <!-- Final details -->
      <tr class="success">
        <th>#</th>
        <th></th>
        <th><?php echo e($total_quantity); ?></th>
        <th>

          <?php if($details['transaction_details']->total_tax != 0): ?>
            <?php echo e(app('translator')->getFromJson('sale.order_tax')); ?>: (+)
            <span class="display_currency" data-currency_symbol="true">
              <?php echo e($details['transaction_details']->total_tax); ?>

            </span>
            <br/>
          <?php endif; ?>

          <?php if($details['transaction_details']->total_discount != 0): ?>
            <?php echo e(app('translator')->getFromJson('sale.discount')); ?>: (-)
            <span class="display_currency" data-currency_symbol="true">
              <?php echo e($details['transaction_details']->total_discount); ?>

            </span>
            <br/>
          <?php endif; ?>

          <?php echo e(app('translator')->getFromJson('lang_v1.grand_total')); ?>:
          <span class="display_currency" data-currency_symbol="true">
            <?php echo e($total_amount); ?>

          </span>
        </th>
      </tr>

    </table>
  </div>
</div>