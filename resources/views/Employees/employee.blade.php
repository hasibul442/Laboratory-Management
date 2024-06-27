@extends('Layout.master')
@section('title', 'Employees')

@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Employees</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Employees</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Employees</h4>
                <p class="text-right">
                    <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal"
                        data-target=".bs-example-modal-lg"><i class="fas fa-plus"></i> Add Employee</button>
                </p>
                <h6 class="text-center">List of all employees</h6>

                <div class="table-responsive">
                    <table class="table table-hover mb-0 datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($employees as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->employee_id }}</td>
                                    <td>{{ $item->users->name }}</td>
                                    <td>{{ $item->users->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <input type="checkbox" class="status" id="status" data-toggle="toggle"
                                            data-on="Active" data-off="Pending" data-onstyle="success"
                                            data-offstyle="danger" data-id="{{ $item->users->id }}"
                                            {{ $item->users->status == 'Active' ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a href="{{ route('employees.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('employees.profile', $item->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
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


    </div>


    {{-- Employees Add Models Start --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Employee Register Form</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form role="form" class="parsley-examples" id="EmployeeForm" method="POST"
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
                            <label for="gender" class="col-sm-4 col-form-label">Gender<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" id="gender" required name="gender">
                                    <option selected disabled>Choose One Option</option>
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
                                <input type="date" required class="form-control" id="dob" name="dob">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="join_of_date" class="col-sm-4 col-form-label">Join of Date<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="date" required class="form-control" id="join_of_date"
                                    name="join_of_date">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-sm-4 col-form-label">Position<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required class="form-control" id="position" name="position"
                                    placeholder="ex. Lab Assistant">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salary" class="col-sm-4 col-form-label">Salary<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required class="form-control" id="salary" name="salary"
                                    placeholder="2500.00">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Address<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <textarea class="form-control" required id="address" name="address" placeholder="Address"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salary" class="col-sm-4 col-form-label">Picture/Passport<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="file" required class="form-control border-0" id="image"
                                    name="image" placeholder="2500.00">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="user_type" class="col-sm-4 col-form-label">User Role<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" id="user_type" required name="user_type">
                                    <option selected disabled>Choose One Option</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Employees">Employees</option>
                                    <option value="Accountant">Accountant</option>
                                    <option value="Receptionist">Receptionist</option>
                                    <option value="Lab Scientist">Lab Scientist</option>
                                    <option value="Radiographer">Radiographer</option>
                                    <option value="Sonographer">Sonographer</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input id="password" type="password" placeholder="Password" name="password" required
                                    class="form-control">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="hori-pass2" class="col-sm-4 col-form-label">Confirm Password
                                <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input class="form-control" type="password" name="password_confirmation" required id="password-confirm" placeholder="Enter your password" autocomplete="new-password">
                            </div>
                        </div> --}}

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
    {{-- Employees Add Models End --}}

    <script>
        $(function() {
            var table = $('.datatable').DataTable();
            $('#EmployeeForm').on('submit', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var myformData = new FormData($('#EmployeeForm')[0]);
                $.ajax({
                    type: "post",
                    url: "{{ route('employees.add') }}",
                    data: myformData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $("#EmployeeForm").find('input').val('');
                        $('.bs-example-modal-xl').modal('hide');
                        // $('#medicineaddform')[0].reset();
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
                            url: "{{ URL::route('employees.destroy', '') }}/" + id,
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
        $(document).on('change', '#status', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = 'Active';
            } else {
                var catstatus = 'Pending';
            }
            var url = "{{ URL::route('user.status', '') }}/" + id;
            $.ajax({
                dataType: "json",
                url: url,
                method: 'get',
                data: {
                    "id": id,
                    "status": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: catstatus,
                        text: "The user's status has been updated",
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1800
                    });
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
    </script>
@endsection
