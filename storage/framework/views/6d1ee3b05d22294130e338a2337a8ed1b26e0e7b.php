<?php $__env->startSection('header_title',__('admin.products')); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.subviews.products.addEdit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('admin.products')); ?></h3>
                        <div>
                            <span class="btn btn-primary mt-5" onclick="refreshTable();"> <i class="fa fa-cogs"></i> Refresh Table</span>
                            <span class="btn btn-success mt-5 mr-1 addNewProduct"> <i class="fa fa-plus-circle"></i> <?php echo e(__('admin.create_new_product')); ?> </span>
                            <span class="btn btn-info mt-5 mr-1 active_all"> <i class="fa fa-check"></i> <?php echo e(__('admin.active_all')); ?> </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-striped">
                            <thead>
                            <tr>
                                <td style="width:5%!important">
                                    <input type="checkbox" id="check_all">
                                </td>
                                <td><?php echo e(__('admin.name_ar')); ?></td>
                                <td><?php echo e(__('admin.name_en')); ?></td>
                                <td><?php echo e(__('admin.price')); ?></td>
                                <td><?php echo e(__('admin.main_category')); ?></td>
                                <td><?php echo e(__('admin.sub_category')); ?></td>
                                <td><?php echo e(__('admin.image')); ?></td>
                                <td><?php echo e(__('admin.status')); ?></td>
                                <td><?php echo e(__('admin.update')); ?></td>
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
    <?php echo $__env->make('admin.subviews.products.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/subviews/products/index.blade.php ENDPATH**/ ?>