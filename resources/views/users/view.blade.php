@extends('layouts.admin')
@section('PageTitle','Plans')
@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">View</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          	<button type="submit" class="btn btn-danger waves-light backBtn"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</button>  
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
	<div class="row add-plans">
        <div class="col-sm-12">
            <div class="white-box">
					 <form action="" method="post">
					 	{{csrf_field()}}
					 <div class="row">
					 <div class="col-md-6">
					  <div class="form-group">
						<label for="name">Name:</label>
						<p>{{ $user->name ? ucfirst($user->name) : 'Empty'}}</p>
					  </div>
					  </div>
					  <div class="col-md-6">
					  <div class="form-group">
						<label for="amount">Email:</label>
						<p>{{ $user->email ? $user->email : 'Empty'}}</p>
					  </div>
					  </div>
					  </div>
					  </div>
					</form> 
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
            </div>


@endsection