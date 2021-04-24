@extends('layouts.admin')
@section('PageTitle','Users')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-4 col-md-2 col-sm-2 col-xs-12">
                <h4 class="page-title">Reports</h4>
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
                                        <th>Reported By</th>
                                        <th>Report To</th>
                                        <th>Reason</th>
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
    <div class="modal fade" id="csvModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title lead-popup" id="modalHeading">Report Detail</h4>
                </div>
                <div class="modal-body pt-0">
                    <form id="contact_form" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="report_by">Reported By:</label>
                                    <input type="text" class="form-control" id="report_by" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="report_to">Reported To:</label>
                                    <input type="text" class="form-control" id="report_to" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="option">Reason:</label>
                                    <input type="text" class="form-control" id="option" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="comment">Comment:</label>
                                    <textarea class="form-control" id="comment" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script>
        //Datatable 
        (function () {
            var dtListUsers = $('#plan-datatables').dataTable({
                processing: true,
                serverSide: true,
                'ajax': "{{ route('reports.all') }}",
                responsive: true,
                columns: [
                    {data: 'report_by', title: 'Reported By', orderable: true, searchable: true},
                    {data: 'report_to', title: 'Report To', orderable: true, searchable: true},
                    {data: 'option', title: 'Reason', orderable: true, searchable: true},
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

        //Update User Status
        $(document).on('click', ".warning-btn", function (e) {
            var id = $(this).data("id");
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{route('send.warning')}}",
                type: 'POST',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'POST',
                    "_token": token,
                },
                success: function (response) {
                    alert("Warning send successfully");
                }
            });
        });

        $(document).on('click', ".view-btn", function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            console.log("url=>",url);
            $.get(url, function (data) {
                $('#csvModal').modal("show");
                console.log("data=>", data,);
                if (data.data){
                    $("#report_by").val(data.data.report_by);
                    $("#report_to").val(data.data.report_to);
                    $("#option").val(data.data.option);
                    $("#comment").val(data.data.comment);
                }
            });
        });

         $(document).on('click', ".block_btn", function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            console.log("url=>",url);
            $.get(url, function (data) {
                
                swal({

                    title: '',

                    text: data.message,

                    showConfirmButton: true,

                    confirmButtonText: 'Okay',

                    closeOnConfirm: true,

                });
                location.reload();
                
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