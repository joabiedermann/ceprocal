<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('certificates.shipments')): ?>
        
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastify.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('breadcrumb-title'); ?>
        <h4>Lista de Envíos de Certificados</h4>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('breadcrumb-items'); ?>
        <li class="breadcrumb-item">Envíos de Certificados</li>
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.messages-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Lista de Envíos de Certificados</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Envíos de Certificados</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive custom-scrollbar">
                                <div id="table_wrapper" class="dataTables_wrapper no-footer">
                                    <table class="display dataTable" id="table" role="grid" aria-describedby="table_info">
                                        <thead class="text-center">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="table" rowspan="1" colspan="1" aria-sort="ascending" width="30%">Curso</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="25%">Docente</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="10%">Cant. Alumnos</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="10%">Enviados</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="10%">Estado</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><?php echo e($course->name); ?></td>
                                                    <td class="text-center"><?php echo e($course->teacher->name); ?></td>
                                                    <td class="text-center"><?php echo e($course->students->count()); ?></td>
                                                    <td class="text-center"><?php echo e($course->students->where('send_status', 'Enviado')->count()); ?></td>
                                                    <td class="text-center fw-bold <?php echo e($class); ?>"><?php echo e($status); ?></td>
                                                    <td class="d-flex justify-content-center">
                                                        <ul class="action">
                                                            <li class="me-2">
                                                                <a href="<?php echo e(route('certificates.show_shipment', $course->id)); ?>" class="btn btn-xs btn-outline-primary" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </li>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('certificates.send')): ?>
                                                                <?php if(($status === 'Pendiente' || $status === 'Con Error') && $course->certificates_generated == 1): ?>
                                                                    <li class="me-2">
                                                                        <a href="#" class="btn btn-xs btn-outline-info send-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Envío Masivo (pendientes/errores)" data-url="<?php echo e(route('certificates.massive_send', $course->id)); ?>">
                                                                            <i class="fa fa-send"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('custom/js/certificates/index.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/certificates/shipments.blade.php ENDPATH**/ ?>