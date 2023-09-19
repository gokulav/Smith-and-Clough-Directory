<?php $__env->startSection('title','404'); ?>
<?php $__env->startSection('banner_heading'); ?>
   <?php echo app('translator')->get('404'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="not-found">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col">
                    <div class="text-box text-center">
                        <img src="<?php echo e(asset($themeTrue.'img/icon/error-404.png')); ?>" alt="<?php echo e(config('basic.site_title')); ?>" />
                        <h1><?php echo app('translator')->get('Oops!'); ?></h1>
                        <p><?php echo app('translator')->get("We can't seem to find the page you are looking for"); ?></p>
                        <a href="<?php echo e(route('home')); ?>" class="btn-custom text-white"><?php echo app('translator')->get('Back To Home'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/errors/404.blade.php ENDPATH**/ ?>