@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center reset-paswd-confirm">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
				<div class="card-header">Reset Password</div>
                    <form method="POST" action="{{ route('reset.password') }}">
                        @csrf

                      <input type="hidden" name="token" value="{{ $token }}">
                      <div class="row">
					  <div class="col-md-8 offset-md-2">
                        <div class="form-group row">
                            <!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus disabled="disabled" placeholder="Email Address">
                                <input type="hidden" name="email_old" value="{{ $email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                <span class="error_msg">{{ $errors->first('password') }}</span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <!--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>-->

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                <span class="error_msg">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                        </div>
                     </div>
					 </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="reset-pswd">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection