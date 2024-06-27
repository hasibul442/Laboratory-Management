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
                            <li class="breadcrumb-item active">Lab Information</li>
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

                <div class="row">
                    @foreach (App\Models\MainCompanys::where('id', 1)->get() as $lab)
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Lab Name:</th>
                                        <td>{{ $lab->lab_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $lab->lab_address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ $lab->lab_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $lab->lab_email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="text-right"><a href="javascript:void(0);" class="btn btn-info btn-sm editbtn"
                                    data-id={{ $lab->id }}><i class="fas fa-edit"></i></a></div>
                            <img src="{{ asset('/assets/HMS/lablogo/' . $lab->lab_image) }}" alt="{{ $lab->lab_name }}"
                                class="img-fluid" />
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade modal-demo2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Update Lab Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample labinfo_update" method="post" id="lab_infoForm" enctype="multipart/form-data">
                        @csrf

                        {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}
                        <input type="hidden" name="id" id="id">

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
                                <input type="file" class="form-control border-0" id="lab_image" name="lab_image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lab_address" class="col-sm-4 col-form-label">Address<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <textarea required class="form-control" id="lab_address" name="lab_address"></textarea>
                            </div>
                        </div>


                        <div class="text-center pb-2">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="submit" id="submit"
                                value="Submit" />
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    <script>
        $('body').on('click', '.editbtn', function() {
            var id = $(this).data('id');
            var url = "{{ URL::route('labdetails.edit', '') }}/" + id;
            $.ajax({
                dataType: "json",
                url: url,
                method: 'get',
                success: function(labtest) {
                    $('#id').val(labtest.id);
                    $('#lab_name').val(labtest.lab_name);
                    $('#lab_phone').val(labtest.lab_phone);
                    $('#lab_email').val(labtest.lab_email);
                    $('#lab_address').val(labtest.lab_address);
                    $('.modal-demo2').modal('show');
                },
                error: function(error) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'We have some error',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1800
                    });
                }
            });
        });

        $('#lab_infoForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('labdetails.update') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {

                    $('.modal-demo2').modal("toggle");
                    $('.modal-demo2').modal("hide");
                    Swal.fire({
                        position: 'top-mid',
                        icon: 'success',
                        title: 'Update Successfull',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1800
                    });
                    location.reload();
                    $('#lab_infoForm')[0].reset();

                },
                error: function(data) {
                    Swal.fire({
                        title: 'Alert!',
                        text: 'Something Wrong',
                        icon: 'warning',
                        showConfirmButton: false,
                    });
                    // console.log('Error:', data);
                }
            });

        });
    </script>
@endsection
