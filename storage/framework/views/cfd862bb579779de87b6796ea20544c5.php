<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions.show')): ?>
        
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastify.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('breadcrumb-title'); ?>
        <h4>Lista de Permisos</h4>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('breadcrumb-items'); ?>
        <li class="breadcrumb-item">Usuarios</li>
        <li class="breadcrumb-item active">Lista de Permisos</li>
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.messages-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('permissions.modals.index-modals', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Lista de Permisos</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Usuarios</li>
                            <li class="breadcrumb-item active">Permisos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive custom-scrollbar">
                                <div id="table_wrapper" class="dataTables_wrapper no-footer">
                                    <table class="display dataTable" id="table" role="grid" aria-describedby="table_info">
                                        <thead class="text-center">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="table" rowspan="1" colspan="1" aria-sort="ascending" width="30%">Permiso</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Roles</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><?php echo e($permiso->name); ?></td>
                                                    <td class="text-center">
                                                        <?php $__empty_1 = true; $__currentLoopData = $permiso->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <?php echo e($role->name); ?>

                                                            <?php if(!$loop->last): ?>
                                                                &nbsp;-&nbsp;
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            No cuenta con rol asignado.
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="d-flex justify-content-center">
                                                        <ul class="action">
                                                            <li class="me-2">
                                                                <a href="#" class="btn btn-xs btn-outline-primary show-btn" data-bs-toggle="modal" data-bs-target="#showModal" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar" data-url="<?php echo e(route('permissions.show', $permiso->id)); ?>">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
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
        <script src="<?php echo e(asset('custom/js/permissions/index.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/permissions/index.blade.php ENDPATH**/ ?>