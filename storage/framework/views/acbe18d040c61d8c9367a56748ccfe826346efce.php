<script type="text/javascript">
    $(function () {
        var <?php echo e($model->id); ?> = new Highcharts.Chart({
            chart: {
                renderTo: "<?php echo e($model->id); ?>",
                <?php echo $__env->make('charts::_partials.dimension.js2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            },
            <?php if($model->title): ?>
                title: {
                    text:  "<?php echo $model->title; ?>",
                    x: -20 //center
                },
            <?php endif; ?>
            <?php if(!$model->credits): ?>
                credits: {
                    enabled: false
                },
            <?php endif; ?>
            xAxis: {
                categories: [
                <?php $__currentLoopData = $model->labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    "<?php echo $label; ?>",
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]
            },
            yAxis: {
                title: {
                    text: "<?php echo $model->y_axis_title === null ? $model->element_label : $model->y_axis_title; ?>"
                },
            },
            legend: {
                <?php if(!$model->legend): ?>
                    enabled: false,
                <?php endif; ?>
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                floating: true
            },
            series: [
                <?php for($i = 0; $i < count($model->datasets); $i++): ?>
                    {
                        name:  "<?php echo $model->datasets[$i]['label']; ?>",
                        <?php if($model->colors && count($model->colors) > $i): ?>
                            color: "<?php echo e($model->colors[$i]); ?>",
                        <?php endif; ?>
                        data: [
                            <?php $__currentLoopData = $model->datasets[$i]['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($dta); ?>,
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ]
                    },
                <?php endfor; ?>
            ]
        })
    });
</script>

<?php if(!$model->customId): ?>
    <?php echo $__env->make('charts::_partials.container.div', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
