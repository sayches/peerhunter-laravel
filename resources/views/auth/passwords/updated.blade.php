@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center paswd-updated">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">Password Updated !!!</div>
                        You have been logged out from all devices.
                     @if($assignedRole == 'user')
                        Please login again using our mobile app.
                    @endif
                    @if($assignedRole == 'admin')
                        Please Log In again
                        <a href="/login">Log In</a>
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
