<?php $__env->startSection('title',trans('About Us')); ?>

<?php $__env->startSection('banner_heading'); ?>
   <?php echo app('translator')->get('About Us'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
     <?php if(isset($templates['about-us'][0]) && $about_us = $templates['about-us'][0]): ?>
         <section class="about-section">
            <div class="container">
               <div class="row g-lg-5 gy-5 align-items-center">
                  <div class="col-lg-5">
                     <div class="img-box">
                        <img src="<?php echo e(getFile(optional($about_us->media)->driver, $about_us->templateMedia()->image)); ?>" class="img-fluid rounded" alt="<?php echo e(config('basic.site_title')); ?>"/>
                     </div>
                  </div>

                  <div class="col-lg-1 d-none d-lg-block"></div>
                  <div class="col-lg-6">
                     <div class="text-box">
                        <div class="header-text">
                           <h5><?php echo app('translator')->get(optional($about_us->description)->title); ?></h5>
                           <h3><?php echo app('translator')->get(optional($about_us->description)->sub_title); ?></h3>
                        </div>
                        <div>
                           <?php echo optional($about_us->description)->description; ?>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
     <?php endif; ?>

     <?php echo $__env->make($theme.'sections.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php echo $__env->make($theme.'sections.how-it-work', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/about.blade.php ENDPATH**/ ?>