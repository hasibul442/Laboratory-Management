@extends('Layout.master')
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
                    <h4 class="page-title">Inventory Purchase History</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Inventory Purchase History List</h4>
                <div class="table-responsive">
                    <table class="table display  historydatatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Name</th>
                                <th>Date of Purchase</th>
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
    </div>

    <script>
        $('.historydatatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('inventories.history') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'itemname',
                    name: 'itemname'
                },
                {
                    data: 'dateofpurches',
                    name: 'dateofpurches'
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
                        url: "{{ URL::route('inventories.history.destroy', '') }}/" + id,
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
    </script>
@endsection
