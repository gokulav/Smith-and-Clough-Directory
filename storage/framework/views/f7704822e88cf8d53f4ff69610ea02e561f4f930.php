<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get($title); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('banner_heading'); ?>
    <?php echo app('translator')->get($title); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="blog-section blog-page">
        <div class="container">
            <div class="row g-lg-5">
                <div class="col-lg-12">
                    <div class="blog-box">
                        <div class="text-box">
                            <p>
                                <?php echo app('translator')->get($description); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\Projects\smith-and-clough-com.stackstaging.com\Live-files-project\Smith-and-Clough-Directory\resources\views/themes/classic/getLink.blade.php ENDPATH**/ ?>