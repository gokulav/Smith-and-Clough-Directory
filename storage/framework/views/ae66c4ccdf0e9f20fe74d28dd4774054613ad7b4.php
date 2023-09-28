<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get("Product Enquiry"); ?>
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
                        <div class="col-md-3 col-xl-3 col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="name"> <?php echo app('translator')->get('Listing'); ?></label>
                                <input type="text" name="name" value="<?php echo e(old('name',request()->name)); ?>" class="form-control"
                                       placeholder="<?php echo app('translator')->get('Listing..'); ?>">
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
                    <th scope="col"><?php echo app('translator')->get('#'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('Listing'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('Product'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('Owner'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('Enquiry From'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('Message'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('Date-time'); ?></th>
                    <th scope="col" class="text-end"><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $productEnqueries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $query): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('No.'); ?>"><?php echo e(loopIndex($productEnqueries) + $key); ?></td>

                            <td data-label="<?php echo app('translator')->get('Listing'); ?>">
                                <a href="<?php echo e(route('listing-details',[slug(optional($query->get_listing)->title), optional($query->get_listing)->id])); ?>" class="color-change-listing" target="_blank"><?php echo app('translator')->get(Str::limit(optional($query->get_listing)->title, 50)); ?></a>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Product'); ?>">
                                <?php echo app('translator')->get(\Illuminate\Support\Str::limit(optional($query->get_product)->product_title, 50)); ?>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Owner'); ?>">
                                <div class="float-left">
                                    <a href="<?php echo e(route('admin.user-edit', optional($query->get_user)->id)); ?>" target="_blank">
                                        <img
                                            src="<?php echo e(getFile(optional($query->get_user)->driver, optional($query->get_user)->image)); ?>"
                                            alt="" class="contactImageUser">
                                    </a>
                                </div>
                                <div class="float-left">
                                    <?php echo app('translator')->get(optional($query->get_user)->firstname); ?> <?php echo app('translator')->get(optional($query->get_user)->lastname); ?> <br>
                                    <?php echo app('translator')->get(optional($query->get_user)->email); ?>
                                </div>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Enquiry From'); ?>">
                                <div class="float-left">
                                    <a href="<?php echo e(route('admin.user-edit', optional($query->get_client)->id)); ?>" target="_blank">
                                        <img
                                            src="<?php echo e(getFile(optional($query->get_client)->driver, optional($query->get_client)->image)); ?>"
                                            alt="" class="contactImageUser">
                                    </a>
                                </div>
                                <div class="float-left">
                                    <?php echo app('translator')->get(optional($query->get_client)->firstname); ?> <?php echo app('translator')->get(optional($query->get_client)->lastname); ?> <br>
                                    <?php echo app('translator')->get(optional($query->get_client)->email); ?>
                                </div>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Message'); ?>">
                                <a href="<?php echo e(route('admin.seeProductEnquiryReply', $query->id)); ?>" class="btn btn-sm btn-outline-primary btn-rounded">
                                    <i class="fa fa-sms"></i>
                                </a>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Date-Time'); ?>"><?php echo e(dateTime($query->created_at)); ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-danger btn-icon edit_button notiflix-confirm"
                                        data-toggle="modal" data-target="#deleteModal"
                                        data-route="<?php echo e(route('admin.wishListDelete',$query->id)); ?>">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center text-danger" colspan="100%"><?php echo app('translator')->get('No Data Found'); ?></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($productEnqueries->appends($_GET)->links('partials.pagination')); ?>

            </div>
        </div>
    </div>

    <?php $__env->startPush('adminModal'); ?>
        <!-- Delete Modal -->
        <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h5 class="modal-title"><span class="messageShow"></span> <?php echo app('translator')->get('Confirmation'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST" class="deleteRoute">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <div class="modal-body">
                            <p class="font-weight-bold"><?php echo app('translator')->get('Are you sure delete message?'); ?> </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn waves-effect waves-light btn-dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn waves-effect waves-light btn-primary messageShow"> <?php echo app('translator')->get('Delete'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        'use strict'
        $(document).ready(function () {
            $('.notiflix-confirm').on('click', function () {
                var route = $(this).data('route');
                $('.deleteRoute').attr('action', route)
            })

            $('.from_date').on('change', function (){
                $('.to_date').removeAttr('disabled')
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/admin/listing/productEnquiry.blade.php ENDPATH**/ ?>