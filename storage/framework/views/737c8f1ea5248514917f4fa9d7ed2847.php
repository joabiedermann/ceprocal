    
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastify.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('courses.modals.show-modals', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Visualizar Curso</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Cursos</li>
                            <li class="breadcrumb-item active">Visualizar Curso</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3">
                <div class="row g-2">
                    <div class="col-md-8 mb-3">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Datos del Curso</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <label class="form-label" for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" value="<?php echo e($course->name); ?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="docente">Docente</label>
                                                <input type="text" class="form-control" id="docente" value="<?php echo e($course->teacher->name); ?>" readonly>
                                            </div>
                                            <div class="col-md-4 d-flex justify-content-end">
                                                <div class="col-md-6 text-center">
                                                    <label class="form-label" for="estado">Estado</label>
                                                    <input type="text" class="form-control text-center" id="estado" value="<?php echo e($course->status_text); ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label class="form-label" for="fecha_inicio">Fecha Inicio</label>
                                                <input type="text" class="form-control text-center" id="fecha_inicio" value="<?php echo e($course->start_date); ?>" readonly>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label class="form-label" for="fecha_fin">Fecha Fin</label>
                                                <input type="text" class="form-control text-center" id="fecha_fin" value="<?php echo e($course->end_date); ?>" readonly>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label class="form-label" for="horas">Cant. Horas</label>
                                                <input type="text" class="form-control text-center" id="horas" value="<?php echo e($course->hours); ?> <?php echo e($course->text_hours); ?>" readonly>
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
                                                <h5 class="card-title">Asociados al Curso</h5>
                                            </div>
                                            
                                                <div class="col-md-6 text-end">
                                                    <button type="button" class="btn btn-outline-success add-company-btn" data-bs-toggle="modal" data-bs-target="#createCompanyModal" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Agregar asociado" data-url="<?php echo e(route('courses.store_company', $course->id)); ?>"><i class="fa fa-plus"></i>&nbsp;Agregar</button>
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <?php $__empty_1 = true; $__currentLoopData = $course->companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <div class="col-xl-4 col-sm-6 col-xxl-3 col-ed-4 box-col-4">
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
                            <div class="col-md-12 text-center">
                                <a type="button" class="btn btn-danger" href="<?php echo e(route('courses.index')); ?>">Volver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Módulos del Curso</h5>
                            </div>
                            <div class="card-body">
                                <div class="accordion dark-accordion" id="accordion">
                                    <?php $__empty_1 = true; $__currentLoopData = $course->modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-<?php echo e($module->id); ?>">
                                                <button class="accordion-button bg-light-primary txt-primary active collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($module->id); ?>" aria-expanded="false" aria-controls="collapse-<?php echo e($module->id); ?>">Módulo <?php echo e($module->module); ?></button>
                                            </h2>
                                            <div class="accordion-collapse collapse" id="collapse-<?php echo e($module->id); ?>" aria-labelledby="heading-<?php echo e($module->id); ?>" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    <p><?php echo e($module->description); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="col-md-12">
                                            <p>El curso no cuenta con módulos cargados.</p>
                                        </div>
                                    <?php endif; ?>
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
        <script src="<?php echo e(asset('custom/js/courses/show.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
        <script>
            window.update_company_url = "<?php echo e(url('courses/update_asociate')); ?>";
            window.destroy_company_url = "<?php echo e(url('courses/destroy_asociate')); ?>";
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/courses/show.blade.php ENDPATH**/ ?>