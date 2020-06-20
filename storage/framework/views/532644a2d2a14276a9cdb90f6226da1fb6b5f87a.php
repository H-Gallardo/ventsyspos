<div class="modal fade" id="tc_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title pull-left">
          <?php echo e(app('translator')->getFromJson('lang_v1.terms_conditions')); ?>
        </h4> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <p>
              <?php if(!empty($system_settings['superadmin_register_tc'])): ?>
                <?php echo nl2br($system_settings['superadmin_register_tc']); ?>

              <?php endif; ?>
            </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson('messages.close')); ?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->