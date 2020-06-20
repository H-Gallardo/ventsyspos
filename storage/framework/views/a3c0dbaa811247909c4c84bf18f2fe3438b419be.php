<div class="pos-tab-content">
     <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('theme_color', __('lang_v1.theme_color'));; ?>

                <?php echo Form::select('theme_color', $theme_colors,   $business->theme_color, 
                    ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'style' => 'width: 100%;']);; ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('enable_tooltip', 1, $business->enable_tooltip , 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'business.show_help_text' )); ?>

                  </label>
                </div>
            </div>
        </div>
    </div>
</div>