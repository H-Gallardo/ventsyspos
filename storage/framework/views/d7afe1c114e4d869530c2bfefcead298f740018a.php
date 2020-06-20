<div class="charts" style="background: <?php echo e($model->background_color); ?>;">
    <div data-duration="<?php echo e($model->loader_duration); ?>" class="charts-loader <?php echo e($model->loader ? 'enabled' : ''); ?>" style="display: none; position: relative; top: <?php echo e(($model->height / 2) - 30); ?>px; height: 0;">
        <center>
            <div class="loading-spinner" style="border: 3px solid <?php echo e($model->loader_color); ?>; border-right-color: transparent;"></div>
        </center>
    </div>
    <div class="charts-chart">
