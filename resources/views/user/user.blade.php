@extends('layout.master')
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
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->user_type }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        @if (Auth::user()->user_type == $item->user_type && Auth::user()->email == $item->email)
                                            <a href="#" class="btn btn-danger btn-sm disabled ">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div> <!-- container -->

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
        });
    </script>
@endsection
