<!DOCTYPE html>
<html lang="es">

<head>
    <?php echo $__env->make('layouts.simple.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('layouts.simple.css', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>
    <body>
        <!-- loader starts-->
        <div class="loader-wrapper">
            <div class="loader">
                <div class="loader4"></div>
            </div>
        </div>
        <!-- loader ends-->

        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->

        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <!-- Page header start -->
            <?php echo $__env->make('layouts.simple.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <!-- Page header end-->
            <!-- Page Body Start-->
            <div class="page-body-wrapper">
                <!-- Page sidebar start-->
                <?php echo $__env->make('layouts.simple.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <!-- Page sidebar end-->
                    <div class="page-body">
                        <?php echo $__env->yieldContent('main_content'); ?>
                    </div>
                    <!-- footer start-->
                    <?php echo $__env->make('layouts.simple.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <!-- footer end-->
                </div>
            </div>
            <!-- page-wrapper Ends-->
            
            <?php echo $__env->make('layouts.simple.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/layouts/simple/master.blade.php ENDPATH**/ ?>