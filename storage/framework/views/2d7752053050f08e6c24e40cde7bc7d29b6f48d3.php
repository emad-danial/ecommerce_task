<?php if((isset ($errors) && count($errors) > 0) || Session::get('success', false)): ?>
    <!-- Banner Section Start -->
    <section class="banner-section ratio_60 wow fadeInUp">
        <div class="container-fluid-lg">
            <div class="banner-slider">
                <?php if(isset ($errors) && count($errors) > 0): ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <ul class="list-unstyled mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(Session::get('success', false)): ?>
                    <?php $data = Session::get('success'); ?>
                    <?php if(is_array($data)): ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-success text-center" role="alert">
                                <i class="fa fa-check"></i>
                                <?php echo e($msg); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="alert alert-success text-center" role="alert">
                            <i class="fa fa-check"></i>
                            <?php echo e($data); ?>

                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
<?php endif; ?>
<?php /**PATH C:\Users\Emad\Desktop\New folder (6)\resources\views/web/componants/messages.blade.php ENDPATH**/ ?>