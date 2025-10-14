@extends('layouts.authentication.master')

@section('css')
    <!-- Toastr css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/toastr.min.css') }}">
@endsection

@section('main_content')
    @use('App\Helpers\Helpers')
    @php
        $settings = Helpers::getSettings();
    @endphp
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
                            <a class="logo" href="{{ route('admin.default_dashboard') }}">
                                <a class="logo" href="{{ route('admin.default_dashboard') }}">
                                    <img class="img-fluid for-light" src="{{ asset($settings['general']['dark_logo']) }}"
                                        alt="looginpage">
                                    <img class="img-fluid for-dark" src="{{ asset($settings['general']['light_logo']) }}"
                                        alt="looginpage">
                                </a>
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('register') }}" id="registerForm">
                                @csrf
                                <h4>Create your account</h4>
                                <p>Enter your personal details to create account</p>
                                <div class="form-group">
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label for="">First Name</label>
                                            <input id="first_name" type="text" class="form-control" name="first_name"
                                                value="{{ old('first_name') }}" autocomplete="first_name" autofocus
                                                placeholder="Enter First name">
                                            @error('first_name')
                                                <span class="text-danger d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="">Last Name</label>
                                            <input id="last_name" type="text" class="form-control" name="last_name"
                                                value="{{ old('last_name') }}" autocomplete="last_name" autofocus
                                                placeholder="Enter Last name">

                                            @error('last_name')
                                                <span class="text-danger d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ old('email') }}" autocomplete="email" placeholder="Enter Your Email">
                                    @error('email')
                                        <span class="text-danger d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input id="password" type="password" class="form-control" name="password"
                                            value="{{ old('password') }}" autocomplete="new-password"
                                            placeholder="Enter Password">
                                        <div class="show-hide"><span class="show"></span></div>
                                        @error('password')
                                            <span class="text-danger d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Confirm Password</label>
                                    <div class="form-input position-relative">
                                        <input id="password-confirm" type="password" class="form-control"
                                            value="{{ old('password_confirmation') }}" name="password_confirmation"
                                            autocomplete="new-password" placeholder="Enter Confirm Password">
                                        <div class="show-hide"><span class="show"></span></div>
                                        @error('password_confirmation')
                                            <span class="text-danger d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group re-captcha"></div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block w-100 spinner-btn" type="submit">Create
                                        Account</button>
                                </div>
                                @if (
                                    $settings['social_login']['google']['google_login_status'] == 1 ||
                                        $settings['social_login']['facebook']['facebook_login_status'] == 1)
                                    <h6 class="text-muted mt-4 or"><span> Or Sign in with </span></h6>
                                     <div class="login-social social mt-4">
                                        <div class="btn-showcase">
                                            @isset($settings['social_login']['google']['google_login_status'])
                                                @if ($settings['social_login']['google']['google_login_status'] == 1)
                                                    @if (isset($settings['social_login']['google']['google_client_id']) && isset($settings['social_login']['google']['google_client_secret']) && isset($settings['social_login']['google']['google_redirect_url']))  
                                                        <a class="btn btn-light"
                                                            href="{{ route('redirectToProvider', ['provider' => 'google']) }}"
                                                            target="_blank"><img class="img-fluid"
                                                                src="{{ asset('assets/images/login/google.png') }}" alt="">
                                                            Google</a>
                                                    @endif
                                                @endif
                                            @endisset
                                            @isset($settings['social_login']['facebook']['facebook_login_status'])
                                                @if ($settings['social_login']['facebook']['facebook_login_status'] == 1)
                                                    @if (isset($settings['social_login']['facebook']['facebook_client_id']) && isset($settings['social_login']['facebook']['facebook_client_secret']) && isset($settings['social_login']['facebook']['facebook_redirect_url']))  
                                                        <a class="btn btn-light"
                                                            href="{{ route('redirectToProvider', ['provider' => 'facebook']) }}"
                                                            target="_blank"><img class="img-fluid"
                                                                src="{{ asset('assets/images/login/facebook.png') }}"
                                                                alt="">
                                                            Facebook</a> 
                                                    @endif
                                                @endif
                                            @endisset
                                        </div>
                                    </div>
                                @endif
                                <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2"
                                        href="{{ route('login') }}">Sign in</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/bookmark/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-validation/validation.js') }}"></script>
    <!-- toastr js -->
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    @if ($settings['google_reCaptcha']['status'] == 1)
        @if (!empty($settings['google_reCaptcha']['site_key']))
            <script src="https://www.google.com/recaptcha/api.js?render={{ $settings['google_reCaptcha']['site_key'] }}"></script>
            <script type="text/javascript">
                $('#registerForm').submit(function(event) {
                    event.preventDefault();
                    $('.re-captcha').empty();
                    let form = $(this);
                    try {
                        grecaptcha.execute("{{ $settings['google_reCaptcha']['site_key'] }}", {
                            action: 'login'
                        }).then(function(token) {
                            if (!token) {
                                throw new Error("Empty reCAPTCHA token");
                            }
                            form.prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                            form.unbind('submit').submit();
                        });
                    } catch (e) {
                        toastr.warning("We couldn't verify the reCAPTCHA.");
                        setTimeout(function() {
                            form.unbind('submit').submit();
                        }, 1000);
                    }
                });
            </script>
        @endif
    @endif
@endsection
