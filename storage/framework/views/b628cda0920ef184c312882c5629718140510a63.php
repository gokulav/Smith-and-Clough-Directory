<?php $__currentLoopData = $listingCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-xl-4 col-md-6 col-6">
    <a href="<?php echo e(route('listing',[slug(optional($category->details)->name), $category->id])); ?>">
    <div class="category-box">
            <div class="icon-box">
                <i class="<?php echo e($category->icon); ?>"></i>
            </div>
            <div>
                <h5><?php echo app('translator')->get(optional($category->details)->name); ?></h5>
                <span><?php echo e($category->getCategoryCount()); ?> <?php echo app('translator')->get('Listings'); ?></span>
            </div>
        </div>
    </a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset($themeTrue.'js/carousel.js')); ?>"></script>
<?php $__env->stopPush(); ?><?php /**PATH D:\wamp\www\Projects\smith-and-clough-com.stackstaging.com\Live-files-project\Smith-and-Clough-Directory\resources\views/themes/classic/includes/listing/category.blade.php ENDPATH**/ ?>