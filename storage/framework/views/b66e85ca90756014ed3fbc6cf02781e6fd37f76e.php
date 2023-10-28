<!DOCTYPE html>
<html lang="en"
      <?php $Is_Rtl=env('admin_is_rtl',true);?>
      <?php if($Is_Rtl): ?> direction="rtl" style="direction: rtl;"   <?php endif; ?>
<!--begin::Head-->
	<head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/Admin/assets/media/logos/favicon.ico"/>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <title><?php echo e($meta_title ?? ''); ?></title>
        <?php echo $__env->make('admin.components.header.header_components', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldPushContent('custom-css'); ?>
        <style>
            .setting-box{
                margin: auto;
                background: white;
                border-radius: 10px;
                padding: 20px;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px
            }
        </style>

	</head>

<!--end::Head-->
<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/components/header.blade.php ENDPATH**/ ?>