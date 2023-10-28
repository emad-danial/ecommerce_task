<?php $__env->startSection('header_title',__('admin.settings')); ?>
<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo e(trans('admin.settings')); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="box">
                                <div class="message-flash">

                                </div>
                                <?php echo $__env->make('web.componants.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="box-body col-10 setting-box">
                                    <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST"
                                          enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="phone"><?php echo e(trans('admin.phone')); ?></label>
                                                    <input type="text" class="form-control" name="phone"
                                                           placeholder="<?php echo e(trans('admin.phone')); ?>"
                                                           <?php if(isset($settings->phone)): ?> value="<?php echo e($settings->phone); ?>" <?php endif; ?>>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="blog_email"><?php echo e(trans('admin.email')); ?></label>
                                                    <input type="text" class="form-control" name="email"
                                                           placeholder="<?php echo e(trans('admin.email')); ?>"
                                                           <?php if(isset($settings->email)): ?>  value="<?php echo e($settings->email); ?>" <?php endif; ?>>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">نظرة عامة (عربي)</label>
                                                    <textarea name="overview_ar" id="overview_ar" rows="3"><?php if(isset($settings->overview_ar)): ?>
                                                            <?php echo e($settings->overview_ar); ?>

                                                        <?php endif; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">نظرة عامة (انجليزي)</label>
                                                    <textarea name="overview_en" id="overview_en" class="form-control"
                                                              rows="3"> <?php if(isset($settings->overview_en)): ?>
                                                            <?php echo e($settings->overview_en); ?>

                                                        <?php endif; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">مهمتنا (عربي)</label>
                                                    <textarea name="mission_ar" class="form-control"
                                                              rows="3"> <?php if(isset($settings->mission_ar)): ?>
                                                            <?php echo e($settings->mission_ar); ?>

                                                        <?php endif; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="mission_en">مهمتنا (انجليزي)</label>
                                                    <textarea name="mission_en" class="form-control"
                                                              rows="3"> <?php if(isset($settings->mission_en)): ?>
                                                            <?php echo e($settings->mission_en); ?>

                                                        <?php endif; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">رؤيتنا (عربي)</label>
                                                    <textarea name="vision_ar" class="form-control"
                                                              rows="3"> <?php if(isset($settings->vision_ar)): ?>
                                                            <?php echo e($settings->vision_ar); ?>

                                                        <?php endif; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">رؤيتنا (انجليزي)</label>
                                                    <textarea name="vision_en" class="form-control"
                                                              rows="3"> <?php if(isset($settings->vision_en)): ?>
                                                            <?php echo e($settings->vision_en); ?>

                                                        <?php endif; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">قيمتنا (عربي)</label>
                                                    <textarea name="values_ar" class="form-control"
                                                              rows="3"> <?php if(isset($settings->values_ar)): ?>
                                                            <?php echo e($settings->values_ar); ?>

                                                        <?php endif; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">قيمتنا (انجليزي)</label>
                                                    <textarea name="values_en" class="form-control"
                                                              rows="3"> <?php if(isset($settings->values_en)): ?>
                                                            <?php echo e($settings->values_en); ?>

                                                        <?php endif; ?></textarea>
                                                </div>
                                            </div>






                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">وصف الموقع (عربي)</label>
                                                    <textarea name="text" class="form-control"
                                                              placeholder="وصف الموقع (عربي)"
                                                              rows="3"><?php if(isset($settings->text)): ?><?php echo e($settings->text); ?><?php endif; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="text">وصف الموقع (انجليزي)</label>
                                                    <textarea name="text_en" class="form-control"
                                                              placeholder="وصف الموقع (انجليزي)"
                                                              rows="3"><?php if(isset($settings->text_en)): ?><?php echo e($settings->text_en); ?><?php endif; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="whats_app">واتس اب</label>
                                                    <input type="text" class="form-control" name="whats_app"
                                                           placeholder="واتس اب"
                                                           <?php if(isset($settings->whats_app)): ?> value="<?php echo e($settings->whats_app); ?>" <?php endif; ?>>
                                                </div>
                                            </div>



                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="twitter">تويتر</label>
                                                    <input type="text" class="form-control" name="twitter"
                                                           placeholder="تويتر"
                                                           <?php if(isset($settings->twitter)): ?> value="<?php echo e($settings->twitter); ?>" <?php endif; ?>>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="facebook">فيس بوك</label>
                                                    <input type="text" class="form-control" name="facebook"
                                                           placeholder="فيس بوك"
                                                           <?php if(isset($settings->facebook)): ?> value="<?php echo e($settings->facebook); ?>" <?php endif; ?>>
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="image">صورة للموقع</label>
                                                    <input type="file" class="form-control-file" name="image">
                                                    <?php if(isset($settings->image)): ?>
                                                        <img src="<?php echo e(asset($settings->image)); ?>" alt="000000"
                                                             class="img-thumbnail"
                                                             width="50px" height="50px">
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>


                                        <button type="submit"
                                                class="btn btn-primary btn-lg">حفظ</button>
                                    </form>
                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

    <script>
        $(document).ready(function () {
            $('.message-flash .alert').not('.alert-important').delay(2000).fadeOut(2000);
        })
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('admin.subviews.settings.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/admin/subviews/settings/edit.blade.php ENDPATH**/ ?>