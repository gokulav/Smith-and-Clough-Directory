<?php $__env->startSection('title',trans('My Transactions')); ?>

<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap-datepicker.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center mb-3"
                >
                    <h3 class="mb-0"><?php echo app('translator')->get('All Transactions'); ?></h3>
                </div>

                <!-- search area -->
                <div class="search-bar my-search-bar">
                    <form action="<?php echo e(route('user.transaction.search')); ?>" method="get" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="input-box input-group">
                                    <input type="text" name="transaction_id"
                                       value="<?php echo e(@request()->transaction_id); ?>"
                                       class="form-control"
                                       placeholder="<?php echo app('translator')->get('Search for Transaction ID'); ?>">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="input-box input-group">
                                    <button class="search">
                                    </button>
                                    <input type="text" name="remark" value="<?php echo e(@request()->remark); ?>"
                                       class="form-control"
                                       placeholder="<?php echo app('translator')->get('Remark'); ?>">
                                </div>
                            </div>

                            <div class="input-box col-lg-3 col-md-3 col-sm-12">
                                <input type="text" class="form-control datepicker from_date" name="datetrx" autofocus="off" readonly placeholder="<?php echo app('translator')->get('choose date'); ?>" value="<?php echo e(old('datetrx',request()->datetrx)); ?>">
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
                            <th scope="col"><?php echo app('translator')->get('Transaction ID'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Amount'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Payment Method'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Remarks'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Date-Time'); ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="Transaction ID">
                                    <?php echo app('translator')->get($transaction->trx_id); ?>
                                </td>
                                <td data-label="Amount">
                                    <span class="font-weight-bold text-dark">
                                        <?php echo e(config('basic.currency_symbol') . getAmount($transaction->amount, config('basic.fraction_number')). ' '); ?>

                                    </span>
                                </td>

                                <td data-label="Payment Method">
                                    <?php echo app('translator')->get($transaction->remarks); ?>
                                </td>
                                <td data-label="Remarks">
                                    <?php echo app('translator')->get($transaction->type); ?>
                                </td>

                                <td data-label="Date-Time">
                                    <?php echo e(dateTime($transaction->created_at)); ?>

                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td class="text-center" colspan="100%"> <?php echo app('translator')->get('No Data Found'); ?></td>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($transactions->appends($_GET)->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('loadModal'); ?>
        <div
            class="modal fade"
            id="delete-modal"
            tabindex="-1"
            aria-labelledby="editModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-top modal-md">
                <div class="modal-content">
                    <div class="modal-header modal-primary modal-header-custom">
                        <h4 class="modal-title" id="editModalLabel"><?php echo app('translator')->get('Delete Confirmation'); ?></h4>
                        <button
                            type="button"
                            class="close-btn"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        >
                            <i class="fal fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo app('translator')->get('Are you sure delete?'); ?>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn-custom btn2"
                            data-bs-dismiss="modal"
                        >
                            <?php echo app('translator')->get('No'); ?>
                        </button>
                        <form action="" method="post" class="deleteRoute">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-custom btn-custom-listing-modal"><?php echo app('translator')->get('Yes'); ?></button>
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
            $( ".datepicker" ).datepicker({
                autoclose: true,
                clearBtn: true
            });

            $('.from_date').on('change', function (){
                $('.to_date').removeAttr('disabled');
            });

            $('.notiflix-confirm').on('click', function () {
                var route = $(this).data('route');
                $('.deleteRoute').attr('action', route)
            })
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/user/transaction/index.blade.php ENDPATH**/ ?>