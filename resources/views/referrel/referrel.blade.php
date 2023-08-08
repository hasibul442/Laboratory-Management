@extends('Layout.master')
@section('title', 'Referrel')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Referral List</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Referral System</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="text-center">List of all Referrals</h4>
                <p class="text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Referrelmodel"><i
                            class="fas fa-plus"></i> New Referred</button>
                </p>
                {{-- <h6 class="text-center">List of all employees</h6> --}}


                <div class="table-responsive">
                    <table class="table table-hover mb-0 ref_datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Hospital Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Bank Name</th>
                                <th>Account Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Referral System Add Start --}}
    <div class="modal fade" id="Referrelmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Referrals Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" class="parsley-examples" id="ReferrelForm" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Full Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="name"
                                    name="name" placeholder="Mr. Jon Rechard">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hospitalname" class="col-sm-4 col-form-label">Hospital Name</label>
                            <div class="col-sm-7">
                                <input type="text" parsley-type="text" class="form-control" id="hospitalname"
                                    name="hospitalname" placeholder="ex. ABC Hospital">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="email" required class="form-control" id="email" name="email"
                                    placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label">Phone Number<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="phone" required class="form-control" id="phone" name="phone"
                                    placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-4 col-form-label">Bank Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required class="form-control" id="bank_name" name="bank_name"
                                    placeholder="Bank Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_number" class="col-sm-4 col-form-label">Account Number<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required class="form-control" id="account_number"
                                    name="account_number" placeholder="ex.5052535126">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Address<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <textarea class="form-control" required id="address" name="address" placeholder="Address"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-8 offset-sm-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Register
                                </button>
                                <button type="button" data-dismiss="modal" class="btn btn-light waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Referral System Add End --}}

    {{-- Referral System Edit Start --}}
    <div class="modal fade" id="ReferrelEditmodel" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Referrels Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" class="parsley-examples" id="ReferrelEditForm" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div style=" display:none">
                            <input type="text" name="id" id="id">
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Full Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="name1"
                                    name="name1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hospitalname1" class="col-sm-4 col-form-label">Hospital Name</label>
                            <div class="col-sm-7">
                                <input type="text" parsley-type="text" class="form-control" id="hospitalname1"
                                    name="hospitalname1" placeholder="ex. ABC Hospital">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="email" required class="form-control" id="email1" name="email1"
                                    placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label">Phone Number<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="phone" required class="form-control" id="phone1" name="phone1"
                                    placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_name1" class="col-sm-4 col-form-label">Bank Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required class="form-control" id="bank_name1" name="bank_name1"
                                    placeholder="Bank Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_number1" class="col-sm-4 col-form-label">Account Number<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required class="form-control" id="account_number1"
                                    name="account_number1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Address<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <textarea class="form-control" required id="address1" name="address1" placeholder="Address"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-8 offset-sm-4">
                                <button type="button" data-dismiss="modal" class="btn btn-warning waves-effect">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Referral System Edit End --}}
    <script>
        $(function() {
            var table = $('.ref_datatable').DataTable({
                processing: true,
                serverSide: false,
                pageLength: 25,

                ajax: {
                    url: "{{ route('referrels.list') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    }, {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'hospitalname',
                        name: 'hospitalname'
                    }, {
                        data: 'email',
                        name: 'email'
                    }, {
                        data: 'phone',
                        name: 'phone'
                    }, {
                        data: 'bank_name',
                        name: 'bank_name'
                    }, {
                        data: 'account_number',
                        name: 'account_number'
                    }, {
                        data: 'address',
                        name: 'address'
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    }
                ]
            });
            console.log(table);

            $('#ReferrelForm').on('submit', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var myformData = new FormData($('#ReferrelForm')[0]);
                $.ajax({
                    type: "POST",
                    url: "{{ route('referrals.store') }}",
                    data: myformData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        $("#ReferrelForm").find('input').val('');
                        $('#Referrelmodel').modal('hide');
                        $('#ReferrelForm')[0].reset();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 1800
                        });
                        table.draw();
                        // location.reload();
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'Opps...',
                            text: "Look Like We Have Some Probelms",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Yes'
                        });
                    }
                });
            });

            $('body').on('click', '.deletebtn', function() {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "If You Remove A Referral You Will Not Be Able To Recover It!",
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
                            url: "{{ URL::route('referrals.destroy', '') }}/" + id,
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function(result1) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Referral Removed ',
                                    text: "You Have Removed A Referral",
                                    showConfirmButton: false,
                                    timerProgressBar: true,
                                    timer: 1800
                                });
                                table.ajax.reload();
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
                    }
                });
            });

            $('body').on('click', '.editbtn', function() {
                var id = $(this).data('id');
                $.ajax({
                    dataType: "json",
                    url: "{{ URL::route('referrals.edit', '') }}/" + id,
                    method: 'get',
                    success: function(result) {
                        $('#id').val(result.id);
                        $('#name1').val(result.name);
                        $('#hospitalname1').val(result.hospitalname);
                        $('#email1').val(result.email);
                        $('#phone1').val(result.phone);
                        $('#bank_name1').val(result.bank_name);
                        $('#account_number1').val(result.account_number);
                        $('#address1').val(result.address);
                        $('#ReferrelEditmodel').modal('show');
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

            $('#ReferrelEditForm').submit(function(e) {
                e.preventDefault();
                var id = $('#id').val();
                var email1 = $('#email1').val();
                var name1 = $('#name1').val();
                var hospitalname1 = $('#hospitalname1').val();
                var phone1 = $('#phone1').val();
                var bank_name1 = $('#bank_name1').val();
                var account_number1 = $('#account_number1').val();
                var address1 = $('#address1').val();
                var _token = $('input[name=_token]').val();
                $.ajax({
                    type: "PUT",
                    url: "{{ URL::route('referrals.update') }}",
                    data: {
                        'id': id,
                        'name1': name1,
                        'email1': email1,
                        'hospitalname1': hospitalname1,
                        'phone1': phone1,
                        'bank_name1': bank_name1,
                        'account_number1': account_number1,
                        'address1': address1,
                        '_token': _token
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#ReferrelEditmodel').modal('toggle');
                        $('#ReferrelEditmodel').modal('hide');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 1800
                        });
                        table.ajax.reload();
                        $('#ReferrelEditForm')[0].reset();
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire({
                            title: 'Opps...',
                            text: "Look Like We Have Some Probelms",
                            icon: "warning",
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Yes'
                        });
                    }
                });
            });

        });
    </script>

@endsection
