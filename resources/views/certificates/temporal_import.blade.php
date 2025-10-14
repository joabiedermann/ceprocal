{{-- @can('certificates.upload') --}}
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
                            <li class="breadcrumb-item">Certificados</li>
                            <li class="breadcrumb-item active">Importar Planilla</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3" action="{{ route('certificates.upload') }}" id="store-form" enctype="multipart/form-data">
                <div class="row g-2">
                    <div class="col-md-8 mb-3">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row g-2">
                                            <h5 class="card-title">Datos del Curso</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="nombre">Nombre (*)</label>
                                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ $course->name }}">
                                                @error('nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="fecha_inicio">Fecha Inicio (*)</label>
                                                <input type="date" class="form-control text-center @error('fecha_inicio') is-invalid @enderror" id="fecha_inicio" name="fecha_inicio" value="{{ $course->start_date }}">
                                                @error('fecha_inicio')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="fecha_fin">Fecha Fin (*)</label>
                                                <input type="date" class="form-control text-center @error('fecha_fin') is-invalid @enderror" id="fecha_fin" name="fecha_fin" value="{{ $course->end_date }}">
                                                @error('fecha_fin')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="horas">Cant. Horas (*)</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control text-center @error('horas') is-invalid @enderror" id="horas" name="horas" value="{{ $course->hours }}" readonly>
                                                    <span class="input-group-text">horas</span>
                                                    @error('horas')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="docente">Docente (*)</label>
                                                <input type="text" class="form-control @error('docente') is-invalid @enderror" id="docente" name="docente" value="{{ $teacher->name }}">
                                                @error('docente')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="documento_docente">C.I. N° (*)</label>
                                                <input type="text" class="form-control text-center documento @error('documento_docente') is-invalid @enderror" id="documento_docente" name="documento_docente" value="{{ $teacher->document_number }}">
                                                @error('documento_docente')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="telefono_docente">N° de Teléfono (*)</label>
                                                <input type="text" class="form-control text-center documento @error('telefono_docente') is-invalid @enderror" id="telefono_docente" name="telefono_docente" value="{{ $teacher->phone_number }}">
                                                @error('telefono_docente')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="correo_docente">Correo Electrónico (*)</label>
                                                <input type="text" class="form-control documento @error('correo_docente') is-invalid @enderror" id="correo_docente" name="correo_docente" value="{{ $teacher->email }}">
                                                @error('correo_docente')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
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
                                                <h5 class="card-title">Estudiantes del Curso</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="row g-2">
                                                <div class="col-md-4 text-center">
                                                    <label class="form-label" for="modulo">Estudiante (*)</label>
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
                                                        <input type="text" class="form-control form-control-sm @error('estudiantes.' . $key . '.nombre') is-invalid @enderror nombre nombre-{{ $key }}" id="nombre-{{ $key }}" name="estudiantes[{{ $key }}][nombre]" value="{{ old('estudiantes.' . $key . '.nombre', $student['name']) }}" data-id="{{ $key }}">
                                                        @error('estudiantes.' . $key . '.nombre')
                                                            <span class="invalid-feedback" role="alert"></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <input class="form-control form-control-sm text-center @error('estudiantes.' . $key . '.documento') is-invalid @enderror documento documento-{{ $key }}" id="documento-{{ $key }}" name="estudiantes[{{ $key }}][documento]" value="{{ old('estudiantes.' . $key . '.documento', $student['document_number']) }}" data-id="{{ $key }}"></input>
                                                        @error('estudiantes.' . $key . '.documento')
                                                            <span class="invalid-feedback" role="alert"></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <input class="form-control form-control-sm text-center @error('estudiantes.' . $key . '.telefono') is-invalid @enderror telefono telefono-{{ $key }}" id="telefono-{{ $key }}" name="estudiantes[{{ $key }}][telefono]" value="{{ old('estudiantes.' . $key . '.telefono', $student['phone_number']) }}" data-id="{{ $key }}"></input>
                                                        @error('estudiantes.' . $key . '.telefono')
                                                            <span class="invalid-feedback" role="alert"></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <input class="form-control form-control-sm @error('estudiantes.' . $key . '.correo') is-invalid @enderror correo correo-{{ $key }}" id="correo-{{ $key }}" name="estudiantes[{{ $key }}][correo]" value="{{ old('estudiantes.' . $key . '.correo', $student['email']) }}" data-id="{{ $key }}"></input>
                                                        @error('estudiantes.' . $key . '.correo')
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
                                <a type="button" class="btn btn-danger me-2 cancel-btn" data-url="{{ route('certificates.import') }}">Cancelar</a>
                                <a type="button" class="btn btn-success save-btn" data-url="{{ route('certificates.store') }}">Confirmar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Módulos del Curso</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="row g-2">
                                        <div class="col-md-2 text-center">
                                            <label class="form-label" for="modulo">Módulo (*)</label>
                                        </div>
                                        <div class="col-md-10 text-center">
                                            <label class="form-label" for="descripcion">Descripción (*)</label>
                                        </div>
                                    </div>
                                    @foreach ($modules as $key => $module)
                                        <div class="row g-2 align-items-center fila fila-module" id="fila-{{ $key }}" data-id="{{ $key }}">
                                            <div class="col-md-2 text-center">
                                                <textarea class="form-control form-control-sm text-center @error('modulos.' . $key . '.modulo') is-invalid @enderror modulo modulo-{{ $key }}" id="modulo-{{ $key }}" name="modulos[{{ $key }}][modulo]" cols="30" rows="5" data-id="{{ $key }}" style="resize: none; overflow: auto;">{{ old('modulos.' . $key . '.modulo', $module['number']) }}</textarea>
                                            </div>
                                            <div class="col-md-10 text-center">
                                                <textarea class="form-control form-control-sm @error('modulos.' . $key . '.descripcion') is-invalid @enderror descripcion descripcion-{{ $key }}" id="descripcion-{{ $key }}" name="modulos[{{ $key }}][descripcion]" cols="30" rows="5" data-id="{{ $key }}">{{ old('modulos.' . $key . '.descripcion', $module['description']) }}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
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
        <script src="{{ asset('custom/js/certificates/temporal_import.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/cleave/cleave.min.js') }}"></script>
    @endsection
{{-- @endcan --}}