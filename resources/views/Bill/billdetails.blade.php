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
                        <span class="h4">Invoice Number : {{ $bills->bill_no }}</span><br>
                        <span class="h6">Patient Id : {{ $bills->patients->patient_id }}</span><br>
                        <span class="h6">Patient Name : {{ $bills->users->name }}</span><br>
                        <span class="h6">Mobile Number : {{ $bills->patients->home_phone }}</span><br>
                        <span class="h6">Patient Name : {{ $bills->users->name }}</span><br>
                        <span class="h6">Email : {{ $bills->users->email }}</span><br>
                    </div>

                    <div class="col-md-6">
                        {{-- <img src="{{ asset('assets/HMS/patient/'.$bills->users->profile_photo_path) }}" alt="{{ $bills->users->profile_photo_path }}" class="img-fluid rounded-circle" style="width: 200px; height: 200px" > --}}
                        <div class="float-right">
                            <p>Hospital Logo</p>
                        <h3>ABCD Lab</h3>
                        <span>Dhaka, Bangladesh</span><br>
                        <span>Phone: +880123456789</span><br>
                        <span>Email: abc@gmail.com</span>
                        </div>
                    </div>

                </div>

                <div class="container-fluid">
                    <table class="table table-sm">
                        <tbody>
                            @php
                                $all_test = json_decode($bills->all_test);
                            @endphp

                            @foreach ($all_test as $test)
                                <tr>
                                    <th>{{ $test->test_name }}</th>
                                    <td>:</td>
                                    <td>{{ number_format($test->test_price, 2) }}</td>
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
