<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.show')): ?>
    
    <?php $__env->startSection('css'); ?>
        
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Visualizar Rol</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Roles</li>
                            <li class="breadcrumb-item active">Visualizar Rol</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3">
                <div class="row g-2">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <label class="form-label" for="nombre">Nombre</label>
                                        <input type="text" class="form-control " id="nombre" value="<?php echo e($role->name); ?>" readonly>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-end">
                                        <div class="col-md-2 me-2 text-center">
                                            <label class="form-label" for="estado">Estado</label>
                                            <input type="text" class="form-control text-center" id="estado" value="<?php echo e($role->status_text); ?>" readonly>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <label class="form-label" for="cantidad_permisos">Cant. Permisos</label>
                                            <input type="text" class="form-control text-center" id="cantidad_permisos"
                                                name="cantidad_permisos" value="<?php echo e($role->permissions->count()); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Permisos del Rol</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php $__currentLoopData = $permisos->where('father_id', null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-3 xol-xxl-3">
                                            <div class="card equal-card">
                                                <div class="card-header bg-primary">
                                                    <div class="d-flex">
                                                        <div class="me-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check checkbox checkbox-primary mb-0">
                                                                    <input type="checkbox" class="form-check-input padre"
                                                                        id="padre-<?php echo e($permiso->id); ?>"
                                                                        data-id="<?php echo e($permiso->id); ?>"
                                                                        disabled>
                                                                    <label class="form-check-label" for="padre-<?php echo e($permiso->id); ?>"><?php echo e($permiso->name); ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body bg-light-primary">
                                                    <?php $__currentLoopData = $permisos->where('father_id', $permiso->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="list-group-item">
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="form-check checkbox checkbox-primary mb-0">
                                                                            <input type="checkbox" class="form-check-input hijo hijo-<?php echo e($permiso->id); ?>"
                                                                                id="hijo-<?php echo e($p->id); ?>"
                                                                                data-padre="<?php echo e($permiso->id); ?>"
                                                                                disabled
                                                                                <?php if($role->hasPermissionTo($p->id)): ?> checked <?php endif; ?>>
                                                                            <label class="form-check-label text-black" for="hijo-<?php echo e($p->id); ?>"><?php echo e($p->name); ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-2">
                                    <div class="col-md-12 text-end">
                                        <a type="button" class="btn btn-outline-danger" href="<?php echo e(route('roles.index')); ?>">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Container-fluid Ends-->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('custom/js/roles/show.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/roles/show.blade.php ENDPATH**/ ?>