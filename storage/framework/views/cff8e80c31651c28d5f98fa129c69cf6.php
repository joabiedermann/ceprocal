<?php $__env->startSection('content'); ?>
    <!-- list_of_courses -->
    <section class="section-py-space riho-page-section" id="home">
        <div class="container-fluid fluid-space">
            <div class="title text-center">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-12 col-sm-12 col-xxl-12 col-ed-3 box-col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <h5 class="mb-3 text-muted">Datos del Curso</h5>
                                        </div>
                                        <div class="row g-2 mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" value="<?php echo e($course->name); ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" for="docente">Docente</label>
                                                <input type="text" class="form-control" id="docente" value="<?php echo e($course->teacher->name); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold" for="fecha_inicio">Fecha de Inicio</label>
                                                <input type="text" class="form-control text-center" id="fecha_inicio" value="<?php echo e(Carbon\Carbon::parse($course->start_date)->format('d/m/Y')); ?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold" for="fecha_fin">Fecha de Fin</label>
                                                <input type="text" class="form-control text-center" id="fecha_fin" value="<?php echo e(Carbon\Carbon::parse($course->end_date)->format('d/m/Y')); ?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold" for="cantidad_horas">Cant. de Horas</label>
                                                <input type="text" class="form-control text-center" id="cantidad_horas" value="<?php echo e($course->hours); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <h5 class="mb-3 text-muted">Contenido Programático</h5>
                                        </div>
                                        <div class="accordion dark-accordion" id="accordion">
                                            <?php $__empty_1 = true; $__currentLoopData = $course->modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading-<?php echo e($module->id); ?>">
                                                        <button class="accordion-button bg-primary active collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($module->id); ?>" aria-expanded="false" aria-controls="collapse-<?php echo e($module->id); ?>">Módulo <?php echo e($module->module); ?></button>
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- search_course -->
    <section class="section-py-space riho-page-section" id="home">
        <div class="container-fluid fluid-space">
            <div class="title text-center">
                <h5>Buscar Cursos</h5>
                <div class="row d-flex justify-content-center mt-2">
                    <div class="col-md-2">
                        <form action="<?php echo e(route('search_course')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <input type="text" class="form-control" name="curso" placeholder="Ingrese el nombre del curso...">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row g-2 mt-4">
                    <div class="col-md-12">
                        <a type="button" class="btn btn-danger" href="<?php echo e(route('landing')); ?>">Volver al Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <section class="landing-footer section-py-space" id="footer">
        <div class="custom-container">
            <div class="row p-0 m-0">
                <div class="col-12">
                    <div class="footer-contain">
                        <div class="btn-footer">
                            <a class="btn btn-lg btn-primary" target="_blank" href="https://bsoft.com.py">Copyright &copy; <?php echo e(Carbon\Carbon::today()->format('Y')); ?> - BSoft</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landings.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/landings/show_course.blade.php ENDPATH**/ ?>