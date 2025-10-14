<!-- Page Header Start-->
<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <img class="img-fluid for-light" src="<?php echo e(asset('storage/logos/logo_dark.png')); ?>" alt="logo-light">
                    <img class="img-fluid for-dark" src="<?php echo e(asset('storage/logos/logo.png')); ?>" alt="logo-dark">
                </a>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
            <div>
                <a class="toggle-sidebar" href="#">
                    <i class="iconly-Category icli"></i>
                </a>
                <div class="d-flex align-items-center gap-2 ">
                    <h4 class="f-w-600">Bienvenido <?php echo e(Auth::user()->name); ?></h4>
                    <img class="mt-0" src="<?php echo e(asset('assets/images/hand.gif')); ?>" alt="hand-gif">
                </div>
            </div>
        </div>
        <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                <li>
                    <div class="mode">
                        <i class="moon" data-feather="moon"></i>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown">
                    <div class="media profile-media">
                        <img class="b-r-10" src="<?php echo e(asset(Auth::user()->avatar)); ?>" alt="">
                        <div class="media-body d-xxl-block d-none box-col-none">
                            <div class="d-flex align-items-center gap-2">
                                <span><?php echo e(Auth::user()->name); ?></span>
                                <i class="middle fa fa-angle-down"></i>
                            </div>
                            <p class="mb-0 font-roboto"><?php echo e(Auth::user()->role->name); ?></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div text-center">
                        <li>
                            <a href="<?php echo e(route('profiles.show', Auth::id())); ?>">
                                <i data-feather="user"></i>
                                <span>Mi Perfil</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-pill btn-outline-primary btn-sm">Salir</a>
                            <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-none" id="logout-form">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Header Ends-->
<?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/layouts/simple/header.blade.php ENDPATH**/ ?>