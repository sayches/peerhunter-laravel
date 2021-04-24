@extends('layouts.admin')
@section('PageTitle','Dashboard')
@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
            <h4 class="page-title">Add User</h4>
        </div>

        <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-6 text-right">
			 <button type="submit" class="btn btn-danger waves-light backBtn"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</button>
		</div> -->
        <!-- /.col-lg-12 -->
    </div>

    <!-- /row -->

	<div class="row">

		<div class="col-md-12">

            @if(Session::has('message'))

                <div id="snackbar">

                    <p><i class="fa fa-bell"></i>{{ Session::get('message') }}</p>

                </div>

            @endif

            <div style="display: none;"></div>

        </div>

        <div class="col-sm-12">

            <div class="white-box">

            	<div class="centerLoader" id="centerLoader" style="display: none;">

					<div class="row">

					  <div class="col-md-12">

						<div class="loadingspinner"></div>

					  </div>

					</div>

				</div>

				 <form id="userFrm" method="post" name="userFrm">

				 	{{csrf_field()}}

				 <div class="row">

				 <div class="col-md-4">

				  <div class="form-group">

					<label for="name">Name:</label>

					<input type="text" class="form-control"  name="name" value="{{ isset($user) ? ucfirst($user->name): old('name') }}">

					<span id="name"></span>

				  </div>

				  </div>

				  <div class="col-md-4">

					  <div class="form-group">

						<label for="amount">Email:</label>

						<input type="email" class="form-control" name="email" value="{{ isset($user) ? ucfirst($user->email): old('email') }}">

						<span id="email"></span>

					  </div>

				  </div>
				  <div class="col-md-4">

					  <div class="form-group">

						<label for="amount">Phone No.:</label>
						<div>
						<input type="tel" class="form-control"
                               placeholder="(___) ___-____" name="phone" id="tel_phone"
                               value="{{old('phone')}}" style="padding-left: 82px !important; ">
                        <input type="hidden" id="dial_code" name="country_code"
                               value="{{old('country_code')}}">
							   <!-- <input type="hidden" id="iso2" name="iso2"
					   value="{{ isset($institute) ? $institute->iso2: old('iso2') }}"> -->
					</div>
						<span id="phone"></span>

					  </div>

				  </div>
				  

				  </div>

				  <div class="row">

				  <div class="col-lg-2">

				      <button type="submit" class="waves-effect btn btn-danger btn-block waves-effect waves-light" id="submit_btn">Submit</button>

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

        $(document).ready(function () {

        	document.forms['userFrm'].reset();



        	//Form submit

            $("#submit_btn").click(function(e){

                e.preventDefault();   

                var form = $('#userFrm')[0]; // You need to use standard javascript object here

                var formData = new FormData(form);

                $.ajax({

                    type: "post",

                    url: "{{route('user.add')}}",

                    data: formData,

                    processData: false,

                    contentType: false,

                    beforeSend: function () {

                        document.getElementById('centerLoader').style.display = 'block';

                    },

                    success: function (response) {

                        if (response.status == 200) {

                        	document.getElementById('centerLoader').style.display = 'none';

                            console.log("success");

                            swal({

                                title: '',

                                text: response.message,

                                showConfirmButton: true,

                                confirmButtonText: 'Okay',

                                closeOnConfirm: true,

                            });

                        } else {

                        	document.getElementById('centerLoader').style.display = 'none';

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

                    	document.getElementById('centerLoader').style.display = 'none';

                        $(".error_msg").remove();

                        $.each(response.responseJSON.errors, function (index, value) {

                            $("#" + index).html('<span class="error_msg">' + value + '</span>');

                        });

                    }

                });

	                

	            

            });

            var input = document.querySelector("#tel_phone");
            var iti = window.intlTelInput(input, {
                initialCountry: "us",
                localizedCountries: {'us': 'United States'},
                getSelectedCountryData: true,
				separateDialCode: true
            });
			
            var countryData = iti.getSelectedCountryData();
            $("#dial_code").val(countryData.dialCode);
			 $("#iso2").val(countryData.iso2);

            input.addEventListener('countrychange', function (v) {
                var countryData = iti.getSelectedCountryData();
                $("#dial_code").val(countryData.dialCode);
				 $("#iso2").val(countryData.iso2);
            })

            $("#tel_phone").inputmask({"mask": "(999) 999-9999"});
        });

		       

    </script>

@stop

@endsection

