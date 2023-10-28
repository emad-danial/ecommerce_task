<div class="modal fade" id="addEditUserAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEditUserAddressModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="userAddressForm" action="#">
                    <input type="hidden" name="user_address_action_type" id="user_address_action_type">
                    <input type="hidden" name="address_id" id="address_id">
                    <input type="hidden" name="user_address_id" id="user_address_id">


                    <?php $__env->startComponent('admin.components.inputs.form_inputs.select'); ?>
                        <?php $__env->slot('select_grid','col-md-12'); ?>
                        <?php $__env->slot('select_name','area_id'); ?>
                        <?php $__env->slot('select_label',__('admin.area')); ?>
                        <?php $__env->slot('select_icon','fa fa-notes-medical'); ?>
                        <?php $__env->slot('options'); ?>
                             <option>...</option>



                        <?php $__env->endSlot(); ?>
                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.select'); ?>
                        <?php $__env->slot('select_grid','col-md-12'); ?>
                        <?php $__env->slot('select_name','city_id'); ?>
                        <?php $__env->slot('select_label',__('admin.city')); ?>
                        <?php $__env->slot('select_icon','fa fa-notes-medical'); ?>
                        <?php $__env->slot('options'); ?>

                        <?php $__env->endSlot(); ?>
                    <?php echo $__env->renderComponent(); ?>


                    <?php $__env->startComponent('admin.components.inputs.form_inputs.select'); ?>
                        <?php $__env->slot('select_grid','col-md-12'); ?>
                        <?php $__env->slot('select_name','district_id'); ?>
                        <?php $__env->slot('select_label',__('admin.district')); ?>
                        <?php $__env->slot('select_icon','fa fa-notes-medical'); ?>
                        <?php $__env->slot('options'); ?>

                        <?php $__env->endSlot(); ?>
                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.input'); ?>
                        <?php $__env->slot('input_grid','col-md-12'); ?>
                        <?php $__env->slot('input_name','street'); ?>
                        <?php $__env->slot('input_label',__('admin.street')); ?>
                        <?php $__env->slot('input_red_star','yes'); ?>
                        <?php $__env->slot('input_icon','fa fa-notes-medical'); ?>
                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.input'); ?>
                        <?php $__env->slot('input_grid','col-md-12'); ?>
                        <?php $__env->slot('input_name','building_no'); ?>
                        <?php $__env->slot('input_label',__('admin.building_no')); ?>
                        <?php $__env->slot('input_red_star','yes'); ?>
                        <?php $__env->slot('input_icon','fa fa-notes-medical'); ?>
                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.select'); ?>
                        <?php $__env->slot('select_grid','col-md-12'); ?>
                        <?php $__env->slot('select_name','is_default'); ?>
                        <?php $__env->slot('select_label',__('admin.is_default')); ?>
                        <?php $__env->slot('select_icon','fa fa-notes-medical'); ?>
                        <?php $__env->slot('options'); ?>
                            <option value="1">نعم</option>
                            <option value="0">لا</option>
                        <?php $__env->endSlot(); ?>
                    <?php echo $__env->renderComponent(); ?>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('admin.close')); ?></button>
                <button type="button" class="btn btn-primary" id="submitUserAddress"><?php echo e(__('admin.submit')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/subviews/users/components/addEditUserAddress.blade.php ENDPATH**/ ?>