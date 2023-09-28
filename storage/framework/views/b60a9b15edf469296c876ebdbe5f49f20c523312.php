<?php $__env->startSection('title',trans('Product Enquiries')); ?>

<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap-datepicker.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0"><?php echo app('translator')->get('Product Enquiries'); ?></h3>
                </div>
                <div class="switcher">
                    <a href="<?php echo e(route('user.productQuery', 'customer-enquiry')); ?>">
                        <button class="<?php echo e((lastUriSegment() == 'customer-enquiry') ? 'active' : ''); ?> position-relative">
                            <?php echo app('translator')->get('Customer Enquiry'); ?>
                            <?php if(count($customerEnquery) > 0): ?>
                                <sup class="text-danger custom__queiry_count"> <span class="badge bg-primary rounded-circle"><?php echo e(count($customerEnquery)); ?></span></sup>
                            <?php endif; ?>
                        </button>
                    </a>

                    <a href="<?php echo e(route('user.productQuery','my-enquiry')); ?>">
                        <button class="<?php echo e((lastUriSegment() == 'my-enquiry') ? 'active' : ''); ?> position-relative">
                            <?php echo app('translator')->get('My Enquiry'); ?>
                            <?php if($myReply > 0): ?>
                                <sup class="text-danger custom__queiry_count"> <span class="badge bg-primary rounded-circle"><?php echo e($myReply); ?></span> </sup>
                            <?php endif; ?>
                        </button>
                    </a>
                </div>

                <!-- search area -->
                <div class="search-bar my-search-bar">
                    <form action="" method="get" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="input-box input-group">
                                    <button class="search"></button>
                                    <input type="text" name="name" value="<?php echo e(old('name',request()->name)); ?>" class="form-control" placeholder="<?php echo app('translator')->get('Search Here...'); ?>"/>
                                </div>
                            </div>

                            <div class="input-box col-lg-3 col-md-3 col-sm-12">
                                <input type="text" class="form-control datepicker from_date" name="from_date" autofocus="off" readonly placeholder="<?php echo app('translator')->get('From date'); ?>" value="<?php echo e(old('from_date',request()->from_date)); ?>">
                            </div>

                            <div class="input-box col-lg-3 col-md-3 col-sm-12">
                                <input type="text" class="form-control datepicker to_date" name="to_date" autofocus="off" readonly placeholder="<?php echo app('translator')->get('To date'); ?>" value="<?php echo e(old('to_date',request()->to_date)); ?>" disabled="true">
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
                            <?php if($type == 'customer-enquiry'): ?>
                                <th scope="col"><?php echo app('translator')->get('Customer'); ?> </th>
                            <?php else: ?>
                                <th scope="col"><?php echo app('translator')->get('Vendor'); ?> </th>
                            <?php endif; ?>
                            <th scope="col"><?php echo app('translator')->get('Listing'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Product'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Message'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Time'); ?></th>
                            <th scope="col" class="text-end"><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $productQueries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $query): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $client_reply = \App\Models\ProductReply::where('client_id', \Illuminate\Support\Facades\Auth::user()->id)->where('product_query_id', $query->id)->where('status', 0)->count();
                            ?>
                            <tr>
                                <?php if($query->get_client->id == \Illuminate\Support\Facades\Auth::user()->id): ?>
                                    <td class="company-logo" data-label="Vendor">
                                        <div class="d-flex">
                                            <div>
                                                <a href="<?php echo e(route('profile', [slug(optional($query->get_user)->firstname), optional($query->get_user)->id])); ?>" target="_blank">
                                                    <img src="<?php echo e(getFile(optional($query->get_user)->driver, optional($query->get_user)->image)); ?>">
                                                </a>
                                            </div>
                                            <div>
                                                <?php echo app('translator')->get(optional($query->get_user)->firstname); ?> <?php echo app('translator')->get(optional($query->get_user)->lastname); ?> <br> <?php echo app('translator')->get(optional($query->get_user)->email); ?>
                                            </div>
                                        </div>
                                    </td>
                                <?php else: ?>
                                    <td class="company-logo" data-label="Customer">
                                        <div class="d-flex">
                                            <div>
                                                <a href="<?php echo e(route('profile', [slug(optional($query->get_client)->firstname), optional($query->get_client)->id])); ?>" target="_blank">
                                                    <img src="<?php echo e(getFile(optional($query->get_client)->driver, optional($query->get_client)->image)); ?>" alt="<?php echo e(config('basic.site_title')); ?>">
                                                </a>
                                            </div>
                                            <div>
                                                <?php echo app('translator')->get(optional($query->get_client)->firstname); ?> <?php echo app('translator')->get(optional($query->get_client)->lastname); ?> <br> <?php echo app('translator')->get(optional($query->get_client)->email); ?>
                                            </div>
                                        </div>
                                    </td>
                                <?php endif; ?>

                                <td data-label="Listing">
                                    <a href="<?php echo e(route('listing-details',[slug(optional($query->get_listing)->title), optional($query->get_listing)->id])); ?>" class="color-change-listing" target="_blank"><?php echo app('translator')->get(\Illuminate\Support\Str::limit(optional($query->get_listing)->title, 50)); ?></a>
                                </td>

                                <td data-label="Product">
                                    <?php echo app('translator')->get(Str::limit(optional($query->get_product)->product_title, 50)); ?>
                                </td>


                                <td data-label="Message">
                                    <a href="<?php echo e(route('user.productQueryReply', $query->id)); ?>" class="btn btn-sm btn-primary position-relative">
                                        <i class="fas fa-sms"></i>
                                        <?php if(Auth::id() == $query->user_id): ?>
                                            <?php
                                                $customerEnquirySms = \App\Models\ProductQuery::where('id', $query->id)->where('customer_enquiry', 0)->count();
                                            ?>

                                            <?php if($customerEnquirySms > 0 || $client_reply > 0): ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger message-number-size"> <?php if($client_reply > 0): ?> <?php echo e($client_reply); ?> <?php else: ?><?php echo e($customerEnquirySms); ?> <?php endif; ?></span>
                                            <?php endif; ?>
                                        <?php elseif(Auth::id() == $query->client_id): ?>
                                            <?php if($client_reply > 0): ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger message-number-size"><?php echo e($client_reply); ?> </span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </a>
                                </td>

                                <td data-label="Time"><?php echo e(dateTime($query->created_at)); ?></td>

                                    <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                        <div class="dropdown-btns">
                                            <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="far fa-ellipsis-v"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="<?php echo e(route('user.productQueryReply', $query->id)); ?>" class="btn currentColor dropdown-item"> <i class="fal fa-reply me-2"></i> <?php echo app('translator')->get('Send reply'); ?></a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#delete-modal" class="btn currentColor notiflix-confirm dropdown-item" data-route="<?php echo e(route('user.productQueryDelete', $query->id)); ?>">
                                                        <i class="far fa-trash-alt me-2"></i> <?php echo app('translator')->get('Delete'); ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td class="text-center" colspan="100%"> <?php echo app('translator')->get('No Data Found'); ?></td>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($productQueries->appends($_GET)->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('loadModal'); ?>
        <!-- Delete Modal -->
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

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/user/productQuery.blade.php ENDPATH**/ ?>