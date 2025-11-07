@can('forums.show')
    @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
    @endsection

    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <h4>Visualizar Foro</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Foros</li>
                            <li class="breadcrumb-item active">Visualizar Foro</li>
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
                        <div class="row g-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Datos del Foro</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <label class="form-label" for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" value="{{ $forum->name }}" readonly>
                                            </div>
                                            <div class="col-md-8 d-flex justify-content-end">
                                                <div class="col-md-4 text-center">
                                                    <label class="form-label" for="estado">Estado</label>
                                                    <input type="text" class="form-control text-center" id="estado" value="{{ $forum->status_text }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label class="form-label" for="fecha">Fecha</label>
                                                <input type="text" class="form-control text-center" id="fecha" value="{{ $forum->date }}" readonly>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <label class="form-label" for="horas">Cant. Horas</label>
                                                <input type="text" class="form-control text-center" id="horas" value="{{ $forum->hours }} {{ $forum->text_hours }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <a type="button" class="btn btn-danger" href="{{ route('forums.index') }}">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Container-fluid Ends-->
    @endsection
    @section('scripts')
        <script src="{{ asset('custom/js/forums/show.js') }}"></script>
        <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
        <script>
            window.update_company_url = "{{ url('forums/update_asociate') }}";
            window.destroy_company_url = "{{ url('forums/destroy_asociate') }}";
        </script>
    @endsection
@endcan