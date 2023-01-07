<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BEASISWA SAW</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template/plugins/ekko-lightbox/ekko-lightbox.css') }}">
    <link rel="shrotcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">

    {{-- <style>
        .ctr {
            text-align: center !important;
        }

        thead > tr > th, tbody > tr > td{
            vertical-align: middle !important;
        }

        td> input.form-control{
            width: 60px !important;
            padding: 8px !important;
            box-shadow: none !important;
        }



        input[disabled],input[disabled]:hover{
            cursor: default !important;
            border:none !important;
        }

        .textarea-raport{
            font-size:11px !important;
            background: #fff !important;
            border:none !important;
            font-size: 16px !important;
            cursor: default !important;
        }



    </style> --}}

</head>

<body id="page-top">

    <div id="wrapper">
        @include('frontend.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('frontend.navbar')
                <!-- Begin Page Content -->
                <div class="content-fluid">
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">@yield('heading')</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#"><i class="nav-icon fas fa-home"></i> &nbsp; Home</a></li>
                                    @yield('page')
                                    </ol>
                                </div><!-- /.col -->
                            </div>
                            <!-- Main content -->
                            
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        @yield('content')
                                    </div> <!-- end of class row -->
                                </div><!-- /.container-fluid -->
                            </section>
                            <!-- /.content -->
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            @include('frontend.footer')
        </div>

    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Untuk Meninggalkan Halaman?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Silahkan Tekan Tombol "Logout" untuk Meninggalkan Halaman<br>Atau "Cancel" untuk Membatalkannya</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>

    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('template/plugins/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('template/js/demo/chart-pie-demo.js') }}"></script>



    <!-- Page level custom scripts -->


    <script src="{{ asset('template/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('template/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <script src="{{ asset('template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <!-- Script PWA -->
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

    @yield('script')

    @if (count($errors)>0)
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}");
        </script>
    @endforeach
    @endif
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session('success') }}");
        </script>
    @endif
    @if (Session::has('warning'))
        <script>
            toastr.warning("{{ Session('warning') }}");
        </script>
    @endif
    @if (Session::has('info'))
        <script>
            toastr.info("{{ Session('info') }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.error("{{ Session('error') }}");
        </script>
    @endif



    <script>
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });


            $(document).ready(function () {
            bsCustomFileInput.init();

            var btn = document.getElementById('btnResetForm')
            var form = document.querySelector('form')


            });


    </script>
</body>

</html>
