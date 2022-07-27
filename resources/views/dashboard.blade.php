@extends('layout.master')
@section('title','Dashboard')

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
                                        <p class="text-center dashboard-card-text">{{ App\Models\Employees::get()->count() }}</p>
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
                                        <p class="text-center dashboard-card-text">{{ App\Models\User::count() }}</p>
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
                                    <p class="text-center dashboard-card-text">{{ App\Models\Patients::get()->count() }}</p>
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
                                            $balance = App\Models\MainCompanys::where('id',1)->get();
                                        @endphp
                                        <p class="text-center dashboard-card-text">@foreach ($balance as $item)
                                            {{ $item->banance }}

                                        @endforeach</p>
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
        {{-- <div class="col-sm-4">
            <div class="card rounded">
                <div class="card-body rounded dashboard-card-body-5">
                    <div class='px-3 py-3 justify-content-between'>
                        <div class="row">
                            <div class="col-sm-3 my-auto text-center">
                                <i class="fas fa-bed fa-3x dashboard-card-icon"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4 class="card-title  text-center">Total Cabines </h4>
                                <div>
                                    <p class="text-center dashboard-card-text">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- end col -->
        <!-- Start col -->
        {{-- <div class="col-sm-4">
            <div class="card rounded">
                <div class="card-body rounded dashboard-card-body-6">
                    <div class='px-3 py-3 justify-content-between'>
                        <div class="row">
                            <div class="col-sm-3 my-auto text-center">
                                <i class="fas fa-calendar-check fa-3x dashboard-card-icon"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4 class="card-title  text-center">Today Appointment </h4>
                                <div>
                                    <p class="text-center dashboard-card-text">36</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- end col -->
        <!-- Start col -->
        {{-- <div class="col-sm-4">
            <div class="card rounded">
                <div class="card-body rounded dashboard-card-body-6">
                    <div class='px-3 py-3 justify-content-between'>
                        <div class="row">
                            <div class="col-sm-3 my-auto text-center">
                                <i class="fas fa-calendar-check fa-3x dashboard-card-icon"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4 class="card-title  text-center">Total Medicines </h4>
                                <div>
                                    <p class="text-center dashboard-card-text">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- end col -->
    </div>
    <!-- end row -->


</div> <!-- container -->


@endsection
