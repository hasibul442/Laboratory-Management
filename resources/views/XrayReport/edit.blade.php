@extends('layout.master')
@section('title', 'X-Ray Report Details Update')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('xrayreport') }}">X-Ray Report</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">X-Ray Report Update</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <div class="row mt-5">
                    <div class="col-md-8">
                            <form class="form-horizontal" action="{{ url('/xrayreport/update/'.$xrayreport->id) }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="patient_id" class="col-sm-4 col-form-label">Patient Name<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="patient_id" value="{{ $xrayreport->users->name }}" name="patient_id" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="test_type" class="col-sm-4 col-form-label">Test Type<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="test_type" name="test_type">
                                        <option selected value="{{ $xrayreport->test_id }}">{{ $xrayreport->test->cat_name }}</option>
                                        @foreach (App\Models\LabTestCat::get() as $item)
                                            <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                        @endforeach
                                    </select>
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
