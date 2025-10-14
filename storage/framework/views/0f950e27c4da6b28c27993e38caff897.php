    
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
                        <h4>Visualizar Parámetros</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Parámetros</li>
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
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-2 d-flex justify-content-center">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="nombre_fantasia">Nombre Fantasía</label>
                                        <input type="text" class="form-control" id="nombre_fantasia" name="nombre_fantasia" value="<?php echo e($company->fantasy_name); ?>" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="razon_social">Razón Social</label>
                                        <input type="text" class="form-control" id="razon_social" name="razon_social" value="<?php echo e($company->real_name); ?>" readonly>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="ruc">R.U.C.</label>
                                        <input type="text" class="form-control" id="ruc" name="ruc" value="<?php echo e($company->document_number); ?>" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="email">Correo Electrónico</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo e($company->email); ?>" readonly>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="telefono">N° de Teléfono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo e($company->phone_number); ?>" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="pais">País</label>
                                        <input type="text" class="form-control" id="pais" name="pais" value="<?php echo e($company->country); ?>" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="ciudad">Ciudad</label>
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo e($company->city); ?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="actividad">Actividad Principal</label>
                                        <input type="text" class="form-control" id="actividad" name="actividad" value="<?php echo e($company->activity); ?>" readonly>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label class="form-label" for="direccion">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo e($company->address); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-2">
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <a type="button" class="btn btn-outline-danger me-2" href="<?php echo e(route('dashboard')); ?>">Volver</a>
                                        <a type="button" class="btn btn-outline-warning" href="<?php echo e(route('company.edit', $company->id)); ?>">Editar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <label class="form-label" for="vista">Logo</label>
                                        <div class="text-center">
                                            <a href="<?php echo e(asset($company->logo)); ?>" target="_blank">
                                                <img src="<?php echo e(asset($company->logo)); ?>" alt="Imagen" id="vista" style="width: 305px; height:305px;">
                                            </a>
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
        <script src="<?php echo e(asset('custom/js/companies/show.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/company/show.blade.php ENDPATH**/ ?>