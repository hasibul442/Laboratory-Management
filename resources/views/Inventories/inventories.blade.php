@extends('layout.master')
@section('title', 'Inventory Management')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Inventory Management</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Inventory Management System</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h4 class="text-center">All Inventory List</h4>
                <p class="text-right">
                    <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal"
                        data-target=".newinventory"><i class="fas fa-plus"></i> New Inventory</button>
                </p>
                <table class="table display  datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Inventory Name</th>
                            <th>Brand Name</th>
                            <th>Shop Name</th>
                            <th>Quantity</th>
                            <th>Amount/Price</th>
                            <th>Document</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- Employees Add Models Start --}}
    <div class="modal fade  newinventory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">New Inventory</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form role="form" class="parsley-examples" id="inventoryForm" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Product Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="name"
                                    name="name" placeholder="ex. ICSI Micromanipulator">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brandname" class="col-sm-4 col-form-label">Brand Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="brandname"
                                    name="brandname" placeholder="ex. Nikon">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shopname" class="col-sm-4 col-form-label">Shop Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="shopname"
                                    name="shopname" placeholder="ex. XYZ Enterprise">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quentity" class="col-sm-4 col-form-label">Quantity<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="quentity"
                                    name="quentity" placeholder="5">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quentity" class="col-sm-4 col-form-label">Amount<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="amount"
                                    name="amount" placeholder="1500000.00">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="document" class="col-sm-4 col-form-label">Document</label>
                            <div class="col-sm-7">
                                <input type="file" parsley-type="text" class="form-control" id="document"
                                    name="document">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-8 offset-sm-4">
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                    Save
                                </button>
                                <button type="button" data-dismiss="modal" class="btn btn-light waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- Employees Add Models End --}}


    <script>
        $(function() {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('inventories') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'brandname',
                        name: 'brandname'
                    },
                    {
                        data: 'shopname',
                        name: 'shopname'
                    },
                    {
                        data: 'quentity',
                        name: 'quentity'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'document',
                        name: 'document'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

            $('#inventoryForm').on('submit', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var myformData = new FormData($('#inventoryForm')[0]);
                $.ajax({
                    type: "post",
                    url: "/inventories/add",
                    data: myformData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $("#inventoryForm").find('input').val('');
                        $('.newinventory').modal('hide');
                        // $('#medicineaddform')[0].reset();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 1800
                        });
                        // table.draw();
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire({
                            title: 'Duplicate Email Recognized',
                            text: "The Email Address Already Exist",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Yes'
                        });
                    }
                });
            });

            $('body').on('click', '.deletebtn', function() {
                var id = $(this).data("id");
                Swal.fire({
                    title: 'Are you sure?',
                    // text: "If You Remove A Employee, This System Also Remove User ID. You Will Not Be Able To Recover It!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value === true) {
                        var token = $("meta[name='csrf-token']").attr("content");
                        $.ajax({
                            type: "DELETE",
                            url: "/inventories/" + id,
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Your file has been deleted.',
                                    icon: 'success',
                                    showConfirmButton: false,
                                });
                                location.reload();
                            },
                            error: function(data) {
                                Swal.fire({
                                    title: 'Alert!',
                                    text: 'Something Wrong',
                                    icon: 'alert',
                                    showConfirmButton: false,
                                });
                                // console.log('Error:', data);
                            }
                        })

                    }
                });
            });
        });
    </script>
@endsection
