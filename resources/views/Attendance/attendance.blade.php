@extends('Layout.master')
@section('title', 'Attendance')
@section('content')

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Attendance</a></li>
                            <li class="breadcrumb-item active">Attendance</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Attendance List</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="text-center">All Attendance List</h4>

                <div class="table-responsive">
                    <table class="table activities_datatable" id="activities_datatable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Employees Name</th>
                                {{-- <th>Employees ID</th> --}}
                                <th>Enter Date & Time</th>
                                <th>Exit Date & Time</th>
                                {{-- <th>Activity</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(function() {
            $('.activities_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('Attendance') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'user_name',
                        name: 'user_name'
                    },
                    // { data: 'employeesid', name: 'employeesid' },
                    {
                        data: 'enters_time',
                        name: 'enters_time'
                    },
                    {
                        data: 'exits_time',
                        name: 'exits_time'
                    },
                    // { data: 'activity', name: 'activity' },
                ]
            });
        });
    </script>
@endsection
