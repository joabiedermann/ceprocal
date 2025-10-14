<?php $__env->startSection('content'); ?>
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
            </div>
        </div>
    </section>

    <!-- verificate_certificate -->
    

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

<?php echo $__env->make('landings.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/landings/index.blade.php ENDPATH**/ ?>