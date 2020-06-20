<div class="pos-tab-content">
    <div class="row">
    	<div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('BACKUP_DISK', __('superadmin::lang.backup_disk') . ':'); ?>

            	<?php echo Form::select('BACKUP_DISK', $backup_disk, $default_values['BACKUP_DISK'], ['class' => 'form-control']);; ?>

            </div>
        </div>
        <div class="col-xs-8 <?php if(env('BACKUP_DISK') != 'dropbox'): ?> hide <?php endif; ?>" id="dropbox_access_token_div">
            <div class="form-group">
            	<?php echo Form::label('DROPBOX_ACCESS_TOKEN', __('superadmin::lang.dropbox_access_token') . ':'); ?>

            	<?php echo Form::text('DROPBOX_ACCESS_TOKEN', $default_values['DROPBOX_ACCESS_TOKEN'], ['class' => 'form-control','placeholder' => __('superadmin::lang.dropbox_access_token')]);; ?>

            </div>
            <p class="help-block"><?php echo __('superadmin::lang.dropbox_help', ['link' => 'https://www.dropbox.com/developers/apps/create']); ?></p>
        </div>
    </div>
</div>