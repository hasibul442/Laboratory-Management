@extends('layout.master')
@section('title', 'Test Report')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
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
                <h4 class="text-center">Test Report</h4>
                <p class="text-right">
                    <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal"
                        data-target=".bs-example-modal-lg"><i class="fas fa-plus"></i> Add Test Report</button>
                </p>
                <h6 class="text-center">List of all Test Report</h6>

                <div class="table-responsive">
                    <table class="table table-hover mb-0 datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient Id</th>
                                <th>Patient Name</th>
                                <th>Invoice Number</th>
                                <th>Test Type</th>
                                <th>Upload By</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($xrayreport as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->patients->patient_id }}</td>
                                    <td>{{ $item->users->name }}</td>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $item->test->cat_name }}</td>
                                    <td>{{ $item->upload_by }}</td>
                                    <td>
                                        <a href="javascript:void(0);" data-id="{{ $item->id }}"
                                            class="test-primary btn-sm">{{ $item->status }}
                                        </a>
                                    </td>
                                    <td><img class="image" src="{{ asset('/assets/HMS/xrayreport/' . $item->image) }}"
                                            style="width: 50px; height:50px;)"></td>
                                    <td>
                                        <a href="{{ route('xrayreport.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="javascript:void(0);" data-id="{{ $item->id }}"
                                            class="btn btn-danger btn-sm deletebtn">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div> <!-- container -->


    {{-- Employees Add Models Start --}}
    <div class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Test Report</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form role="form" class="parsley-examples" id="XrayReportForm" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="patient_id" class="col-sm-4 col-form-label">Patient ID<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="patient_id" id="patient_id"
                                    class="patient_id form-control js-example-responsive" style="width: 100%">
                                    <option></option>
                                    @foreach (App\Models\Patients::get() as $item)
                                        <option value="{{ $item->user_id }}">{{ $item->users->name }} ==>
                                            {{ $item->patient_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="patient_id" class="col-sm-4 col-form-label">Invoice Number<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="invoice_number"
                                    name="invoice_number" placeholder="Invoice Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="test_type" class="col-sm-4 col-form-label">Test Type<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" id="test_type" required name="test_type">
                                    <option disabled>Choose One Option</option>
                                    @foreach (App\Models\LabTestCat::get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-4 col-form-label">Image</label>
                            <div class="col-sm-7">
                                <input type="file" id="image" name="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-4 col-form-label">Test Result<span
                                class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <textarea id="editor" name="editor" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-4 col-form-label">Signeture</label>
                            <div class="col-sm-7">
                                <input type="file" id="signeture" name="signeture">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-8 offset-sm-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Submit
                                </button>
                                <button type="button" data-dismiss="modal" class="btn btn-light waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- Employees Add Models End --}}



    <script>
        var table = $('.datatable').DataTable();
    </script>
    <script>
        $(function() {
            $('body').on('click', '.deletebtn', function() {
                var id = $(this).data("id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "If You Remove A Employee, This System Also Remove User ID. You Will Not Be Able To Recover It!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value === true) {
                        var token = $("meta[name='csrf-token']").attr("content");
                        $.ajax({
                            type: "DELETE",
                            url: "/xrayreport/" + id,
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Your file has been deleted.',
                                    icon: 'success',
                                    showConfirmButton: false,
                                });
                                location.reload();
                            },
                            error: function(data) {
                                Swal.fire({
                                    title: 'Alert!',
                                    text: 'Something Wrong',
                                    icon: 'alert',
                                    showConfirmButton: false,
                                });
                                // console.log('Error:', data);
                            }
                        })

                    }
                });
            });
        });

        $('#XrayReportForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#XrayReportForm')[0]);
            $.ajax({
                type: "post",
                url: "/xrayreport/add",
                data: myformData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#XrayReportForm").find('input').val('');
                    $('.bs-example-modal-xl').modal('hide');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1800
                    });
                    // table.draw();
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    Swal.fire({
                        title: 'Duplicate Email Recognized',
                        text: "The Email Address Already Exist",
                        icon: "warning",
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Yes'
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.patient_id').select2({
                placeholder: 'Select a Patient',
            });
        });
    </script>

    <script>
        CKEDITOR.replace( 'editor' );
    </script>

@endsection
