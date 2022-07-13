@extends('layout.master')
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                $i = 0;
                            @endphp
                            @foreach ($users as $item)
                                <tr id="user-{{ $item->id }}">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->user_type == 'super_admin')
                                            Super Admin
                                        @elseif ($item->user_type == 'admin')
                                            Admin
                                        @elseif ($item->user_type == 'Employee')
                                            Employee
                                        @elseif ($item->user_type == 'patient')
                                            Patient
                                        @endif
                                    </td>
                                    <td>
                                        <input type="checkbox" class="status" id="status" data-toggle="toggle"
                                            data-on="Active" data-off="Pending" data-onstyle="success"
                                            data-offstyle="danger" data-id="{{ $item->id }}"
                                            {{ $item->status == 'Active' ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm"
                                            onclick="editUsers({{ $item->id }})">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        @if (Auth::user()->user_type == $item->user_type && Auth::user()->email == $item->email)
                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm disabled ">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        @else
                                            <a href="javascript:void(0);" data-id="{{ $item->id }}"
                                                class="btn btn-danger btn-sm deletebtn">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach --}}
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

                        {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}

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
                                <option value="super_admin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="employee">Employee</option>
                            </select>
                            {{-- <input class="form-control" type="text" name="user_type" value="Admin"> --}}
                        </div>

                        <div class="text-center pb-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="submit" id="submit1" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Update User Details End --}}

    <script>
        // $(document).ready(function() {
        //     $('.datatable').DataTable();
        // });

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
                $.ajax({
                    dataType: "json",
                    url: '/users/status/' + id + '/' + catstatus,
                    method: 'get',
                    success: function(result1) {
                        // console.log(result1);
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
        });

        function editUsers(id) {
            $.get("/users/edit/" + id, function(users) {
                $('#id').val(users.id);
                $('#name1').val(users.name);
                $('#email1').val(users.email);
                $('#user_type1').val(users.user_type);
                // $('#balance').val(bank.balance);
                $('#userEditModal').modal("toggle");
            });
        }
    </script>
@endsection
