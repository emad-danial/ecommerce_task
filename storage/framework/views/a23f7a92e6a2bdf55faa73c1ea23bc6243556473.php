<?php

    $jsList = [
        "Admin/assets/js/config.js",
        "Admin/assets/plugins/global/plugins.bundle.js",
        "Admin/assets/plugins/custom/prismjs/prismjs.bundle.js",
        "Admin/assets/js/scripts.bundle.js",
        "Admin/assets/js/general_scripts.js",
        "Admin/assets/js/datatables_scripts.js",

    ];

    $cdnJs =[
        'https://unpkg.com/sweetalert/dist/sweetalert.min.js'
    ];

?>


<?php foreach($jsList as $key=>$item): ?>
    <script src="<?php echo e(url('/')); ?>/<?php echo e($item); ?>"></script>
<?php endforeach; ?>

<?php foreach($cdnJs as $key=>$item): ?>
    <script src="<?php echo e($item); ?>"></script>
<?php endforeach; ?>





<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/components/footer/footer_scripts_files.blade.php ENDPATH**/ ?>