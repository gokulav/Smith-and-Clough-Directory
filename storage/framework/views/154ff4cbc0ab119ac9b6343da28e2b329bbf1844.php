<?php $__env->startSection('title',trans('All WishList')); ?>

<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap-datepicker.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0"><?php echo app('translator')->get('My WishList'); ?></h3>
                </div>
                <div class="search-bar my-search-bar">
                    <form action="" method="get" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="input-box input-group">

                                    <input type="text" name="name" value="<?php echo e(old('name',request()->name)); ?>" class="form-control" placeholder="<?php echo app('translator')->get('Search listing...'); ?>"/>
                                </div>
                            </div>

                            <div class="input-box col-lg-3 col-md-3 col-sm-12">
                                <input type="text" class="form-control datepicker from_date" name="purchase_date" autofocus="off" readonly placeholder="<?php echo app('translator')->get('From date'); ?>" value="<?php echo e(old('purchase_date',request()->purchase_date)); ?>">
                            </div>

                            <div class="input-box col-lg-3 col-md-3 col-sm-12">
                                <input type="text" class="form-control datepicker to_date" name="expire_date" autofocus="off" readonly placeholder="<?php echo app('translator')->get('To date'); ?>" value="<?php echo e(old('expire_date',request()->expire_date)); ?>" disabled="true">
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
                            <th scope="col"><?php echo app('translator')->get('Category'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Listing'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Added At'); ?></th>
                            <th scope="col" class="text-end"><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $favourite_listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <tr>
                                <td data-label="Category">
                                    <?php echo e(optional($listing->get_listing)->getCategoriesName()); ?>

                                </td>

                                <td data-label="Listing">
                                    <a href="<?php echo e(route('listing-details',[slug(optional($listing->get_listing)->title), optional($listing->get_listing)->id])); ?>" class="color-change-listing" target="_blank"><?php echo app('translator')->get(Str::limit(optional($listing->get_listing)->title, 50)); ?></a>
                                </td>

                                <td data-label="Added At"><?php echo e(dateTime($listing->created_at)); ?></td>
                                <td class="action" data-label="Action">
                                    <div class="d-flex justify-content-end">
                                        <button data-bs-toggle="modal" data-bs-target="#delete-modal" class="btn2 btn notiflix-confirm" data-route="<?php echo e(route('user.favouriteListingDelete', $listing->id)); ?>">
                                            <i class="fas fa-trash-alt custom-delete-fa"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td class="text-center" colspan="100%"> <?php echo app('translator')->get('No Data Found'); ?></td>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($favourite_listings->appends($_GET)->links()); ?>

                </div>
        </div>
    </div>

    <?php $__env->startPush('loadModal'); ?>
        <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top modal-md">
                <div class="modal-content">
                    <div class="modal-header modal-primary modal-header-custom">
                        <h4 class="modal-title" id="editModalLabel"><?php echo app('translator')->get('Delete Confirmation'); ?></h4>
                        <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fal fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo app('translator')->get('Are you sure delete?'); ?>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <form action="" method="post" class="deleteRoute">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-primary addCreateListingRoute"><?php echo app('translator')->get('Confirm'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopPush(); ?>

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

            $('.notiflix-confirm').on('click', function () {
                var route = $(this).data('route');
                $('.deleteRoute').attr('action', route)
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/user/wishList.blade.php ENDPATH**/ ?>