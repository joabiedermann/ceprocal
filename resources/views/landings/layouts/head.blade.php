<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="{{ env('APP_NAME') }}">
<meta name="keywords" content="{{ env('APP_NAME') }}, web app">
<meta name="author" content="pixelstrap"><meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{ asset('storage/logos/logo-icon.png') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('storage/logos/logo-icon.png') }}" type="image/x-icon">
<title>{{ env('APP_NAME') }}</title>
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('landing/css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('landing/css/vendors/icofont.css') }}">
<link rel="icon" href="{{ asset('landing/svg/landing-icons.svg') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('landing/css/vendors/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('landing/css/vendors/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('landing/css/vendors/swiper/swiper-bundle.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('landing/css/vendors/animate.css') }}">
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{ asset('landing/css/vendors/bootstrap.css') }}">
<!-- App css-->
@vite(['public/assets/scss/style.scss'])

<link rel="stylesheet" type="text/css" href="{{ asset('landing/css/style.css') }}">
<!-- Responsive css-->
