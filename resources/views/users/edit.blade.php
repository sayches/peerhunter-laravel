@extends('layouts.admin')

@section('PageTitle', 'Users')

@section('content')



    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Edit</h4>
            </div>

            <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">

                    <button type="submit" class="btn btn-danger waves-light backBtn"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</button>

                    </div> -->

            <!-- /.col-lg-12 -->

        </div>

        <!-- /row -->

        <div class="row">

            <div class="col-sm-12">

                <div class="white-box">

                    <form id="userFrm" method="post">

                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-4">
                            <img src="{{ $user->image }}" width="100" />
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="name">Name:</label>

                                    <input type="text" class="form-control" name="name"
                                        value="{{ isset($user) ? ucfirst($user->name) : old('name') }}">

                                    <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">

                                    <span id="name"></span>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="amount">Email:</label>

                                    <input type="email" class="form-control" name="email"
                                        value="{{ isset($user) ? ucfirst($user->email) : old('email') }}">

                                    <span id="email"></span>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="amount">Phone No.:</label>
                                    <div>
                                        <input type="tel" class="form-control" placeholder="(___) ___-____" name="phone"
                                            id="tel_phonex"
                                            value="{{ isset($user) ? $user->country_code . $user->phone : old('phone') }}"
                                            style="padding-left: 82px !important; ">
                                        <!-- <input type="hidden" id="iso2" name="iso2"
                 value="{{ isset($institute) ? $institute->iso2 : old('iso2') }}"> -->

                                    </div>
                                    <span id="phone"></span>

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Verified:</label>

                                    <select class="form-control">
                                        <option>Not Verified</option>
                                        <option value="1" {{$user->is_verified ? 'selected': ''}}>Verified</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Visible:</label>

                                    <select class="form-control">
                                        <option>Not Visible</option>
                                        <option value="1" {{$user->is_visible ? 'selected': ''}}>Visible</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Blocked:</label>

                                    <select class="form-control">
                                        <option>Not Blocked</option>
                                        <option value="1" {{$user->is_blocked ? 'selected': ''}}>Blocked</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Deleted:</label>

                                    <select class="form-control">
                                        <option>Not Deleted</option>
                                        <option value="1" {{$user->is_deleted ? 'selected': ''}}>Deleted</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Device TYpe:</label>

                                    <input type="text" class="form-control" value="{{$user->device_type}}" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1">

                                <button type="submit" class="waves-effect btn btn-danger waves-effect waves-light" id="submit_btn">Submit</button>

                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

        <!-- /.row -->

    </div>

    </div>



@section('scripts')

    <script>
        $(function() {

            var dateToday = new Date();

            $('#datetimepicker3').datetimepicker({

                // pickTime: false,

                format: 'DD/MM/YYYY',

                maxDate: dateToday

            });

        });

        $(document).ready(function() {

            var input = document.querySelector("#tel_phone");
            var iti = window.intlTelInput(input, {
                getSelectedCountryData: true,
                separateDialCode: true
            });

            @if (isset($user))
                // iti.setCountry("{{ $user['country_code'] }}");
                // @endif

            var countryData = iti.getSelectedCountryData();
            $("#dial_code").val(countryData.dialCode);
            $("#iso2").val(countryData.iso2);

            input.addEventListener('countrychange', function(v) {
                var countryData = iti.getSelectedCountryData();
                $("#dial_code").val(countryData.dialCode);
                $("#iso2").val(countryData.iso2);
            })

            $("#tel_phone").inputmask({
                "mask": "(999) 999-9999"
            });

            //Form submit

            $("#submit_btn").click(function(e) {

                e.preventDefault();

                var form = $('#userFrm')[0]; // You need to use standard javascript object here

                var formData = new FormData(form);

                $.ajax({

                    type: "post",

                    url: "{{ route('user.update') }}",

                    data: formData,

                    processData: false,

                    contentType: false,

                    success: function(response) {

                        if (response.status == 200) {

                            console.log("success");

                            swal({

                                title: '',

                                text: response.message,

                                showConfirmButton: true,

                                confirmButtonText: 'Okay',

                                closeOnConfirm: true,

                            });

                            //window.location = "/users";

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

                    error: function(response) {

                        $(".error_msg").remove();

                        $.each(response.responseJSON.errors, function(index, value) {

                            $("#" + index).html('<span class="error_msg">' + value +
                                '</span>');

                        });

                    }

                });





            });



        });

    </script>

@stop

@endsection
