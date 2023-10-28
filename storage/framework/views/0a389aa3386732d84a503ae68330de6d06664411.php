<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php echo $__env->yieldContent('header_title'); ?></h5>
            <!--end::Page Title-->
            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4"><?php echo $__env->yieldContent('header_sub_title'); ?></span>
            <!--end::Actions-->
        </div>
        <!--end::Info-->
        <div class="topbar header-menu-wrapper-right">
            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(auth()->user()->name); ?>

                        </button>
                        <div class="dropdown-menu">
                            <p class="pt-2 ">
                                &nbsp; <a href="<?php echo e(url('/adminPanel/signout')); ?>" class="pr-2 text-secondary">
                                    <i class="fa fa-chart-line" aria-hidden="true"></i>
                                    تسجيل خروج
                                </a></p>
                        </div>
                    </div>







                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/components/body/top_menu.blade.php ENDPATH**/ ?>