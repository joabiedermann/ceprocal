{{-- @can('courses.edit') --}}
    @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
    @endsection
    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Actualizar Curso</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Cursos</li>
                            <li class="breadcrumb-item active">Actualizar Curso</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3" action="{{ route('courses.update', $course->id) }}" method="post" id="store-form">
                @csrf
                <div class="row g-2">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="nombre">Nombre (*)</label>
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $course->name) }}" autofocus>
                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3  mb-3">
                                        <label class="form-label" for="docente">Docente (*)</label>
                                        <select class="form-select @error('docente') is-invalid @enderror" id="docente" name="docente">
                                            <option value="" selected disabled>Seleccionar...</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" @if (old('docente') == strval($teacher->id) || $course->teacher_id == strval($teacher->id)) selected @endif>{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('docente')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 d-flex justify-content-end">
                                        <div class="col-md-3 text-center">
                                            <label class="form-label" for="estado">Estado (*)</label>
                                            <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado">
                                                <option value="" selected disabled>Seleccionar...</option>
                                                <option value="1" @if (old('estado') == '1' || $course->status == 1) selected @endif>Activo</option>
                                                <option value="0" @if (old('estado') == '0' || $course->status == 0) selected @endif>Inactivo</option>
                                            </select>
                                            @error('estado')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3 text-center">
                                        <label class="form-label" for="fecha_inicio">Fecha Inicio (*)</label>
                                        <input type="date" class="form-control text-center @error('fecha_inicio') is-invalid @enderror" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio', $course->start_date) }}">
                                        @error('fecha_inicio')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-3 text-center">
                                        <label class="form-label" for="fecha_fin">Fecha Fin (*)</label>
                                        <input type="date" class="form-control text-center @error('fecha_fin') is-invalid @enderror" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin', $course->end_date) }}">
                                        @error('fecha_fin')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-3 text-center">
                                        <label class="form-label" for="horas">Cant. Horas (*)</label>
                                        <div class="input-group @error('horas') is-invalid @enderror">
                                            <input type="text" class="form-control text-center @error('horas') is-invalid @enderror" id="horas" name="horas" value="{{ old('horas', $course->hours) }}">
                                            <span class="input-group-text">horas</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-2">
                                    <div class="col-md-12 text-end">
                                        <button type="button" class="btn btn-outline-danger me-2 cancel-btn" data-url="{{ route('courses.index') }}">Cancelar</button>
                                        <button type="button" class="btn btn-outline-success save-btn" data-url="{{ route('courses.update', $course->id) }}">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Módulos del Curso</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-1 text-center">
                                        <label class="form-label" for="modulo">Módulo (*)</label>
                                    </div>
                                    <div class="col-md-10 text-center">
                                        <label class="form-label" for="descripcion">Descripción (*)</label>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <label class="form-label" for="acciones">Acciones</label>
                                    </div>
                                </div>
                                @foreach ($course->modules as $key => $module)
                                    <div class="row g-2 align-items-center fila" id="fila-{{ $key }}" data-id="{{ $key }}">
                                        <div class="col-md-1 mb-3 text-center">
                                            <input type="text" class="form-control form-control-sm text-center @error('detalles.' . $key . '.modulo') is-invalid @enderror modulo modulo-{{ $key }}" id="modulo-{{ $key }}" name="detalles[{{ $key }}][modulo]" value="{{ old('detalles.' . $key . '.modulo', $module->module) }}" data-id="{{ $key }}">
                                        </div>
                                        <div class="col-md-10 mb-3 text-center">
                                            <textarea class="form-control form-control-sm @error('detalles.' . $key . '.descripcion') is-invalid @enderror descripcion descripcion-{{ $key }}" id="descripcion-{{ $key }}" name="detalles[{{ $key }}][descripcion]" cols="30" rows="3" data-id="{{ $key }}">{{ old('detalles.' . $key . '.descripcion', $module->description) }}</textarea>
                                        </div>
                                        <div class="col-md-1 mb-3 text-center">
                                            <button type="button" class="btn btn-sm btn-outline-danger delete-row-btn" id="delete-row-btn-{{ $key }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Eliminar línea" data-id="{{ $key }}"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                                <div id="fila-nueva">

                                </div>
                                <div class="row g-2">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-sm btn-outline-success" id="add-row-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Agregar línea"><i class="fa fa-plus"></i>&nbsp;Agregar</button>
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
        <script src="{{ asset('custom/js/courses/edit.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2/spanish.js') }}"></script>
        <script src="{{ asset('assets/js/cleave/cleave.min.js') }}"></script>
    @endsection
{{-- @endcan --}}