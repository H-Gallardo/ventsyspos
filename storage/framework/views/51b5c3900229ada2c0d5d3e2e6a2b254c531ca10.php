<?php $__env->startSection('title', __('essentials::lang.essentials') . ' | ' . __('essentials::lang.document')); ?>

<?php $__env->startSection('content'); ?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-body">
					<?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\DocumentController@store'), 'id' => 'upload_document_form','files' => true]); ?>

						<div class="row">
                            <div class="col-sm-12">
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    
	                                   	<?php if(!empty($type)): ?>
	                                   		<?php echo Form::label('name', __('essentials::lang.heading') . ":*"); ?>


	                                   		<?php echo Form::text('name', null, ['class' => 'form-control', 'required']); ?>

	                                   	<?php else: ?>
	                                   		<?php echo Form::label('name', __('essentials::lang.document') . ":*"); ?>


	                                   		<?php echo Form::file('name', ['required']); ?>

	                                   	<?php endif; ?>
	                                 </div>
	                            </div>
	                            <div class="clearfix"></div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <?php echo Form::label('description', __('essentials::lang.description') . ":"); ?>

	                                    <?php echo Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4', 'cols' => '50']); ?>

	                                 </div>
	                            </div>
	                            <div class="clearfix"></div>
                        		<div class="col-sm-4">
                            		<br>
                                	<button type="submit" class="btn btn-primary">
                                		<?php echo e(app('translator')->getFromJson('essentials::lang.submit')); ?>
                                	</button>
                        		</div>
                            </div>
                        </div>
					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>