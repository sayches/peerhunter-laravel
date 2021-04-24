@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="card">

                <div class="card-body">

				  <div class="row">

				  <div class="col-lg-6">

				    <div class="login-img">

				      <img src="{{asset('assets/images/logo.jpg')}}" alt="login image" width="100%" />

					</div>

				  </div>

				  <div class="col-lg-6 mt-5">

				  <div class="card-header">{{ __('Login') }}</div>

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div

						class="form-group row">

                            <!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

                            <div class="col-md-12">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">



                                @error('email')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                        </div>

                        <div class="form-group row">

                           <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->

                            <div class="col-md-12">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">



                                @error('password')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">

                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>



                                    <label class="form-check-label" for="remember">

                                        {{ __('Remember Me') }}

                                    </label>

                                </div>

                            </div>

                        </div>



                        <div class="form-group row mb-0">

                            <div class="col-md-12">

                                <button type="submit" class="btn btn-primary login_btn">

                                    {{ __('Login') }}

                                </button>                               

                            </div>

							<div class="col-lg-12 mt-4">

							  @if (Route::has('password.request'))

                                    <a class="forgot_btn mt-5" href="{{ route('password.request') }}">

                                        {{ __('Forgot Your Password?') }}

                                    </a>

                                @endif

							</div>

                        </div>

                    </form>

                  </div>

				  </div>

				</div>

            </div>

        </div>

    </div>

</div>

@endsection
