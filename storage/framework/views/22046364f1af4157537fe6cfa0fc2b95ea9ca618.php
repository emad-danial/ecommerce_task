
    <?php echo $__env->make('admin.components.footer.footer_box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <?php echo $__env->make('admin.components.footer.scrolltop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <?php echo $__env->make('admin.components.footer.footer_scripts_files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldPushContent('custom-scripts'); ?>


	</body>

</html>
<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/components/footer.blade.php ENDPATH**/ ?>