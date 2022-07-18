@extends('layout.master')
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
                <h4 class="text-center">Test Billing System</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">All Test</h5>

                        <table class="table display">
                            <thead>
                                <tr>
                                    <th>Sl. <br /> No.</th>
                                    <th>Test Name</th>
                                    <th>Test Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tests as $test)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a  href="#" >{{ $test->cat_name }}</a></td>
                                        <td>{{ $test->price }}</td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Bills</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
