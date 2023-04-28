@extends('Layout.master')
@section('title', 'Transection History')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Transaction</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Transaction Lists</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">

                <table class="table-hover table allpayment_datatables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Account Head</th>
                            <th>Type</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            var table = $('.allpayment_datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('transection.record') }}",
                },
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'date',
                    name: 'date'
                }, {
                    data: 'account_head',
                    name: 'account_head'
                }, {
                    data: 'type',
                    name: 'type'
                }, {
                    data: 'amount',
                    name: 'amount'
                }]
            });
        });
    </script>
@endsection
