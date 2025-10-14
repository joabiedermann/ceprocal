<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div class="logo-wrapper">
        <a class="menu-link" href="<?php echo e(route('dashboard')); ?>">
            <img class="img-fluid" src="<?php echo e(asset('storage/logos/logo.png')); ?>" alt="site-logo">
        </a>
        <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a class="menu-link" href="<?php echo e(route('dashboard')); ?>"><img class="img-fluid"
                src="<?php echo e(asset('storage/logos/logo-icon.png')); ?>" alt=""></a></div>
    <nav class="sidebar-main">
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a class="menu-link" href="<?php echo e(route('dashboard')); ?>"><img class="img-fluid"
                            src="<?php echo e(asset('storage/logos/logo-icon.png')); ?>" alt=""></a>
                    <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2"
                            aria-hidden="true"></i></div>
                </li>
                <li class="pin-title sidebar-main-title">
                    <div>
                        <h6>Anclados</h6>
                    </div>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6>Menú Principal</h6>
                    </div>
                </li>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav menu-link"
                        href="<?php echo e(route('dashboard')); ?>">
                        <svg class="stroke-icon">
                            <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#fill-home')); ?>"> </use>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-sample-page')); ?>"></use>
                            </svg><span class="lan-7-1">Certificados</span></a>
                        <ul class="sidebar-submenu">
                            
                                <li><a class="menu-link" href="<?php echo e(route('certificates.import')); ?>">Importar Planilla</a></li>
                            
                            
                                <li><a class="menu-link" href="<?php echo e(route('certificates.shipments')); ?>">Enviados</a></li>
                            
                        </ul>
                    </li>
                
                
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav menu-link"
                            href="<?php echo e(route('courses.index')); ?>">
                            <svg class="stroke-icon">
                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-learning')); ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#fill-learning')); ?>"> </use>
                            </svg>
                            <span>Cursos</span>
                        </a>
                    </li>
                
                
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-social')); ?>"></use>
                            </svg><span class="lan-7-1">Personas</span></a>
                        <ul class="sidebar-submenu">
                            
                                <li><a class="menu-link" href="<?php echo e(route('students.index')); ?>">Estudiantes</a></li>
                            
                            
                                <li><a class="menu-link" href="<?php echo e(route('teachers.index')); ?>">Docentes</a></li>
                            
                        </ul>
                    </li>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['users.show', 'roles.show','permissions.show'])): ?>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-user')); ?>"></use>
                            </svg><span class="lan-7-1">Usuarios</span></a>
                        <ul class="sidebar-submenu">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.show')): ?>
                                <li><a class="menu-link" href="<?php echo e(route('users.index')); ?>">Lista de Usuarios</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.show')): ?>
                                <li><a class="menu-link" href="<?php echo e(route('roles.index')); ?>">Roles</a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions.show')): ?>
                                <li><a class="menu-link" href="<?php echo e(route('permissions.index')); ?>">Permisos</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company.show')): ?>
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav menu-link"
                            href="<?php echo e(route('company.show')); ?>">
                            <svg class="stroke-icon">
                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#setting')); ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#fill-setting')); ?>"> </use>
                            </svg>
                            <span>Parámetros</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</div>
<!-- Page Sidebar Ends-->
<?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>