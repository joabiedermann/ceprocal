@extends('layouts.authentication.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastify.min.css') }}">
@endsection

@include('layouts.messages-scripts')

@section('main_content')
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader4"></div>
        </div>
    </div>
    <!-- loader ends-->
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div> 
                            <a class="logo" href="{{ route('dashboard') }}">
                                <img class="img-fluid for-light" src="{{ asset('storage/logos/logo_dark.png') }}" alt="logo" width="400">
                                <img class="img-fluid for-dark" src="{{ asset('storage/logos/logo.png') }}" alt="logo" width="400">
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('login') }}" id="loginForm">
                                @csrf
                                <h4>Iniciar Sesión </h4>
                                <p>Ingresa tus credenciales para acceder</p>
                                <div class="form-group">
                                    <label class="col-form-label">Correo Electrónico</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ old('email', 'joaquin@bsoft.com.py') }}" placeholder="Ingrese su correo electrónico"> 
                                    @error('email')  
                                        <span class="text-danger d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> 
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Contraseña </label>
                                    <div class="form-input position-relative">
                                        <input id="password" type="password" class="form-control" name="password"
                                            value="{{ old('password', 'Joapy_2024') }}" placeholder="Ingrese su contraseña">
                                        <div class="show-hide"> <span class="show"></span></div>
                                        @error('password')
                                            <span class="text-danger d-block" role="alert">
                                                <strong>{{ $message }}</strong> 
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group re-captcha"></div>
                                <div class="form-group mb-0 text-end">
                                    @if (Route::has('password.request'))
                                        <a class="checkbox1" href="{{ route('password.request') }}">Olvidaste tu contraseña?</a>
                                    @endif
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100 spinner-btn" type="submit">Iniciar Sesión</button>
                                    </div>
                                </div>
                            </form> 
                            <a href="{{ route('landing') }}">Landing</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('custom/js/auth/login.js') }}"></script>
    <script src="{{ asset('assets/js/bookmark/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-validation/validation.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastify/toastify.min.js') }}"></script>
@endsection
