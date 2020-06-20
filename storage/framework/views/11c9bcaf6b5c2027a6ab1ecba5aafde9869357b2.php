<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | Business'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'superadmin::lang.view_business' )); ?>
        <small> <?php echo e($business->name); ?></small>
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
                <h3 class="box-title">
                        <strong><i class="fa fa-briefcase margin-r-5"></i> 
                        <?php echo e($business->name); ?></strong>
                </h3>
        </div>

        <div class="box-body">
            <div class="row">
                    <div class="col-sm-3">
                        <div class="well well-sm">
                            <strong><i class="fa fa-briefcase margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.business_name')); ?></strong>
                            <p class="text-muted">
                                <?php echo e($business->name); ?>

                            </p>

                            <strong><i class="fa fa-money margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.currency')); ?></strong>
                            <p class="text-muted">
                                <?php echo e($business->currency->currency); ?>

                            </p>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.tax_number1')); ?></strong>
                            <p class="text-muted">
                                <?php if(!empty($business->tax_number_1)): ?>
                                    <?php echo e($business->tax_label_1); ?>: <?php echo e($business->tax_number_1); ?>

                                <?php endif; ?>
                            </p>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.tax_number2')); ?></strong>
                            <p class="text-muted">
                                <?php if(!empty($business->tax_number_2)): ?>
                                <?php echo e($business->tax_label_2); ?>: <?php echo e($business->tax_number_2); ?>

                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="well well-sm">
                            <strong><i class="fa fa-location-arrow margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.time_zone')); ?></strong>
                            <p class="text-muted">
                            <?php echo e($business->time_zone); ?>

                            </p>

                            <strong><i class="fa fa-toggle-on margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.is_active')); ?></strong>
                            <?php if($business->is_active == 0): ?>
                                <p class="text-muted">
                                    Inactive
                                </p>
                            <?php else: ?>
                                <p class="text-muted">
                                    Active
                                </p>
                            <?php endif; ?>

                            <strong><i class="fa fa-user-circle-o margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.created_by')); ?></strong>
                            <?php if(!empty($created_by)): ?>
                            <p class="text-muted">
                            <?php echo e($created_by->surname); ?> <?php echo e($created_by->first_name); ?> <?php echo e($created_by->last_name); ?>

                            </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="well well-sm">
                            <strong><i class="fa fa-user-circle-o margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.owner')); ?></strong>
                            <p class="text-muted">
                            <?php echo e($business->owner->surname); ?> <?php echo e($business->owner->first_name); ?> <?php echo e($business->owner->last_name); ?>

                            </p>

                            <strong><i class="fa fa-envelope margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.email')); ?></strong>
                            <p class="text-muted">
                            <?php echo e($business->owner->email); ?>

                            </p>

                            <strong><i class="fa fa-address-book-o margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.mobile')); ?></strong>
                            <p class="text-muted">
                            <?php echo e($business->owner->contact_no); ?>

                            </p>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.address')); ?></strong>
                            <p class="text-muted">
                            <?php echo e($business->owner->address); ?>

                            </p>
                        </div>
                    </div>

                    <div class="col-sm-3">
                            <div>
                                <?php if(!empty($business->logo)): ?>
                                    <img class="img-responsive" src="<?php echo e(url( 'storage/business_logos/' . $business->logo )); ?>" alt="Business Logo">
                                <?php endif; ?>
                            </div>
                    </div> 
                </div> 
    </div>
    </div>

    <div class="box">
        <div class="box-header">
                <h3 class="box-title">
                    <strong><i class="fa fa-map-marker margin-r-5"></i> 
                    <?php echo e(app('translator')->getFromJson( 'superadmin::lang.business_location' )); ?></strong>
                </h3>
        </div>
        <div class="box-body">
                <div class="row">
                    <div class ="col-xs-12">
                    <!-- location table-->
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Location ID</th>
                                    <th>Landmark</th>
                                    <th>city</th>
                                    <th>Zip Code</th>
                                    <th>State</th>
                                    <th>Country</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $__currentLoopData = $business->locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                    <td><?php echo e($location->name); ?></td>
                                    <td><?php echo e($location->location_id); ?></td>
                                    <td><?php echo e($location->landmark); ?></td>
                                    <td><?php echo e($location->city); ?></td>
                                    <td><?php echo e($location->zip_code); ?></td>
                                    <td><?php echo e($location->state); ?></td>
                                    <td><?php echo e($location->country); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                                </tbody>
                            </table>
                    </div>
                </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
                <h3 class="box-title">
                    <strong><i class="fa fa-refresh margin-r-5"></i> 
                    <?php echo e(app('translator')->getFromJson( 'superadmin::lang.package_subscription' )); ?></strong>
                </h3>
        </div>
        <div class="box-body">
                <div class="row">
                    <div class ="col-xs-12">
                    <!-- location table-->
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Package Name</th>
                                    <th>Start Date</th>
                                    <th>Trail End Date</th>
                                    <th>End Date</th>
                                    <th>Paid Via</th>
                                    <th>Payment Transaction ID</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $__currentLoopData = $business->subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                    <td><?php echo e($subscription->package_details['name']); ?></td>
                                    <td><?php if(!empty($subscription->start_date)): ?><?php echo e(\Carbon::createFromTimestamp(strtotime($subscription->start_date))->format(session('business.date_format'))); ?><?php endif; ?></td>
                                    <td><?php if(!empty($subscription->trial_end_date)): ?><?php echo e(\Carbon::createFromTimestamp(strtotime($subscription->trial_end_date))->format(session('business.date_format'))); ?><?php endif; ?></td>
                                    <td><?php if(!empty($subscription->end_date)): ?><?php echo e(\Carbon::createFromTimestamp(strtotime($subscription->end_date))->format(session('business.date_format'))); ?><?php endif; ?></td>
                                    <td><?php echo e($subscription->paid_via); ?></td>
                                    <td><?php echo e($subscription->payment_transaction_id); ?></td>
                                    <td><?php echo e($subscription->created_at); ?></td>
                                    <td><?php if(!empty($subscription->created_user)): ?> <?php echo e($subscription->created_user->user_full_name); ?> <?php endif; ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                                </tbody>
                            </table>
                    </div>
                </div>
        </div>
    </div>

</section>
<!-- /.content -->
        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>