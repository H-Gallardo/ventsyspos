<div class="modal-dialog modal-danger" role="document">
  <div class="modal-content">
  
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> <?php echo app('translator')->getFromJson('superadmin::lang.max_locations'); ?></h4>
    </div>

    <div class="modal-body">
      <?php echo app('translator')->getFromJson('superadmin::lang.max_locations'); ?>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-outline" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->