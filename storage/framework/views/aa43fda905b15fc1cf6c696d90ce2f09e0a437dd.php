<?php $__env->startSection('title', trans('FAQ')); ?>

<?php $__env->startSection('banner_heading'); ?>
    <?php echo app('translator')->get('Faq'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- faq section -->
    <section class="faq-section faq-page">
        <div class="container">
            <?php if(isset($contentDetails['faq'])): ?>
                <div class="row g-4 gy-5 justify-content-center ">
                    <div class="col-lg-8">
                        <div class="accordion" id="accordionExample">
                            <?php $__currentLoopData = $contentDetails['faq']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="headingOne<?php echo e($data->id); ?>">
                                        <button class="accordion-button <?php echo e($key == 0 ? '' : 'collapsed'); ?>"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne<?php echo e($data->id); ?>" aria-expanded="true"
                                                aria-controls="collapseOne"><?php echo app('translator')->get(optional($data->description)->title); ?>
                                        </button>
                                    </h5>
                                    <div id="collapseOne<?php echo e($data->id); ?>"
                                         class="accordion-collapse collapse <?php echo e($key == 0 ? 'show' : ''); ?>"
                                         aria-labelledby="headingOne<?php echo e($data->id); ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php echo app('translator')->get(optional($data->description)->description); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\Projects\smith-and-clough-com.stackstaging.com\Live-files-project\Smith-and-Clough-Directory\resources\views/themes/classic/faq.blade.php ENDPATH**/ ?>