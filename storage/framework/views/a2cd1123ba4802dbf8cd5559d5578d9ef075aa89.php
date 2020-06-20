<?php $__env->startSection('title', __('essentials::lang.todo')); ?>

<?php $__env->startSection('content'); ?>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<div class="col-md-4">
				<h4 class="box-title">
					<i class="ion ion-clipboard"></i>
					<?php echo e(app('translator')->getFromJson('essentials::lang.todo_list')); ?>
				</h4>
			</div>
			<div class="col-md-4">
				<div class="input-group"> 
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<?php echo Form::text('date', \Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format')), ['class' => 'form-control datepicker filter text-center', 'readonly']);; ?>

						<div class="input-group-btn">
							<button type="button" class="btn btn-default previous_btn" aria-label="Help"  data-toggle="tooltip" data-placement="top" title="<?php echo e(app('translator')->getFromJson('essentials::lang.previous_date')); ?>">
								<i class="fa fa-chevron-left"></i>
							</button>
							<button type="button" class="btn btn-default next_btn"  data-toggle="tooltip" data-placement="top" title="<?php echo e(app('translator')->getFromJson('essentials::lang.next_date')); ?>">
								<i class="fa fa-chevron-right"></i>
							</button>
						</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box-tools pull-right">
				<button class="btn btn-sm btn-primary add_task">
					<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></a>
				</button>
			</div>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\ToDoController@store'), 'id' => 'task_form', 'style' => 'display:none']); ?>

					<div class="col-md-4">
	                    <div class="form-group">
	                        <?php echo Form::label('task', __('essentials::lang.task') . ":*"); ?>

	                        <?php echo Form::text('task', null, ['class' => 'form-control', 'required']); ?>

	                     </div>
	                </div>
	                <div class="col-md-4">
		                <div class="form-group">
							<?php echo Form::label('date', __('essentials::lang.date') . ':*'); ?>

							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</span>
								<?php echo Form::text('date', \Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format')), ['class' => 'form-control datepicker text-center', 'required', 'readonly']);; ?>

							</div>
						</div>
					</div>
	                <div class="clearfix"></div>
	                <div class="col-md-4">
						<button type="submit" class="btn btn-info btn-sm task_sbmit">
							<?php echo e(app('translator')->getFromJson('essentials::lang.submit')); ?>
						</button>
						&nbsp;
						<button type="button" class="btn btn-danger btn-sm cancel_btn">
							<?php echo e(app('translator')->getFromJson('essentials::lang.cancel')); ?>
						</button>
					</div>
				<?php echo Form::close(); ?>

			</div>
			<div class="row">
				<div class="col-md-8">
					<br>
					<ul class="todo-list ui-sortable todo">
						<div class="loader text-center">
		                  <i class="fa fa-spinner fa-spin text-info fa-3x">
		                  </i>
		                </div>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		//on click add_task
		$(document).on('click','.add_task', function(){
			$("form#task_form").fadeIn();
			$('form#task_form .datepicker').datepicker({
                autoclose: true,
                format:datepicker_date_format
            });
		});

		//form submit
		$(document).on('submit', 'form#task_form', function(e){
			e.preventDefault();
			var url = $(this).attr("action");
			var data = $("form#task_form").serialize();
			$.ajax({
				method: "POST",
				url: url,
				data: data,
				dataType: "json",
				success: function(result){
					if(result.success == true){
						$("form#task_form")[0].reset();
						$("form#task_form").hide();
						if(result.date == $(".filter").val()){
							$("ul.todo").append(result.html);
						}
						toastr.success(result.msg);
					} else {
						toastr.error(result.msg);
					}
				}
			});
		});

		//add & remove strike
		$(document).on('click', 'input.todo_id', function(){
			var id = $(this).val();
			var task_span = $(this).parent('li').find('span');
			if($(this).is(':checked') == true){
				var is_completed = 1;
			} else if($(this).is(':checked') == false){
				var is_completed = 0;
			}
			var url = "/essentials/todo/" + id;
			$.ajax({
				method: "PUT",
				url: url,
				data: {is_completed : is_completed},
				dataType: "json",
				success: function(result){
					if(result.success == true){
						toastr.success(result.msg);

						if(result.is_completed == 1){
						  task_span.css('text-decoration', 'line-through');
						} else if(result.is_completed == 0){
						  task_span.css('text-decoration', 'none');
						}

					} else {
						toastr.error(result.msg);
					}
				}
			});
		});

		//show/hide delete button on hover
		$(document).on("mouseenter", 'li.todo_li', function(){
			$(this).find(".delete_task").show();
		});
		$(document).on("mouseleave", 'li.todo_li', function(){
			$(this).find(".delete_task").hide();
		});

		//delete a task
		$(document).on('click', '.delete_task', function(){
			var id = $(this).text();
			var url = "/essentials/todo/" + id;
			var li = $(this).parent("li");
			swal({
		      title: LANG.sure,
		      icon: "warning",
		      buttons: true,
		      dangerMode: true,
		    }).then((confirmed) => {
		        if (confirmed) {
					$.ajax({
						method: "DELETE",
						url: url,
						dataType: "json",
						success: function(result){
							if(result.success == true){
								toastr.success(result.msg);
								if(result.is_deleted == 1){
									li.remove();
								}
							} else {
								toastr.error(result.msg);
							}
						}
					});
				   }	
			  });
		});
		
		$('input.datepicker').datepicker({
	        autoclose: true,
	        format:datepicker_date_format
	    });

	    //event on date chnage
		$(document).on('change', ".filter", function(){
			var date = $(".filter").val();
			taskFilter(date);
		});

		// call a taskFilter when click next_btn
		$(document).on('click', '.next_btn', function(){

			var date = moment($(".filter").val()).add(1, 'days').format(moment_date_format);
			
			$(".datepicker").datepicker('update', date);
			var current_date = $(".filter").val();
			taskFilter(current_date);
		});

		// call a taskFilter when click previous_btn
		$(document).on('click', '.previous_btn', function(){
			var date = moment($(".filter").val()).subtract(1, 'days').format(moment_date_format);
			
			$(".datepicker").datepicker('update', date);
			var current_date = $(".filter").val();
			taskFilter(current_date);
		});

		//taskFilter function call
		taskFilter($(".filter").val());

	    function taskFilter(date)
	    {
	    	$("div.loader").show();
	    	$.ajax({
	    		method:"GET",
	    		url: "/essentials/todo",
	    		data: {
	    			date: date,
	    		},
	    		dataType: "json",
	    		success: function(result){
	    			$("div.loader").hide();
	    			if(result.success == true){
	    				$("ul.todo").html(result.html);
	    			}
	    		}
	    	});
	    }
	    //form cancel_btn
	    $(document).on('click', '.cancel_btn', function(){
	    	$("form#task_form")[0].reset();
			$("form#task_form").fadeOut();
	    });

	    //form validation
	    $("form#task_form").validate();
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>