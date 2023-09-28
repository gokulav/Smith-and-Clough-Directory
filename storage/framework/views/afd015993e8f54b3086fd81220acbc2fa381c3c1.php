<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get("Reviews For "); ?> <?php echo app('translator')->get($listing->title); ?>
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
                                <label for="title"> <?php echo app('translator')->get('Filter By User'); ?></label>
                                <select name="user" class="form-control">
                                    <option selected disabled><?php echo app('translator')->get('Select User'); ?></option>
                                    <?php $__currentLoopData = $allReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reviewUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(optional($reviewUser->review_user_info)->id); ?>" <?php echo e(request()->user == optional($reviewUser->review_user_info)->id ? 'selected' : ''); ?>><?php echo app('translator')->get(optional($reviewUser->review_user_info)->fullname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 col-xl-3 col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="title"> <?php echo app('translator')->get('Filter By Ratings'); ?></label>
                                <select name="rating[]" class="form-control" multiple>
                                    <option disabled><?php echo app('translator')->get('Select Rating'); ?></option>
                                    <option value="5"
                                            <?php if(isset(request()->rating)): ?>
                                                <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($data == 5): ?> selected <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>>
                                        <?php echo app('translator')->get('5 Star'); ?>
                                    </option>

                                    <option value="4"
                                            <?php if(isset(request()->rating)): ?>
                                                <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($data == 4): ?> selected <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>>
                                        <?php echo app('translator')->get('4 Star'); ?>
                                    </option>

                                    <option value="3"
                                            <?php if(isset(request()->rating)): ?>
                                                <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($data == 3): ?> selected <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>>
                                        <?php echo app('translator')->get('3 Star'); ?>
                                    </option>

                                    <option value="2"
                                            <?php if(isset(request()->rating)): ?>
                                                <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($data == 2): ?> selected <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>>
                                        <?php echo app('translator')->get('2 Star'); ?>
                                    </option>

                                    <option value="1"
                                            <?php if(isset(request()->rating)): ?>
                                                <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($data == 1): ?> selected <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>>
                                        <?php echo app('translator')->get('1 Star'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2 col-xl-2 col-sm-12">
                            <div class="form-group">
                                <label for="title"> <?php echo app('translator')->get('From Date'); ?></label>
                                <input type="date" class="form-control from_date" name="from_date" id="datepicker" placeholder="<?php echo app('translator')->get('From date'); ?>" value="<?php echo e(old('from_date', request()->from_date)); ?>"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-xl-2 col-sm-12">
                            <div class="form-group">
                                <label for="title"> <?php echo app('translator')->get('To Date'); ?></label>
                                <input type="date" class="form-control to_date" name="to_date" id="datepicker" placeholder="<?php echo app('translator')->get('To date'); ?>" value="<?php echo e(old('to_date', request()->to_date)); ?>" disabled="true"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-xl-2 col-sm-12">
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
                        <th><?php echo app('translator')->get('User'); ?></th>
                        <th><?php echo app('translator')->get('Rating'); ?></th>
                        <th><?php echo app('translator')->get('Review'); ?></th>
                        <th><?php echo app('translator')->get('Date-Time'); ?></th>
                        <th class="text-end"><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $allReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('No.'); ?>"><?php echo e(loopIndex($allReviews) + $key); ?></td>
                            <td data-label="<?php echo app('translator')->get('User'); ?>">
                                <div class="float-left">
                                    <a href="<?php echo e(route('admin.user-edit', optional($review->review_user_info)->id)); ?>" target="_blank">
                                        <img src="<?php echo e(asset(getFile(optional($review->review_user_info)->driver, optional($review->review_user_info)->image))); ?>" alt="<?php echo e(config('basic.site_title')); ?>" class="contactImageUser">
                                    </a>
                                </div>
                                <div class="float-left">
                                    <?php echo app('translator')->get(optional($review->review_user_info)->firstname); ?> <?php echo app('translator')->get(optional($review->review_user_info)->lastname); ?> <br>
                                    <?php echo app('translator')->get(optional($review->review_user_info)->email); ?>
                                </div>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Rating'); ?>">
                                <?php
                                    $j = 0;
                                ?>
                                <?php for($i = $review->rating2; $i > 0; $i--): ?>
                                    <i class="fas fa-star rating__gold"></i>
                                    <?php
                                    $j = $j + 1;
                                    ?>
                                <?php endfor; ?>

                                <?php for($j; $j < 5; $j++): ?>
                                    <i class="far fa-star rating__gold"></i>
                                <?php endfor; ?>
                            </td>

                            <td data-label="<?php echo app('translator')->get('Review'); ?>">
                                <?php echo app('translator')->get(\Illuminate\Support\Str::limit($review->review, 100)); ?>
                            </td>
                            <td data-label="<?php echo app('translator')->get('Date-Time'); ?>">
                                <?php echo e(dateTime($review->created_at)); ?>

                            </td>

                            <td>
                                <a  href="javascript:void(0)"
                                    data-route="<?php echo e(route('admin.listingReviewDelete', $review->id)); ?>"
                                    data-toggle="modal"
                                    data-target="#delete-modal"
                                    class="btn btn-outline-danger btn-sm btn-icon edit_button notiflix-confirm">
                                    <i class="fa fa-trash-alt"></i>
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
                <?php echo e($allReviews->appends($_GET)->links('partials.pagination')); ?>

            </div>
        </div>
    </div>

    <?php $__env->startPush('adminModal'); ?>
        <!-- Delete Modal -->
        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog">
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
                            <p class="font-weight-bold"><?php echo app('translator')->get('Are you sure delete review?'); ?> </p>
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

            $('select').select2({
                selectOnClose: true
            });
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/admin/listing/review.blade.php ENDPATH**/ ?>