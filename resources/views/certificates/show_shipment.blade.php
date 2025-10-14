{{-- @can('certificates.show_shipment') --}}
    @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
    @endsection

    @include('layouts.messages-scripts')
    @include('certificates.modals.show-modals')

    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Enviar Certificados</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Certificados</li>
                            <li class="breadcrumb-item active">Enviar Certificados</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form>
                <div class="row g-2">
                    <div class="col-md-12 mb-3">
                        <div class="row g-2">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row g-2">
                                            <h5 class="card-title">Datos del Curso</h5>
                                        </div>
                                    </div>
                                    @php
                                        $status = 'Sin Alumnos';
                                        $class = 'text-secondary';
                                        if (($course->students->where('send_status', 'Enviado')->count() === $course->students->count()) && $course->students->count() !== 0) {
                                            $status = 'Completado';
                                            $class = 'text-success';
                                        } else if (($course->students->where('send_status', 'Error')->count() !== 0)&& $course->students->count() !== 0) {
                                            $status = 'Con Error';
                                            $class = 'text-danger';
                                        } else if (($course->students->where('send_status', 'Pendiente')->count() === $course->students->count()) && $course->students->count() !== 0) {
                                            $status = 'Pendiente';
                                            $class = 'text-warning';
                                        }
                                    @endphp
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="nombre">Nombre</label>
                                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ $course->name }}" readonly>
                                                @error('nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="fecha_inicio">Fecha Inicio</label>
                                                <input type="text" class="form-control text-center @error('fecha_inicio') is-invalid @enderror" id="fecha_inicio" name="fecha_inicio" value="{{ $course->start_date }}" readonly>
                                                @error('fecha_inicio')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="fecha_fin">Fecha Fin</label>
                                                <input type="text" class="form-control text-center @error('fecha_fin') is-invalid @enderror" id="fecha_fin" name="fecha_fin" value="{{ $course->end_date }}" readonly>
                                                @error('fecha_fin')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="horas">Cant. Horas</label>
                                                <input type="text" class="form-control text-center @error('horas') is-invalid @enderror" id="horas" name="horas" value="{{ $course->hours }} {{ $course->text_hours }}" readonly>
                                            </div>
                                            <div class="col-md-3 d-flex justify-content-end">
                                                <div class="col-md-8 text-center">
                                                    <label class="form-label" for="estado">Estado</label>
                                                    <input type="text" class="form-control text-center fw-bold {{ $class }}" id="estado" value="{{ $status }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="docente">Docente</label>
                                                <input type="text" class="form-control @error('docente') is-invalid @enderror" id="docente" name="docente" value="{{ $course->teacher->name }}" readonly>
                                                @error('docente')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="documento_docente">C.I. N°</label>
                                                <input type="text" class="form-control text-center documento @error('documento_docente') is-invalid @enderror" id="documento_docente" name="documento_docente" value="{{ $course->teacher->document_number }}" readonly>
                                                @error('documento_docente')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-md-12 text-end">
                                            <a type="button" class="btn btn-outline-danger me-2" data-url="{{ route('certificates.shipments') }}">Volver</a>
                                            {{-- @can('certificates.send') --}}
                                                @if ($status === 'Pendiente' || $status === 'Con Error')
                                                    <a type="button" class="btn btn-outline-primary send-massive-btn" data-url="{{ route('certificates.massive_send', $course->id) }}"><i class="fa fa-send"></i>Envío Masivo</a>
                                                @endif
                                            {{-- @endcan --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-6">
                                                <h5 class="card-title">Asociados al Curso</h5>
                                            </div>
                                            {{-- @can('courses.edit') --}}
                                                <div class="col-md-6 text-end">
                                                    <button type="button" class="btn btn-outline-success add-company-btn" data-bs-toggle="modal" data-bs-target="#createCompanyModal" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Agregar asociado" data-url="{{ route('courses.store_company', $course->id) }}"><i class="fa fa-plus"></i>&nbsp;Agregar</button>
                                                </div>
                                            {{-- @endcan --}}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            @forelse ($course->companies as $company)
                                                <div class="col-xl-7 col-sm-9 col-xxl-6 col-ed-7 box-col-7">
                                                    <div class="card social-profile">
                                                        <div class="card-body">
                                                            <div class="mb-4">
                                                                <a href="{{ asset($company->company_logo) }}" target="_blank">
                                                                    <img src="{{ asset($company->company_logo) }}" alt="company_logo" width="200px">
                                                                </a>
                                                            </div>
                                                            <div class="social-details">
                                                                <h5 class="mb-3 text-muted">{{ $company->company_name }}</h5>
                                                                <div class="row g-2">
                                                                    <div class="col-md-6">
                                                                        <button type="button" class="btn btn-sm btn-outline-warning edit-company-btn" data-bs-toggle="modal" data-bs-target="#editCompanyModal" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Editar asociado" data-url="{{ route('courses.edit_company', $company->id) }}"><i class="fa fa-pencil"></i></button>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <button type="button" class="btn btn-sm btn-outline-danger destroy-company-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Eliminar asociado" data-url="{{ route('courses.get_destroy_company', $company->id) }}"><i class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="col-md-12">
                                                    <p>El curso no cuenta con asociados cargados.</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-12">
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
                                            @if ($course->students->count() !== 0)
                                                <div class="row g-2 d-flex justify-content-center">
                                                    <div class="col-md-3 text-center">
                                                        <label class="form-label" for="modulo">Estudiante</label>
                                                    </div>
                                                    <div class="col-md-1 text-center">
                                                        <label class="form-label" for="numero_documento">C.I. N°</label>
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <label class="form-label" for="correo">Correo Electrónico</label>
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <label class="form-label" for="fecha_envio">Fecha Envío</label>
                                                    </div>
                                                    <div class="col-md-1 text-center">
                                                        <label class="form-label" for="estado">Estado</label>
                                                    </div>
                                                    <div class="col-md-1 text-center">
                                                        <label class="form-label" for="acciones">Acciones</label>
                                                    </div>
                                                </div>
                                                @foreach ($course->students as $key => $course_student)
                                                    <div class="row g-2 d-flex justify-content-center" id="fila-{{ $key }}">
                                                        <div class="col-md-3 text-center">
                                                            <input type="text" class="form-control form-control-sm" id="nombre-{{ $key }}" value="{{ $course_student->student->name }}" readonly>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            <input class="form-control form-control-sm text-center" id="documento-{{ $key }}" value="{{ $course_student->student->document_number }}" data-id="{{ $key }}" readonly>
                                                        </div>
                                                        <div class="col-md-3 text-center">
                                                            <div class="input-group">
                                                                <input class="form-control form-control-sm" id="correo-{{ $key }}" value="{{ $course_student->student->email }}" readonly>
                                                                <button class="btn btn-outline-warning edit-email-btn" type="button" data-bs-toggle="modal" data-bs-target="#UpdateStudentEmail" data-url="{{ route('students.get_email', $course_student->student->id) }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Editar Correo Electrónico"><i class="fa fa-pencil"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 text-center">
                                                            <input class="form-control form-control-sm text-center" id="fecha_envio-{{ $key }}" @if($course_student->send_date) value="{{ Carbon\Carbon::parse($course_student->send_date)->format('d/m/Y H:i:s') }}" @else value="---" @endif readonly>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            <span class="badge
                                                                @switch($course_student->send_status)
                                                                    @case('Enviado')
                                                                        badge-success
                                                                        @break
                                                                    @case('Error')
                                                                        badge-danger
                                                                        @break
                                                                    @default
                                                                        badge-warning
                                                                        @break
                                                                @endswitch
                                                            ">{{ $course_student->send_status }}</span>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            {{-- @can('certificates.send') --}}
                                                                <button type="button" class="btn btn-sm btn-outline-primary send-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Enviar Certificado Individual" data-url="{{ route('certificates.send', $course_student->id) }}"><i class="fa fa-send"></i></button>
                                                            {{-- @endcan --}}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row g-2">
                                                    <div class="col-md-12 text-center">
                                                        <h6>El curso no cuenta con alumnos</h6>
                                                    </div>
                                                </div>
                                            @endif
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
        <script src="{{ asset('custom/js/certificates/show_shipment.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/cleave/cleave.min.js') }}"></script>
        <script>
            window.update_company_url = "{{ url('courses/update_asociate') }}";
            window.destroy_company_url = "{{ url('courses/destroy_asociate') }}";
            window.update_email_url = "{{ url('students/update_email') }}";
        </script>
    @endsection
{{-- @endcan --}}