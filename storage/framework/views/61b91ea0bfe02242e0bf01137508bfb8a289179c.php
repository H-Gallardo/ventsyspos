<?php if(!empty($__subscription) && env('APP_ENV') != 'demo'): ?>
<i class="fa fa-info-circle pull-left mt-10 cursor-pointer" style= "margin-top: 17px; padding-left:20px; color:white" aria-hidden="true" data-toggle="popover" data-html="true" title="<?php echo e(app('translator')->getFromJson('superadmin::lang.active_package_description')); ?>" data-placement="right" data-trigger="hover" data-content="
    <table class='table table-condensed'>
     <tr class='text-center'> 
        <td colspan='2'>
            <?php echo e($__subscription->package_details['name']); ?>

        </td>
     </tr>
     <tr class='text-center'>
        <td colspan='2'>
            <?php echo e(\Carbon::createFromTimestamp(strtotime($__subscription->start_date))->format(session('business.date_format'))); ?> - <?php echo e(\Carbon::createFromTimestamp(strtotime($__subscription->end_date))->format(session('business.date_format'))); ?>

        </td>
     </tr>
     <tr> 
        <td colspan='2'>
            <i class='fa fa-check text-success'></i>
            <?php if($__subscription->package_details['location_count'] == 0): ?>
                <?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
            <?php else: ?>
                <?php echo e($__subscription->package_details['location_count']); ?>

            <?php endif; ?>

            <?php echo e(app('translator')->getFromJson('business.business_locations')); ?>
        </td>
     </tr>
     <tr>
        <td colspan='2'>
            <i class='fa fa-check text-success'></i>
            <?php if($__subscription->package_details['user_count'] == 0): ?>
                <?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
            <?php else: ?>
                <?php echo e($__subscription->package_details['user_count']); ?>

            <?php endif; ?>

            <?php echo e(app('translator')->getFromJson('superadmin::lang.users')); ?>
        </td>
     <tr>
     <tr>
        <td colspan='2'>
            <i class='fa fa-check text-success'></i>
            <?php if($__subscription->package_details['product_count'] == 0): ?>
                <?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
            <?php else: ?>
                <?php echo e($__subscription->package_details['product_count']); ?>

            <?php endif; ?>

            <?php echo e(app('translator')->getFromJson('superadmin::lang.products')); ?>
        </td>
     </tr>
     <tr>
        <td colspan='2'>
            <i class='fa fa-check text-success'></i>
            <?php if($__subscription->package_details['invoice_count'] == 0): ?>
                <?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
            <?php else: ?>
                <?php echo e($__subscription->package_details['invoice_count']); ?>

            <?php endif; ?>

            <?php echo e(app('translator')->getFromJson('superadmin::lang.invoices')); ?>
        </td>
     </tr>
     
    </table>                     
">
</i>
<?php endif; ?>