<?php $__env->startSection('content'); ?>
    <!-- list_of_courses -->
    <section class="section-py-space riho-page-section" id="home">
        <div class="container-fluid fluid-space">
            <div class="title text-center">
                <h5>Cursos Encontrados</h5>
                <div class="row d-flex justify-content-center">
                    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-xl-3 col-sm-5 col-xxl-2 col-ed-3 box-col-3">
                            <div class="card social-profile">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h5 class="mb-3 text-muted"><?php echo e($course->name); ?></h5>
                                        <p><b>Docente:</b> <?php echo e($course->teacher->name); ?></p>
                                        <p><b>Fecha Inicio:</b> <?php echo e(Carbon\Carbon::parse($course->start_date)->format('d/m/Y')); ?></p>
                                        <p><b>Fecha Fin:</b> <?php echo e(Carbon\Carbon::parse($course->end_date)->format('d/m/Y')); ?></p>
                                    </div>
                                    <div class="social-details">
                                        <div class="row g-2">
                                            <div class="col-md-12">
                                                <a type="button" class="btn btn-sm btn-primary" href="<?php echo e(route('show_course', $course->id)); ?>">Ver Todo</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-sm-12 col-xxl-12 col-ed-12 box-col-12">
                                <div class="card social-profile">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <p class="mb-3 text-muted">No se encontraron cursos con el nombre buscado.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
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

<?php echo $__env->make('landings.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/landings/courses.blade.php ENDPATH**/ ?>