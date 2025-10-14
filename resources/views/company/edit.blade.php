@can('company.edit')
    @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
    @endsection
    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Actualizar Parámetros</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Parámetros</li>
                            <li class="breadcrumb-item active">Actualizar Parámetros</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3" action="{{ route('company.update', $company->id) }}" method="post" id="store-form" enctype="multipart/form-data">
                @csrf
                <div class="row g-2">
                    <div class="col-md-8 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-2 d-flex justify-content-center">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="nombre_fantasia">Nombre Fantasía (*)</label>
                                        <input type="text" class="form-control @error('nombre_fantasia') is-invalid @enderror" id="nombre_fantasia" name="nombre_fantasia" value="{{ old('nombre_fantasia', $company->fantasy_name) }}" autofocus>
                                        @error('nombre_fantasia')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="razon_social">Razón Social (*)</label>
                                        <input type="text" class="form-control @error('razon_social') is-invalid @enderror" id="razon_social" name="razon_social" value="{{ old('razon_social', $company->real_name) }}" >
                                        @error('razon_social')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="ruc">R.U.C. (*)</label>
                                        <input type="text" class="form-control @error('ruc') is-invalid @enderror" id="ruc" name="ruc" value="{{ old('ruc', $company->document_number) }}" >
                                        @error('ruc')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="email">Correo Electrónico (*)</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $company->email) }}" >
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="telefono">N° de Teléfono (*)</label>
                                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono', $company->phone_number) }}" >
                                        @error('telefono')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="pais">País (*)</label>
                                        <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" value="{{ old('pais', $company->country) }}" >
                                        @error('pais')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="ciudad">Ciudad (*)</label>
                                        <input type="text" class="form-control @error('ciudad') is-invalid @enderror" id="ciudad" name="ciudad" value="{{ old('ciudad', $company->city) }}" >
                                        @error('ciudad')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="actividad">Actividad Principal (*)</label>
                                        <input type="text" class="form-control @error('actividad') is-invalid @enderror" id="actividad" name="actividad" value="{{ old('actividad', $company->activity) }}" >
                                        @error('actividad')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label class="form-label" for="direccion">Dirección (*)</label>
                                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ old('direccion', $company->address) }}" >
                                        @error('direccion')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-2">
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-danger me-2 cancel-btn" data-url="{{ route('dashboard') }}">Cancelar</button>
                                        <button type="button" class="btn btn-outline-success save-btn">Guardar</button>
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
                                        <label class="form-label mb-3" for="logo">Logo (*)</label>
                                        <div class="input-group mb-2">
                                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" aria-describedby="logo" aria-label="Upload" accept=".jpg, .jpeg, .png">
                                            <button class="btn btn-outline-danger delete-logo-btn" id="logo" type="button" data-url="{{ asset('storage/no-image.png') }}" disabled>
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <label class="form-label small">
                                            Los formatos soportados son: <code>.jpg</code>, <code>.jpeg</code> y <code>.png</code> con un tamaño máximo de <code>5mb</code>.
                                        </label>
                                        @if ($errors->any())
                                            <div class="alert alert-danger" role="alert">
                                                No olvide volver a subir su adjunto para poder guardar el registro.
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="vista">Visualización Previa</label>
                                        <div class="text-center">
                                            <img src="{{asset($company->logo)}}" alt="Imagen" id="vista" style="width: 190px; height:190px;">
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
        <script src="{{ asset('custom/js/companies/edit.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/cleave/cleave.min.js') }}"></script>
    @endsection
@endcan