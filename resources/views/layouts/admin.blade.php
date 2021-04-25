<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/fav.jpg')}}">

    <title>PeerHunter</title>

    <!-- Bootstrap Core CSS -->

    <link href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Menu CSS -->

    <link href="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">

    <!-- toast CSS -->

    <link href="{{asset('plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">

    <!-- morris CSS -->

    <link href="{{asset('plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- chartist CSS -->

    <link href="{{asset('plugins/bower_components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">

    <link href="{{asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}"

          rel="stylesheet">

    <!-- animation CSS -->

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- Profile CSS -->

<!-- <link href="{{asset('assets/css/profile.css')}}" rel="stylesheet"> -->



    <link href="{{asset('assets/css/admin_custom.css')}}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/assets/owl.theme.default.min.css"

          rel="stylesheet">



    <!-- color CSS -->

    <link href="{{asset('assets/css/colors/default.css')}}" id="theme" rel="stylesheet">

    <link href="https://dev.tenancymanager.co.uk/assets/admin/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css"

          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.3/build/css/intlTelInput.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/>
    
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    

    <link href="https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.3/build/css/intlTelInput.css" rel="stylesheet"/>





</head>



<body class="fix-header">

<!-- ============================================================== -->

<!-- Preloader -->

<!-- ============================================================== -->

<div class="preloader">

    <svg class="circular" viewBox="25 25 50 50">

        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>

    </svg>

</div>

<!-- ============================================================== -->

<!-- Wrapper -->

<!-- ============================================================== -->

<div id="wrapper">

    <!-- ============================================================== -->

    <!-- Topbar header - style you can find in pages.scss -->

    <!-- ============================================================== -->

@include('_includes.header')

<!-- End Top Navigation -->

    <!-- ============================================================== -->

    <!-- Left Sidebar - style you can find in sidebar.scss  -->

    <!-- ============================================================== -->

    <div class="navbar-default sidebar" role="navigation" id="navbarSupportedContent">

        

            @include('_includes.admin-sidebar')

        

    </div>

    <!-- ============================================================== -->

    <!-- End Left Sidebar -->

    <!-- ============================================================== -->

    <!-- ============================================================== -->

    <!-- Page Content -->

    <!-- ============================================================== -->

    <div id="page-wrapper">

    @yield('content')

    <!-- /.container-fluid -->

        <footer class="footer text-center"> {{date('Y')}} &copy; PeerHunter</footer>

    </div>

    <!-- ============================================================== -->

    <!-- End Page Content -->

    <!-- ============================================================== -->

</div>

<!-- ============================================================== -->

<!-- End Wrapper -->

<!-- ============================================================== -->

<!-- ============================================================== -->

<!-- All Jquery -->

<!-- ============================================================== -->

<script src="{{asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>

<script src="{{asset('assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Menu Plugin JavaScript -->

<script src="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>

<!--slimscroll JavaScript -->

<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>

<!-- <script src="{{asset('assets/js/ckeditor/adapters/jquery.js')}}"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="{{asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Custom Theme JavaScript -->

<script src="{{asset('assets/js/custom.min.js')}}"></script>

<!-- <script type="text/javascript" src="{{asset('assets/js/germainapm-uxmonitoring-loader.js')}}"></script> -->

<script src="{{asset('plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>

<script src="https://dev.tenancymanager.co.uk/assets/admin/plugins/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="//cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>

<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/currency.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.3/build/js/intlTelInput.js"></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script type="text/javascript"

        src="https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.3/build/js/intlTelInput.js"></script>

<script>

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    if ($("#snackbar").length > 0) {

        //call function for snackbar

        myFunction();



        //function for snackbar

        function myFunction() {

            var x = document.getElementById("snackbar");

            x.className = "show";

            setTimeout(function () {

                x.className = x.className.replace("show", "hide");

            }, 3000);

        }

    }



    //Notification is read update

    if ($(".admin-notify").length > 0) {

        $(".admin-notify").on('click', function (e) {

            e.preventDefault();

            var id = $(this).data("id");

            var url = $(this).data("url");

            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({

                url: "/notification-update/" + id,

                type: 'GET',

                dataType: "JSON",

                data: {

                    "_method": 'GET',

                    "_token": token,

                },

                success: function (response) {

                    console.log(response);

                    if (response.status == 200) {

                        console.log("Success=> ", response.message);

                        window.location = url;

                    } else {

                        console.log("Error=> ", response.message);

                    }

                }

            });

        });

    }



    //Redirect to previous page

    if ($(".backBtn").length > 0) {

        $('.backBtn').click(function (e) {

            e.preventDefault();

            parent.history.back();

            return false;

        });

    }

</script>

@yield('scripts')

</body>



</html>

