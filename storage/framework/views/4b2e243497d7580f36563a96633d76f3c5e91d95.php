<?php $__env->startSection('header_title',__('admin.categories')); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.subviews.categories.addEditCategory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('admin.categories')); ?></h3>
                        <div>
                            <span class="btn btn-primary mt-5" onclick="refreshTable();"> <i class="fa fa-cogs"></i> Refresh Table</span>
                            <span class="btn btn-success mt-5 mr-1 addNewCategory"> <i class="fa fa-plus-circle"></i> <?php echo e(__('admin.create_new_category')); ?> </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-striped">
                            <thead>
                            <tr>
                                <td><?php echo e(__('admin.name_ar')); ?></td>
                                <td><?php echo e(__('admin.name_en')); ?></td>
                                <td><?php echo e(__('admin.category_type')); ?></td>
                                <td><?php echo e(__('admin.parent_category')); ?></td>
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
    <?php echo $__env->make('admin.subviews.categories.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/subviews/categories/index.blade.php ENDPATH**/ ?>