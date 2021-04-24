@extends('layouts.admin')
@section('PageTitle','Users')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-4 col-md-2 col-sm-2 col-xs-12">
                <h4 class="page-title">Offers</h4>
            </div>
            <div class="col-lg-8 col-sm-10 col-md-10 col-xs-12 text-right">
                    
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row plans-main">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div id="snackbar">
                        <p><i class="fa fa-bell"></i>{{ Session::get('message') }}</p>
                    </div>
                @endif
                <div style="display: block;" class="toast"></div>
            </div>
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" style="width:100%;"
                                       id="plan-datatables">
                                    <thead>
                                    <tr>
                                        <th>Sent By</th>
                                        <th>Sent To</th>
                                        <th>Range</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@section('scripts')
    <script>
        //Datatable 
        (function () {
            var dtListUsers = $('#plan-datatables').dataTable({
                processing: true,
                serverSide: true,
                'ajax': "{{ route('offers.all') }}",
                responsive: true,
                columns: [
                    {data: 'sent_by', title: 'Sent By', orderable: true, searchable: true},
                    {data: 'sent_to', title: 'Sent To', orderable: true, searchable: true},
                    {data: 'range', title: 'Range', orderable: true, searchable: true},
                    {data: 'action', name: 'Actions', orderable: false, searchable: false},
                ]
            });
        })();

        //Update User Status
        $(document).on('click', ".userStatus", function (e) {
            var id = $(this).data("id");
            var status = $(this).data("act-status");
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "/users/statusupdate",
                type: 'POST',
                dataType: "JSON",
                data: {
                    "id": id,
                    "status": status,
                    "_method": 'POST',
                    "_token": token,
                },
                success: function (response) {
                    console.log(response);
                    if (response.success == 'true') {
                        $('.updateClass' + response.id).data("act-status", response.status);
                        alert("Status updated successfully");
                    }
                }
            });
        });

        //on click of delete button
        $(document).on('click', '.dlt_btn', function (e) {
            var url = $(this).data('url');
            swal({
                    title: "Are you sure want to delete it?",
                    text: "If you continue then it will be deleted permanently.",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                },

                function (isConfirm) {

                    if (isConfirm) {

                        $.ajax({

                            type: 'get',

                            url: url,

                            success: function (data) {

                                if (data.status == 200) {

                                    $("#plan-datatables").DataTable().ajax.reload();

                                    swal({

                                        title: '',

                                        text: data.message,

                                        showConfirmButton: true,

                                        confirmButtonText: 'Okay',

                                        closeOnConfirm: true,

                                    });

                                } else {

                                    swal({

                                        title: '',

                                        text: data.message,

                                        showConfirmButton: true,

                                        confirmButtonText: 'Okay',

                                        closeOnConfirm: true,

                                    });

                                }

                            },

                            error: function () {

                                console.log('Something is wrong');

                            },

                        });

                    }

                });

        });



    </script>

@stop

@endsection