@extends('Layout.master')
@section('title', 'Company Details')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Insert Lab Information</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Lab Information</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Lab Information</h3>

                <form role="form" class="parsley-examples mt-5" id="ConpanyForm" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="lab_name" class="col-sm-4 col-form-label">Lab Name<span
                                class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" required parsley-type="text" class="form-control" id="lab_name"
                                name="lab_name" placeholder="Please Insert Lab Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lab_phone" class="col-sm-4 col-form-label">Phone<span
                                class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" required parsley-type="text" class="form-control" id="lab_phone"
                                name="lab_phone" placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lab_email" class="col-sm-4 col-form-label">Email<span
                                class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="email" required class="form-control" id="lab_email" name="lab_email"
                                placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lab_image" class="col-sm-4 col-form-label">Lab Logo<span
                                class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="file" required class="form-control border-0" id="lab_image" name="lab_image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lab_address" class="col-sm-4 col-form-label">Address<span
                                class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <textarea required class="form-control" id="lab_address" name="lab_address"></textarea>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-sm-10 offset-sm-10">
                            <button type="submit" class="btn btn-success waves-effect waves-light ">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#ConpanyForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#ConpanyForm')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('labdetails.add') }}",
                data: myformData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#ConpanyForm").find('input').val('');
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
                        title: 'Something went wrong!',
                        text: "Please try again",
                        icon: "warning",
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Yes'
                    });
                }
            });
        });
    </script>
@endsection
