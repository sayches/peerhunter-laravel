@extends('layouts.dashboard')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

            <div class="col-sm-6">
                <h1>Create User</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create User</h3>
                    </div>               
                    <form method="POST" action="{{ route('users')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="name" class="form-control" id="name" name = "name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="integer" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                            </div>
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Enter Zip Code">
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country">
                            </div>
                            <div class="form-group">
                                <label>Upload Profile Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="profile_image" name="profile_image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter Description...."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Visibility Type</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visibility_type" value="public" id="public">
                                    <label class="form-check-label">Public</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visibility_type" value="private" id="private" checked>
                                    <label class="form-check-label">Private</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
