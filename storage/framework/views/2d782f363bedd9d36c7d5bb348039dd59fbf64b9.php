
<div class="col-sm-12">
<h4><?php echo e(app('translator')->getFromJson('product.add_variation')); ?>:* <button type="button" class="btn btn-primary" id="add_variation" data-action="add">+</button></h4>
</div>
<div class="col-sm-12">
    <div class="table-responsive">
    <table class="table table-bordered add-product-price-table table-condensed" id="product_variation_form_part">
        <thead>
          <tr>
            <th class="col-sm-3"><?php echo e(app('translator')->getFromJson('lang_v1.variation')); ?></th>
            <th class="col-sm-9"><?php echo e(app('translator')->getFromJson('product.variation_values')); ?></th>
          </tr>
        </thead>
        <tbody>
            <?php if($action == 'add'): ?>
                <?php echo $__env->make('product.partials.product_variation_row', ['row_index' => 0], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>

                <?php $__empty_1 = true; $__currentLoopData = $product_variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php echo $__env->make('product.partials.edit_product_variation_row', ['row_index' => $action == 'edit' ? $product_variation->id : $loop->index], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php echo $__env->make('product.partials.product_variation_row', ['row_index' => 0], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>

            <?php endif; ?>
            
        </tbody>
    </table>
    </div>
</div>