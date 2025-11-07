@can('forums_certificates.show_shipment')
    @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
    @endsection

    @include('layouts.messages-scripts')
    @include('forums_certificates.modals.show-modals')

    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Enviar Certificados de Foros</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Certificados de Foros</li>
                            <li class="breadcrumb-item active">Enviar Certificados de Foros</li>
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row g-2">
                                            <div class="col-lg-9">
                                                <h5 class="card-title">Datos del Foro</h5>
                                            </div>
                                            @can('forums_certificates.generate_pdf')
                                                <div class="col-lg-3 text-end">
                                                    <a type="button" class="btn btn-outline-primary me-2 generate-btn" data-url="{{ route('forums_certificates.generate_pdf', $forum->id) }}">Generar Certificados</a>
                                                </div>
                                            @endcan
                                        </div>
                                    </div>
                                    @php
                                        $status = 'Sin Alumnos';
                                        $class = 'text-secondary';
                                        if (($forum->students->where('send_status', 'Enviado')->count() === $forum->students->count()) && $forum->students->count() !== 0) {
                                            $status = 'Completado';
                                            $class = 'text-success';
                                        } else if (($forum->students->where('send_status', 'Error')->count() !== 0)&& $forum->students->count() !== 0) {
                                            $status = 'Con Error';
                                            $class = 'text-danger';
                                        } else if (($forum->students->where('send_status', 'Pendiente')->count() === $forum->students->count()) && $forum->students->count() !== 0) {
                                            $status = 'Pendiente';
                                            $class = 'text-warning';
                                        }
                                    @endphp
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label" for="nombre">Nombre</label>
                                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ $forum->name }}" readonly>
                                                @error('nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="fecha">Fecha</label>
                                                <input type="text" class="form-control text-center @error('fecha') is-invalid @enderror" id="fecha" name="fecha" value="{{ $forum->date }}" readonly>
                                                @error('fecha')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-2 mb-3 text-center">
                                                <label class="form-label" for="horas">Cant. Horas</label>
                                                <input type="text" class="form-control text-center @error('horas') is-invalid @enderror" id="horas" name="horas" value="{{ $forum->hours }} {{ $forum->text_hours }}" readonly>
                                            </div>
                                            <div class="col-md-3 d-flex justify-content-end">
                                                <div class="col-md-8 text-center">
                                                    <label class="form-label" for="estado">Estado</label>
                                                    <input type="text" class="form-control text-center fw-bold {{ $class }}" id="estado" value="{{ $status }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-md-12 text-end">
                                            <a type="button" class="btn btn-outline-danger me-2 cancel-btn" data-url="{{ route('forums_certificates.shipments') }}">Volver</a>
                                            @if ($forum->certificates_generated == 1)
                                                @can('forums_certificates.send')
                                                    @if ($status === 'Pendiente' || $status === 'Con Error')
                                                        <a type="button" class="btn btn-outline-primary send-massive-btn" data-url="{{ route('forums_certificates.send_massive', $forum->id) }}"><i class="fa fa-send"></i>Envío Masivo</a>
                                                    @endif
                                                @endcan
                                            @endif
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
                                                <h5 class="card-title">Participantes del Foro</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            @if ($forum->students->count() !== 0)
                                                <div class="row g-2 d-flex justify-content-center">
                                                    <div class="col-md-3 text-center">
                                                        <label class="form-label" for="modulo">Participante</label>
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
                                                @foreach ($forum->students as $key => $forum_student)
                                                    <div class="row g-2 d-flex justify-content-center" id="fila-{{ $key }}">
                                                        <div class="col-md-3 text-center">
                                                            <input type="text" class="form-control form-control-sm" id="nombre-{{ $key }}" value="{{ $forum_student->student->name }}" readonly>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            <input class="form-control form-control-sm text-center" id="documento-{{ $key }}" value="{{ $forum_student->student->document_number }}" data-id="{{ $key }}" readonly>
                                                        </div>
                                                        <div class="col-md-3 text-center">
                                                            <div class="input-group">
                                                                <input class="form-control form-control-sm" id="correo-{{ $key }}" value="{{ $forum_student->student->email }}" readonly>
                                                                <button class="btn btn-outline-warning edit-email-btn" type="button" data-bs-toggle="modal" data-bs-target="#UpdateStudentEmail" data-url="{{ route('students.get_email', $forum_student->student->id) }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Editar Correo Electrónico"><i class="fa fa-pencil"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 text-center">
                                                            <input class="form-control form-control-sm text-center" id="fecha_envio-{{ $key }}" @if($forum_student->send_date) value="{{ Carbon\Carbon::parse($forum_student->send_date)->format('d/m/Y H:i:s') }}" @else value="---" @endif readonly>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            <span class="badge
                                                                @switch($forum_student->send_status)
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
                                                            ">{{ $forum_student->send_status }}</span>
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            @if ($forum->certificates_generated == 1)
                                                                @can('forums_certificates.send')
                                                                    <button type="button" class="btn btn-sm btn-outline-primary send-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Enviar Certificado Individual" data-url="{{ route('forums_certificates.send', $forum_student->id) }}"><i class="fa fa-send"></i></button>
                                                                @endcan
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row g-2">
                                                    <div class="col-md-12 text-center">
                                                        <h6>El foro no cuenta con participantes</h6>
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
        <script src="{{ asset('custom/js/forums_certificates/show_shipment.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/cleave/cleave.min.js') }}"></script>
        <script>
            window.update_email_url = "{{ url('students/update_email') }}";
        </script>
    @endsection
@endcan