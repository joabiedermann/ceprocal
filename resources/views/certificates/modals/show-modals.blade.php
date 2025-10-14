{{-- @can('courses.edit') --}}
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
                                @csrf
                                <div class="col-md-12">
                                    <label class="form-label" for="nombre">Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label mb-3" for="logo">Logo (*)</label>
                                    <div class="input-group mb-2">
                                        <input type="file" class="form-control @error('logo') is-invalid @enderror logo" id="logo" name="logo" aria-describedby="logo" aria-label="Upload" accept=".jpg, .jpeg, .png">
                                        <button class="btn btn-outline-danger delete-logo-btn" id="logo" type="button" data-url="{{ asset('storage/no-image.png') }}" disabled>
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
                                            <img src="{{asset('storage/no-image.png')}}" class="vista" alt="Imagen" id="vista" style="width: 190px; height:190px;">
                                        </div>
                                    </div>
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-outline-danger me-2" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-outline-success" id="save-btn" data-url="{{ route('courses.store_company', $course->id) }}">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /createCompanyModal -->
{{-- @endcan --}}

{{-- @can('courses.edit') --}}
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
                            <form class="row g-3" action="{{ route('courses.update_company', 1) }}" id="update-form" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label class="form-label" for="nombre">Nombre (*)</label>
                                    <input type="text" class="form-control" id="nombre-edit" name="nombre">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label mb-3" for="logo">Logo</label>
                                    <div class="input-group mb-2">
                                        <input type="file" class="form-control @error('logo') is-invalid @enderror logo" id="logo-edit" name="logo" aria-describedby="logo" aria-label="Upload" accept=".jpg, .jpeg, .png">
                                        <button class="btn btn-outline-danger delete-logo-btn" id="logo" type="button" data-url="{{ asset('storage/no-image.png') }}" disabled>
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
                                            <img src="{{asset('storage/no-image.png')}}" class="vista" alt="Imagen" id="vista-edit" style="width: 190px; height:190px;">
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
{{-- @endcan --}}

{{-- @can('students.edit') --}}
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
{{-- @endcan --}}