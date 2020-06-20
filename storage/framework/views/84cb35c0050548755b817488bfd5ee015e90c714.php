<?php if(count($todo) > 0): ?>
	<?php $__currentLoopData = $todo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $do): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li class="todo_li">
		<?php if($do->is_completed == 1): ?>
		<input type="checkbox" name="todo_id" class="todo_id" value ="<?php echo e($do->id); ?>" checked>

		<span class="text task_name" style="text-decoration:line-through;">
			<?php echo e($do->task); ?>

		</span>
		<i class="fa fa-trash text-danger pull-right delete_task cursor-pointer" style="display:none;">
			<span class="hidden"><?php echo e($do->id); ?></span>
		</i>
		<?php else: ?>
		<input type="checkbox" name="todo_id" class="todo_id" value ="<?php echo e($do->id); ?>">

		<span class="text task_name"> <?php echo e($do->task); ?></span>
		<i class="fa fa-trash text-danger pull-right delete_task cursor-pointer" style="display:none;">
			<span class="hidden"><?php echo e($do->id); ?></span>
		</i>
		<?php endif; ?>
	</li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
	<h2 class="text-center text-info">
		<?php echo e(__('essentials::lang.no_task')); ?>

	</h2>
<?php endif; ?>