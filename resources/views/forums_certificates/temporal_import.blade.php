@can('forums_certificates.upload')
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
                        <h4>Importar Planilla</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Certificados de Foros</li>
                            <li class="breadcrumb-item active">Importar Planilla</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3" action="{{ route('forums_certificates.upload') }}" id="store-form" enctype="multipart/form-data">
                <div class="row g-2">
                    <div class="col-md-12 mb-3">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row g-2">
                                            <h5 class="card-title">Datos del Foro</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="nombre">Nombre (*)</label>
                                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ $forum->name }}">
                                                @error('nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="fecha">Fecha (*)</label>
                                                <input type="date" class="form-control text-center @error('fecha') is-invalid @enderror" id="fecha" name="fecha" value="{{ $forum->date }}">
                                                @error('fecha')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="horas">Cant. Horas (*)</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control text-center @error('horas') is-invalid @enderror" id="horas" name="horas" value="{{ $forum->hours }}" readonly>
                                                    <span class="input-group-text">horas</span>
                                                    @error('horas')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-6">
                                                <h5 class="card-title">Participantes del Foro</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="row g-2">
                                                <div class="col-md-4 text-center">
                                                    <label class="form-label" for="modulo">Participante (*)</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <label class="form-label" for="numero_documento">C.I. N° (*)</label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <label class="form-label" for="telefono">N° de Teléfono</label>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <label class="form-label" for="correo">Correo Electrónico (*)</label>
                                                </div>
                                            </div>
                                            @foreach ($students as $key => $student)
                                                <div class="row g-2 fila fila-student" id="fila-{{ $key }}" data-id="{{ $key }}">
                                                    <div class="col-md-4 text-center">
                                                        <input type="text" class="form-control form-control-sm @error('participantes.' . $key . '.nombre') is-invalid @enderror nombre nombre-{{ $key }}" id="nombre-{{ $key }}" name="participantes[{{ $key }}][nombre]" value="{{ old('participantes.' . $key . '.nombre', $student['name']) }}" data-id="{{ $key }}">
                                                        @error('participantes.' . $key . '.nombre')
                                                            <span class="invalid-feedback" role="alert"></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <input class="form-control form-control-sm text-center @error('participantes.' . $key . '.documento') is-invalid @enderror documento documento-{{ $key }}" id="documento-{{ $key }}" name="participantes[{{ $key }}][documento]" value="{{ old('participantes.' . $key . '.documento', $student['document_number']) }}" data-id="{{ $key }}"></input>
                                                        @error('participantes.' . $key . '.documento')
                                                            <span class="invalid-feedback" role="alert"></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <input class="form-control form-control-sm text-center @error('participantes.' . $key . '.telefono') is-invalid @enderror telefono telefono-{{ $key }}" id="telefono-{{ $key }}" name="participantes[{{ $key }}][telefono]" value="{{ old('participantes.' . $key . '.telefono', $student['phone_number']) }}" data-id="{{ $key }}"></input>
                                                        @error('participantes.' . $key . '.telefono')
                                                            <span class="invalid-feedback" role="alert"></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <input class="form-control form-control-sm @error('participantes.' . $key . '.correo') is-invalid @enderror correo correo-{{ $key }}" id="correo-{{ $key }}" name="participantes[{{ $key }}][correo]" value="{{ old('participantes.' . $key . '.correo', $student['email']) }}" data-id="{{ $key }}"></input>
                                                        @error('participantes.' . $key . '.correo')
                                                            <span class="invalid-feedback" role="alert"></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <a type="button" class="btn btn-danger me-2 cancel-btn" data-url="{{ route('forums_certificates.import') }}">Cancelar</a>
                                <a type="button" class="btn btn-success save-btn" data-url="{{ route('forums_certificates.store') }}">Confirmar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Container-fluid Ends-->
    @endsection
    @section('scripts')
        <script src="{{ asset('custom/js/forums_certificates/temporal_import.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/cleave/cleave.min.js') }}"></script>
    @endsection
@endcan