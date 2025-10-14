<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('landings.layouts.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>

<body class="landing-page">
    <!-- tap on top starts-->
    <div class="tap-top">
        <i data-feather="chevrons-up"></i>
    </div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="landing-page">
        <span class="cursor">
            <span class="cursor-move-inner">
                <span class="cursor-inner"></span>
            </span>
            <span class="cursor-move-outer">
                <span class="cursor-outer"></span>
            </span>
        </span>
        <!-- Page Body Start -->
        <div class="landing-home" id="home">
            <div class="container-fluid ">
                <div class="sticky-header">
                    <?php echo $__env->make('landings.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-sm-10">
                        <div class="best-selling">
                            <img class="img-fluid" src="<?php echo e(asset('landing/images/1.png')); ?>" alt="1.png">
                        </div>
                        <div class="nft-marketplace">
                            <img class="img-fluid" src="<?php echo e(asset('landing/images/2.png')); ?>" alt="2.png">
                        </div>
                        <div class="content text-center">
                            <div>
                                <div class="arrow-animate">
                                    <svg>
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#animated-arrow')); ?>"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="star-animate hide-mobile">
                            <img class="img-fluid" src="<?php echo e(asset('landing/images/vector.png')); ?>" alt="vector">
                        </div>
                        <div class="screen-2">
                            <img class="img-fluid sidebar-cuts-image" src="#" alt="">
                            <div class="screen-sidebar"></div>
                        </div>
                        <div class="total-revenue-img">
                            <img class="img-fluid" src="#" alt="">
                            <div class="total-revenue-shadow"> </div>
                        </div>
                        <div class="star-img">
                            <img class="img-fluid start-animate fa-spin"
                                src="<?php echo e(asset('landing/images/star.png')); ?>" alt="star"></div>
                        <div class="new-user-img">
                            <img class="img-fluid" src="#" alt="">
                            <div class="new-user-shadow"> </div>
                        </div>
                        <div class="star-img-left">
                            <img class="img-fluid start-animate-rotate fa-spin" src="<?php echo e(asset('landing/images/star.png')); ?>" alt="star">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('landings.layouts.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/landings/layouts/master.blade.php ENDPATH**/ ?>