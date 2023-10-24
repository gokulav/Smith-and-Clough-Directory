<?php $__env->startSection('title',trans('Policy')); ?>

<?php $__env->startSection('banner_heading'); ?>
    <?php echo app('translator')->get('Cookie Policy'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <section class="category-filter-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="shadow rounded-3 p-5">
                            <h4> <?php echo app('translator')->get($title); ?></h4>
                            <h6 class="card-title"><i><?php echo app('translator')->get($short_description); ?></i></h6>
                            <p class="card-text"><?php echo app('translator')->get($description); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php $__env->stopSection(); ?>




<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/cookiePolicy.blade.php ENDPATH**/ ?>