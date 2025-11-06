@can('courses.show')
        @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    @endsection
    @section('breadcrumb-title')
        <h4>Lista de Cursos</h4>
    @endsection
    @section('breadcrumb-items')
        <li class="breadcrumb-item">Cursos</li>
    @endsection

    @include('layouts.messages-scripts')

    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Lista de Cursos</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Cursos</li>
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
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Docente</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Inicio <i class="fa fa-arrow-right"></i> Fin</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Cant. Horas</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="10%">Estado</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                                @php
                                                    switch ($course->status) {
                                                        case 0:
                                                            $icon = 'fa-thumbs-up';
                                                            $text_icon = 'Desbloquear';
                                                            $icon_class = 'btn-outline-success';
                                                            $class = 'text-danger';
                                                            $status = 'Inactivo';
                                                            break;
                                                        default:
                                                            $icon = 'fa-ban';
                                                            $text_icon = 'Bloquear';
                                                            $icon_class = 'btn-outline-secondary';
                                                            $class = 'text-success';
                                                            $status = 'Activo';
                                                            break;
                                                    }

                                                    switch ($course->hours) {
                                                        case 1:
                                                            $text_hours = 'hora';
                                                            break;
                                                        default:
                                                            $text_hours = 'horas';
                                                            break;
                                                    }
                                                @endphp
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $course->name }}</td>
                                                    <td class="text-center">{{ $course->teacher->name }}</td>
                                                    <td class="text-center">{{ Carbon\Carbon::parse($course->start_date)->format('d/m/Y') }} <i class="fa fa-arrow-right"></i> {{ Carbon\Carbon::parse($course->end_date)->format('d/m/Y') }}</td>
                                                    <td class="text-center">{{ $course->hours }} {{ $text_hours }}</td>
                                                    <td class="text-center fw-bold {{ $class }}">{{ $status }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <ul class="action">
                                                            <li class="me-2">
                                                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-xs btn-outline-primary" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </li>
                                                            @can('courses.edit')
                                                                <li class="me-2">
                                                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-xs btn-outline-warning" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                </li>
                                                            @endcan
                                                            @can('courses.edit_status')
                                                                <li class="me-2">
                                                                    <a href="#" class="btn btn-xs {{ $icon_class }} status-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="{{ $text_icon }}" data-url="{{ route('courses.get_status', $course->id) }}">
                                                                        <i class="fa {{ $icon }}"></i>
                                                                    </a>
                                                                </li>
                                                            @endcan
                                                            @can('courses.destroy')
                                                                <li>
                                                                    <a href="#" class="btn btn-xs btn-outline-danger destroy-btn" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar" data-url="{{ route('courses.get_destroy', $course->id) }}">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </li>
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
        <script src="{{ asset('custom/js/courses/index.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    @endsection
@endcan
