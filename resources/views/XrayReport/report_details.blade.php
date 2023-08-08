@extends('Layout.master')
@section('title', 'Report Collection')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Report Collect</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pending Report List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <div id="printarea">
                    <div class="reportprint container">
                        <div class="text-center mt-3">
                            @foreach (App\Models\MainCompanys::where('id', 1)->get() as $item)
                                <img src="{{ asset('/assets/HMS/lablogo/' . $item->lab_image) }}" alt="Lab Logo"
                                    style="width: 150px; height: 150px" class="img-fluid"> <br />
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="h3">Invoice Number : {{ $testreport->invoice->bill_no }}</span><br>
                                <span class="h5">Patient Id : {{ $testreport->patients->patient_id }}</span><br>
                                <span class="h5">Patient Name : {{ $testreport->patients->name }}</span><br>
                                <span class="h5">Mobile Number : {{ $testreport->patients->home_phone }}</span><br>
                                <span class="h5">Email : {{ $testreport->users->email }}</span><br>
                            </div>

                            <div class="col-sm-6">
                                <div class="text-right">
                                    @foreach (App\Models\MainCompanys::where('id', 1)->get() as $item)
                                        <span class="h3">{{ $item->lab_name }}</span><br>
                                        <span class="h5">{{ $item->lab_address }}</span><br>
                                        <span class="h5">{{ $item->lab_phone }}</span><br>
                                        <span class="h5">{{ $item->lab_email }}</span><br>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <h4 class="text-center">Test Name: {{ $testreport->test->cat_name }}</h4>

                        <div class="mt-5">
                            {!! $testreport->testresult !!}
                        </div>

                        <div class="mt-5">
                            @if ($testreport->signeture == null)
                                <div class="float-right">
                                    <h5 class="border-top border-dark text-dark">Signature</h5>
                                </div>
                            @else
                                <div class="float-right">
                                    <img src="{{ asset('/assets/HMS/signature/' . $testreport->signeture) }}"
                                        alt="Signeture" style="width: 100px; height: 50px" class="img-fluid">
                                    <h5 class="border-top border-dark text-dark">Signature</h5>
                                </div>
                            @endif
                        </div>


                    </div>
                </div>
                <br><br><br><br><br><br><br><br>
                <div class="row">
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
