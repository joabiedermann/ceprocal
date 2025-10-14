    
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastify.min.css')); ?>">
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.messages-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Importar Planilla</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Certificados</li>
                            <li class="breadcrumb-item active">Importar Planilla</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3" action="<?php echo e(route('certificates.upload')); ?>" id="store-form" enctype="multipart/form-data">
                <div class="row g-2">
                    <div class="col-md-8 mb-3">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row g-2">
                                            <h5 class="card-title">Datos del Curso</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="nombre">Nombre (*)</label>
                                                <input type="text" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nombre" name="nombre" value="<?php echo e($course->name); ?>">
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
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="fecha_inicio">Fecha Inicio (*)</label>
                                                <input type="date" class="form-control text-center <?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fecha_inicio" name="fecha_inicio" value="<?php echo e($course->start_date); ?>">
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
unset($__errorArgs, $__bag); ?>" id="fecha_fin" name="fecha_fin" value="<?php echo e($course->end_date); ?>">
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
                                                <div class="input-group">
                                                    <input type="text" class="form-control text-center <?php $__errorArgs = ['horas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="horas" name="horas" value="<?php echo e($course->hours); ?>" readonly>
                                                    <span class="input-group-text">horas</span>
                                                    <?php $__errorArgs = ['horas'];
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
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="docente">Docente (*)</label>
                                                <input type="text" class="form-control <?php $__errorArgs = ['docente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="docente" name="docente" value="<?php echo e($teacher->name); ?>">
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
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="documento_docente">C.I. N° (*)</label>
                                                <input type="text" class="form-control text-center documento <?php $__errorArgs = ['documento_docente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="documento_docente" name="documento_docente" value="<?php echo e($teacher->document_number); ?>">
                                                <?php $__errorArgs = ['documento_docente'];
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
                                                <label class="form-label" for="telefono_docente">N° de Teléfono (*)</label>
                                                <input type="text" class="form-control text-center documento <?php $__errorArgs = ['telefono_docente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="telefono_docente" name="telefono_docente" value="<?php echo e($teacher->phone_number); ?>">
                                                <?php $__errorArgs = ['telefono_docente'];
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
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="correo_docente">Correo Electrónico (*)</label>
                                                <input type="text" class="form-control documento <?php $__errorArgs = ['correo_docente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="correo_docente" name="correo_docente" value="<?php echo e($teacher->email); ?>">
                                                <?php $__errorArgs = ['correo_docente'];
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-6">
                                                <h5 class="card-title">Estudiantes del Curso</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="row g-2">
                                                <div class="col-md-4 text-center">
                                                    <label class="form-label" for="modulo">Estudiante (*)</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <label class="form-label" for="numero_documento">C.I. N° (*)</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <label class="form-label" for="telefono">N° de Teléfono</label>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label class="form-label" for="correo">Correo Electrónico (*)</label>
                                                </div>
                                            </div>
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row g-2 fila fila-student" id="fila-<?php echo e($key); ?>" data-id="<?php echo e($key); ?>">
                                                    <div class="col-md-4 text-center">
                                                        <input type="text" class="form-control form-control-sm <?php $__errorArgs = ['estudiantes.' . $key . '.nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> nombre nombre-<?php echo e($key); ?>" id="nombre-<?php echo e($key); ?>" name="estudiantes[<?php echo e($key); ?>][nombre]" value="<?php echo e(old('estudiantes.' . $key . '.nombre', $student['name'])); ?>" data-id="<?php echo e($key); ?>">
                                                        <?php $__errorArgs = ['estudiantes.' . $key . '.nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert"></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <input class="form-control form-control-sm text-center <?php $__errorArgs = ['estudiantes.' . $key . '.documento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> documento documento-<?php echo e($key); ?>" id="documento-<?php echo e($key); ?>" name="estudiantes[<?php echo e($key); ?>][documento]" value="<?php echo e(old('estudiantes.' . $key . '.documento', $student['document_number'])); ?>" data-id="<?php echo e($key); ?>"></input>
                                                        <?php $__errorArgs = ['estudiantes.' . $key . '.documento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert"></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <input class="form-control form-control-sm text-center <?php $__errorArgs = ['estudiantes.' . $key . '.telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> telefono telefono-<?php echo e($key); ?>" id="telefono-<?php echo e($key); ?>" name="estudiantes[<?php echo e($key); ?>][telefono]" value="<?php echo e(old('estudiantes.' . $key . '.telefono', $student['phone_number'])); ?>" data-id="<?php echo e($key); ?>"></input>
                                                        <?php $__errorArgs = ['estudiantes.' . $key . '.telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert"></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <input class="form-control form-control-sm <?php $__errorArgs = ['estudiantes.' . $key . '.correo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> correo correo-<?php echo e($key); ?>" id="correo-<?php echo e($key); ?>" name="estudiantes[<?php echo e($key); ?>][correo]" value="<?php echo e(old('estudiantes.' . $key . '.correo', $student['email'])); ?>" data-id="<?php echo e($key); ?>"></input>
                                                        <?php $__errorArgs = ['estudiantes.' . $key . '.correo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert"></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <a type="button" class="btn btn-danger me-2 cancel-btn" data-url="<?php echo e(route('certificates.import')); ?>">Cancelar</a>
                                <a type="button" class="btn btn-success save-btn" data-url="<?php echo e(route('certificates.store')); ?>">Confirmar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Módulos del Curso</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="row g-2">
                                        <div class="col-md-2 text-center">
                                            <label class="form-label" for="modulo">Módulo (*)</label>
                                        </div>
                                        <div class="col-md-10 text-center">
                                            <label class="form-label" for="descripcion">Descripción (*)</label>
                                        </div>
                                    </div>
                                    <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row g-2 align-items-center fila fila-module" id="fila-<?php echo e($key); ?>" data-id="<?php echo e($key); ?>">
                                            <div class="col-md-2 text-center">
                                                <textarea class="form-control form-control-sm text-center <?php $__errorArgs = ['modulos.' . $key . '.modulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> modulo modulo-<?php echo e($key); ?>" id="modulo-<?php echo e($key); ?>" name="modulos[<?php echo e($key); ?>][modulo]" cols="30" rows="5" data-id="<?php echo e($key); ?>" style="resize: none; overflow: auto;"><?php echo e(old('modulos.' . $key . '.modulo', $module['number'])); ?></textarea>
                                            </div>
                                            <div class="col-md-10 text-center">
                                                <textarea class="form-control form-control-sm <?php $__errorArgs = ['modulos.' . $key . '.descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> descripcion descripcion-<?php echo e($key); ?>" id="descripcion-<?php echo e($key); ?>" name="modulos[<?php echo e($key); ?>][descripcion]" cols="30" rows="5" data-id="<?php echo e($key); ?>"><?php echo e(old('modulos.' . $key . '.descripcion', $module['description'])); ?></textarea>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <script src="<?php echo e(asset('custom/js/certificates/temporal_import.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/cleave/cleave.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/certificates/temporal_import.blade.php ENDPATH**/ ?>