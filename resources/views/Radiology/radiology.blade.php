@extends('Layout.master')
@section('title', 'Radiology')
@section('content')

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Radiology</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Radiology Pending Test</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h1 class="text-center">Today Pending Radiology Test</h1>

                <div class="table-responsive">
                    <table class="table display  pathelogytest_datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient Id</th>
                                <th>Patient Name</th>
                                <th>Invoice Number</th>
                                <th>Test Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach (App\Models\TestReport::orderBy('id', 'DESC')->get() as $item)
                                @if ($item->test->department == 'Radiology' && $item->status == 'Pending')
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->patients->patient_id }}</td>
                                        <td>{{ $item->patients->name }}</td>
                                        <td>{{ $item->invoice->bill_no }}</td>
                                        <td>{{ $item->test->cat_name }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ route('radiologyedit', $item->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>
        $('.pathelogytest_datatable').DataTable({});
    </script>
@endsection
