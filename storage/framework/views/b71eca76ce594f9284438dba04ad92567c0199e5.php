 <?php if(count($module_permissions) > 0): ?>
  <?php
    $module_role_permissions = [];
    if(!empty($role_permissions)) {
      $module_role_permissions = $role_permissions;
    }
  ?>
  <?php $__currentLoopData = $module_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <hr>
  <div class="row check_group">
    <div class="col-md-3">
      <h4><?php echo e($key); ?></h4>
    </div>
    <div class="col-md-9">
      <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        if(empty($role_permissions) && $module_permission['default']) {
          $module_role_permissions[] = $module_permission['value'];
        }
      ?>
      <div class="col-md-12">
        <div class="checkbox">
          <label>
            <?php echo Form::checkbox('permissions[]', $module_permission['value'], in_array($module_permission['value'], $module_role_permissions), 
            [ 'class' => 'input-icheck']);; ?> <?php echo e($module_permission['label']); ?>

          </label>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>