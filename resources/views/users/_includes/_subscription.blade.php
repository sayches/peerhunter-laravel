@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center paswd-updated">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">{{isset($message) ? "Already Updated !!!" : "Notification Status Updated !!!"}}</div>
                    @if(isset($message))
                        <p>{{$message}}</p>
                    @else
                        <p>Your have been successfully unsubscribed from mail notification</p>
                    @endif    
                    
                    <a class="btn btn-primary" style="border-radius:3px;background: #ff4c01; border: 1px solid #ff4c01; color: #fff; text-decoration: none;padding: 6px 12px;margin: 0 auto;text-align:center;font-size: 14px;font-weight: 400;line-height: 1.42857143;text-align: center;white-space: nowrap; vertical-align: middle;" href="{{url('/')}}">Go To Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
