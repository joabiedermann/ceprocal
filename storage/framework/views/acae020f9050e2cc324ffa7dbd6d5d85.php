<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('courses.show')): ?>
        
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/toastify.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('breadcrumb-title'); ?>
        <h4>Lista de Cursos</h4>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('breadcrumb-items'); ?>
        <li class="breadcrumb-item">Cursos</li>
    <?php $__env->stopSection(); ?>

    <?php echo $__env->make('layouts.messages-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startSection('main_content'); ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Lista de Cursos</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">
                                    <svg class="stroke-icon">
                                        <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-home')); ?>"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Cursos</li>
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
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Docente</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Inicio <i class="fa fa-arrow-right"></i> Fin</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Cant. Horas</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="10%">Estado</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    switch ($course->status) {
                                                        case 0:
                                                            $icon = 'fa-thumbs-up';
                                                            $text_icon = 'Desbloquear';
                                                            $icon_class = 'btn-outline-success';
                                                            $class = 'text-danger';
                                                            $status = 'Inactivo';
                                                            break;
                                                        default:
                                                            $icon = 'fa-ban';
                                                            $text_icon = 'Bloquear';
                                                            $icon_class = 'btn-outline-secondary';
                                                            $class = 'text-success';
                                                            $status = 'Activo';
                                                            break;
                                                    }

                                                    switch ($course->hours) {
                                                        case 1:
                                                            $text_hours = 'hora';
                                                            break;
                                                        default:
                                                            $text_hours = 'horas';
                                                            break;
                                                    }
                                                ?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><?php echo e($course->name); ?></td>
                                                    <td class="text-center"><?php echo e($course->teacher->name); ?></td>
                                                    <td class="text-center"><?php echo e(Carbon\Carbon::parse($course->start_date)->format('d/m/Y')); ?> <i class="fa fa-arrow-right"></i> <?php echo e(Carbon\Carbon::parse($course->end_date)->format('d/m/Y')); ?></td>
                                                    <td class="text-center"><?php echo e($course->hours); ?> <?php echo e($text_hours); ?></td>
                                                    <td class="text-center fw-bold <?php echo e($class); ?>"><?php echo e($status); ?></td>
                                                    <td class="d-flex justify-content-center">
                                                        <ul class="action">
                                                            <li class="me-2">
                                                                <a href="<?php echo e(route('courses.show', $course->id)); ?>" class="btn btn-xs btn-outline-primary" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </li>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('courses.edit')): ?>
                                                                <li class="me-2">
                                                                    <a href="<?php echo e(route('courses.edit', $course->id)); ?>" class="btn btn-xs btn-outline-warning" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('courses.edit_status')): ?>
                                                                <li class="me-2">
                                                                    <a href="#" class="btn btn-xs <?php echo e($icon_class); ?> status-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="<?php echo e($text_icon); ?>" data-url="<?php echo e(route('courses.get_status', $course->id)); ?>">
                                                                        <i class="fa <?php echo e($icon); ?>"></i>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('courses.destroy')): ?>
                                                                <li>
                                                                    <a href="#" class="btn btn-xs btn-outline-danger destroy-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar" data-url="<?php echo e(route('courses.get_destroy', $course->id)); ?>">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </li>
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
        <script src="<?php echo e(asset('custom/js/courses/index.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/toastify/toastify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweetalert/sweetalert.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.simple.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/courses/index.blade.php ENDPATH**/ ?>