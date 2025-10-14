@can('roles.show')
    @extends('layouts.simple.master')
    @section('css')
        
    @endsection
    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Visualizar Rol</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Roles</li>
                            <li class="breadcrumb-item active">Visualizar Rol</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3">
                <div class="row g-2">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <label class="form-label" for="nombre">Nombre</label>
                                        <input type="text" class="form-control " id="nombre" value="{{ $role->name }}" readonly>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-end">
                                        <div class="col-md-2 me-2 text-center">
                                            <label class="form-label" for="estado">Estado</label>
                                            <input type="text" class="form-control text-center" id="estado" value="{{ $role->status_text }}" readonly>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <label class="form-label" for="cantidad_permisos">Cant. Permisos</label>
                                            <input type="text" class="form-control text-center" id="cantidad_permisos"
                                                name="cantidad_permisos" value="{{ $role->permissions->count() }}" readonly>
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
                            </div>
                            <div class="card-body">
                                <div class="row">
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
                                                                        data-id="{{ $permiso->id }}"
                                                                        disabled>
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
                                                                                data-padre="{{ $permiso->id }}"
                                                                                disabled
                                                                                @if ($role->hasPermissionTo($p->id)) checked @endif>
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
                                        <a type="button" class="btn btn-outline-danger" href="{{ route('roles.index') }}">Volver</a>
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
        <script src="{{ asset('custom/js/roles/show.js') }}"></script>
    @endsection
@endcan