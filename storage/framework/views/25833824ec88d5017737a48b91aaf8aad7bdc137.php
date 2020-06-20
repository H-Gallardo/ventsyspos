<div class="pos-tab-content">
     <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('stock_expiry_alert_days', __('business.view_stock_expiry_alert_for') . ':*'); ?>

                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calendar-times-o"></i>
                </span>
                <?php echo Form::number('stock_expiry_alert_days', $business->stock_expiry_alert_days, ['class' => 'form-control','required']);; ?>

                <span class="input-group-addon">
                    <?php echo e(app('translator')->getFromJson('business.days')); ?>
                </span>
                </div>
            </div>
        </div>
    </div>
</div>