@extends('Layout.master')
@section('title', 'Referral List')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Referral List</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Referral Report Genarate</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Export Data</label>
                        <div class="col-sm-10">
                            <div class='exp_buttons'></div>
                        </div>
                    </div>

                </div>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table nowrap datatable-buttons">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Total Referred</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referr as $item)
                                <tr>
                                    <td></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        {{ App\Models\Patients::where('referred_by', $item->id)->count() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var table = $('.datatable-buttons').DataTable({
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    //debugger;
                    var index = iDisplayIndexFull + 1;
                    $("td:first", nRow).html(index);
                    return nRow;
                },
                buttons: [
                    // {
                    // extend: 'copy',
                    // text: '<i class="fa fa-files-o"></i> <u>C</u>opy',
                    // className: 'btn btn-sm ',
                    // key: {
                    //     key: 'c',
                    //     altKey: true
                    //     },
                    //     exportOptions: {
                    //     columns: [':not(.hidden-print)'],
                    //     orthogonal: 'export'
                    //     },
                    // },
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv"></i> C<u>S</u>V',
                        className: 'btn btn-sm ',
                        key: {
                            key: 's',
                            altKey: true
                        },
                        exportOptions: {
                            // columns: [':not(.hidden-print)'],
                            orthogonal: 'export'
                        },
                    }, {
                        extend: 'excelHtml5',
                        text: '<i class="far fa-file-excel"></i> <u>E</u>xcel',
                        className: 'btn btn-sm ',
                        key: {
                            key: 'e',
                            altKey: true
                        },
                        exportOptions: {
                            columns: [':not(.hidden-print)'],
                            orthogonal: 'export'
                        },
                    }, {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> <u>P</u>rint',
                        className: 'btn btn-sm ',
                        key: {
                            key: 'p',
                            altKey: true
                        },
                        exportOptions: {
                            columns: [':not(.hidden-print)'],
                            orthogonal: 'export'
                        },
                    }

                ],
            });
            table.buttons().container().appendTo($('.exp_buttons'))
            //Date Filter
        });
    </script>
@endsection
