@extends('Layout.master')
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
                <h3 class="text-center mt-5">{{ $employee->users->name }}</h3>

                <div class="row mt-5">
                    <div class="col-md-8">
                        <table class="table display table-borderless">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Employee Id</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $employee->employee_id }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Email</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $employee->users->email }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Phone</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $employee->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Gender</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $employee->gender }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Address</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $employee->address }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Date Of Birth</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $employee->dob }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Date Of Join</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $employee->join_of_date }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Position</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $employee->position }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Salary</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $employee->salary }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">User Type</td>
                                    <td class="text-center">:</td>
                                    <td>$employee->users->user_type</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Account Status</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $employee->users->status }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="col-md-4">
                        <img src="{{ asset('assets/HMS/employees/' . $employee->users->profile_photo_path) }}"
                            alt="{{ $employee->users->profile_photo_path }}" class="img-fluid rounded-circle"
                            style="width: 200px; height: 200px" />
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <a href="{{ route('employees') }}" class="btn btn-primary">Back</a>
                        <button onclick="window.print()" class="btn btn-success float-right">Print</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
