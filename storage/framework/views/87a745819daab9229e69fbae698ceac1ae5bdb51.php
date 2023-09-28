<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get("Listing Analytics"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .fa-ellipsis-v:before {
            content: "\f142";
        }
    </style>
    <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-5 shadow">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <form action="" method="get" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3 col-xl-3 col-sm-12">
                            <div class="form-group">
                                <label for="title"> <?php echo app('translator')->get('Listing'); ?></label>
                                <input
                                    type="text"
                                    name="listing"
                                    value="<?php echo e(old('listing',request()->listing)); ?>"
                                    class="form-control"
                                    placeholder="<?php echo app('translator')->get('Search listing...'); ?>"
                                />
                            </div>
                        </div>

                        <div class="col-md-3 col-xl-3 col-sm-12">
                            <div class="form-group">
                                <label for="title"> <?php echo app('translator')->get('From Date'); ?></label>
                                <input type="date" class="form-control from_date" name="from_date" id="datepicker" placeholder="<?php echo app('translator')->get('From date'); ?>" value="<?php echo e(old('from_date', request()->from_date)); ?>"/>
                            </div>
                        </div>

                        <div class="col-md-3 col-xl-3 col-sm-12">
                            <div class="form-group">
                                <label for="title"> <?php echo app('translator')->get('To Date'); ?></label>
                                <input type="date" class="form-control to_date" name="to_date" id="datepicker" placeholder="<?php echo app('translator')->get('To date'); ?>" value="<?php echo e(old('to_date', request()->to_date)); ?>" disabled="true"/>
                            </div>
                        </div>

                        <div class="col-md-3 col-xl-3 col-sm-12">
                            <div class="form-group">
                                <label></label>
                                <button type="submit" class="btn w-100 w-md-auto btn-primary listing-btn-search-custom mt-2"><i
                                   class="fas fa-search"></i> <?php echo app('translator')->get('Search'); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                    <th><?php echo app('translator')->get('#'); ?></th>
                    <th><?php echo app('translator')->get('Listing'); ?></th>
                    <th><?php echo app('translator')->get('Country'); ?></th>
                    <th><?php echo app('translator')->get('Total Visit'); ?></th>
                    <th><?php echo app('translator')->get('Last Visited At'); ?></th>
                    <th class="text-end"><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $allAnalytics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $analytics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('No.'); ?>"><?php echo e(loopIndex($allAnalytics) + $key); ?></td>
                            <td data-label="<?php echo app('translator')->get('Listing'); ?>">
                                <a href="<?php echo e(route('listing-details',[slug(optional($analytics->getListing)->title), optional($analytics->getListing)->id])); ?>" class="color-change-listing" target="_blank"><?php echo app('translator')->get(\Illuminate\Support\Str::limit(optional($analytics->getListing)->title, 50)); ?></a>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Country'); ?>">
                                <?php echo app('translator')->get($analytics->country); ?>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Total Visit'); ?>">
                                <?php echo e($analytics->list_count_count); ?>

                            </td>
                            <td data-label="<?php echo app('translator')->get('Last Visited At'); ?>">
                                <?php echo e(dateTime(optional($analytics->lastVisited)->created_at)); ?>

                            </td>

                            <td>
                                <a class="btn btn-outline-primary btn-sm rounded btn-icon edit_button" href="<?php echo e(route('admin.showListingAnalytics', $analytics->listing_id)); ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center text-danger" colspan="100%"><?php echo app('translator')->get('No Data Found'); ?></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($allAnalytics->appends($_GET)->links('partials.pagination')); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        'use strict'
        $(document).ready(function () {
            $('.from_date').on('change', function (){
                $('.to_date').removeAttr('disabled')
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/admin/listing/analytics.blade.php ENDPATH**/ ?>