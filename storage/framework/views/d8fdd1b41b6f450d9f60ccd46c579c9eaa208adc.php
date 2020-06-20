<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td>
            <?php echo e($product->product_name); ?>


            <?php if($product->variation_name != "DUMMY"): ?>
                <b><?php echo e($product->variation_name); ?></b>
            <?php endif; ?>
            <input type="hidden" name="products[<?php echo e($loop->index + $index); ?>][product_id]" value="<?php echo e($product->product_id); ?>">
            <input type="hidden" name="products[<?php echo e($loop->index + $index); ?>][variation_id]" value="<?php echo e($product->variation_id); ?>">
        </td>
        <td>
            <input type="number" class="form-control" min=1
            name="products[<?php echo e($loop->index + $index); ?>][quantity]" value="<?php if(isset($product->quantity)): ?><?php echo e($product->quantity); ?><?php else: ?><?php echo e(1); ?><?php endif; ?>">
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

<?php endif; ?>