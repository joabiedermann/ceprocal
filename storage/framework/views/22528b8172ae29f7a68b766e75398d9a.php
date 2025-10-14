<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.edit')): ?>
    
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Actualizar Rol</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Roles</li>
                            <li class="breadcrumb-item active">Actualizar Rol</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3" action="<?php echo e(route('roles.update', $role->id)); ?>" method="post" id="store-form">
                <?php echo csrf_field(); ?>
                <div class="row g-2">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <label class="form-label" for="nombre">Nombre (*)</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nombre" name="nombre" value="<?php echo e(old('nombre', $role->name)); ?>" autofocus>
                                        <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <?php echo e($message); ?>

                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-end">
                                        <div class="col-md-2 me-2 text-center">
                                            <label class="form-label" for="estado">Estado</label>
                                            <select class="form-select <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="estado" name="estado">
                                                <option value="" selected disabled>Seleccionar...</option>
                                                <option value="1" <?php if(old('estado') === 1 || $role->status === 1): ?> selected <?php endif; ?>>Activo</option>
                                                <option value="0" <?php if(old('estado') === 0 || $role->status === 0): ?> selected <?php endif; ?>>Inactivo</option>
                                            </select>
                                            <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <?php echo e($message); ?>

                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <label class="form-label" for="cantidad_permisos">Cant. Permisos</label>
                                            <input type="text" class="form-control text-center" id="cantidad_permisos"
                                                name="cantidad_permisos" value="<?php echo e(old('cantidad_permisos', $role->permissions->count())); ?>" readonly>
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
                                <button type="button" class="btn btn-outline-primary" id="seleccionar-todo">
                                    <?php if($role->permissions->count() == $permisos->where('father_id', '!=', null)->count()): ?>
                                        Deseleecionar
                                    <?php else: ?>
                                        Seleccionar
                                    <?php endif; ?> todo
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php $__errorArgs = ['permisos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-light-secondary" role="alert">
                                            <p class="txt-secondary"><?php echo e($message); ?></p>
                                            <i class="ti ti-x" data-bs-dismiss="alert"></i>
                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                                                        name="padres[<?php echo e($permiso->id); ?>]"
                                                                        data-id="<?php echo e($permiso->id); ?>"
                                                                        <?php if(old('padres.' . $permiso->id . '') == 'on'): ?>
                                                                            checked
                                                                        <?php endif; ?>>
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
                                                                                name="permisos[<?php echo e($p->id); ?>]"
                                                                                data-padre="<?php echo e($permiso->id); ?>"
                                                                                <?php if(old('permisos.' . $p->id) == 'on'): ?> checked <?php elseif(!$errors->any() && $role->hasPermissionTo($p->id)): ?> checked <?php endif; ?>>
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
                                        <button type="button" class="btn btn-outline-danger me-2 cancel-btn" data-url="<?php echo e(route('roles.index')); ?>">Cancelar</button>
                                        <button type="button" class="btn btn-outline-success save-btn">Guardar</button>
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
        <script src="<?php echo e(asset('custom/js/roles/edit.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/roles/edit.blade.php ENDPATH**/ ?>