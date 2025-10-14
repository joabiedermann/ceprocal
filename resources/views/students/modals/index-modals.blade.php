<!-- showModal -->
    <div class="modal fade flip" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModal" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-toggle-wrapper text-start">
                    <div class="modal-header">
                        <h5 class="modal-title">Visualizar Estudiante</h5>
                        <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="nombre-show">Nombre</label>
                                <input type="text" class="form-control" id="nombre-show" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="documento-show">Documento N°</label>
                                <input type="text" class="form-control" id="documento-show" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="telefono-show">N° Teléfono</label>
                                <input type="text" class="form-control" id="telefono-show" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="estado-show">Estado</label>
                                <input type="text" class="form-control" id="estado-show" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="email-show">Correo Electrónico</label>
                                <input type="text" class="form-control" id="email-show" readonly>
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