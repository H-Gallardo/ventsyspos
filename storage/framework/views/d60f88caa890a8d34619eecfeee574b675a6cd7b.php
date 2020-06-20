<li class="todo_li">
	<input type="checkbox" name="todo_id" class="todo_id" value ="<?php echo e($to_dos->id); ?>">

	<span class="text task_name"> <?php echo e($to_dos->task); ?></span>
	<i class="fa fa-trash text-danger pull-right delete_task cursor-pointer" style="display:none;">
	<span class="hidden"><?php echo e($to_dos->id); ?></span>
	</i>
</li>