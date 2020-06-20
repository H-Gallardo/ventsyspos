<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | Business'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'superadmin::lang.all_business' )); ?>
        <small><?php echo e(app('translator')->getFromJson( 'superadmin::lang.manage_business' )); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header">
            <h3 class="box-title">&nbsp;</h3>
        	<div class="box-tools">
                <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@create')); ?>" 
                    class="btn btn-block btn-primary">
                	<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></a>
            </div>
        </div>

        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>

                <?php $__currentLoopData = $businesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $business): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $address = $business->locations->first();
                    ?>
                    <?php if($loop->index % 3 == 0): ?>
                        <div class="row">
                    <?php endif; ?>

                    <div class="col-md-4">
                        
                        <div class="box box-widget widget-user-2">
                
                            <div class="widget-user-header bg-yellow">
                              <div class="widget-user-image">
                                <?php if(!empty($business->logo)): ?>
                                    <img class="img-circle" src="<?php echo e(url( 'storage/business_logos/' . $business->logo )); ?>" alt="Business Logo">
                                <?php endif; ?>
                              </div>
                              <!-- /.widget-user-image -->
                              <h4 class="widget-user-username"><?php echo e($business->name); ?></h4>
                              <h5 class="widget-user-desc"><i class="fa fa-user-secret" title="Owner"></i> <?php echo e($business->owner->first_name . ' ' . $business->owner->last_name); ?></h5>
                              <h5 class="widget-user-desc"><i class="fa fa-envelope" title="Owner Email"></i> <?php echo e($business->owner->email); ?></h5>
                                <h5 class="widget-user-desc"><i class="fa fa-mobile" title="Owner Contact"></i> <?php echo e($business->owner->contact_no); ?></h5>
                                <h5 class="widget-user-desc"><i class="fa fa-phone" title="Business Contact"></i> <?php echo e(implode([$address->mobile, $address->alternate_number], ", ")); ?></h5>
                                <address class="widget-user-desc">
                                  <?php
                                    $address_array = [];
                                    $city_landmark = '';
                                    if(!empty($address->city)){
                                        $city_landmark = $address->city;
                                    }
                                    if(!empty($address->landmark)){
                                        $city_landmark .= ', ' . $address->landmark;
                                    }
                                    if(!empty($city_landmark)){
                                        $address_array[] = $city_landmark;
                                    }

                                    $state_country = '';
                                    if(!empty($address->state)){
                                        $state_country = $address->state;
                                    }
                                    if(!empty($address->country)){
                                        $state_country .= ' (' . $address->country . ')';
                                    }
                                    if(!empty($state_country)){
                                        $address_array[] = $state_country;
                                    }
                                    if(!empty($address->zip_code)){
                                        $address_array[] = __('business.zip_code') . ': ' .$address->zip_code;
                                    }
                                  ?>
                                  <?php echo strip_tags(implode('<br>', $address_array), '<br>'); ?>

                                </address>
                            <h5 class="widget-user-desc">
                                <i class="fa fa-credit-card" title="Active Package"></i> 
                                <?php
                                    $package = !empty($business->subscriptions[0]) ? optional($business->subscriptions[0])->package : '';
                                ?>

                                <?php if(!empty($package)): ?>
                                    <?php echo e($package->name); ?> 
                                <?php endif; ?>
                            </h5>
                                <?php if(!empty($business->subscriptions[0])): ?>
                                    <h5 class="widget-user-desc">
                                        <i class="fa fa-clock-o"></i> 
                                            <?php echo e(app('translator')->getFromJson('superadmin::lang.remaining', ['days' => \Carbon::today()->diffInDays($business->subscriptions[0]->end_date)])); ?>
                                    </h5>
                                <?php endif; ?>
                            </div>
                            <div class="box-footer">
                                <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@show', [$business->id])); ?>"
                                class="btn btn-info btn-xs"><?php echo e(app('translator')->getFromJson('messages.view' )); ?></a>

                                <button type="button" class="btn btn-primary btn-xs btn-modal" data-href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminSubscriptionsController@create', ['business_id' => $business->id])); ?>" data-container=".view_modal">
                                    <?php echo e(app('translator')->getFromJson('superadmin::lang.add_subscription' )); ?>
                                </button>

                                <?php if($business->is_active == 1): ?>
                                    <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@toggleActive', [$business->id, 0])); ?>"
                                        class="btn btn-danger btn-xs link_confirmation"><?php echo e(app('translator')->getFromJson('messages.deactivate')); ?>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@toggleActive', [$business->id, 1])); ?>"
                                        class="btn btn-success btn-xs link_confirmation"><?php echo e(app('translator')->getFromJson('messages.activate' )); ?>
                                    </a>
                                <?php endif; ?>

                                <?php if($business_id != $business->id): ?>
                                    <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@destroy', [$business->id])); ?>"
                                        class="btn btn-danger btn-xs delete_business_confirmation"><?php echo e(app('translator')->getFromJson('messages.delete' )); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php if($loop->index % 3 == 2): ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="col-md-12">
                    <?php echo e($businesses->links()); ?>

                </div>
                
            <?php endif; ?>
        </div>

    </div>

    <div class="modal fade brands_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">
    $(document).on('click', 'a.delete_business_confirmation', function(e){
        e.preventDefault();
        swal({
            title: LANG.sure,
            text: "Once deleted, you will not be able to recover this business!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((confirmed) => {
            if (confirmed) {
                window.location.href = $(this).attr('href');
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>