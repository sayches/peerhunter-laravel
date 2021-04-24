@extends('layouts.admin')
@section('PageTitle','Plans')
@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <h4 class="page-title">Offer Details</h4> </div>
        <!-- <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
          	<button type="submit" class="btn btn-danger waves-light backBtn"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</button>  
        </div> -->
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
	<div class="row add-plans">
        <div class="col-sm-12">
            <div class="white-box">
					 <form action="" method="post">
					 	{{csrf_field()}}
					 <div class="row">
					 <div class="col-md-4">
					  <div class="form-group">
						<label for="name">Sent By:</label>
						<p>
							{{$offer->sendBy && $offer->sendBy->name ? $offer->sendBy->name : 'N/A'}}
						</p>
					  </div>
					  </div>
					  <div class="col-md-4">
					  <div class="form-group">
						<label for="amount">Sent To:</label>
						<p>
							{{$offer->sendTo && $offer->sendTo->name ? $offer->sendTo->name : 'N/A'}}
						</p>
					  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="form-group">
							<label for="amount">Range:</label>
							<p>
								{{$offer->currency.''.$offer->min_value.'-'.$offer->currency.''.$offer->max_value}}
							</p>
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="form-group">
							<label for="amount">Payment Method:</label>
							<p>
								{{$offer ? ucfirst($offer->payment_method) : 'N/A'}}
							</p>
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="form-group">
							<label for="amount">Description:</label>
							<p>
								{{$offer ? $offer->description : 'N/A'}}
							</p>
						  </div>
					  </div>
					  <div class="col-md-4">
						  <div class="form-group">
							<label for="amount">Is Offer Accepted:</label>
							<p>
								{{$offer && $offer->is_accepted == 1 ? 'Yes' : 'No'}}
							</p>
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