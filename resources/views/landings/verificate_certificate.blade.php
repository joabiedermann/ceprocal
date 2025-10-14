@extends('landings.layouts.master')
@section('content')
    <!-- list_of_courses -->
    <section class="section-py-space riho-page-section" id="home">
        <div class="container-fluid fluid-space">
            <div class="title text-center">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-12 col-sm-12 col-xxl-12 col-ed-3 box-col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <h5 class="mb-3 text-muted">Datos del Curso</h5>
                                        </div>
                                        <div class="row g-2 mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" value="{{ $course->name }}" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" for="docente">Docente</label>
                                                <input type="text" class="form-control" id="docente" value="{{ $course->teacher->name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="row g-2 mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold" for="fecha_inicio">Fecha de Inicio</label>
                                                <input type="text" class="form-control text-center" id="fecha_inicio" value="{{ Carbon\Carbon::parse($course->start_date)->format('d/m/Y') }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold" for="fecha_fin">Fecha de Fin</label>
                                                <input type="text" class="form-control text-center" id="fecha_fin" value="{{ Carbon\Carbon::parse($course->end_date)->format('d/m/Y') }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold" for="cantidad_horas">Cant. de Horas</label>
                                                <input type="text" class="form-control text-center" id="cantidad_horas" value="{{ $course->hours }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <h5 class="mb-3 text-muted">Contenido Pragmático</h5>
                                        </div>
                                        <div class="accordion dark-accordion" id="accordion">
                                            @forelse ($course->modules as $module)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading-{{ $module->id }}">
                                                        <button class="accordion-button bg-primary active collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $module->id }}" aria-expanded="false" aria-controls="collapse-{{ $module->id }}">Módulo {{ $module->module }}</button>
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- search_course -->
    <section class="section-py-space riho-page-section" id="home">
        <div class="container-fluid fluid-space">
            <div class="title text-center">
                <h5>Buscar Cursos</h5>
                <div class="row d-flex justify-content-center mt-2">
                    <div class="col-md-2">
                        <form action="{{ route('search_course') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="curso" placeholder="Ingrese el nombre del curso...">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row g-2 mt-4">
                    <div class="col-md-12">
                        <a type="button" class="btn btn-danger" href="{{ route('landing') }}">Volver al Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <section class="landing-footer section-py-space" id="footer">
        <div class="custom-container">
            <div class="row p-0 m-0">
                <div class="col-12">
                    <div class="footer-contain">
                        <div class="btn-footer">
                            <a class="btn btn-lg btn-primary" target="_blank" href="https://bsoft.com.py">Copyright &copy; {{ Carbon\Carbon::today()->format('Y') }} - BSoft</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
