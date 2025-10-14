@can('permissions.show')
        @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    @endsection
    @section('breadcrumb-title')
        <h4>Lista de Permisos</h4>
    @endsection
    @section('breadcrumb-items')
        <li class="breadcrumb-item">Usuarios</li>
        <li class="breadcrumb-item active">Lista de Permisos</li>
    @endsection

    @include('layouts.messages-scripts')
    @include('permissions.modals.index-modals')

    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Lista de Permisos</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Usuarios</li>
                            <li class="breadcrumb-item active">Permisos</li>
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
                                                <th class="sorting_asc" tabindex="0" aria-controls="table" rowspan="1" colspan="1" aria-sort="ascending" width="30%">Permiso</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Roles</th>
                                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1" width="15%">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permisos as $key => $permiso)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $permiso->name }}</td>
                                                    <td class="text-center">
                                                        @forelse ($permiso->roles as $role)
                                                            {{ $role->name }}
                                                            @if (!$loop->last)
                                                                &nbsp;-&nbsp;
                                                            @endif
                                                        @empty
                                                            No cuenta con rol asignado.
                                                        @endforelse
                                                    </td>
                                                    <td class="d-flex justify-content-center">
                                                        <ul class="action">
                                                            <li class="me-2">
                                                                <a href="#" class="btn btn-xs btn-outline-primary show-btn" data-bs-toggle="modal" data-bs-target="#showModal" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar" data-url="{{ route('permissions.show', $permiso->id) }}">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </li>
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
        <script src="{{ asset('custom/js/permissions/index.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    @endsection
@endcan
