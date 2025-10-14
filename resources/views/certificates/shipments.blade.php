{{-- @can('certificates.shipments') --}}
        @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    @endsection
    @section('breadcrumb-title')
        <h4>Lista de Envíos de Certificados</h4>
    @endsection
    @section('breadcrumb-items')
        <li class="breadcrumb-item">Envíos de Certificados</li>
    @endsection

    @include('layouts.messages-scripts')

    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Lista de Envíos de Certificados</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Envíos de Certificados</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive custom-scrollbar">
                                <div id="table_wrapper" class="dataTables_wrapper no-footer">
                                    <table class="display dataTable" id="table" role="grid" aria-describedby="table_info">
                                        <thead class="text-center">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="table" rowspan="1" colspan="1" aria-sort="ascending" width="30%">Curso</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="25%">Docente</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="10%">Cant. Alumnos</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="10%">Enviados</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="10%">Estado</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
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
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $course->name }}</td>
                                                    <td class="text-center">{{ $course->teacher->name }}</td>
                                                    <td class="text-center">{{ $course->students->count() }}</td>
                                                    <td class="text-center">{{ $course->students->where('send_status', 'Enviado')->count() }}</td>
                                                    <td class="text-center fw-bold {{ $class }}">{{ $status }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <ul class="action">
                                                            <li class="me-2">
                                                                <a href="{{ route('certificates.show_shipment', $course->id) }}" class="btn btn-xs btn-outline-primary" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </li>
                                                            {{-- @can('certificates.send') --}}
                                                                @if ($status === 'Pendiente' || $status === 'Con Error')
                                                                    <li class="me-2">
                                                                        <a href="#" class="btn btn-xs btn-outline-info send-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Envío Masivo (pendientes/errores)" data-url="{{ route('certificates.massive_send', $course->id) }}">
                                                                            <i class="fa fa-send"></i>
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            {{-- @endcan --}}
                                                            @can('certificates')
                                                                
                                                            @endcan
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    @endsection
    @section('scripts')
        <script src="{{ asset('custom/js/certificates/index.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    @endsection
{{-- @endcan --}}
