@can('students.edit')
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
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label" for="name">Participante</label>
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
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email-email" name="email">
                                    <input type="hidden" id="id" name="id">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
@endcan