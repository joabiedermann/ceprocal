<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('certificates.upload')): ?>
    
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h4 class="me-3">Importar Planilla</h4>
                        <a type="button" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Descargar Plantilla"
                            href="<?php echo e(asset('storage/importar-excel.xlsx')); ?>" download="importar-excel.xlsx">
                            <i class="fa fa-download"></i> Plantilla
                        </a>
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
            <form class="row g-3" action="<?php echo e(route('certificates.upload')); ?>" method="post" id="store-form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row g-2 d-flex justify-content-center">
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-2">
                                    <?php if(!session('errores')): ?>
                                        <div class="col-md-12 alert alert-danger" role="alert">
                                            No olvide verificar su archivo antes de subirlo, puede descargar la plantilla haciendo click <a href="<?php echo e(asset('storage/importar-excel.xlsx')); ?>"> AQUÍ</a> para comprobar que el formato sea correcto.
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-8">
                                        <label class="form-label mb-3" for="planilla">Planilla (*)</label>
                                        <div class="input-group mb-2">
                                            <input type="file" class="form-control <?php $__errorArgs = ['planilla'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="planilla" name="planilla" aria-describedby="planilla" aria-label="Upload" accept=".xls, .xlsx, .csv">
                                            <button type="button" class="btn btn-outline-danger delete-planilla-btn" id="planilla" disabled>
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <label class="form-label small">
                                            Los formatos soportados son: <code>.xlsx</code>, <code>.xls</code> y <code>.csv</code> con un tamaño máximo de <code>5mb</code>.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-2">
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-danger me-2 cancel-btn" data-url="<?php echo e(route('dashboard')); ?>">Cancelar</button>
                                        <button type="button" class="btn btn-outline-success save-btn">Importar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(session('errores')): ?>
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Errores Encontrados</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 alert alert-danger" role="alert">
                                        <table class="table">
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="text-white border-end" width="20%">Hoja</th>
                                                    <th class="text-white border-end" width="20%">Columna</th>
                                                    <th class="text-white border-end" width="10%">Fila</th>
                                                    <th class="text-white" width="50%">Descripción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = session('errores'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="text-white border-end text-center"><?php echo e($error['hoja']); ?></td>
                                                        <td class="text-white border-end text-center">
                                                            <?php if(is_array($error['columna'])): ?>
                                                                <?php $__currentLoopData = $error['columna']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $columna): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php echo e($columna); ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <?php echo e($error['columna']); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-white border-end text-center"><?php echo e($error['fila']); ?></td>
                                                        <td class="text-white">
                                                            <?php if(is_array($error['error'])): ?>
                                                                <?php $__currentLoopData = $error['error']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php echo e($message); ?> <br>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <?php echo e($error['error']); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
        <!-- Container-fluid Ends-->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('custom/js/certificates/import.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/certificates/import.blade.php ENDPATH**/ ?>