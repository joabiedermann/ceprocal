<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.show')): ?>
        
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastify.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('breadcrumb-title'); ?>
        <h4>Lista de Usuarios</h4>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('breadcrumb-items'); ?>
        <li class="breadcrumb-item">Usuarios</li>
        <li class="breadcrumb-item active">Lista de Usuarios</li>
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.messages-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('users.modals.index-modals', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Lista de Usuarios</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Usuarios</li>
                            <li class="breadcrumb-item active">Lista de Usuarios</li>
                        </ol>
                    </div>
                </div>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.create')): ?>
                    <div class="row g-2">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-success create-btn" data-bs-toggle="modal" data-bs-target="#createModal" data-url="<?php echo e(route('users.create')); ?>"><i class="fa fa-plus align-middle"></i> &nbsp; Agregar</button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 col-sm-6 col-xxl-3 col-ed-4 box-col-4">
                        <div class="card social-profile">
                            <div class="card-body">
                                <div class="social-img-wrap">
                                    <div class="social-img"><img src="<?php echo e(asset(Auth::user()->avatar)); ?>"
                                            alt="profile">
                                    </div>
                                    <?php
                                        switch ($user->status) {
                                            case 0:
                                                $icon = 'fa-thumbs-up';
                                                $text_icon = 'Desbloquear';
                                                $class = 'text-danger';
                                                $status = 'Inactivo';
                                                break;
                                            default:
                                                $icon = 'fa-ban';
                                                $text_icon = 'Bloquear';
                                                $class = 'text-success';
                                                $status = 'Activo';
                                                break;
                                        }
                                    ?>
                                    <div class="edit-icon">
                                        <svg>
                                            <?php if($user->status == 0): ?>
                                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#spam')); ?>"></use>
                                            <?php else: ?>
                                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#profile-check')); ?>"></use>
                                            <?php endif; ?>
                                        </svg>
                                    </div>
                                </div>
                                <div class="social-details">
                                    <h5 class="mb-1"><a href="$"><?php echo e($user->name); ?></a></h5><span
                                        class="f-light"><?php echo e($user->email); ?></span>
                                    <ul class="card-social">
                                        <li>
                                            <a href="#" class="show-btn" data-bs-toggle="modal" data-bs-target="#showModal" data-url="<?php echo e(route('users.show', $user->id)); ?>">
                                                <i class="fa fa-eye" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar"></i>
                                            </a>
                                        </li>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.edit')): ?>
                                            <li>
                                                <a href="#" class="edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-url="<?php echo e(route('users.edit', $user->id)); ?>">
                                                    <i class="fa fa-pencil" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Editar"></i>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if($user->id !== Auth::id()): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.edit_status')): ?>
                                                <li>
                                                    <a href="#" class="status-btn" data-url="<?php echo e(route('users.get_status', $user->id)); ?>">
                                                        <i class="fa <?php echo e($icon); ?>" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="<?php echo e($text_icon); ?>"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.destroy')): ?>
                                                <li>
                                                    <a href="#" class="destroy-btn" data-url="<?php echo e(route('users.get_destroy', $user->id)); ?>">
                                                        <i class="fa fa-trash" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Eliminar"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </ul>
                                    <ul class="social-follow">
                                        <li>
                                            <h6 class="mb-0"><?php echo e($user->role->name); ?></h6><span class="f-light">Rol</span>
                                        </li>
                                        <li>
                                            <h6 class="mb-0 <?php echo e($class); ?>"><?php echo e($status); ?></h6><span class="f-light">Estado</span>
                                        </li>
                                        <li>
                                            <h6 class="mb-0"><?php echo e(Carbon\Carbon::parse($user->created_at)->format('d/m/Y')); ?></h6><span class="f-light">Usuario Desde</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('custom/js/users/index.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/select2/spanish.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/users/index.blade.php ENDPATH**/ ?>