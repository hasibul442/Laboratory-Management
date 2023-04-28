@extends('Layout.master')
@section('title', 'Lab Test Category')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Billing System</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Patient Billing System</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <table class="table-hover table allbill_datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bill No</th>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
                            <th>All Test</th>
                            <th>Bill Date</th>
                            <th>Net Amount</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            var table = $('.allbill_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('allbills') }}",
                },
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'bill_no',
                    name: 'bill_no'
                }, {
                    data: 'patient_id',
                    name: 'patient_id'
                }, {
                    data: 'patient_name',
                    name: 'patient_name'
                }, {
                    data: 'all_test',
                    name: 'all_test'
                }, {
                    data: 'billing_date',
                    name: 'billing_date'
                }, {
                    data: 'net_price',
                    name: 'net_price'
                }, {
                    data: 'discount',
                    name: 'discount'
                }, {
                    data: 'total_price',
                    name: 'total_price'
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                }],
            });
        });
    </script>
@endsection
