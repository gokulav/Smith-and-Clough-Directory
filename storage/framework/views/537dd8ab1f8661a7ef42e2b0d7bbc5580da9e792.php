<?php $__env->startSection('title',trans('Analytics')); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap-datepicker.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0"><?php echo app('translator')->get('My Analytics'); ?></h3>
                </div>

                <div class="search-bar my-search-bar">
                    <form action="" method="get" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="input-box input-group">
                                    <input type="text" name="listing" value="<?php echo e(old('listing',request()->listing)); ?>" class="form-control" placeholder="<?php echo app('translator')->get('Search listing...'); ?>"/>
                                </div>
                            </div>

                            <div class="input-box col-lg-3 col-md-3 col-sm-12">
                                <div class="input-box input-group">
                                    <input type="text" class="form-control datepicker from_date" name="from_date" autofocus="off" readonly placeholder="<?php echo app('translator')->get('From date'); ?>" value="<?php echo e(old('purchase_date',request()->from_date)); ?>">
                                </div>
                            </div>

                            <div class="input-box col-lg-3 col-md-3 col-sm-12">
                                <div class="input-box input-group">
                                    <input type="text" class="form-control datepicker to_date" name="to_date" autofocus="off" readonly placeholder="<?php echo app('translator')->get('To date'); ?>" value="<?php echo e(old('expire_date',request()->to_date)); ?>" disabled="true">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <button class="btn-custom" type="submit"><?php echo app('translator')->get('search'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- table -->
                <div class="table-parent table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><?php echo app('translator')->get('Listing'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Country'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Total Visit'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('Last Visited At'); ?></th>
                                <th scope="col" class="text-end"><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $allAnalytics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $analytic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-label="<?php echo app('translator')->get('Listing'); ?>">
                                        <a href="<?php echo e(route('listing-details',[slug(optional($analytic->getListing)->title), optional($analytic->getListing)->id])); ?>" class="color-change-listing" target="_blank"><?php echo app('translator')->get(\Illuminate\Support\Str::limit(optional($analytic->getListing)->title, 50)); ?></a>
                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Country'); ?>">
                                        <?php echo e(($analytic->country) ? __($analytic->country) : __('N/A')); ?>

                                    </td>

                                    <td data-label="<?php echo app('translator')->get('Total Visit'); ?>"><?php echo e($analytic->list_count_count); ?></td>

                                    <td data-label="<?php echo app('translator')->get('Last Visited At'); ?>">
                                        <?php echo e(dateTime(optional($analytic->lastVisited)->created_at)); ?>

                                    </td>

                                    <td class="action" data-label="<?php echo app('translator')->get('Action'); ?>">
                                        <div class="d-flex justify-content-end">
                                            <a class="btn2 btn" href="<?php echo e(route('user.showListingAnalytics', $analytic->listing_id)); ?>">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <td colspan="100%" class="text-center"><?php echo app('translator')->get('No Data Found'); ?></td>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($allAnalytics->appends($_GET)->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('assets/global/js/bootstrap-datepicker.js')); ?>"></script>
    <script>
        'use strict'
        $(document).ready(function () {
            $(".datepicker").datepicker({
                autoclose: true,
                clearBtn: true
            });

            $('.from_date').on('change', function () {
                $('.to_date').removeAttr('disabled');
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/user/analytics.blade.php ENDPATH**/ ?>