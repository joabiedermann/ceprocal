{{-- @can('courses.show') --}}
    @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
    @endsection

    @include('courses.modals.show-modals')

    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Visualizar Curso</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Cursos</li>
                            <li class="breadcrumb-item active">Visualizar Curso</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3">
                <div class="row g-2">
                    <div class="col-md-8 mb-3">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Datos del Curso</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <label class="form-label" for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" value="{{ $course->name }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="docente">Docente</label>
                                                <input type="text" class="form-control" id="docente" value="{{ $course->teacher->name }}" readonly>
                                            </div>
                                            <div class="col-md-4 d-flex justify-content-end">
                                                <div class="col-md-6 text-center">
                                                    <label class="form-label" for="estado">Estado</label>
                                                    <input type="text" class="form-control text-center" id="estado" value="{{ $course->status_text }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label class="form-label" for="fecha_inicio">Fecha Inicio</label>
                                                <input type="text" class="form-control text-center" id="fecha_inicio" value="{{ $course->start_date }}" readonly>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label class="form-label" for="fecha_fin">Fecha Fin</label>
                                                <input type="text" class="form-control text-center" id="fecha_fin" value="{{ $course->end_date }}" readonly>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label class="form-label" for="horas">Cant. Horas</label>
                                                <input type="text" class="form-control text-center" id="horas" value="{{ $course->hours }} {{ $course->text_hours }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
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
                                                <div class="col-xl-4 col-sm-6 col-xxl-3 col-ed-4 box-col-4">
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
                            <div class="col-md-12 text-center">
                                <a type="button" class="btn btn-danger" href="{{ route('courses.index') }}">Volver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Módulos del Curso</h5>
                            </div>
                            <div class="card-body">
                                <div class="accordion dark-accordion" id="accordion">
                                    @forelse ($course->modules as $module)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading-{{ $module->id }}">
                                                <button class="accordion-button bg-light-primary txt-primary active collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $module->id }}" aria-expanded="false" aria-controls="collapse-{{ $module->id }}">Módulo {{ $module->module }}</button>
                                            </h2>
                                            <div class="accordion-collapse collapse" id="collapse-{{ $module->id }}" aria-labelledby="heading-{{ $module->id }}" data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    <p>{{ $module->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <p>El curso no cuenta con módulos cargados.</p>
                                        </div>
                                    @endforelse
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
        <script src="{{ asset('custom/js/courses/show.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
        <script>
            window.update_company_url = "{{ url('courses/update_asociate') }}";
            window.destroy_company_url = "{{ url('courses/destroy_asociate') }}";
        </script>
    @endsection
{{-- @endcan --}}