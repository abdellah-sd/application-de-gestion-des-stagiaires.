<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    
        <div id="app"></div>

        <div id="wrapper">
    
            <!-- Sidebar -->
            @include('components.sidebar')
            
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
    
                <!-- Main Content -->
                <div id="content">
    
                    <!-- Topbar -->
                    @include('components.navbar')
                    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
    
                        @yield('content')
    
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
    
                <!-- Footer -->
                {{-- @include('components.footer') --}}
                
            </div>
            <!-- End of Content Wrapper -->
    
        </div>

        {{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
    
        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

        {{-- <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/demo/chart-bar-demo.js') }}"></script> --}}

        <!-- Bootstrap core JavaScript-->
        <script src="{{ mix('js/app.js') }}"></script>
    
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
        
    
</body>
</html>