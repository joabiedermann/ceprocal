@can('company.show')
    @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
    @endsection

    @include('layouts.messages-scripts')

    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Visualizar Parámetros</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
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
                                        <input type="text" class="form-control" id="nombre_fantasia" name="nombre_fantasia" value="{{ $company->fantasy_name }}" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="razon_social">Razón Social</label>
                                        <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ $company->real_name }}" readonly>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="ruc">R.U.C.</label>
                                        <input type="text" class="form-control" id="ruc" name="ruc" value="{{ $company->document_number }}" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="email">Correo Electrónico</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $company->email }}" readonly>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="telefono">N° de Teléfono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $company->phone_number }}" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="pais">País</label>
                                        <input type="text" class="form-control" id="pais" name="pais" value="{{ $company->country }}" readonly>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="ciudad">Ciudad</label>
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $company->city }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="actividad">Actividad Principal</label>
                                        <input type="text" class="form-control" id="actividad" name="actividad" value="{{ $company->activity }}" readonly>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label class="form-label" for="direccion">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $company->address }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-2">
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <a type="button" class="btn btn-outline-danger me-2" href="{{ route('dashboard') }}">Volver</a>
                                        @can('company.edit')
                                            <a type="button" class="btn btn-outline-warning" href="{{ route('company.edit', $company->id) }}">Editar</a>
                                        @endcan
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
                                            <a href="{{ asset($company->logo) }}" target="_blank">
                                                <img src="{{asset($company->logo)}}" alt="Imagen" id="vista" style="width: 305px; height:305px;">
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
    @endsection
    @section('scripts')
        <script src="{{ asset('custom/js/companies/show.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
    @endsection
@endcan