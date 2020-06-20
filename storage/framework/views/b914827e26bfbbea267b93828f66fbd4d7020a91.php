<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-12">
            <?php if(config('app.env') != 'demo'): ?>
                <p>
                    To send <mark>subscription expiry alert</mark> & <mark>automated application backup</mark> process you must setup a cron job with this command:<br/>
                    <code>* * * * * php <?php echo e(base_path('artisan')); ?> schedule:run >> /dev/null 2>&1</code>
                </p>
                
                <p>
                    Set it in cron jobs tab in cpanel or directadmin or similar panel. <br/>Or edit crontab if using cloud/dedicated hosting. <br/>Or contact hosting for help with cron job settings.
                </p>
            <?php else: ?>
                <?php echo e(app('translator')->getFromJson('lang_v1.disabled_in_demo')); ?>
            <?php endif; ?>
        </div>
    </div>
</div>