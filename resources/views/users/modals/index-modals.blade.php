<!-- showModal -->
    <div class="modal fade flip" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModal" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-toggle-wrapper text-start">
                    <div class="modal-header">
                        <h5 class="modal-title">Visualizar Usuario</h5>
                        <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="nombre-show">Nombre</label>
                                <input type="text" class="form-control" id="nombre-show" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="rol-show">Rol</label>
                                <input type="text" class="form-control" id="rol-show" readonly>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label" for="email-show">Correo Electrónico</label>
                                <input type="text" class="form-control" id="email-show" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="estado-show">Estado</label>
                                <input type="text" class="form-control" id="estado-show" readonly>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /showModal -->

@can('users.create')
    <!-- createModal -->
        <div class="modal fade flip" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-toggle-wrapper text-start">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Usuario</h5>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" id="store-form">
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label" for="nombre">Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="rol">Rol (*)</label>
                                    <select class="form-select" id="rol" name="rol">

                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="email">Correo Electrónico (*)</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="contrasena">Contraseña (*)</label>
                                    <input type="password" class="form-control" id="contrasena" name="contrasena">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="estado">Estado</label>
                                    <input type="text" class="form-control" id="estado" value="Activo" readonly>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-outline-danger me-2" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-outline-success" id="save-btn" data-url="{{ route('users.store') }}">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /createModal -->
@endcan

@can('users.edit')
    <!-- editModal -->
        <div class="modal fade flip" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-toggle-wrapper text-start">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Usuario</h5>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" id="update-form">
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label" for="nombre-edit">Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombre-edit" name="nombre">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="rol-edit">Rol (*)</label>
                                    <select class="form-select" id="rol-edit" name="rol">

                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label" for="email-edit">Correo Electrónico (*)</label>
                                    <input type="text" class="form-control" id="email-edit" name="email">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="estado-edit">Estado</label>
                                    <select class="form-select" id="estado-edit" name="estado">
                                        <option value="">Seleccionar...</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="form-label" for="new_password-edit">Nueva Contraseña</label>
                                    <input type="password" class="form-control" id="new_password-edit" name="new_password">
                                </div>
                                <div class="col-md-6">
                                    <label for="form-label" for="new_password_confirmation-edit">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" id="new_password_confirmation-edit" name="new_password_confirmation">
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-outline-danger me-2" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-outline-success" id="update-btn">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /editModal -->
@endcan