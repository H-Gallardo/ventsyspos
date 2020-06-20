<div class="row">
  <div class="col-md-10 col-md-offset-1 col-xs-12">
    <div class="table-responsive">
      <table class="table table-condensed bg-gray">
        <tr>
          <th><?php echo e(app('translator')->getFromJson('business.location')); ?></th>
          <th><?php echo e(app('translator')->getFromJson('lang_v1.rack')); ?></th>
          <th><?php echo e(app('translator')->getFromJson('lang_v1.row')); ?></th>
          <th><?php echo e(app('translator')->getFromJson('lang_v1.position')); ?></th>
        </tr>
        <?php if(!empty($details[0])): ?>
          <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($detail->name); ?></td>
              <td>
                <?php echo e($detail->rack); ?>

              </td>
              <td>
                <?php echo e($detail->row); ?>

              </td>
              <td>
                <?php echo e($detail->position); ?>

              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
          <tr>
            <td colspan="4" class="text-center">
              -
            </td>
          </tr>
        <?php endif; ?>
        
      </table>
    </div>
  </div>
</div>