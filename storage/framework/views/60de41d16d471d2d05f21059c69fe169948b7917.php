<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get("Contact Messages"); ?>
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
                        <div class="col-md-4 col-xl-4 col-sm-12">
                            <div class="form-group">
                                <label for="title"> <?php echo app('translator')->get('From Date'); ?></label>
                                <input type="date" class="form-control from_date" name="from_date" id="datepicker" placeholder="<?php echo app('translator')->get('From date'); ?>" value="<?php echo e(old('from_date', request()->from_date)); ?>"/>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-4 col-sm-12">
                            <div class="form-group">
                                <label for="title"> <?php echo app('translator')->get('To Date'); ?></label>
                                <input type="date" class="form-control to_date" name="to_date" id="datepicker" placeholder="<?php echo app('translator')->get('To date'); ?>" value="<?php echo e(old('to_date', request()->to_date)); ?>" disabled="true"/>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-4 col-sm-12">
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
                    <tr>
                    <thead class="thead-dark">
                        <th><?php echo app('translator')->get('#'); ?></th>
                        <th><?php echo app('translator')->get('From'); ?></th>
                        <th><?php echo app('translator')->get('To'); ?></th>
                        <th><?php echo app('translator')->get('Message'); ?></th>
                        <th><?php echo app('translator')->get('Date-Time'); ?></th>
                        <?php if(adminAccessRoute(config('role.contact_message.access.view')) == true || adminAccessRoute(config('role.contact_message.access.delete')) == true): ?>
                            <th class="text-end"><?php echo app('translator')->get('Action'); ?></th>
                        <?php endif; ?>
                    </thead>
                    </tr>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $allMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('No.'); ?>"><?php echo e(loopIndex($allMessages) + $key); ?></td>
                            <td data-label="<?php echo app('translator')->get('From'); ?>">
                                <div class="float-left">
                                    <a href="<?php echo e(route('admin.user-edit', optional($message->get_client)->id)); ?>" target="_blank">
                                        <img src="<?php echo e(getFile(optional($message->get_client)->driver, optional($message->get_client)->image)); ?>"
                                            alt="<?php echo e(config('basic.site_title')); ?>" class="contactImageUser">
                                    </a>
                                </div>
                                <div class="float-left">
                                    <?php echo app('translator')->get(optional($message->get_client)->firstname); ?> <?php echo app('translator')->get(optional($message->get_client)->lastname); ?> <br>
                                    <?php echo app('translator')->get(optional($message->get_client)->email); ?>
                                </div>
                            </td>

                            <td data-label="<?php echo app('translator')->get('To'); ?>">
                                <div class="float-left">
                                    <a href="<?php echo e(route('admin.user-edit', optional($message->get_user)->id)); ?>" target="_blank">
                                        <img src="<?php echo e(getFile(optional($message->get_user)->driver, optional($message->get_user)->image)); ?>"
                                            alt="<?php echo e(config('basic.site_title')); ?>" class="contactImageUser">
                                    </a>
                                </div>
                                <div class="float-left">
                                    <?php echo app('translator')->get(optional($message->get_user)->firstname); ?> <?php echo app('translator')->get(optional($message->get_user)->lastname); ?> <br>
                                    <?php echo app('translator')->get(optional($message->get_user)->email); ?>
                                </div>

                            </td>

                            <td data-label="<?php echo app('translator')->get('Message'); ?>"><?php echo app('translator')->get(\Illuminate\Support\Str::limit($message->message, 50)); ?></td>
                            <td data-label="<?php echo app('translator')->get('Date-Time'); ?>"><?php echo e(dateTime($message->created_at)); ?></td>
                            <?php
                                $from = optional($message->get_client)->firstname . ' ' . optional($message->get_client)->lastname;
                                $to = optional($message->get_user)->firstname . ' ' . optional($message->get_user)->lastname;
                            ?>
                            <?php if(adminAccessRoute(config('role.contact_message.access.view')) == true || adminAccessRoute(config('role.contact_message.access.delete')) == true): ?>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-sm rounded btn-icon edit_button notiflix-confirm showContactMessage"
                                            data-toggle="modal" data-target="#myModal" data-from="<?php echo e($from); ?>" data-to="<?php echo e($to); ?>" data-message="<?php echo e($message->message); ?>" data-time="<?php echo e(dateTime($message->created_at)); ?>">
                                            <i class="fa fa-eye"></i>
                                    </button>
                                    <?php if(adminAccessRoute(config('role.contact_message.access.delete')) == true): ?>
                                        <button type="button" class="btn btn-outline-danger btn-sm rounded btn-icon edit_button notiflix-confirm"
                                                data-toggle="modal" data-target="#deleteModal"
                                                data-route="<?php echo e(route('admin.contactMessageDelete',$message->id)); ?>">
                                                <i class="fa fa-trash-alt"></i>
                                        </button>
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center text-danger" colspan="100%"><?php echo app('translator')->get('No Data Found'); ?></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($allMessages->appends($_GET)->links('partials.pagination')); ?>

            </div>
        </div>
    </div>

    <?php $__env->startPush('adminModal'); ?>
        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('Message Information'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <form role="form" method="POST" class="actionRoute" action="" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <div class="modal-body">
                            <ul class="list-group">
                                <li class="list-group-item messageFrom"></li>
                                <li class="list-group-item messageTo"></li>
                                <li class="list-group-item contactMessage"></li>
                                <li class="list-group-item contactDateTime"></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
        $('.notiflix-confirm').on('click', function () {
            var route = $(this).data('route');
            $('.deleteRoute').attr('action', route)
        })

        $('.from_date').on('change', function (){
            $('.to_date').removeAttr('disabled')
        });
    </script>

    <script>
        "use strict";
        (function ($) {
            $(document).on('click', '.showContactMessage', function () {
                var showMessageModal = new bootstrap.Modal(document.getElementById('messageModal'))
                showMessageModal.show()

                let from = $(this).data('from');
                let to = $(this).data('to');
                let message = $(this).data('message');
                let dateTime = $(this).data('time');

                $('.messageFrom').text(`<?php echo app('translator')->get('From: '); ?> ${from}`);
                $('.messageTo').text(`<?php echo app('translator')->get('To: '); ?> ${to}`);
                $('.contactMessage').text(`<?php echo app('translator')->get('Message: '); ?> ${message}`);
                $('.contactDateTime').text(`<?php echo app('translator')->get('Date-Time: '); ?> ${dateTime}`);

            });
        })(jQuery);

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/admin/contact/contactMessage.blade.php ENDPATH**/ ?>