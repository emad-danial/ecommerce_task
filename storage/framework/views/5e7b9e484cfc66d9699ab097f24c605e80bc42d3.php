<div class="<?php echo e($select_grid ?? 'col-md-6'); ?>  form-group <?php echo e($select_div_class ?? ''); ?>">
    <label
        for="<?php echo e(isset($select_id) ? $select_id : $select_name); ?>">
        <i class="<?php echo e($select_icon ?? ''); ?>"></i>
        <?php echo e($select_label ?? 'label'); ?>


        <span class="text-danger"> <?php echo e(isset($select_red_star) ? '*' : ''); ?> </span>
    </label>


    <select
        name="<?php echo e($select_name ?? ''); ?>"
        id="<?php echo e(isset($select_id) ? $select_id : $select_name); ?>"
        class="form-control <?php echo e($select_class ?? ''); ?>"
    >
        <?php echo $options ?? ''; ?>

    </select>

    <span id="<?php echo e($select_name); ?>_input" class="form-text <?php echo e($select_warning_class ?? 'text-danger'); ?>">
            <?php echo e($select_warngin_message ?? ''); ?>

    </span>
</div>


<?php if(isset($selected_option)): ?>
    <?php $__env->startPush('custom-scripts'); ?>
        <script>
            $(document).ready(function () {
                let selected_options = '<?php echo e($selected_option); ?>';
                if (selected_options == 'first_element') {
                    $('#<?php echo e($select_name); ?> option:first').prop('selected', true);
                }
                else {
                    $('#<?php echo e($select_name); ?>').val('<?php echo e($selected_option); ?>')
                }
            })
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/components/inputs/form_inputs/select.blade.php ENDPATH**/ ?>