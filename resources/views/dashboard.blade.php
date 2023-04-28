@extends('Layout.master')
@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Greeva</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->



        @if (Auth::user()->user_type == 'Admin' || Auth::user()->user_type == 'Super Admin')
            <div class="row">
                <!-- Start col -->
                <div class="col-sm-4">
                    <div class="card rounded">
                        <a href="#">
                            <div class="card-body rounded dashboard-card-body-1">
                                <div class='px-3 py-3 justify-content-between'>
                                    <div class="row">
                                        <div class="col-sm-3 my-auto text-center">
                                            <i class="fas fa-users fa-3x dashboard-card-icon"></i>
                                        </div>
                                        <div class="col-sm-9">
                                            <h4 class="card-title text-center">Active Employees</h4>
                                            <div>
                                                <p class="text-center dashboard-card-text">
                                                    {{ App\Models\Employees::get()->count() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- end col -->
                <!-- Start col -->
                <div class="col-sm-4">
                    <div class="card rounded">
                        <a href="#">
                            <div class="card-body rounded dashboard-card-body-2">
                                <div class='px-3 py-3 justify-content-between'>
                                    <div class="row">
                                        <div class="col-sm-3 my-auto text-center">
                                            <i class="fas fa-users-cog fa-3x dashboard-card-icon"></i>
                                        </div>
                                        <div class="col-sm-9">
                                            <h4 class="card-title  text-center">Users </h4>
                                            <div>
                                                <p class="text-center dashboard-card-text">{{ App\Models\User::count() }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- end col -->

                <!-- Start col -->
                <div class="col-sm-4">
                    <div class="card rounded">
                        <div class="card-body rounded dashboard-card-body-4">
                            <div class='px-3 py-3 justify-content-between'>
                                <div class="row">
                                    <div class="col-sm-3 my-auto text-center">
                                        <i class="fas fa-user-injured fa-3x dashboard-card-icon"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <h4 class="card-title  text-center">Patients </h4>
                                        <div>
                                            <p class="text-center dashboard-card-text">
                                                {{ App\Models\Patients::get()->count() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <!-- Start col -->
                <div class="col-sm-6">
                    <div class="card rounded">
                        <a href="#">
                            <div class="card-body rounded dashboard-card-body-3">
                                <div class='px-3 py-3 justify-content-between'>
                                    <div class="row">
                                        <div class="col-sm-3 my-auto text-center">
                                            <i class="fas fa-user-md fa-3x dashboard-card-icon"></i>
                                        </div>
                                        <div class="col-sm-9">
                                            <h4 class="card-title  text-center">Company Total Balance </h4>
                                            <div>
                                                @php
                                                    $balance = App\Models\MainCompanys::where('id', 1)->get();
                                                @endphp
                                                <p class="text-center dashboard-card-text">
                                                    @foreach ($balance as $item)
                                                        {{ $item->balance }}
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- end col -->

                <!-- Start col -->
                <div class="col-sm-4">
                    <div class="card rounded">
                        <div class="card-body rounded dashboard-card-body-5">
                            <div class='px-3 py-3 justify-content-between'>
                                <div class="row">
                                    <div class="col-sm-3 my-auto text-center">
                                        <i class="fas fa-bed fa-3x dashboard-card-icon"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <h4 class="card-title  text-center">Referrals </h4>
                                        <div>
                                            <p class="text-center dashboard-card-text">
                                                {{ App\Models\Referrals::get()->count() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->


            </div>
        @else
            <div class="card">
                <div class="card-body bg-dark">
                    <div class="text-center">
                        <div id="DisplayDate" class="clock mt-5 mb-5" onload="showTime()"></div>
                        <div id="MyClockDisplay" class="clock mt-5 mb-5" onload="showTime()"></div>
                    </div>
                </div>
            </div>
        @endif
        <!-- end row -->


    </div> <!-- container -->

    <script>
        function showTime() {
            var date = new Date();
            // var day = date.getDay(); // 0 - 23
            // var month = date.getMonth(); // 0 - 23
            // var year = date.getYear(); // 0 - 23
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59
            // var session = "AM";

            // if (h == 0) {
            //     h = 12;
            // }

            // if (h > 12) {
            //     h = h - 12;
            //     session = "PM";
            // }

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

            // var date1 = day+"-"+month+"-"+year;
            var time = h + ":" + m + ":" + s;
            document.getElementById("MyClockDisplay").innerText = time;
            document.getElementById("MyClockDisplay").textContent = time;
            // document.getElementById("DisplayDate").innerText = date1;
            // document.getElementById("DisplayDate").textContent = date1;


            setTimeout(showTime, 1000);

        }

        showTime();
    </script>

@endsection
