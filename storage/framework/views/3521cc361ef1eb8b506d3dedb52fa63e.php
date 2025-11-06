<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('courses.edit')): ?>
    <!-- createCompanyModal -->
        <div class="modal fade flip" id="createCompanyModal" tabindex="-1" role="dialog" aria-labelledby="createCompanyModal" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-toggle-wrapper text-start">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Asociado</h5>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" id="store-form" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12">
                                    <label class="form-label" for="nombre">Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label mb-3" for="logo">Logo (*)</label>
                                    <div class="input-group mb-2">
                                        <input type="file" class="form-control <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> logo" id="logo" name="logo" aria-describedby="logo" aria-label="Upload" accept=".jpg, .jpeg, .png">
                                        <button class="btn btn-outline-danger delete-logo-btn" id="logo" type="button" data-url="<?php echo e(asset('storage/no-image.png')); ?>" disabled>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                    <label class="form-label small">
                                        Los formatos soportados son: <code>.jpg</code>, <code>.jpeg</code> y <code>.png</code> con un tamaño máximo de <code>5mb</code>.
                                    </label>
                                </div>
                                <div class="col-md-12">
                                        <label class="form-label" for="vista">Visualización Previa</label>
                                        <div class="text-center">
                                            <img src="<?php echo e(asset('storage/no-image.png')); ?>" class="vista" alt="Imagen" id="vista" style="width: 190px; height:190px;">
                                        </div>
                                    </div>
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-outline-danger me-2" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-outline-success" id="save-btn" data-url="<?php echo e(route('courses.store_company', $course->id)); ?>">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /createCompanyModal -->
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('courses.edit')): ?>
    <!-- editCompanyModal -->
        <div class="modal fade flip" id="editCompanyModal" tabindex="-1" role="dialog" aria-labelledby="editCompanyModal" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-toggle-wrapper text-start">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Asociado</h5>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" action="<?php echo e(route('courses.update_company', 1)); ?>" id="update-form" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12">
                                    <label class="form-label" for="nombre">Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombre-edit" name="nombre">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label mb-3" for="logo">Logo</label>
                                    <div class="input-group mb-2">
                                        <input type="file" class="form-control <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> logo" id="logo-edit" name="logo" aria-describedby="logo" aria-label="Upload" accept=".jpg, .jpeg, .png">
                                        <button class="btn btn-outline-danger delete-logo-btn" id="logo" type="button" data-url="<?php echo e(asset('storage/no-image.png')); ?>" disabled>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                    <label class="form-label small">
                                        Los formatos soportados son: <code>.jpg</code>, <code>.jpeg</code> y <code>.png</code> con un tamaño máximo de <code>5mb</code>.
                                    </label>
                                </div>
                                <div class="col-md-12">
                                        <label class="form-label" for="vista">Visualización Previa</label>
                                        <div class="text-center">
                                            <img src="<?php echo e(asset('storage/no-image.png')); ?>" class="vista" alt="Imagen" id="vista-edit" style="width: 190px; height:190px;">
                                        </div>
                                    </div>
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-outline-danger me-2" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-outline-success" id="update-btn">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /editCompanyModal -->
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students.edit')): ?>
    <!-- updateStudentEmail -->
        <div class="modal fade flip" id="updateStudentEmail" tabindex="-1" role="dialog" aria-labelledby="updateStudentEmail" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-toggle-wrapper text-start">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Correo Electrónico</h5>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" id="store-email-form">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-6">
                                    <label class="form-label" for="name">Alumno</label>
                                    <input type="text" class="form-control" id="name-email" readonly>
                                    <input type="hidden" id="id" name="id">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="document_number">C.I. N°</label>
                                    <input type="text" class="form-control" id="document_number-email" readonly>
                                    <input type="hidden" id="id" name="id">
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <label class="form-label" for="email">Correo Electrónico (*)</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email-email" name="email">
                                    <input type="hidden" id="id" name="id">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-outline-danger me-2" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-outline-success" id="save-email-btn">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /updateStudentEmail -->
<?php endif; ?><?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/certificates/modals/show-modals.blade.php ENDPATH**/ ?>