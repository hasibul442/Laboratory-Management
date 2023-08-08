@extends('Layout.master')
@section('title', 'Pathology Report')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a onclick="window.history.back()">Pethology</a></li>
                            <li class="breadcrumb-item active">Test Report</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Test Report</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h3 class="text-center">{{ $pathologytest->test->cat_name }}</h3>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <form class="form-horizontal" action="{{ url('/pathology/result/' . $pathologytest->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="patient_name" class="col-sm-2 col-form-label">Patient Name<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-0 bg-white" id="patient_name"
                                        value="{{ $pathologytest->patients->name }}" name="patient_name" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="patient_id" class="col-sm-2 col-form-label">Patient ID<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-0 bg-white" id="patient_id"
                                        value="{{ $pathologytest->patients->patient_id }}" name="patient_id" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="invoice_no" class="col-sm-2 col-form-label">Invoice Number<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control border-0 bg-white" id="invoice_no"
                                        value="{{ $pathologytest->invoice->bill_no }}" name="invoice_no" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="editor" class="col-sm-2 col-form-label">Test Result<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea id="editor" name="testresult" required>{{ $pathologytest->testresult }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Status<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status" id="status">
                                        <option selected value="{{ $pathologytest->status }}">{{ $pathologytest->status }}
                                        </option>
                                        <option value="Test Complete">Test Complete</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control border-0" id="image" name="image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Signeture</label>
                                <div class="col-sm-10">
                                    <input type="file" id="signeture" class="form-control border-0" name="signeture">
                                </div>
                            </div>

                            <div class="col-sm-8 offset-sm-4">
                                <a href="{{ route('pathology') }}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                    @if ($pathologytest->elementuse == null)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center">Instrument Need To Use</h4>

                                    <form class="insert-form InstrumentForm"
                                        action="{{ url('/pathology/inventory/' . $pathologytest->id) }}" id="InstrumentForm"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="{{ $pathologytest->id }}" name="testreport_id"
                                            id="testreport_id">
                                        <table class="table  nowrap table-borderless table_field table-sm"
                                            id="table_field">
                                            <thead>
                                                <tr>
                                                    <th> S/N </th>
                                                    <th> Instrument <br /> Name </th>
                                                    <th> Quantity </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody id="items" class="items">

                                            </tbody>
                                        </table>

                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit"
                                                    class="btn btn-success waves-effect waves-light mr-1">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center">Instrument List</h4>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <th>S/N</th>
                                                <th>Instrument Name</th>
                                                <th>Quantity</th>
                                            </thead>
                                            <tbody>
                                                @foreach (App\Models\Inventories::get() as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><a href="javascript:void(0);" class="instrument"
                                                                id="instrument"
                                                                data-id="{{ $item->id }}">{{ $item->name }}</a>
                                                        </td>
                                                        <td>
                                                            @if ($item->stock < 10 && $item->stock > 0)
                                                                <span
                                                                    class="text-warning font-weight-bold">{{ $item->stock }}</span><span
                                                                    class="badge badge-pill badge-warning float-right">Stock
                                                                    <br>Going Low</span>
                                                            @elseif ($item->stock == 0)
                                                                <span
                                                                    class="text-danger font-weight-bold">{{ $item->stock }}</span><span
                                                                    class="badge badge-pill badge-danger float-right">Out
                                                                    of <br>Stock</span>
                                                            @else
                                                                <span class="font-weight-bold">{{ $item->stock }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6">
                            <h4 class="text-center">Instrument Used</h4>
                            @php
                                $elementuse = json_decode($pathologytest->elementuse);
                            @endphp
                            <table class="table">
                                <thead>
                                    <th>S/N</th>
                                    <th>Instrument Name</th>
                                    <th>Quantity Used</th>
                                </thead>
                                <tbody>
                                    @foreach ($elementuse as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->instrument_name }}</td>
                                            <td>{{ $item->quantity_used }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#editor').summernote({
                height: 300,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
        });
    </script>

    <script>
        $(document).on('click', '#instrument', function() {
            var instrument_id = $(this).attr('data-id');
            let n = ($('#items tr').length - 0) + 1;
            if ($(".item-in-cart").toArray().map(el => el.getAttribute("data-id")).includes(instrument_id)) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Already Added',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 1800
                });
            } else {
                $.get("/pathology/inventory/" + instrument_id, function(data) {
                    if (data.stock == 0) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            title: 'Out of Stock',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 1800
                        });
                    } else {
                        var tr = $('#items').append(`<tr class="item-in-cart" data-id="${instrument_id}">
                        <td>${n}<input type="hidden" value="${data.id}" class="id_" name="id_[]" id="id_"/></td>
                        <td>${data.name} <input type="hidden" value="${data.name}" class="form-control instrument_name border-0 bg-white" id="instrument_name_" name="instrument_name[]" readonly></td>
                        <td>1<input type="hidden" value="1" class="item-in-cart-cost form-control stock border-0 bg-white"  id="stock_" name="stock[]" readonly></td>
                        <td><button name="remove" class="btn btn-danger btn-sm remove" id="remove"><i class="fas fa-eraser"></i> </button></td>
                        </tr>`);
                    }
                });
            }

            $('.items').delegate(".remove", "click", function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
@endsection
