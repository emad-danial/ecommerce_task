<?php $__env->startSection('header_title',__('admin.orders')); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.subviews.orders.viewOrder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('admin.orders')); ?></h3>
                        <div>
                            <span class="btn btn-primary mt-5" onclick="refreshTable();"> <i class="fa fa-cogs"></i> Refresh Table</span>
                            <span class="btn btn-success mt-5 mr-1"> <i class="fa fa-plus-circle"></i> <a class="text-white" href="<?php echo e(url('/adminPanel/orders/create')); ?>"><?php echo e(__('admin.create_new_order')); ?></a> </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-striped">
                            <thead>
                            <tr>
                                <td><?php echo e(__('website.id')); ?></td>
                                <td><?php echo e(__('website.total_price')); ?></td>
                                <td><?php echo e(__('website.Title')); ?></td>
                                <td><?php echo e(__('admin.status')); ?></td>
                                <td><?php echo e(__('admin.view')); ?></td>
                                <td><?php echo e(__('admin.delete')); ?></td>
                                <td><?php echo e(__('admin.created_at')); ?></td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('admin.subviews.orders.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/subviews/orders/index.blade.php ENDPATH**/ ?>