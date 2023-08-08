@extends('Layout.master')
@section('title', 'Users')

@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Users</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h4 class="text-center">List Of Users</h4>

                <div class="table-responsive">
                    <table class="table table-hover mb-0 datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Status</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div> <!-- container -->

    {{-- Update User Details Start --}}
    <div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="forms-sample" id="userEditForm" enctype="multipart/form-data">

                        @csrf
                        <div style=" display:none">
                            <input type="text" name="id" id="id">
                        </div>

                        <div class="form-group mb-3">
                            <label for="name1">Full Name</label>
                            <input class="form-control" type="text" id="name1" name="name1">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email1">Email address</label>
                            <input class="form-control" type="email" id="email1" name="email1">
                        </div>

                        <div class="form-group mb-3">
                            <label for="user_type1">Admin Roll</label>
                            <select class="form-control" name="user_type1" id="user_type1">
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

                        <div class="text-center pb-2">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="submit" id="submit1" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Update User Details End --}}

    {{-- Update User Details Start --}}
    <div class="modal fade" id="passchangeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <h3 class="text-center">Password Update by Admin</h3>
                <div class="modal-body">
                    <form class="forms-sample" id="passchangeForm" enctype="multipart/form-data">

                        @csrf
                        <div style=" display:none">
                            <input type="text" name="id" id="id1">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">New Password <small>(minimun 8 letter)</small></label>
                            <input class="form-control" type="password" id="password" name="password" min="8">
                        </div>
                        <div class="text-center pb-2">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="submit" id="submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Update User Details End --}}

    <script>
        $(function() {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('user') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'user_type',
                        name: 'user_type'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'permission',
                        name: 'permission'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
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
                        id: id,
                        status: catstatus,
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
                        // alert(catstatus);
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

            $('body').on('click', '.deletebtn', function() {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "If You Remove A User Account, This System Also Remove Employee ID. You Will Not Be Able To Recover It!",
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
                            url: "{{ URL::route('user.delete', '') }}/" + id,
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function(result1) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'User Deleted',
                                    text: "The user has been deleted",
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
                var url = "{{ URL::route('user.edit', '') }}/" + id;
                $.ajax({
                    dataType: "json",
                    url: url,
                    method: 'get',
                    success: function(user) {
                        $('#id').val(user.id);
                        $('#name1').val(user.name);
                        $('#email1').val(user.email);
                        $('#user_type1').val(user.user_type);
                        $('#userEditModal').modal('show');
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

            $('#userEditForm').submit(function(e) {
                e.preventDefault();
                var id = $('#id').val();
                var name1 = $('#name1').val();
                var email1 = $('#email1').val();
                var user_type1 = $('#user_type1').val();
                var _token = $('input[name=_token]').val();
                $.ajax({
                    type: "PUT",
                    url: "{{ route('user.update') }}",
                    data: {
                        "id": id,
                        "name1": name1,
                        "email1": email1,
                        "user_type1": user_type1,
                        "_token": _token,
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#userEditModal').modal('toggle');
                        $('#userEditModal').modal('hide');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'User Updated',
                            text: "The user has been updated",
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 1800
                        });

                        table.ajax.reload();
                        $('#userEditForm')[0].reset();
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

            $('body').on('click', '.passchange', function() {
                var id = $(this).data('id');
                var url = "{{ URL::route('user.edit', '') }}/" + id;
                $.ajax({
                    dataType: "json",
                    url: url,
                    method: 'get',
                    success: function(user) {
                        $('#id1').val(user.id);
                        $('#password').val();
                        $('#passchangeModal').modal('show');
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

            $('#passchangeForm').submit(function(e) {
                e.preventDefault();
                var id = $('#id1').val();
                var password = $('#password').val();
                var _token = $('input[name=_token]').val();
                $.ajax({
                    type: "PUT",
                    url: "{{ route('user.pass.update') }}",
                    data: {
                        "id": id,
                        "password": password,
                        "_token": _token,
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#passchangeModal').modal('toggle');
                        $('#passchangeModal').modal('hide');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'User Updated',
                            text: "The user has been updated",
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 1800
                        });

                        table.ajax.reload();
                        $('#userEditForm')[0].reset();
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
            })
        });
    </script>

    <script>
        $(document).on('change', '#employees', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.employees', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Employee',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#patitents', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.patitents', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Patient',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#testcategory', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.testcategory', '') }}/" + id,
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                method: 'get',
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Test-Category',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#referral', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.referral', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Referral System',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#billing', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.billing', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Billing System',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#pathology', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.pathology', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Pathology Department',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#radiology', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.radiology', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Radiology Department',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#electrocardiography', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.electrocardiography', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Electrocardiography Department',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#ultrasonography', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.ultrasonography', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Ultrasonography Department',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#reportbooth', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.reportbooth', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Report Booth',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#financial', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.financial', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Financial Management System',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#report_g', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.report_g', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Report Generator',
                        text: "The user's Permission has been updated",
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

        $(document).on('change', '#inventory', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = '1';
            } else {
                var catstatus = '0';
            }
            $.ajax({
                dataType: "json",
                url: "{{ URL::route('user.inventory', '') }}/" + id,
                method: 'get',
                data: {
                    "id": id,
                    "catstatus": catstatus,
                },
                success: function(result1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Permission Given In Inventory',
                        text: "The user's Permission has been updated",
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

        // $(document).on('change', '#patitents', function() {
        //     var id = $(this).attr('data-id');
        //     if (this.checked) {
        //         var catstatus = '1';
        //     } else {
        //         var catstatus = '0';
        //     }
        //     $.ajax({
        //         dataType: "json",
        //         url: "{{ URL::route('user.patitents', '') }}/" + id,
        //         method: 'get',
        //         data: {
        //             "id": id,
        //             "catstatus": catstatus,
        //         },
        //         success: function(result1) {
        //             Swal.fire({
        //                 position: 'top-end',
        //                 icon: 'success',
        //                 title: 'Permission Given In Patient',
        //                 text: "The user's Permission has been updated",
        //                 showConfirmButton: false,
        //                 timerProgressBar: true,
        //                 timer: 1800
        //             });
        //         },
        //         error: function(error) {
        //             Swal.fire({
        //                 position: 'top-end',
        //                 icon: 'error',
        //                 title: 'We have some error',
        //                 showConfirmButton: false,
        //                 timerProgressBar: true,
        //                 timer: 1800
        //             });
        //         }
        //     });
        // });
    </script>
@endsection
