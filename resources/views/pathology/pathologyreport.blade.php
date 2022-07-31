@extends('layout.master')
@section('title', 'Pathology Report')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a onclick="window.history.back()">Pethology</a></li>
                            <li class="breadcrumb-item active">Test Report</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Test Report</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h3 class="text-center">{{ $pathologytest->test->cat_name }}</h3>
                <div class="row mt-5">
                    <div class="col-md-8">
                            <form class="form-horizontal" action="{{ url('/xrayreport/update/'.$pathologytest->id) }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="patient_id" class="col-sm-4 col-form-label">Patient Name<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control border-0 bg-white" id="patient_id" value="{{ $pathologytest->users->name }}" name="patient_id" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="patient_id" class="col-sm-4 col-form-label">Patient ID<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control border-0 bg-white" id="patient_id" value="{{ $pathologytest->patients->patient_id }}" name="patient_id" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="patient_id" class="col-sm-4 col-form-label">Test Name<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control border-0 bg-white" id="patient_id" value="{{ $pathologytest->test->cat_name }}" name="test_name" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-4 col-form-label">Image<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control border-0" id="image"
                                        name="image">
                                </div>
                            </div>

                            <div class="col-sm-8 offset-sm-4">
                                <a href="{{ route('xrayreport') }}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="col-md-4">
                        <img src="{{ asset('assets/HMS/employees/'.$xrayreport->users->profile_photo_path) }}" alt="{{ $employee->users->profile_photo_path }}" class="img-fluid rounded-circle" style="width: 200px; height: 200px" />
                    </div> --}}
                </div>
            </div>
        </div>

    </div>
@endsection
