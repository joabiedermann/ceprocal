@can('certificates.upload')
    @extends('layouts.simple.master')
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
    @endsection
    @section('main_content')
        <div class="container-fluid">
            <div class="page-title">
                <div class="row g-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h4 class="me-3">Importar Planilla</h4>
                        <a type="button" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Descargar Plantilla"
                            href="{{ asset('storage/importar-excel.xlsx') }}" download="importar-excel.xlsx">
                            <i class="fa fa-download"></i> Plantilla
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Certificados</li>
                            <li class="breadcrumb-item active">Importar Planilla</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form class="row g-3" action="{{ route('certificates.upload') }}" method="post" id="store-form" enctype="multipart/form-data">
                @csrf
                <div class="row g-2 d-flex justify-content-center">
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-2">
                                    @if (!session('errores'))
                                        <div class="col-md-12 alert alert-danger" role="alert">
                                            No olvide verificar su archivo antes de subirlo, puede descargar la plantilla haciendo click <a href="{{ asset('storage/importar-excel.xlsx') }}"> AQUÍ</a> para comprobar que el formato sea correcto.
                                        </div>
                                    @endif
                                    <div class="col-md-8">
                                        <label class="form-label mb-3" for="planilla">Planilla (*)</label>
                                        <div class="input-group mb-2">
                                            <input type="file" class="form-control @error('planilla') is-invalid @enderror" id="planilla" name="planilla" aria-describedby="planilla" aria-label="Upload" accept=".xls, .xlsx, .csv">
                                            <button type="button" class="btn btn-outline-danger delete-planilla-btn" id="planilla" disabled>
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <label class="form-label small">
                                            Los formatos soportados son: <code>.xlsx</code>, <code>.xls</code> y <code>.csv</code> con un tamaño máximo de <code>5mb</code>.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-2">
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-danger me-2 cancel-btn" data-url="{{ route('dashboard') }}">Cancelar</button>
                                        <button type="button" class="btn btn-outline-success save-btn">Importar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session('errores'))
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Errores Encontrados</h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 alert alert-danger" role="alert">
                                        <table class="table">
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="text-white border-end" width="20%">Hoja</th>
                                                    <th class="text-white border-end" width="20%">Columna</th>
                                                    <th class="text-white border-end" width="10%">Fila</th>
                                                    <th class="text-white" width="50%">Descripción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (session('errores') as $error)
                                                    <tr>
                                                        <td class="text-white border-end text-center">{{$error['hoja']}}</td>
                                                        <td class="text-white border-end text-center">
                                                            @if (is_array($error['columna']))
                                                                @foreach ($error['columna'] as $columna)
                                                                    {{ $columna }}
                                                                @endforeach
                                                            @else
                                                                {{ $error['columna'] }}
                                                            @endif
                                                        </td>
                                                        <td class="text-white border-end text-center">{{ $error['fila'] }}</td>
                                                        <td class="text-white">
                                                            @if (is_array($error['error']))
                                                                @foreach ($error['error'] as $message)
                                                                    {{ $message }} <br>
                                                                @endforeach
                                                            @else
                                                                {{ $error['error'] }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
        <!-- Container-fluid Ends-->
    @endsection
    @section('scripts')
        <script src="{{ asset('custom/js/certificates/import.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
    @endsection
@endcan