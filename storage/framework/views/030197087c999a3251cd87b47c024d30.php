<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('certificates.show_shipment')): ?>
    
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastify.min.css')); ?>">
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.messages-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('certificates.modals.show-modals', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Enviar Certificados</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Certificados</li>
                            <li class="breadcrumb-item active">Enviar Certificados</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form>
                <div class="row g-2">
                    <div class="col-md-12 mb-3">
                        <div class="row g-2">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row g-2">
                                            <div class="col-lg-9">
                                                <h5 class="card-title">Datos del Curso</h5>
                                            </div>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('certificates.generate_pdf')): ?>
                                                <div class="col-lg-3 text-end">
                                                    <a type="button" class="btn btn-outline-primary me-2 generate-btn" data-url="<?php echo e(route('certificates.generate_pdf', $course->id)); ?>">Generar Certificados</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php
                                        $status = 'Sin Alumnos';
                                        $class = 'text-secondary';
                                        if (($course->students->where('send_status', 'Enviado')->count() === $course->students->count()) && $course->students->count() !== 0) {
                                            $status = 'Completado';
                                            $class = 'text-success';
                                        } else if (($course->students->where('send_status', 'Error')->count() !== 0)&& $course->students->count() !== 0) {
                                            $status = 'Con Error';
                                            $class = 'text-danger';
                                        } else if (($course->students->where('send_status', 'Pendiente')->count() === $course->students->count()) && $course->students->count() !== 0) {
                                            $status = 'Pendiente';
                                            $class = 'text-warning';
                                        }
                                    ?>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="nombre">Nombre</label>
                                                <input type="text" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nombre" name="nombre" value="<?php echo e($course->name); ?>" readonly>
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
                                                <label class="form-label" for="fecha_inicio">Fecha Inicio</label>
                                                <input type="text" class="form-control text-center <?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fecha_inicio" name="fecha_inicio" value="<?php echo e($course->start_date); ?>" readonly>
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
                                                <label class="form-label" for="fecha_fin">Fecha Fin</label>
                                                <input type="text" class="form-control text-center <?php $__errorArgs = ['fecha_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fecha_fin" name="fecha_fin" value="<?php echo e($course->end_date); ?>" readonly>
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
                                                <label class="form-label" for="horas">Cant. Horas</label>
                                                <input type="text" class="form-control text-center <?php $__errorArgs = ['horas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="horas" name="horas" value="<?php echo e($course->hours); ?> <?php echo e($course->text_hours); ?>" readonly>
                                            </div>
                                            <div class="col-md-3 d-flex justify-content-end">
                                                <div class="col-md-8 text-center">
                                                    <label class="form-label" for="estado">Estado</label>
                                                    <input type="text" class="form-control text-center fw-bold <?php echo e($class); ?>" id="estado" value="<?php echo e($status); ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="docente">Docente</label>
                                                <input type="text" class="form-control <?php $__errorArgs = ['docente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="docente" name="docente" value="<?php echo e($course->teacher->name); ?>" readonly>
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
                                                <label class="form-label" for="documento_docente">C.I. N°</label>
                                                <input type="text" class="form-control text-center documento <?php $__errorArgs = ['documento_docente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="documento_docente" name="documento_docente" value="<?php echo e($course->teacher->document_number); ?>" readonly>
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
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-md-12 text-end">
                                            <a type="button" class="btn btn-outline-danger me-2 cancel-btn" data-url="<?php echo e(route('certificates.shipments')); ?>">Volver</a>
                                            <?php if($course->certificates_generated == 1): ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('certificates.send')): ?>
                                                    <?php if($status === 'Pendiente' || $status === 'Con Error'): ?>
                                                        <a type="button" class="btn btn-outline-primary send-massive-btn" data-url="<?php echo e(route('certificates.send_massive', $course->id)); ?>"><i class="fa fa-send"></i>Envío Masivo</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-6">
                                                <h5 class="card-title">Asociados al Curso</h5>
                                            </div>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('courses.edit')): ?>
                                                <div class="col-md-6 text-end">
                                                    <button type="button" class="btn btn-outline-success add-company-btn" data-bs-toggle="modal" data-bs-target="#createCompanyModal" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Agregar asociado" data-url="<?php echo e(route('courses.store_company', $course->id)); ?>"><i class="fa fa-plus"></i>&nbsp;Agregar</button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <?php $__empty_1 = true; $__currentLoopData = $course->companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <div class="col-xl-7 col-sm-9 col-xxl-6 col-ed-7 box-col-7">
                                                    <div class="card social-profile">
                                                        <div class="card-body">
                                                            <div class="mb-4">
                                                                <a href="<?php echo e(asset($company->company_logo)); ?>" target="_blank">
                                                                    <img src="<?php echo e(asset($company->company_logo)); ?>" alt="company_logo" width="200px">
                                                                </a>
                                                            </div>
                                                            <div class="social-details">
                                                                <h5 class="mb-3 text-muted"><?php echo e($company->company_name); ?></h5>
                                                                <div class="row g-2">
                                                                    <div class="col-md-6">
                                                                        <button type="button" class="btn btn-sm btn-outline-warning edit-company-btn" data-bs-toggle="modal" data-bs-target="#editCompanyModal" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Editar asociado" data-url="<?php echo e(route('courses.edit_company', $company->id)); ?>"><i class="fa fa-pencil"></i></button>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <button type="button" class="btn btn-sm btn-outline-danger destroy-company-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Eliminar asociado" data-url="<?php echo e(route('courses.get_destroy_company', $company->id)); ?>"><i class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <div class="col-md-12">
                                                    <p>El curso no cuenta con asociados cargados.</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-12">
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
                                            <?php if($course->students->count() !== 0): ?>
                                                <div class="row g-2 d-flex justify-content-center">
                                                    <div class="col-md-3 text-center">
                                                        <label class="form-label" for="modulo">Estudiante</label>
                                                    </div>
                                                    <div class="col-md-1 text-center">
                                                        <label class="form-label" for="numero_documento">C.I. N°</label>
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <label class="form-label" for="correo">Correo Electrónico</label>
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <label class="form-label" for="fecha_envio">Fecha Envío</label>
                                                    </div>
                                                    <div class="col-md-1 text-center">
                                                        <label class="form-label" for="estado">Estado</label>
                                                    </div>
                                                    <div class="col-md-1 text-center">
                                                        <label class="form-label" for="acciones">Acciones</label>
                                                    </div>
                                                </div>
                                                <?php $__currentLoopData = $course->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course_student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="row g-2 d-flex justify-content-center" id="fila-<?php echo e($key); ?>">
                                                        <div class="col-md-3 text-center">
                                                            <input type="text" class="form-control form-control-sm" id="nombre-<?php echo e($key); ?>" value="<?php echo e($course_student->student->name); ?>" readonly>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            <input class="form-control form-control-sm text-center" id="documento-<?php echo e($key); ?>" value="<?php echo e($course_student->student->document_number); ?>" data-id="<?php echo e($key); ?>" readonly>
                                                        </div>
                                                        <div class="col-md-3 text-center">
                                                            <div class="input-group">
                                                                <input class="form-control form-control-sm" id="correo-<?php echo e($key); ?>" value="<?php echo e($course_student->student->email); ?>" readonly>
                                                                <button class="btn btn-outline-warning edit-email-btn" type="button" data-bs-toggle="modal" data-bs-target="#UpdateStudentEmail" data-url="<?php echo e(route('students.get_email', $course_student->student->id)); ?>" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Editar Correo Electrónico"><i class="fa fa-pencil"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 text-center">
                                                            <input class="form-control form-control-sm text-center" id="fecha_envio-<?php echo e($key); ?>" <?php if($course_student->send_date): ?> value="<?php echo e(Carbon\Carbon::parse($course_student->send_date)->format('d/m/Y H:i:s')); ?>" <?php else: ?> value="---" <?php endif; ?> readonly>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            <span class="badge
                                                                <?php switch($course_student->send_status):
                                                                    case ('Enviado'): ?>
                                                                        badge-success
                                                                        <?php break; ?>
                                                                    <?php case ('Error'): ?>
                                                                        badge-danger
                                                                        <?php break; ?>
                                                                    <?php default: ?>
                                                                        badge-warning
                                                                        <?php break; ?>
                                                                <?php endswitch; ?>
                                                            "><?php echo e($course_student->send_status); ?></span>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            <?php if($course->certificates_generated == 1): ?>
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('certificates.send')): ?>
                                                                    <button type="button" class="btn btn-sm btn-outline-primary send-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Enviar Certificado Individual" data-url="<?php echo e(route('certificates.send', $course_student->id)); ?>"><i class="fa fa-send"></i></button>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div class="row g-2">
                                                    <div class="col-md-12 text-center">
                                                        <h6>El curso no cuenta con alumnos</h6>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
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
        <script src="<?php echo e(asset('custom/js/certificates/show_shipment.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/cleave/cleave.min.js')); ?>"></script>
        <script>
            window.update_company_url = "<?php echo e(url('courses/update_asociate')); ?>";
            window.destroy_company_url = "<?php echo e(url('courses/destroy_asociate')); ?>";
            window.update_email_url = "<?php echo e(url('students/update_email')); ?>";
        </script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/certificates/show_shipment.blade.php ENDPATH**/ ?>