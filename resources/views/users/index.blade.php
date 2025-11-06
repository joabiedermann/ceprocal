@can('users.show')
        @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
    @endsection
    @section('breadcrumb-title')
        <h4>Lista de Usuarios</h4>
    @endsection
    @section('breadcrumb-items')
        <li class="breadcrumb-item">Usuarios</li>
        <li class="breadcrumb-item active">Lista de Usuarios</li>
    @endsection

    @include('layouts.messages-scripts')
    @include('users.modals.index-modals')

    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Lista de Usuarios</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Usuarios</li>
                            <li class="breadcrumb-item active">Lista de Usuarios</li>
                        </ol>
                    </div>
                </div>
                @can('users.create')
                    <div class="row g-2">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-success create-btn" data-bs-toggle="modal" data-bs-target="#createModal" data-url="{{ route('users.create') }}"><i class="fa fa-plus align-middle"></i> &nbsp; Agregar</button>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-xl-4 col-sm-6 col-xxl-3 col-ed-4 box-col-4">
                        <div class="card social-profile">
                            <div class="card-body">
                                <div class="social-img-wrap">
                                    <div class="social-img"><img src="{{ asset(Auth::user()->avatar) }}"
                                            alt="profile">
                                    </div>
                                    @php
                                        switch ($user->status) {
                                            case 0:
                                                $icon = 'fa-thumbs-up';
                                                $text_icon = 'Desbloquear';
                                                $class = 'text-danger';
                                                $status = 'Inactivo';
                                                break;
                                            default:
                                                $icon = 'fa-ban';
                                                $text_icon = 'Bloquear';
                                                $class = 'text-success';
                                                $status = 'Activo';
                                                break;
                                        }
                                    @endphp
                                    <div class="edit-icon">
                                        <svg>
                                            @if ($user->status == 0)
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#spam') }}"></use>
                                            @else
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#profile-check') }}"></use>
                                            @endif
                                        </svg>
                                    </div>
                                </div>
                                <div class="social-details">
                                    <h5 class="mb-1"><a href="$">{{ $user->name }}</a></h5><span
                                        class="f-light">{{ $user->email }}</span>
                                    <ul class="card-social">
                                        <li>
                                            <a href="#" class="show-btn" data-bs-toggle="modal" data-bs-target="#showModal" data-url="{{ route('users.show', $user->id) }}">
                                                <i class="fa fa-eye" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar"></i>
                                            </a>
                                        </li>
                                        @can('users.edit')
                                            <li>
                                                <a href="#" class="edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-url="{{ route('users.edit', $user->id) }}">
                                                    <i class="fa fa-pencil" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Editar"></i>
                                                </a>
                                            </li>
                                        @endcan
                                        @if ($user->id !== Auth::id())
                                            @can('users.edit_status')
                                                <li>
                                                    <a href="#" class="status-btn" data-url="{{ route('users.get_status', $user->id) }}">
                                                        <i class="fa {{ $icon }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="{{ $text_icon }}"></i>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('users.destroy')
                                                <li>
                                                    <a href="#" class="destroy-btn" data-url="{{ route('users.get_destroy', $user->id) }}">
                                                        <i class="fa fa-trash" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Eliminar"></i>
                                                    </a>
                                                </li>
                                            @endcan
                                        @endif
                                    </ul>
                                    <ul class="social-follow">
                                        <li>
                                            <h6 class="mb-0">{{ $user->role->name }}</h6><span class="f-light">Rol</span>
                                        </li>
                                        <li>
                                            <h6 class="mb-0 {{ $class }}">{{ $status }}</h6><span class="f-light">Estado</span>
                                        </li>
                                        <li>
                                            <h6 class="mb-0">{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</h6><span class="f-light">Usuario Desde</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Container-fluid Ends-->
    @endsection
    @section('scripts')
        <script src="{{ asset('custom/js/users/index.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2/spanish.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
    @endsection
@endcan
