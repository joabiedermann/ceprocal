@extends('landings.layouts.master')
@section('content')
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
            </div>
        </div>
    </section>

    <!-- verificate_certificate -->
    {{-- <section class="section-py-space riho-page-section" id="home">
        <div class="container-fluid fluid-space">
            <div class="title text-center">
                <h5>Verificar Certificados</h5>
                <div class="row d-flex justify-content-center mt-2">
                    <div class="col-md-2">
                        <form action="{{ route('verificate_certificate') }}" method="post">
                            @csrf 
                            <div class="input-group">
                                <input type="text" class="form-control" name="certificado" placeholder="Ingrese el código del certificado...">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

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
