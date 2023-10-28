<div class="modal fade" id="addEditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="#">
                    <input type="hidden" name="action_type" id="action_type">
                    <input type="hidden" name="user_id" id="user_id">

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.input'); ?>
                        <?php $__env->slot('input_grid','col-md-12'); ?>
                        <?php $__env->slot('input_name','name'); ?>
                        <?php $__env->slot('input_label',__('admin.user_name')); ?>
                        <?php $__env->slot('input_red_star','yes'); ?>
                        <?php $__env->slot('input_icon','fa fa-notes-medical'); ?>
                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.input'); ?>
                        <?php $__env->slot('input_grid','col-md-12'); ?>
                        <?php $__env->slot('input_name','email'); ?>
                        <?php $__env->slot('input_label',__('admin.email')); ?>
                        <?php $__env->slot('input_red_star','yes'); ?>
                        <?php $__env->slot('input_type','email'); ?>
                        <?php $__env->slot('input_icon','fa fa-mail-bulk'); ?>
                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.input'); ?>
                        <?php $__env->slot('input_grid','col-md-12'); ?>
                        <?php $__env->slot('input_name','phone'); ?>
                        <?php $__env->slot('input_label',__('admin.phone')); ?>
                        <?php $__env->slot('input_red_star','yes'); ?>
                        <?php $__env->slot('input_icon','fa fa-phone'); ?>
                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.input'); ?>
                        <?php $__env->slot('input_grid','col-md-12'); ?>
                        <?php $__env->slot('input_name','password'); ?>
                        <?php $__env->slot('input_label',__('admin.password')); ?>
                        <?php $__env->slot('input_red_star','yes'); ?>
                        <?php $__env->slot('input_icon','fa fa-lock'); ?>
                    <?php echo $__env->renderComponent(); ?>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('admin.close')); ?></button>
                <button type="button" class="btn btn-primary" id="submit"><?php echo e(__('admin.submit')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/subviews/users/components/addEditUser.blade.php ENDPATH**/ ?>