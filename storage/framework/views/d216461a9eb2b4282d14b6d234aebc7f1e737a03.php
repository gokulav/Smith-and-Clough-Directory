<?php $__env->startSection('title', $title); ?>


<?php $__env->startSection('content'); ?>
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><?php echo app('translator')->get('No.'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Verification Type'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                        <?php if(adminAccessRoute(config('role.manage_user.access.edit'))): ?>
                            <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('No.'); ?>"><?php echo e(loopIndex($logs) + $loop->index); ?></td>
                            <td data-label="<?php echo app('translator')->get('Username'); ?>">
                                <a href="<?php echo e(route('admin.user-edit',[$item->user_id])); ?>">
                                    <?php echo app('translator')->get(optional($item->user)->fullname); ?>
                                </a>
                            </td>
                            <td data-label="<?php echo app('translator')->get('Verification Type'); ?>">
                                <?php echo e(kebab2Title($item->kyc_type)); ?>

                            </td>
                            <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                <?php if($item->status == 0): ?>
                                    <span class="badge badge-pill badge-warning"><?php echo e(trans('Pending')); ?></span>
                                <?php elseif($item->status == 1): ?>
                                    <span class="badge badge-pill badge-success"><?php echo e(trans('Approved')); ?></span>
                                <?php elseif($item->status == 2): ?>
                                    <span class="badge badge-pill badge-danger"><?php echo e(trans('Rejected')); ?></span>
                                <?php endif; ?>
                            </td>
                            <?php if(adminAccessRoute(config('role.manage_user.access.edit'))): ?>
                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <?php
                                        if($item->details){
                                                $details =[];
                                                  foreach($item->details as $k => $v){
                                                        if($v->type == "file"){
                                                            $details[kebab2Title($k)] = [
                                                                'type' => $v->type,
                                                                'field_name' => getFile($v->field_name->driver, $v->field_name->path)
                                                                ];
                                                        }else{
                                                            $details[kebab2Title($k)] =[
                                                                'type' => $v->type,
                                                                'field_name' => $v->field_name
                                                            ];
                                                        }
                                                  }
                                            }else{
                                                $details = null;
                                            }
                                    ?>

                                    <button
                                        class="edit_button   btn  <?php echo e(($item->status == 0) ?  'btn-outline-primary' : 'btn-outline-success'); ?> btn-sm "
                                        data-toggle="modal" data-target="#myModal"
                                        data-title="<?php echo e(($item->status == 0) ?  trans('Edit') : trans('Details')); ?>"

                                        data-id="<?php echo e($item->id); ?>"
                                        data-info="<?php echo e(json_encode($details)); ?>"
                                        data-route="<?php echo e(route('admin.users.Kyc.action',$item->id)); ?>"
                                        data-status="<?php echo e($item->status); ?>">

                                        <?php if(($item->status == 0)): ?>
                                            <i class="fa fa-pencil-alt"></i>
                                        <?php else: ?>
                                            <i class="fa fa-eye"></i>
                                        <?php endif; ?>

                                    </button>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center text-danger" colspan="100%"><?php echo app('translator')->get('No User Data'); ?></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($logs->appends(@$search)->links('partials.pagination')); ?>


            </div>
        </div>
    </div>




    <!-- Modal for Edit button -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('KYC Information'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <form role="form" method="POST" class="actionRoute" action="" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="modal-body">
                        <ul class="list-group withdraw-detail">
                        </ul>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <?php if(Request::routeIs('admin.kyc.users.pending')): ?>
                            <input type="hidden" class="action_id" name="id">
                            <button type="submit" class="btn btn-primary" name="status"
                                    value="1"><?php echo app('translator')->get('Approve'); ?></button>
                            <button type="submit" class="btn btn-danger" name="status"
                                    value="2"><?php echo app('translator')->get('Reject'); ?></button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        "use strict";
        $(document).on("click", '.edit_button', function (e) {
            var id = $(this).data('id');

            $(".action_id").val(id);
            $(".actionRoute").attr('action', $(this).data('route'));
            var details = Object.entries($(this).data('info'));
            var list = [];
            details.map(function (item, i) {
                if (item[1].type == 'file') {
                    var singleInfo = `<br><img src="${item[1].field_name}" alt="<?php echo app('translator')->get('...'); ?>" class="w-100">`;
                } else {
                    var singleInfo = `<span class="font-weight-bold ml-3">${item[1].field_name}</span>  `;
                }
                list[i] = ` <li class="list-group-item"><span class="font-weight-bold "> ${item[0].replace('_', " ")} </span> : ${singleInfo}</li>`
            });
            $('.withdraw-detail').html(list);

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/admin/users/kycList.blade.php ENDPATH**/ ?>