@extends('layouts.admin')
@section('PageTitle','Users')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Profile</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">
                <!-- <ol class="breadcrumb">
                    <li><a href="#">Profile</a></li>
                </ol> -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row profile_page">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <!-- <div class="col-lg-3">
                        <div class="white-box">
                            <h3>My Profile</h3>
                            <form id="profile_form" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="picture-container">
                                    <div class="picture card-avatar">
                                        <div class="edit edit-profile-img">
                                            <a data-toggle="modal" data-target="#cropimg"
                                               id="wizardPicturePreview"><i class="fa fa-pencil fa-lg"></i>
                                            </a>
                                        </div>
                                        <input type="file" name="file_name" id="file" accept=".jpg,.jpeg,.png" onchange="changeImage(this);"/>
                                        @if(file_exists(public_path('/uploads').'/'.$user->image))
                                            <img src="{{ isset($user->image)? asset('/uploads').'/'.$user->image : asset('/images/BodyF1RST_logo-revised.png')}}"class="picture-src" title="" id="blah1" style="width: 135px;height:135px;border-radius: 50%;">

                                        @else

                                            <img src="https://dev.bodyf1rst.com/plugins/images/users/varun.jpg" class="picture-src" id="blah1" title="" style="height: 130px;width: 100%;border-radius: 50%;">

                                        @endif

                                    </div>

                                </div>

                            </form>

                            <h5 class="card-title">

                                {{isset($user) ? ucfirst($user->name) : ''}}

                            </h5>

                            <div id="accordion" role="tablist" class="student_profile info_accordian">

                                <div class="card-collapse">

                                    <div class="card-header">

                                        <h5 class="mb-0">

                                            <i class="fa fa-envelope" aria-hidden="true"></i>

                                            <p class="card-description">{{isset($user) ? $user->email : ''}}</p>

                                        </h5>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div> -->

                    <div class="col-lg-12">

                        <div class="white-box">

                            <h3>Manage Profile</h3>

                            <form id="profileForm">

                                @csrf()

                                <div class="row">

                                    <div class="col-md-12">

                                        <h4 id="gen-info">General Info</h4>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="name">Name:</label>

                                            <input type="text" placeholder="" class="form-control" name="name"

                                                   value="{{isset($user) ? ucfirst($user->name) : ''}}">

                                        </div>

                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="name">Email:</label>

                                            <input type="text" class="form-control filled_input" placeholder="Email"

                                                   name="email" value="{{isset($user) ? $user->email : ''}}" disabled="disabled">

                                            <i class="fa fa-lock" aria-hidden="true"></i>



                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="amount">Contact No.:</label><br>

                                            <input type="tel" id="phone"

                                                   class="form-control {{$errors->has('phone') ? 'has-error' : ''}}"

                                                   placeholder="5555555555" value="{{isset($user) ? $user->phone : ''}}"

                                                   name="phone" minlength="10" maxlength="10">

                                            <span class="error_msg">{{ $errors->first('phone') }}</span>

                                            <input type="hidden" id="dial_code" name="dial_code"

                                                   value="{{isset($user) ? $user->country_code : ''}}">

                                            <input type="hidden" id="iso2" name="iso2"

                                                   value="{{isset($user) ? $user->iso2 : ''}}">

                                        </div>

                                    </div>
                              

                                </div>


                                <div class="row">

                                    <div class="col-md-12">

                                        <h4 id="gen-info">Reset Password</h4>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="name">Current Password:</label>

                                            <input type="password" class="form-control" name="old_password"

                                                   value="{{old('old_password')}}">

                                            <span class="error_msg">{{ $errors->first('old_password') }}</span>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="amount">New Password:</label>

                                            <input type="password" class="form-control" name="new_password"

                                                   value="{{old('new_password')}}">

                                            <span class="error_msg">{{ $errors->first('new_password') }}</span>

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="name">Confirm Password:</label>

                                            <input type="password" class="form-control" name="confirm_password"

                                                   value="{{old('confirm_password')}}">

                                            <span class="error_msg">{{ $errors->first('confirm_password') }}</span>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">

                                        <button class="btn btn-rose btn-square update-btn" type="submit">Update</button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>



                </div>

            </div>

        </div>

        <!-- /.row -->

    </div>



@section('scripts')

    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

    <script>

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $(function () {

            var dateToday = new Date();

            $('#datetimepicker3').datetimepicker({

                // pickTime: false,

                format: 'DD/MM/YYYY',

                maxDate: dateToday

            });

        });

        $(document).ready(function () {

            var input = document.querySelector("#phone");

            var iti = window.intlTelInput(input, {

                initialCountry: "us",

                localizedCountries: {'us': 'United States'},

                getSelectedCountryData: true,

                separateDialCode: true



            });

            @if(isset($user))

            iti.setCountry("{{$user->iso2}}");

            @endif



            var countryData = iti.getSelectedCountryData();

            $("#dial_code").val(countryData.dialCode);

            $("#iso2").val(countryData.iso2);

            input.addEventListener('countrychange', function (v) {

                var countryData = iti.getSelectedCountryData();

                $("#dial_code").val(countryData.dialCode);

                $("#iso2").val(countryData.iso2);

            });



            $(".update-btn").on('click', function (e) {

                e.preventDefault();

                var form = $('#profileForm')[0]; // You need to use standard javascript object here

                var formData = new FormData(form);

                console.log("formData=>", formData);



                $.ajax({

                    type: "post",

                    url: "{{route('profile.update')}}",

                    data: formData,

                    processData: false,

                    contentType: false,

                    success: function (response) {

                        if (response.status == 200) {

                            console.log("success");

                            swal({

                                title: '',

                                text: response.message,

                                showConfirmButton: true,

                                confirmButtonText: 'Okay',

                                closeOnConfirm: true,

                            });

                            location.reload(true);

                        } else {

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

                        $(".error_msg").remove();

                        $.each(response.responseJSON.errors, function (index, value) {

                            $("#" + index).html('<span class="error_msg">' + value + '</span>');

                        });

                    }

                });

            });

        });



        function changeImage(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('#blah1')

                        .attr('src', e.target.result);

                };

                reader.readAsDataURL(input.files[0]);

            }

            var formDataToUpload = new FormData();

            formDataToUpload.append("image", input.files[0]);

            formDataToUpload.append("_token", "{{ csrf_token() }}");

            $.ajax({

                url: "/user/update-image",

                data: formDataToUpload,// Add as Data the Previously create formData

                type: "POST",

                contentType: false,

                processData: false,

                cache: false,

                dataType: "json", // Change this according to your response from the server.

                error: function (err) {

                    console.error(err);

                },

                success: function (data) {

                    swal({

                        title: '',

                        text: 'Image updated successfully',

                        showConfirmButton: true,

                        confirmButtonText: 'Ok!',

                        closeOnConfirm: true,

                    }, function () {

                        location.reload(true);

                    });

                    console.log(data);

                },

                complete: function () {

                    console.log("Request finished.");

                }

            });

        }





    </script>

@stop

@endsection        