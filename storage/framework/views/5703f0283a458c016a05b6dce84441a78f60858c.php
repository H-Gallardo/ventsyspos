<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header no-print">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"></h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-xs-6">
          <div class="well well-sm">
            <strong><?php echo e(app('translator')->getFromJson('business.business_name')); ?>: </strong> <?php echo e($system["invoice_business_name"]); ?> <br>
            <strong><?php echo e(app('translator')->getFromJson('business.email')); ?>: </strong> <?php echo e($system["email"]); ?> <br>
            <strong><?php echo e(app('translator')->getFromJson('business.landmark')); ?>: </strong> <?php echo e($system["invoice_business_landmark"]); ?> <br>
            <strong><?php echo e(app('translator')->getFromJson('business.city')); ?>: </strong> <?php echo e($system["invoice_business_city"]); ?>

            <strong><?php echo e(app('translator')->getFromJson('business.zip_code')); ?>: </strong> <?php echo e($system["invoice_business_zip"]); ?> <br>
            <strong><?php echo e(app('translator')->getFromJson('business.state')); ?>: </strong> <?php echo e($system["invoice_business_state"]); ?>

            <strong><?php echo e(app('translator')->getFromJson('business.country')); ?>: </strong> <?php echo e($system["invoice_business_country"]); ?>

          </div>
        </div>
        <div class="col-xs-6">
          <div class="well well-sm">
            <strong><?php echo e(app('translator')->getFromJson('business.business_name')); ?>: </strong> <?php echo e($subscription->business->name); ?> <br>
            <?php if(!empty($subscription->business->tax_number_1) && !empty($subscription->business->tax_label_1)): ?>
              <strong><?php echo e($subscription->business->tax_label_1); ?>: </strong> <?php echo e($subscription->business->tax_number_1); ?> <br>
            <?php endif; ?>
            
            <?php if(!empty($subscription->business->tax_number_2) && !empty($subscription->business->tax_label_2)): ?>
              <strong><?php echo e($subscription->business->tax_label_2); ?>: </strong> <?php echo e($subscription->business->tax_number_2); ?> <br>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table subscription-details">
            <thead>
              <tr>
                <th>Package</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
            </thead>
            <body>
              <tr>
                <td><?php echo e($subscription->package->name); ?></td>
                <td>1</td>
                <td><span class="display_currency" data-currency_symbol="true"><?php echo e($subscription->package_price); ?></span> </td>
              </tr>
            </body>
          </table>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12">
          <table class="table">
            <tr>
              <th>Created At:</th>
              <td><?php echo e(\Carbon::createFromTimestamp(strtotime($subscription->created_at))->format(session('business.date_format'))); ?></td>
              <th>Payment Transaction ID:</th>
              <td><?php echo e($subscription->payment_transaction_id); ?></td>
            </tr>
            <tr>
              <th>Created By:</th>
              <td><?php echo e($subscription->created_user->user_full_name); ?></td>
              <th>Paid Via:</th>
              <td><?php echo e($subscription->paid_via); ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="modal-footer no-print">
      <button type="button" class="btn btn-primary" aria-label="Print" 
      onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> <?php echo e(app('translator')->getFromJson( 'messages.print' )); ?>
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script type="text/javascript">
  $(document).ready(function(){
    __currency_convert_recursively($('.subscription-details'));
  })
</script>