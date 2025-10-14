    
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastify.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Actualizar Curso</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Cursos</li>
                            <li class="breadcrumb-item active">Actualizar Curso</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3" action="<?php echo e(route('courses.update', $course->id)); ?>" method="post" id="store-form">
                <?php echo csrf_field(); ?>
                <div class="row g-2">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="nombre">Nombre (*)</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nombre" name="nombre" value="<?php echo e(old('nombre', $course->name)); ?>" autofocus>
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
                                    <div class="col-md-3  mb-3">
                                        <label class="form-label" for="docente">Docente (*)</label>
                                        <select class="form-select <?php $__errorArgs = ['docente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="docente" name="docente">
                                            <option value="" selected disabled>Seleccionar...</option>
                                            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($teacher->id); ?>" <?php if(old('docente') == strval($teacher->id) || $course->teacher_id == strval($teacher->id)): ?> selected <?php endif; ?>><?php echo e($teacher->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['docente'];
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
                                    <div class="col-md-6 mb-3 d-flex justify-content-end">
                                        <div class="col-md-3 text-center">
                                            <label class="form-label" for="estado">Estado (*)</label>
                                            <select class="form-select <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="estado" name="estado">
                                                <option value="" selected disabled>Seleccionar...</option>
                                                <option value="1" <?php if(old('estado') == '1' || $course->status == 1): ?> selected <?php endif; ?>>Activo</option>
                                                <option value="0" <?php if(old('estado') == '0' || $course->status == 0): ?> selected <?php endif; ?>>Inactivo</option>
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
                                    </div>
                                    <div class="col-md-2 mb-3 text-center">
                                        <label class="form-label" for="fecha_inicio">Fecha Inicio (*)</label>
                                        <input type="date" class="form-control text-center <?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fecha_inicio" name="fecha_inicio" value="<?php echo e(old('fecha_inicio', $course->start_date)); ?>">
                                        <?php $__errorArgs = ['fecha_inicio'];
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
                                    <div class="col-md-2 mb-3 text-center">
                                        <label class="form-label" for="fecha_fin">Fecha Fin (*)</label>
                                        <input type="date" class="form-control text-center <?php $__errorArgs = ['fecha_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fecha_fin" name="fecha_fin" value="<?php echo e(old('fecha_fin', $course->end_date)); ?>">
                                        <?php $__errorArgs = ['fecha_fin'];
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
                                    <div class="col-md-2 mb-3 text-center">
                                        <label class="form-label" for="horas">Cant. Horas (*)</label>
                                        <div class="input-group <?php $__errorArgs = ['horas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <input type="text" class="form-control text-center <?php $__errorArgs = ['horas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="horas" name="horas" value="<?php echo e(old('horas', $course->hours)); ?>">
                                            <span class="input-group-text">horas</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-2">
                                    <div class="col-md-12 text-end">
                                        <button type="button" class="btn btn-outline-danger me-2 cancel-btn" data-url="<?php echo e(route('courses.index')); ?>">Cancelar</button>
                                        <button type="button" class="btn btn-outline-success save-btn" data-url="<?php echo e(route('courses.update', $course->id)); ?>">Guardar</button>
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
                                <h6 class="card-title">Módulos del Curso</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-1 text-center">
                                        <label class="form-label" for="modulo">Módulo (*)</label>
                                    </div>
                                    <div class="col-md-10 text-center">
                                        <label class="form-label" for="descripcion">Descripción (*)</label>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <label class="form-label" for="acciones">Acciones</label>
                                    </div>
                                </div>
                                <?php $__currentLoopData = $course->modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row g-2 align-items-center fila" id="fila-<?php echo e($key); ?>" data-id="<?php echo e($key); ?>">
                                        <div class="col-md-1 mb-3 text-center">
                                            <input type="text" class="form-control form-control-sm text-center <?php $__errorArgs = ['detalles.' . $key . '.modulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> modulo modulo-<?php echo e($key); ?>" id="modulo-<?php echo e($key); ?>" name="detalles[<?php echo e($key); ?>][modulo]" value="<?php echo e(old('detalles.' . $key . '.modulo', $module->module)); ?>" data-id="<?php echo e($key); ?>">
                                        </div>
                                        <div class="col-md-10 mb-3 text-center">
                                            <textarea class="form-control form-control-sm <?php $__errorArgs = ['detalles.' . $key . '.descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> descripcion descripcion-<?php echo e($key); ?>" id="descripcion-<?php echo e($key); ?>" name="detalles[<?php echo e($key); ?>][descripcion]" cols="30" rows="3" data-id="<?php echo e($key); ?>"><?php echo e(old('detalles.' . $key . '.descripcion', $module->description)); ?></textarea>
                                        </div>
                                        <div class="col-md-1 mb-3 text-center">
                                            <button type="button" class="btn btn-sm btn-outline-danger delete-row-btn" id="delete-row-btn-<?php echo e($key); ?>" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Eliminar línea" data-id="<?php echo e($key); ?>"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div id="fila-nueva">

                                </div>
                                <div class="row g-2">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-sm btn-outline-success" id="add-row-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Agregar línea"><i class="fa fa-plus"></i>&nbsp;Agregar</button>
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
        <script src="<?php echo e(asset('custom/js/courses/edit.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/select2/spanish.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/cleave/cleave.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/courses/edit.blade.php ENDPATH**/ ?>