<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="BodyF1rst">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BodyF1rst</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/fav.png')}}">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- animation CSS -->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/css/main-style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- color CSS -->
    <!--link href="{{asset('assets/css/slicknav.css')}}" rel="stylesheet"-->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>
<body class="welcome">
@include('_includes.site_header')

@yield('content')


@include('_includes.site_footer')

<!-- Modal -->
<div class="modal fade" id="companyInformation" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center modal-title">Which type of users you are?</h3>
                <button type="button" class="close close_btn" data-dismiss="modal">
                    <span><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <!--button type="button" class="close" data-dismiss="modal">&times;</button-->
            </div>

            <div id="myRadioGroup">
                <div class="row">
				   <div class="col-md-6 col-6">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="customRadio2" name="example1"
                                   value="threeCarDiv" onclick="show2();"/>
                            <label class="custom-control-label" for="customRadio2">Individual User</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="customRadio" name="example1"
                                   value="twoCarDiv" onclick="show1();"/>
                            <label class="custom-control-label" for="customRadio">Corporate User</label>
                        </div>
                    </div>
                 
                </div>
            </div>

            <div id="div1" style="display:none;">
                <div class="form-header">
                    <p>Please fill out and we will reach out with more information on how BodyF1RST can transform your
                        company culture</p>
                </div>
                <div class="modal-body pt-0">
                    <form id="contact_form" style="display:block">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="name">Your Name:</label>
                                    <input type="text" class="form-control" name="name">
                                    <span id="name" class="modal-validation"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="title">Job Title:</label>
                                    <input type="text" class="form-control" id="title" name="job_title">
                                    <span id="job_title" class="modal-validation"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="cname">Company Name:</label>
                                    <input type="text" class="form-control" name="company_name">
                                    <span id="company_name" class="modal-validation"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" name="address">
                                    <span id="address" class="modal-validation"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email">
                                    <span id="email" class="modal-validation"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="phonenumber">Phone Number:</label>
                                    <input type="number" class="form-control" id="phonenumber" name="phone">
                                    <span id="phone" class="modal-validation"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn view-btn btn-default close_btn" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit_btn" class="btn view-btn">Submit</button>
                </div>
            </div>

            <div id="div2" style="display:none;">
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="app-text">Click the button below and download the app</p>
                        </div>
                        <div class="col-md-5 col-5 col-lg-4">
                            <a href=""><img src="{{asset('assets/images/android.png')}}" alt="android"/></a>
                        </div>
                        <div class="col-md-5 col-5 col-lg-4">
                            <a href=""><img src="{{asset('assets/images/appstore-logo.png')}}" alt="ios"/></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!--script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script-->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/germainapm-uxmonitoring-loader.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
    function show1() {
        // $( "#customRadio" ).prop( "checked", true );
        // $( "#customRadio2" ).prop( "checked", false );
        document.getElementById('div1').style.display = 'block';
        document.getElementById('div2').style.display = 'none';
    }

    function show2() {
        // $( "#customRadio" ).prop( "checked", false );
        // $( "#customRadio2" ).prop( "checked", true );
        document.getElementById('div1').style.display = 'none';
        document.getElementById('div2').style.display = 'block';
    }


    // $(document).on('click','body *',function(){
    //     if($(".slicknav_nav").show())
    //     {
    //         console.log("dsf");
    //         $(".slicknav_nav").hide();   
    //     }
    //     else{
    //         console.log("hide");
    //     }
    // });


    //company info maodal open
    $(".companyInfoBtn").on('click', function (e) {
        e.preventDefault();
        $('.error_msg').remove();
        $("#submit_btn").text("Send");
        $('#contact_form').trigger("reset");
        $('#companyInformation').modal({
            refresh: true,
            show: true
        });
    });

    $(".close_btn").click(function (e) {
        e.preventDefault();
        console.log("close modal");
        $('#companyInformation').modal({
            refresh: true,
            show: false
        });

        $( "#customRadio" ).prop( "checked", false );
        $( "#customRadio2" ).prop( "checked", false );
        document.getElementById('div1').style.display = 'none';
        document.getElementById('div2').style.display = 'none';
    });



    //Form submit
    $("#submit_btn").click(function (e) {
        e.preventDefault();

        var form = $('#contact_form')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        console.log("formData=>", formData);
        $("#submit_btn").text("Sending").prop("disabled", true);
        $.ajax({
            type: "post",
            url: "/query-submit",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 200) {
                    $("#submit_btn").text("Send").prop("disabled", false);
                    console.log("success");
                    swal({
                        title: '',
                        text: response.message,
                        showConfirmButton: true,
                        confirmButtonText: 'Okay',
                        closeOnConfirm: true,
                    });
                    location.reload();
                } else {
                    $("#submit_btn").text("Send").prop("disabled", false);
                    console.log("error");
                    swal({
                        title: '',
                        text: response.message,
                        showConfirmButton: true,
                        confirmButtonText: 'Okay',
                        closeOnConfirm: true,
                    });
                }
            },
            error: function (response) {
                $("#submit_btn").text("Send").prop("disabled", false);
                $(".error_msg").remove();
                $.each(response.responseJSON.errors, function (index, value) {
                    $("#" + index).html('<span class="error_msg">' + value + '</span>');
                });
            }
        });

    });
</script>

</body>
</html>