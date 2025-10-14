    

    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastify.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.messages-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('users.profiles.modals.show-modals', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Mi Perfil</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"> Mi Perfil</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="edit-profile">
                <div class="row">
                    
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Información Personal</h4>
                                    <div class="card-options">
                                        <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                                            <i class="fe fe-chevron-up"></i>
                                        </a>
                                        <a class="card-options-remove" href="#" data-bs-toggle="card-remove">
                                            <i class="fe fe-x"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row g-2 mb-3">
                                        <div class="profile-title">
                                            <div class="media">
                                                <a type="button" href="<?php echo e(asset($user->avatar)); ?>" target="_blank" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar">
                                                    <img class="img-70 rounded-circle" id="vista" src="<?php echo e(asset($user->avatar)); ?>" alt="avatar" data-url="<?php echo e(asset($user->avatar)); ?>">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="mb-1"><?php echo e($user->name); ?></h5>
                                                    <p><?php echo e($user->role->name); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2 mb-3">
                                        <form id="store-info-form" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                                <div class="row g-2">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="nombre">Nombre (*)</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($user->name); ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="correo">Correo Electrónico (*)</label>
                                                        <input type="text" class="form-control" id="correo" name="correo" value="<?php echo e($user->email); ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="input-group mb-2">
                                                            <input type="file" class="form-control" id="avatar" name="avatar" aria-describedby="avatar" aria-label="Upload" accept=".jpg, .jpeg, .png">
                                                            <button class="btn btn-outline-danger delete-avatar-btn" type="button" data-url="<?php echo e(asset($user->avatar)); ?>" disabled>
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                        <label class="form-label small">
                                                            Los formatos soportados son: <code>.jpg</code>, <code>.jpeg</code> y <code>.png</code> con un tamaño máximo de <code>5mb</code>.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-12 text-end">
                                            <button type="button" class="btn btn-outline-success save-info-btn" data-url="<?php echo e(route('profiles.update', $user->id)); ?>">Actualizar Información</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="col-md-4">
                        
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Actualizar Contraseña</h4>
                                    <div class="card-options">
                                        <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                                            <i class="fe fe-chevron-up"></i>
                                        </a>
                                        <a class="card-options-remove" href="#" data-bs-toggle="card-remove">
                                            <i class="fe fe-x"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="store-password-form">
                                        <div class="row g-2 mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="current_password">Contraseña Anterior (*)</label>
                                                <input type="password" class="form-control" id="current_password" name="current_password">
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-4">
                                            <div class="col-md-6">
                                                <label class="form-label" for="new_password">Nueva Contraseña (*)</label>
                                                <input type="password" class="form-control" id="new_password" name="new_password">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="new_password_confirmation">Confirmar Contraseña (*)</label>
                                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-12 text-end">
                                                <button type="button" class="btn btn-outline-success save-password-btn" data-url="<?php echo e(route('profiles.update_password', $user->id)); ?>">Actualizar Contraseña</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        
                        
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Desactivar Cuenta</h4>
                                    <div class="card-options">
                                        <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                                            <i class="fe fe-chevron-up"></i>
                                        </a>
                                        <a class="card-options-remove" href="#" data-bs-toggle="card-remove">
                                            <i class="fe fe-x"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#inactivateModal">Desactivar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('custom/js/users/profiles/show.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/users/profiles/show.blade.php ENDPATH**/ ?>