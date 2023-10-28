<div class="modal fade" id="addEditProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="product_id" id="product_id">

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.input'); ?>
                        <?php $__env->slot('input_grid','col-md-12'); ?>
                        <?php $__env->slot('input_name','name_ar'); ?>
                        <?php $__env->slot('input_label',__('admin.name_ar')); ?>
                        <?php $__env->slot('input_red_star','yes'); ?>
                        <?php $__env->slot('input_icon','fa fa-notes-medical'); ?>
                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.input'); ?>
                        <?php $__env->slot('input_grid','col-md-12'); ?>
                        <?php $__env->slot('input_name','name_en'); ?>
                        <?php $__env->slot('input_label',__('admin.name_en')); ?>
                        <?php $__env->slot('input_red_star','yes'); ?>
                        <?php $__env->slot('input_icon','fa fa-notes-medical'); ?>
                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.input'); ?>
                        <?php $__env->slot('input_grid','col-md-12'); ?>
                        <?php $__env->slot('input_div_class','image_div'); ?>
                        <?php $__env->slot('input_name','image'); ?>
                        <?php $__env->slot('input_label',__('admin.image')); ?>
                        <?php $__env->slot('input_icon','fa fa-image'); ?>
                        <?php $__env->slot('input_type','file'); ?>
                    <?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('admin.components.inputs.form_inputs.input'); ?>
                        <?php $__env->slot('input_grid','col-md-12'); ?>
                        <?php $__env->slot('input_div_class','price'); ?>
                        <?php $__env->slot('input_name','price'); ?>
                        <?php $__env->slot('input_label',__('admin.price')); ?>
                        <?php $__env->slot('input_icon','fa fa-mony'); ?>
                        <?php $__env->slot('input_type','number'); ?>
                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('admin.components.inputs.form_inputs.select'); ?>
                        <?php $__env->slot('select_grid','col-md-12'); ?>
                        <?php $__env->slot('select_div_class','main_category_div'); ?>
                        <?php $__env->slot('select_name','main_category'); ?>
                        <?php $__env->slot('select_label',__('admin.main_categories')); ?>
                        <?php $__env->slot('select_icon','fa fa-cogs'); ?>
                        <?php $__env->slot('options'); ?>
                            <?php $__currentLoopData = \App\Models\Product\Category::whereNull('category_id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name_ar); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('selected_option','first_element'); ?>
                    <?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('admin.components.inputs.form_inputs.select'); ?>
                        <?php $__env->slot('select_grid','col-md-12'); ?>
                        <?php $__env->slot('select_div_class','sub_category_div'); ?>
                        <?php $__env->slot('select_name','sub_category'); ?>
                        <?php $__env->slot('select_label',__('admin.sub_categories')); ?>
                        <?php $__env->slot('select_icon','fa fa-cogs'); ?>
                        <?php $__env->slot('options'); ?>
                        <?php $__env->endSlot(); ?>
                        <?php $__env->slot('selected_option','first_element'); ?>
                    <?php echo $__env->renderComponent(); ?>



                    <label>الوصف عربي</label>
                    <textarea name="description_ar" id="description_ar"></textarea>

 <label>الوصف انجليزي</label>
                    <textarea name="description_en" id="description_en"></textarea>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('admin.close')); ?></button>
                <button type="button" class="btn btn-primary" id="submit"><?php echo e(__('admin.submit')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/subviews/products/addEdit.blade.php ENDPATH**/ ?>