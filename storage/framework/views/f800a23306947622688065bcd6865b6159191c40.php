<div class="<?php echo e($input_grid ?? 'col-md-6'); ?>  form-group <?php echo e($input_div_class ?? ''); ?>">
    <label
        for="<?php echo e(isset($input_id) ? $input_id : $input_name); ?>">
        <i class="<?php echo e($input_icon ?? ''); ?>"></i>
        <?php echo e($input_label ?? 'label'); ?>


        <span class="text-danger"> <?php echo e(isset($input_red_star) ? '*' : ''); ?> </span>
    </label>

    <input
        name="<?php echo e($input_name ?? ''); ?>"
        id="<?php echo e(isset($input_id) ? $input_id : $input_name); ?>"
        type="<?php echo e($input_type ?? 'text'); ?>"
        class="form-control <?php echo e($input_class ?? ''); ?>"
        placeholder="<?php echo e($input_placeHolder ?? $input_label); ?>"
        value="<?php echo e($input_value ?? ''); ?>"
    />

    <span id="<?php echo e($input_name); ?>_input" class="form-text input_warning <?php echo e($input_warning_class ?? 'text-danger'); ?>">
            <?php echo e($input_warngin_message ?? ''); ?>

    </span>
</div>
<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/components/inputs/form_inputs/input.blade.php ENDPATH**/ ?>