<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.simple.head')
    @include('layouts.simple.css')
</head>
    <body>
        <!-- loader starts-->
        <div class="loader-wrapper">
            <div class="loader">
                <div class="loader4"></div>
            </div>
        </div>
        <!-- loader ends-->

        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->

        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <!-- Page header start -->
            @include('layouts.simple.header')
            <!-- Page header end-->
            <!-- Page Body Start-->
            <div class="page-body-wrapper">
                <!-- Page sidebar start-->
                @include('layouts.simple.sidebar')
                <!-- Page sidebar end-->
                    <div class="page-body">
                        @yield('main_content')
                    </div>
                    <!-- footer start-->
                    @include('layouts.simple.footer')
                    <!-- footer end-->
                </div>
            </div>
            <!-- page-wrapper Ends-->
            {{-- scripts --}}
            @include('layouts.simple.script')
            {{-- end scripts --}}
    </body>
</html>
