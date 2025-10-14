{{-- @can('profiles.show') --}}
    @extends('layouts.simple.master')

    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
    @endsection

    @include('layouts.messages-scripts')
    @include('users.profiles.modals.show-modals')

    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Mi Perfil</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"> Mi Perfil</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="edit-profile">
                <div class="row">
                    {{-- @can('profiles.edit') --}}
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Información Personal</h4>
                                    <div class="card-options">
                                        <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                                            <i class="fe fe-chevron-up"></i>
                                        </a>
                                        <a class="card-options-remove" href="#" data-bs-toggle="card-remove">
                                            <i class="fe fe-x"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row g-2 mb-3">
                                        <div class="profile-title">
                                            <div class="media">
                                                <a type="button" href="{{ asset($user->avatar) }}" target="_blank" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Visualizar">
                                                    <img class="img-70 rounded-circle" id="vista" src="{{ asset($user->avatar) }}" alt="avatar" data-url="{{ asset($user->avatar) }}">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="mb-1">{{ $user->name }}</h5>
                                                    <p>{{ $user->role->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2 mb-3">
                                        <form id="store-info-form" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                                <div class="row g-2">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="nombre">Nombre (*)</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $user->name }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="correo">Correo Electrónico (*)</label>
                                                        <input type="text" class="form-control" id="correo" name="correo" value="{{ $user->email }}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="input-group mb-2">
                                                            <input type="file" class="form-control" id="avatar" name="avatar" aria-describedby="avatar" aria-label="Upload" accept=".jpg, .jpeg, .png">
                                                            <button class="btn btn-outline-danger delete-avatar-btn" type="button" data-url="{{ asset($user->avatar) }}" disabled>
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                        <label class="form-label small">
                                                            Los formatos soportados son: <code>.jpg</code>, <code>.jpeg</code> y <code>.png</code> con un tamaño máximo de <code>5mb</code>.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-12 text-end">
                                            <button type="button" class="btn btn-outline-success save-info-btn" data-url="{{ route('profiles.update', $user->id) }}">Actualizar Información</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- @endcan --}}
                    <div class="col-md-4">
                        {{-- @can('profiles.change_password') --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Actualizar Contraseña</h4>
                                    <div class="card-options">
                                        <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                                            <i class="fe fe-chevron-up"></i>
                                        </a>
                                        <a class="card-options-remove" href="#" data-bs-toggle="card-remove">
                                            <i class="fe fe-x"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="store-password-form">
                                        <div class="row g-2 mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label" for="current_password">Contraseña Anterior (*)</label>
                                                <input type="password" class="form-control" id="current_password" name="current_password">
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-4">
                                            <div class="col-md-6">
                                                <label class="form-label" for="new_password">Nueva Contraseña (*)</label>
                                                <input type="password" class="form-control" id="new_password" name="new_password">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="new_password_confirmation">Confirmar Contraseña (*)</label>
                                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-12 text-end">
                                                <button type="button" class="btn btn-outline-success save-password-btn" data-url="{{ route('profiles.update_password', $user->id) }}">Actualizar Contraseña</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        {{-- @endcan --}}
                        {{-- @can('profiles.inactivate') --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Desactivar Cuenta</h4>
                                    <div class="card-options">
                                        <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                                            <i class="fe fe-chevron-up"></i>
                                        </a>
                                        <a class="card-options-remove" href="#" data-bs-toggle="card-remove">
                                            <i class="fe fe-x"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#inactivateModal">Desactivar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- @endcan --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    @endsection

    @section('scripts')
        <script src="{{ asset('custom/js/users/profiles/show.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
    @endsection
{{-- @endcan --}}