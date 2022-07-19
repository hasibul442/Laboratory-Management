@extends('layout.master')
@section('title', 'Bill Details')
@section('content')

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Billing System</a></li>
                            <li class="breadcrumb-item active">Billing Details</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Patient Billing Details</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Bill Number</th>
                                    <td>:</td>
                                    <td>{{ $bills->bill_no }}</td>
                                </tr>
                                <tr>
                                    <th>Patient Id</th>
                                    <td>:</td>
                                    <td>{{ $bills->patients->patient_id }}</td>
                                </tr>
                                <tr>
                                    <th>Patient Name</th>
                                    <td>:</td>
                                    <td>{{ $bills->users->name }}</td>
                                </tr>
                                <tr>
                                    <th>Home Number</th>
                                    <td>:</td>
                                    <td>{{ $bills->patients->home_phone }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile Number</th>
                                    <td>:</td>
                                    <td>{{ $bills->patients->mobile_phone }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>{{ $bills->users->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <img src="{{ asset('assets/HMS/patient/'.$bills->users->profile_photo_path) }}" alt="{{ $bills->users->profile_photo_path }}" class="img-fluid rounded-circle" style="width: 200px; height: 200px" >
                    </div>

                </div>

                <div class="container">
                    <table class="table table-sm">
                        <tbody>
                            @php
                                $all_test = json_decode($bills->all_test);
                            @endphp

                            @foreach ($all_test as $test)
                                <tr>
                                    <th>{{ $test->test_name }}</th>
                                    <td>:</td>
                                    <td>{{ $test->test_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Price</th>
                                <td>:</td>
                                <td>{{ $bills->net_price }}</td>
                            </tr>
                            <tr>
                                <th>Discount</th>
                                <td>:</td>
                                <td>{{ $bills->discount }}</td>
                            </tr>

                            <tr>
                                <th>Total Price</th>
                                <td>:</td>
                                <td>{{ $bills->total_price }}</td>
                            </tr>

                            <tr>
                                <th>Paid By</th>
                                <td>:</td>
                                <td>{{ $bills->payment_type }}</td>
                            </tr>

                            <tr>
                                <th>Paid Amount</th>
                                <td>:</td>
                                <td>{{ $bills->paid_amount }}</td>
                            </tr>
                            <tr>
                                <th>Due/Return Amount</th>
                                <td>:</td>
                                <td>{{ $bills->due_amount }}</td>
                            </tr>
                            <tr>
                                <th>Approved Code</th>
                                <td>:</td>
                                <td>{{ $bills->approved_code }}</td>
                            </tr>
                            <tr>
                                <th>Bill Collected By</th>
                                <td>:</td>
                                <td>{{ $bills->employee_name }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <a href="{{ route('allbills') }}" class="btn btn-primary">Back</a>
                        <button onclick="window.print()" class="btn btn-success float-right">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
