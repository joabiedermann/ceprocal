
    <!-- inactivateModal -->
        <div class="modal fade flip" id="inactivateModal" tabindex="-1" role="dialog" aria-labelledby="inactivateModal" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-toggle-wrapper text-start">
                        <div class="modal-header">
                            <h5 class="modal-title">Desactivar Usuario</h5>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" id="inactivate-form">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-12 text-center">
                                    <label class="form-label" for="contrasena">Contraseña (*)</label>
                                    <input type="password" class="form-control" id="contrasena" name="contrasena">
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-danger inactivate-btn" data-url="<?php echo e(route('profiles.inactivate', $user->id)); ?>">Desactivar</button>
                                    <button type="button" class="btn btn-outline-light me-2" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /inactivateModal -->
<?php /**PATH C:\xampp\htdocs\ceprocal\resources\views/users/profiles/modals/show-modals.blade.php ENDPATH**/ ?>