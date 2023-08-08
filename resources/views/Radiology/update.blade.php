@extends('Layout.master')
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
                <h3 class="text-center">{{ $radiology->test->cat_name }}</h3>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="{{ url('/radiology/result/' . $radiology->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="patient_name" class="col-sm-2 col-form-label">Patient Name<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-0 bg-white" id="patient_name"
                                        value="{{ $radiology->patients->name }}" name="patient_name" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="patient_id" class="col-sm-2 col-form-label">Patient ID<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-0 bg-white" id="patient_id"
                                        value="{{ $radiology->patients->patient_id }}" name="patient_id" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="invoice_no" class="col-sm-2 col-form-label">Invoice Number<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-0 bg-white" id="invoice_no"
                                        value="{{ $radiology->invoice->bill_no }}" name="invoice_no" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Test Result<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea id="editor" name="testresult" required>{{ $radiology->testresult }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Status<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status" id="status">
                                        <option selected value="{{ $radiology->status }}">{{ $radiology->status }}
                                        </option>
                                        <option value="Test Complete">Test Complete</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control border-0" id="image" name="image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Signeture</label>
                                <div class="col-sm-10">
                                    <input type="file" id="signeture" class="form-control border-0" name="signeture">
                                </div>
                            </div>

                            <div class="col-sm-12 offset-sm-6">
                                <a href="{{ route('radiology') }}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#editor').summernote({
                height: 300,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
        });
    </script>
@endsection
