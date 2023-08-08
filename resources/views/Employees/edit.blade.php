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
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Employees Update</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-5">{{ $employee->users->name }}</h3>
                <div class="row mt-5">
                    <div class="col-md-8">
                        <form role="form" class="parsley-examples" action="{{ route('employees.update' , $employee->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Full Name<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" parsley-type="text" class="form-control" id="name"
                                        name="name" value="{{ $employee->users->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Email<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" parsley-type="text" class="form-control" id="email"
                                        name="email" value="{{ $employee->users->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Phone<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" parsley-type="text" class="form-control" id="phone"
                                        name="phone" value="{{ $employee->phone }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-sm-4 col-form-label">Gender<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="gender" name="gender">
                                        <option selected value="{{ $employee->gender }}">{{ $employee->gender }}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-sm-4 col-form-label">Date of Birth(DOB)<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="date" value="{{ $employee->dob }}" class="form-control" id="dob"
                                        name="dob">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="join_of_date" class="col-sm-4 col-form-label">Join of Date<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="date" value="{{ $employee->join_of_date }}" class="form-control"
                                        id="join_of_date" name="join_of_date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-sm-4 col-form-label">Position<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" required class="form-control" id="position" name="position"
                                        value="{{ $employee->position }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="salary" class="col-sm-4 col-form-label">Salary<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" required class="form-control" id="salary" name="salary"
                                        value="{{ $employee->salary }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-sm-4 col-form-label">Address<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" required id="address" name="address" placeholder="Address">{{ $employee->address }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="salary" class="col-sm-4 col-form-label">Image<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control border-0" id="image" name="image">
                                </div>
                            </div>

                            <div class="col-sm-8 offset-sm-4">
                                <a href="{{ route('employees') }}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('assets/HMS/employees/' . $employee->users->profile_photo_path) }}"
                            alt="{{ $employee->users->profile_photo_path }}" class="img-fluid rounded-circle"
                            style="width: 200px; height: 200px" />
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
