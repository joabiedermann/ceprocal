<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('forums_certificates.show_shipment')): ?>
    
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastify.min.css')); ?>">
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.messages-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('forums_certificates.modals.show-modals', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Enviar Certificados de Foros</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Certificados de Foros</li>
                            <li class="breadcrumb-item active">Enviar Certificados de Foros</li>
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row g-2">
                                            <div class="col-lg-9">
                                                <h5 class="card-title">Datos del Foro</h5>
                                            </div>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('forums_certificates.generate_pdf')): ?>
                                                <div class="col-lg-3 text-end">
                                                    <a type="button" class="btn btn-outline-primary me-2 generate-btn" data-url="<?php echo e(route('forums_certificates.generate_pdf', $forum->id)); ?>">Generar Certificados</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php
                                        $status = 'Sin Alumnos';
                                        $class = 'text-secondary';
                                        if (($forum->students->where('send_status', 'Enviado')->count() === $forum->students->count()) && $forum->students->count() !== 0) {
                                            $status = 'Completado';
                                            $class = 'text-success';
                                        } else if (($forum->students->where('send_status', 'Error')->count() !== 0)&& $forum->students->count() !== 0) {
                                            $status = 'Con Error';
                                            $class = 'text-danger';
                                        } else if (($forum->students->where('send_status', 'Pendiente')->count() === $forum->students->count()) && $forum->students->count() !== 0) {
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
unset($__errorArgs, $__bag); ?>" id="nombre" name="nombre" value="<?php echo e($forum->name); ?>" readonly>
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
                                                <label class="form-label" for="fecha">Fecha</label>
                                                <input type="text" class="form-control text-center <?php $__errorArgs = ['fecha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fecha" name="fecha" value="<?php echo e($forum->date); ?>" readonly>
                                                <?php $__errorArgs = ['fecha'];
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
unset($__errorArgs, $__bag); ?>" id="horas" name="horas" value="<?php echo e($forum->hours); ?> <?php echo e($forum->text_hours); ?>" readonly>
                                            </div>
                                            <div class="col-md-3 d-flex justify-content-end">
                                                <div class="col-md-8 text-center">
                                                    <label class="form-label" for="estado">Estado</label>
                                                    <input type="text" class="form-control text-center fw-bold <?php echo e($class); ?>" id="estado" value="<?php echo e($status); ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-md-12 text-end">
                                            <a type="button" class="btn btn-outline-danger me-2 cancel-btn" data-url="<?php echo e(route('forums_certificates.shipments')); ?>">Volver</a>
                                            <?php if($forum->certificates_generated == 1): ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('forums_certificates.send')): ?>
                                                    <?php if($status === 'Pendiente' || $status === 'Con Error'): ?>
                                                        <a type="button" class="btn btn-outline-primary send-massive-btn" data-url="<?php echo e(route('forums_certificates.send_massive', $forum->id)); ?>"><i class="fa fa-send"></i>Envío Masivo</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
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
                                                <h5 class="card-title">Participantes del Foro</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <?php if($forum->students->count() !== 0): ?>
                                                <div class="row g-2 d-flex justify-content-center">
                                                    <div class="col-md-3 text-center">
                                                        <label class="form-label" for="modulo">Participante</label>
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
                                                <?php $__currentLoopData = $forum->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $forum_student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="row g-2 d-flex justify-content-center" id="fila-<?php echo e($key); ?>">
                                                        <div class="col-md-3 text-center">
                                                            <input type="text" class="form-control form-control-sm" id="nombre-<?php echo e($key); ?>" value="<?php echo e($forum_student->student->name); ?>" readonly>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            <input class="form-control form-control-sm text-center" id="documento-<?php echo e($key); ?>" value="<?php echo e($forum_student->student->document_number); ?>" data-id="<?php echo e($key); ?>" readonly>
                                                        </div>
                                                        <div class="col-md-3 text-center">
                                                            <div class="input-group">
                                                                <input class="form-control form-control-sm" id="correo-<?php echo e($key); ?>" value="<?php echo e($forum_student->student->email); ?>" readonly>
                                                                <button class="btn btn-outline-warning edit-email-btn" type="button" data-bs-toggle="modal" data-bs-target="#UpdateStudentEmail" data-url="<?php echo e(route('students.get_email', $forum_student->student->id)); ?>" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Editar Correo Electrónico"><i class="fa fa-pencil"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 text-center">
                                                            <input class="form-control form-control-sm text-center" id="fecha_envio-<?php echo e($key); ?>" <?php if($forum_student->send_date): ?> value="<?php echo e(Carbon\Carbon::parse($forum_student->send_date)->format('d/m/Y H:i:s')); ?>" <?php else: ?> value="---" <?php endif; ?> readonly>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            <span class="badge
                                                                <?php switch($forum_student->send_status):
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
                                                            "><?php echo e($forum_student->send_status); ?></span>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            <?php if($forum->certificates_generated == 1): ?>
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('forums_certificates.send')): ?>
                                                                    <button type="button" class="btn btn-sm btn-outline-primary send-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Enviar Certificado Individual" data-url="<?php echo e(route('forums_certificates.send', $forum_student->id)); ?>"><i class="fa fa-send"></i></button>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div class="row g-2">
                                                    <div class="col-md-12 text-center">
                                                        <h6>El foro no cuenta con participantes</h6>
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
        <script src="<?php echo e(asset('custom/js/forums_certificates/show_shipment.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/cleave/cleave.min.js')); ?>"></script>
        <script>
            window.update_email_url = "<?php echo e(url('students/update_email')); ?>";
        </script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/forums_certificates/show_shipment.blade.php ENDPATH**/ ?>