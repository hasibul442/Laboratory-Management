@extends('layout.master')
@section('title', 'Employees Details Update')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('employees') }}">Employees</a></li>
                            <li class="breadcrumb-item active">Details</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Employees Details</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h3 class="text-center">{{ $employee->users->name }}</h3>

                <div class="row">
                    <div class="col-md-8">

                    </div>

                    <div class="col-md-4">
                        <img src="{{ asset('assets/HMS/employees/'.$employee->users->profile_photo_path) }}" alt="{{ $employee->users->profile_photo_path }}" class="img-fluid rounded-circle" style="width: 200px; height: 200px"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
