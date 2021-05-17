@extends('layouts.admin')

@section('PageTitle','Dashboard')

@section('content')

    <div class="container-fluid">

        <div class="row bg-title">

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                <h4 class="page-title">Dashboard</h4> </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">

                <div class="row">
                    <div class="col-md-8"><b>Total Users</b></div>

                    <div class="col-md-4">{{$userCount}}</div>
                </div>

                <div class="row">
                    <div class="col-md-8"><b>Deleted Users</b></div>

                    <div class="col-md-4">{{$deletedUsers}}</div>
                </div>

            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">

                <div class="row">
                    <div class="col-md-8"><b>Total Offers</b></div>

                    <div class="col-md-4">{{$offerCount}}</div>
                </div>

                <div class="row">
                    <div class="col-md-8"><b>Accepted Offers</b></div>

                    <div class="col-md-4">{{$offerAcceptedCount}}</div>
                </div>

            </div>

        </div>

    </div>



@section('scripts')

<script>

$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

$("#users_filter").on('change', function(){
	var type = $(this).val();
	console.log("type=>",type);
	if (type == "Weekly") {
        $(".userCountText").text($("#weeklyUsers").val());
    }
    else if (type == "Monthly") {
        $(".userCountText").text($("#monthlyUsers").val());
    }
    else {
        $(".userCountText").text($("#yearlyUsers").val());
    }
});

$("#offers_filter").on('change', function(){
    var type = $(this).val();
    console.log("type=>",type);
    if (type == "Weekly") {
        $(".offerCountText").text($("#weeklyOffers").val());
    }
    else if (type == "Monthly") {
        $(".offerCountText").text($("#monthlyOffers").val());
    }
    else {
        $(".offerCountText").text($("#yearlyOffers").val());
    }
});





</script>

@stop

@endsection

