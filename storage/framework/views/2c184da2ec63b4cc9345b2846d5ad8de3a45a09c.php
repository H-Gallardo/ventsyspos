<li class="treeview <?php echo e(in_array($request->segment(1), ['essentials']) ? 'active active-sub' : ''); ?>">
    <a href="#">
        <i class="fa fa-star"></i>
        <span class="title"><?php echo e(app('translator')->getFromJson('essentials::lang.essentials')); ?></span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>

    <ul class="treeview-menu">
        <li class="<?php echo e($request->segment(2) == 'todo' ? 'active active-sub' : ''); ?>">
            <a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\ToDoController@index')); ?>">
                <i class="fa fa-list-ul"></i>
                <span class="title"><?php echo e(app('translator')->getFromJson('essentials::lang.todo')); ?></span>
            </a>
        </li>
		<li class="<?php echo e(($request->segment(2) == 'document' && $request->get('type') != 'memos') ? 'active active-sub' : ''); ?>">
				<a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\DocumentController@index')); ?>">
				<i class="fa fa-file"></i>
				<span class="title"> <?php echo e(app('translator')->getFromJson('essentials::lang.document')); ?> </span>
			</a>
		</li>
        <li class="<?php echo e(($request->segment(2) == 'document' && $request->get('type') == 'memos') ? 'active active-sub' : ''); ?>">
            <a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\DocumentController@index') .'?type=memos'); ?>">
                <i class="fa fa-envelope-open"></i>
                <span class="title">
                    <?php echo e(app('translator')->getFromJson('essentials::lang.memos')); ?>
                </span>
            </a>
        </li>
        <li class="<?php echo e($request->segment(2) == 'reminder' ? 'active active-sub' : ''); ?>">
            <a href="<?php echo e(action('\Modules\Essentials\Http\Controllers\ReminderController@index')); ?>">
                <i class="fa fa-bell"></i>
                <span class="title">
                    <?php echo e(app('translator')->getFromJson('essentials::lang.reminders')); ?>
                </span>
            </a>
        </li>
    </ul>
</li>