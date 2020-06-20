<?php $__env->startSection('title',  __('printer.add_printer')); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">



</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('printer.add_printer')); ?></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
<?php echo Form::open(['url' => action('PrinterController@store'), 'method' => 'post', 'id' => 'add_printer_form' ]); ?>

	<div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('name', __('printer.name') . ':*'); ?>

              <?php echo Form::text('name', null, ['class' => 'form-control', 'required',
              'placeholder' => __('lang_v1.printer_name_help')]);; ?>

          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('connection_type',__('printer.connection_type') . ':*'); ?>

            <?php echo Form::select('connection_type', $connection_types, null, ['class' => 'form-control select2']);; ?>

          </div>
        </div>

        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('capability_profile',__('printer.capability_profile') . ':*'); ?>

            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.capability_profile') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::select('capability_profile', $capability_profiles, null, ['class' => 'form-control select2']);; ?>

          </div>
        </div>

        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('char_per_line', __('printer.character_per_line') . ':*'); ?>

              <?php echo Form::number('char_per_line', 42, ['class' => 'form-control', 'required',
              'placeholder' => __('lang_v1.char_per_line_help')]);; ?>

          </div>
        </div>

        <div class="col-sm-12" id="ip_address_div">
          <div class="form-group">
            <?php echo Form::label('ip_address', __('printer.ip_address') . ':*'); ?>

            <?php echo Form::text('ip_address', null, ['class' => 'form-control', 'required', 'placeholder' => __('lang_v1.ip_address_help')]);; ?>

          </div>
        </div>

        <div class="col-sm-12" id="port_div">
          <div class="form-group">
            <?php echo Form::label('port', __('printer.port') . ':*'); ?>

              <?php echo Form::text('port', 9100, ['class' => 'form-control', 'required']);; ?>

              <span class="help-block"><?php echo e(app('translator')->getFromJson('lang_v1.port_help')); ?></span>
          </div>
        </div>

        <div class="col-sm-12 hide" id="path_div">
          <div class="form-group">
            <?php echo Form::label('path', __('printer.path') . ':*'); ?>

            <?php echo Form::text('path', null, ['class' => 'form-control', 'required']);; ?>

            <span class="help-block">
              <b>Connection Type Windows: </b> The device files will be along the lines of <code>LPT1</code> (parallel) or <code>COM1</code> (serial). <br/>
              <b>Connection Type Linux: </b> Your printer device file will be somewhere like <code>/dev/lp0</code> (parallel), <code>/dev/usb/lp1</code> (USB), <code>/dev/ttyUSB0</code> (USB-Serial), <code>/dev/ttyS0</code> (serial). <br/>
            </span>
          </div>
        </div>

        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary pull-right"><?php echo e(app('translator')->getFromJson('messages.save')); ?></button>
        </div>
      </div>
    </div>
  </div>
  <?php echo Form::close(); ?>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>