<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('my_lib/assets/images/logo-a2sys.png')}}">
    <title>A2SYS-GESTION DE LA CAISSE</title>
    <!-- Custom CSS -->
    {{-- <link href="{{asset('my_lib/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/my_lib/assets/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('my_lib/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet"> --}}
    <!-- Custom CSS -->
    <link href="{{asset('css/boots/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/jq/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jq/jquery.min.js')}}"></script>
    <script src="{{asset('js/jq/poper.min.js')}}"></script>
    <link href="{{asset('my_lib/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main_style.css')}}" rel="stylesheet">
    
    @yield('css')
</head>

<body>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        @include('layouts.partials.header')
        @include('layouts.partials.menu')
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @include('layouts.partials.flash_message')
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    @include('layouts.partials.footer')
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    {{-- <script src="{{asset('my_lib/assets/libs/jquery/dist/jquery.min.js')}}"></script> --}}
    {{-- <script src="{{asset('js/jq/jquery.min.js')}}"></script> --}}
    <script src="{{asset('my_lib/dist/js/jquery.validate.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    {{-- <script src="{{asset('my_lib/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script> --}}
    <script src="{{asset('my_lib/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('my_lib/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('my_lib/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('my_lib/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('my_lib/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('my_lib/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    {{-- <script src="{{asset('my_lib/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('my_lib/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('my_lib/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('my_lib/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('my_lib/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('my_lib/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('my_lib/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('my_lib/dist/js/pages/chart/chart-page-init.js')}}"></script>
    <script src="{{asset('my_lib/assets/extra-libs/DataTables/datatables.min.js')}}"></script> --}}

    <script src="{{asset('my_lib/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('my_lib/dist/js/pages/mask/mask.init.js')}}"></script>
    {{-- <script src="{{asset('my_lib/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('my_lib/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('my_lib/assets/libs/jquery-asColor/dist/jquery-asColor.min.j')}}s"></script>
    <script src="{{asset('my_lib/assets/libs/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
    <script src="{{asset('my_lib/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
    <script src="{{asset('my_lib/assets/libs/jquery-minicolors/jquery.minicolors.min.js')}}"></script> --}}
    <script src="{{asset('my_lib/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{asset('js/Chart.min.js')}}" charset=utf-8></script>
    @yield('script')
</body>

</html>