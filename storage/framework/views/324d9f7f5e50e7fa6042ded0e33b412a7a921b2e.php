<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get("Reviews"); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap-datepicker.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0"><?php echo app('translator')->get('Reviews of '); ?> (<?php echo app('translator')->get($listing->title); ?>)</h3>
                </div>
                <div class="search-bar my-search-bar">
                    <form action="" method="get" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="input-box col-lg-3 col-md-3 col-sm-12">
                                <select name="user" id="user" class="form-control js-example-basic-single">
                                    <option selected disabled><?php echo app('translator')->get('Filter By User'); ?></option>
                                    <?php $__currentLoopData = $allReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reviewUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(optional($reviewUser->review_user_info)->id); ?>" <?php echo e(request()->user == optional($reviewUser->review_user_info)->id ? 'selected' : ''); ?>><?php echo app('translator')->get(optional($reviewUser->review_user_info)->fullname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="input-box col-lg-3 col-md-3 col-sm-12">
                                <select name="rating[]" class="form-control js-example-basic-single">
                                    <option disabled selected> <?php echo app('translator')->get('Select Rating'); ?></option>
                                    <option value="5" <?php if(isset(request()->rating)): ?> <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($data == 5): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>>
                                        <?php echo app('translator')->get('5 Star'); ?>
                                    </option>

                                    <option value="4" <?php if(isset(request()->rating)): ?> <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($data == 4): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>>
                                        <?php echo app('translator')->get('4 Star'); ?>
                                    </option>

                                    <option value="3" <?php if(isset(request()->rating)): ?> <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($data == 3): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>>
                                        <?php echo app('translator')->get('3 Star'); ?>
                                    </option>

                                    <option value="2" <?php if(isset(request()->rating)): ?> <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($data == 2): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>>
                                        <?php echo app('translator')->get('2 Star'); ?>
                                    </option>

                                    <option value="1" <?php if(isset(request()->rating)): ?> <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($data == 1): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>>
                                        <?php echo app('translator')->get('1 Star'); ?>
                                    </option>
                                </select>
                            </div>

                            <div class="input-box col-lg-2 col-md-2 col-sm-12">
                                <div class="input-box input-group">
                                    <input type="text" class="form-control datepicker from_date" name="from_date" autofocus="off" readonly placeholder="<?php echo app('translator')->get('From date'); ?>" value="<?php echo e(old('purchase_date',request()->from_date)); ?>">
                                </div>
                            </div>

                            <div class="input-box col-lg-2 col-md-2 col-sm-12">
                                <div class="input-box input-group">
                                    <input type="text" class="form-control datepicker to_date" name="to_date" autofocus="off" readonly placeholder="<?php echo app('translator')->get('To date'); ?>" value="<?php echo e(old('expire_date',request()->to_date)); ?>" disabled="true">
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-12">
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
                            <th><?php echo app('translator')->get('#'); ?></th>
                            <th><?php echo app('translator')->get('User'); ?></th>
                            <th><?php echo app('translator')->get('Rating'); ?></th>
                            <th><?php echo app('translator')->get('Review'); ?></th>
                            <th><?php echo app('translator')->get('Date-Time'); ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $allReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(++$key); ?></td>
                                <td class="company-logo" data-label="<?php echo app('translator')->get('User'); ?>">
                                    <div>
                                        <a href="<?php echo e(route('profile', [slug(optional($review->review_user_info)->firstname), optional($review->review_user_info)->id])); ?>"
                                           target="_blank">
                                            <img src="<?php echo e(getFile(optional($review->review_user_info)->driver, optional($review->review_user_info)->image)); ?>">
                                        </a>
                                    </div>
                                    <div>
                                        <?php echo app('translator')->get(optional($review->review_user_info)->fullname); ?> <br>
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
                                    <?php echo app('translator')->get(Str::limit($review->review, 100)); ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Date-Time'); ?>">
                                    <?php echo e(dateTime($review->created_at)); ?>

                                </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <td colspan="100%" class="text-center"><?php echo app('translator')->get('No Data Found'); ?></td>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($allReviews->appends($_GET)->links()); ?>

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
            $(".datepicker").datepicker({});

            $('.from_date').on('change', function () {
                $('.to_date').removeAttr('disabled');
            });
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/user/reviews.blade.php ENDPATH**/ ?>