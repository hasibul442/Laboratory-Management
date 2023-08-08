@extends('Layout.master')
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
                <div id="printarea">
                    <div class="text-center mt-3">
                        @foreach (App\Models\MainCompanys::where('id', 1)->get() as $item)
                            <img src="{{ asset('/assets/HMS/lablogo/' . $item->lab_image) }}" alt="Lab Logo"
                                style="width: 80px; height: 80px" class="img-fluid"> <br />
                        @endforeach
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="h4">Invoice Number : {{ $bills->bill_no }}</span><br>
                                <span class="h6">Patient Id : {{ $bills->patients->patient_id }}</span><br>
                                <span class="h6">Patient Name : {{ $bills->patients->name }}</span><br>
                                <span class="h6">Mobile Number : {{ $bills->patients->mobile_number }}</span><br>
                            </div>

                            <div class="col-sm-6">
                                <div class="text-right">
                                    @foreach (App\Models\MainCompanys::where('id', 1)->get() as $item)
                                        <span class="h4">{{ $item->lab_name }}</span><br>
                                        <span class="h6">{{ $item->lab_address }}</span><br>
                                        <span class="h6">{{ $item->lab_phone }}</span><br>
                                        <span class="h6">{{ $item->lab_email }}</span><br>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="container mt-5">
                        <table class="table table-sm">
                            <tbody>
                                @php
                                    $all_test = json_decode($bills->all_test);
                                @endphp
                                <tr>
                                    <th>S/N</th>
                                    <th>Test Name</th>
                                    <th class="text-right">Price</th>
                                </tr>

                                @foreach ($all_test as $test)
                                    <tr>
                                        <td style="width: 50px">{{ $loop->iteration }}</td>
                                        <td>{{ $test->test_name }}</td>
                                        <td class="text-right">{{ number_format($test->test_price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 text-right">
                                <h3 class="text-right">{{ number_format($bills->net_price, 2) }}</h3>
                                <h4 class="text-right">{{ number_format($bills->discount, 2) }}</h4>
                                <h3 class="text-right">{{ number_format($bills->total_price, 2) }}</h3>
                                <h4 class="text-right">{{ $bills->payment_type }}</h4>
                                <h4 class="text-right">{{ number_format($bills->paid_amount, 2) }}</h4>
                                <h4 class="text-right">{{ number_format($bills->due_amount, 2) }}</h4>
                            </div>

                            <div class="p-2">
                                <h3>Total Amount :</h3>
                                <h4>Discount :</h4>
                                <h3>Net Amount :</h3>
                                <h4>Payment Method :</h4>
                                <h4>Paid Amount :</h4>
                                <h4>Due/Return Amount :</h4>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <button onclick="window.history.back()" class="btn btn-primary">Back</button>
                        <button onclick="myFunction('printarea')" class="btn btn-success float-right">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction(el) {
            var getFullContent = document.body.innerHTML;
            var printsection = document.getElementById(el).innerHTML;
            document.body.innerHTML = printsection;
            window.print();
            document.body.innerHTML = getFullContent;
        }
    </script>
@endsection
