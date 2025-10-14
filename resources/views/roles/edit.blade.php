@can('roles.edit')
    @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
    @endsection
    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Actualizar Rol</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Roles</li>
                            <li class="breadcrumb-item active">Actualizar Rol</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3" action="{{ route('roles.update', $role->id) }}" method="post" id="store-form">
                @csrf
                <div class="row g-2">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <label class="form-label" for="nombre">Nombre (*)</label>
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $role->name) }}" autofocus>
                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-end">
                                        <div class="col-md-2 me-2 text-center">
                                            <label class="form-label" for="estado">Estado</label>
                                            <select class="form-select @error ('estado') is-invalid @enderror" id="estado" name="estado">
                                                <option value="" selected disabled>Seleccionar...</option>
                                                <option value="1" @if (old('estado') === 1 || $role->status === 1) selected @endif>Activo</option>
                                                <option value="0" @if (old('estado') === 0 || $role->status === 0) selected @endif>Inactivo</option>
                                            </select>
                                            @error('estado')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <label class="form-label" for="cantidad_permisos">Cant. Permisos</label>
                                            <input type="text" class="form-control text-center" id="cantidad_permisos"
                                                name="cantidad_permisos" value="{{ old('cantidad_permisos', $role->permissions->count()) }}" readonly>
                                        </div>
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
                                <h6 class="card-title">Permisos del Rol</h6>
                                <button type="button" class="btn btn-outline-primary" id="seleccionar-todo">
                                    @if ($role->permissions->count() == $permisos->where('father_id', '!=', null)->count())
                                        Deseleecionar
                                    @else
                                        Seleccionar
                                    @endif todo
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @error('permisos')
                                        <div class="alert alert-light-secondary" role="alert">
                                            <p class="txt-secondary">{{ $message }}</p>
                                            <i class="ti ti-x" data-bs-dismiss="alert"></i>
                                        </div>
                                    @enderror
                                    @foreach ($permisos->where('father_id', null) as $permiso)
                                        <div class="col-lg-3 xol-xxl-3">
                                            <div class="card equal-card">
                                                <div class="card-header bg-primary">
                                                    <div class="d-flex">
                                                        <div class="me-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check checkbox checkbox-primary mb-0">
                                                                    <input type="checkbox" class="form-check-input padre"
                                                                        id="padre-{{ $permiso->id }}"
                                                                        name="padres[{{ $permiso->id }}]"
                                                                        data-id="{{ $permiso->id }}"
                                                                        @if (old('padres.' . $permiso->id . '') == 'on')
                                                                            checked
                                                                        @endif>
                                                                    <label class="form-check-label" for="padre-{{ $permiso->id }}">{{ $permiso->name }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body bg-light-primary">
                                                    @foreach ($permisos->where('father_id', $permiso->id) as $p)
                                                        <li class="list-group-item">
                                                            <div class="d-flex">
                                                                <div class="me-3">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="form-check checkbox checkbox-primary mb-0">
                                                                            <input type="checkbox" class="form-check-input hijo hijo-{{ $permiso->id }}"
                                                                                id="hijo-{{ $p->id }}"
                                                                                name="permisos[{{ $p->id }}]"
                                                                                data-padre="{{ $permiso->id }}"
                                                                                @if (old('permisos.' . $p->id) == 'on') checked @elseif (!$errors->any() && $role->hasPermissionTo($p->id)) checked @endif>
                                                                            <label class="form-check-label text-black" for="hijo-{{ $p->id }}">{{ $p->name }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-2">
                                    <div class="col-md-12 text-end">
                                        <button type="button" class="btn btn-outline-danger me-2 cancel-btn" data-url="{{ route('roles.index') }}">Cancelar</button>
                                        <button type="button" class="btn btn-outline-success save-btn">Guardar</button>
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
        <script src="{{ asset('custom/js/roles/edit.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
    @endsection
@endcan