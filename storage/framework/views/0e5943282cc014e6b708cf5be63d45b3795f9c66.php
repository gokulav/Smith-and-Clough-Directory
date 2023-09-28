<?php $__env->startSection('title',__($page_title)); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap-datepicker.css')); ?>" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- main -->
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0"><?php echo app('translator')->get('My Tickets'); ?></h3>
                </div>
                <!-- search area -->
                <div class="search-bar my-search-bar" >
                    <form action="" method="get" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="input-box input-group">
                                    <input
                                        type="text"
                                        name="ticket"
                                        class="form-control"
                                        placeholder="<?php echo app('translator')->get('ticket no.'); ?>"
                                        value="<?php echo e(old('ticket',request()->ticket)); ?>"/>
                                </div>
                            </div>
                            <div class="input-box col-lg-3 col-md-3 col-sm-6">
                                <input type="text" class="form-control datepicker" name="date_time" autofocus="off" readonly placeholder="<?php echo app('translator')->get('choose date'); ?>" value="<?php echo e(old('date_time',request()->date_time)); ?>">
                            </div>
                            <div class="input-box col-lg-3 col-md-3 col-sm-6">
                                <select name="status" class="form-control js-example-basic-single">
                                    <option value=""><?php echo app('translator')->get('All Ticket'); ?></option>
                                    <option value="0"
                                            <?php if(@request()->status == '0'): ?> selected <?php endif; ?>><?php echo app('translator')->get('Open Ticket'); ?></option>
                                    <option value="1"
                                            <?php if(@request()->status == '1'): ?> selected <?php endif; ?>><?php echo app('translator')->get('Answered Ticket'); ?></option>
                                    <option value="2"
                                            <?php if(@request()->status == '2'): ?> selected <?php endif; ?>><?php echo app('translator')->get('Replied Ticket'); ?></option>
                                    <option value="3"
                                            <?php if(@request()->status == '3'): ?> selected <?php endif; ?>><?php echo app('translator')->get('Closed Ticket'); ?></option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <button class="btn-custom" type="submit"><?php echo app('translator')->get('search'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                    <a href="<?php echo e(route('user.ticket.create')); ?>" class="btn btn-custom create-ticket-button notiflix-confirm"> <i class="fal fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('Create Ticket'); ?></a>
                </div>

                <!-- table -->
                <div class="table-parent table-responsive listing-table-parent">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo app('translator')->get('Ticket'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Subject'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Last Reply'); ?></th>
                            <th scope="col" class="text-end"><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="Ticket">
                                     <span
                                         class="font-weight-bold"> [<?php echo e(trans('Ticket#').$ticket->ticket); ?>]
                                     </span>
                                </td>

                                <td data-label="Subject">
                                    <span
                                        class="font-weight-bold"> <?php echo e($ticket->subject); ?>

                                     </span>
                                </td>

                                <td data-label="Status">
                                    <?php if($ticket->status == 0): ?>
                                        <span
                                            class="badge rounded-pill bg-success"><?php echo app('translator')->get('Open'); ?></span>
                                    <?php elseif($ticket->status == 1): ?>
                                        <span
                                            class="badge rounded-pill bg-primary"><?php echo app('translator')->get('Answered'); ?></span>
                                    <?php elseif($ticket->status == 2): ?>
                                        <span
                                            class="badge rounded-pill bg-warning"><?php echo app('translator')->get('Replied'); ?></span>
                                    <?php elseif($ticket->status == 3): ?>
                                        <span class="badge rounded-pill bg-dark"><?php echo app('translator')->get('Closed'); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td data-label="Last Reply">
                                    <?php echo e(diffForHumans($ticket->last_reply)); ?>

                                </td>

                                <td class="action" data-label="Action">
                                    <div class="d-flex justify-content-end">
                                        <a href="<?php echo e(route('user.ticket.view', $ticket->ticket)); ?>"
                                           class="btn2 btn" title="<?php echo app('translator')->get('Details'); ?>" > <i class="fas fa-eye"></i> </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td class="text-center" colspan="100%"> <?php echo app('translator')->get('No Data Found'); ?></td>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($tickets->appends($_GET)->links()); ?>

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
            $('.notiflix-confirm').on('click', function () {
                var route = $(this).data('route');
                $('.deleteRoute').attr('action', route)
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/user/support/index.blade.php ENDPATH**/ ?>