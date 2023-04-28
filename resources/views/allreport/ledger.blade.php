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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Report Genaration</a></li>
                            <li class="breadcrumb-item active">Accounts Statement</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Accounts Statement</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Account Statement Over a Specified Period</h2>
                <form action="/ledger/details">

                    <div class="form-group ">
                        <label for="datepicker" class="text-dark">From Date</label>
                        <input type="text" required class="form-control border border-primary" name="from"
                            id="from">
                    </div>
                    <div class="form-group">
                        <label for="datepicker" class="text-dark">To Date</label>
                        <input type="text" required class="form-control border border-primary" name="to"
                            id="to">
                    </div>


                    <div class="text-right">
                        <button type="submit" class="btn btn-dark">Report</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            minDate = new DateTime($('#from'), {
                format: 'YYYY-MM-DD'
            });
            maxDate = new DateTime($('#to'), {
                format: 'YYYY-MM-DD'
            });
        });
    </script>
@endsection
