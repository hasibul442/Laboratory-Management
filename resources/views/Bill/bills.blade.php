@extends('Layout.master')
@section('title', 'Lab Test Category')
@section('content')

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Billing System</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Patient Billing System</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @php
            $latest = App\Models\Bills::latest()->first();
            if (!$latest) {
                $nextInvoiceNumber = '#000001';
            } else {
                $string = preg_replace('/[^0-9\.]/', '', $latest->bill_no);
                $nextInvoiceNumber = '#' . str_pad($string + 1, 6, '0', STR_PAD_LEFT);
            }

        @endphp

        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Test Billing System</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">All Test</h5>

                        <table class="table display">
                            <thead>
                                <tr>
                                    <th>Sl. <br /> No.</th>
                                    <th>Test Name</th>
                                    <th>Test Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tests as $test)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="javascript:void(0);" class="labtest" id="labtest"
                                                data-id="{{ $test->id }}">{{ $test->cat_name }}</a></td>
                                        <td>{{ number_format($test->price, 2) }}</td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Bills</h5>
                        <form class="insert-form CustomerBillForm" id="CustomerBillForm" method="post">
                            @csrf
                            <input type="text" style="display: none" value="{{ $nextInvoiceNumber }}" name="bill_no">
                            {{-- @dump($nextInvoiceNumber); --}}
                            <div class="form-group">
                                <label for="patient_id">Patient Name</label>
                                <select class="form-control" id="patient_id" name="patient_id" required>
                                    <option selected disabled>Choose One</option>
                                    @foreach (App\Models\Patients::get() as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->name }} >>
                                            {{ $patient->patient_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <table class="table  nowrap table-borderless table_field table-sm" id="table_field">
                                <thead>
                                    <tr>
                                        <th> S/N </th>
                                        <th> Test Name </th>
                                        <th style="width: 150px"> Price </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody id="items" class="items">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p class="font-weight-bold">Sub Total (₦) :</p>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control getsubtotal" name="gtotal"
                                                id="grandtotal" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p class="font-weight-bold">Discount (₦) :</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="discount" value="0.00"
                                                name="discount">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p class="font-weight-bold">Total (₦) :</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="total_" name="total_"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p class="font-weight-bold">Paid By :</p>
                                        </td>
                                        <td>
                                            <select class="form-control" id="paidby" name="paidby">
                                                <option value="Cash">Cash</option>
                                                <option value="Card">Card</option>
                                                <option value="Mobile Banking">Mobile Banking</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p class="font-weight-bold">Amount Paid :</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="pay_" name="pay">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p class="font-weight-bold">Due/Return :</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="return" name="return">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <p class="font-weight-bold">Approval Code :</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="abbroval_code"
                                                name="abbroval_code">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br />
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-success" name="submit" id="submit"
                                    value="Submit" />
                                {{-- <button onclick="myFunction('details')" class="btn btn-success float-right">Print</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="text-dark hidden" style=" color: #000">
                <div class="card" id="details" style="display: none">
                    <div class="card-body">
                        <p style="color: #000">Hospital Logo</p>
                        <h3 style="color: #000">ABCD Lab</h3>
                        <span style="color: #000">Dhaka, Bangladesh</span><br>
                        <span style="color: #000">Phone: +880123456789</span><br>
                        <span style="color: #000">Email: abc@gmail.com</span>
                        <hr style="color: #000" />

                        <span class="h5" style="color: #000">Invoice No: </span><span class="h5"
                            style="color: #000;">{{ $nextInvoiceNumber }}</span>

                        <table class="table table-borderless" style="width: 400px">
                            <thead>
                                <tr>
                                    <th style="color: #000; width:20px"> S/N </th>
                                    <th style="color: #000;"> Test Name </th>
                                    <th style="color: #000;"> Price </th>
                                </tr>
                            </thead>
                            <tbody id="items1" class="items">

                            </tbody>

                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th style="color: #000;">Sub Total</th>
                                    <td><span class="subtotal" id="subtotal" style="color: #000;"></span></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th style="color: #000;">Discount</th>
                                    <td style="color: #000;"><span class="discount__" id="discount__">0.00</span></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th style="color: #000;">Total</th>
                                    <td style="color: #000;"><span class="__total__" id="__total__"></span></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th style="color: #000;">Pay</th>
                                    <td style="color: #000;"><span class="pay__" id="pay__"></span></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th style="color: #000;">Return</th>
                                    <td style="color: #000;"><span class="return__" id="return__"></span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '#labtest', function() {
            var labtest_id = $(this).attr('data-id');
            // console.log(labtest_id);
            let n = ($('#items tr').length - 0) + 1;
            let n1 = ($('#items1 tr').length - 0) + 1;
            var routeurl = "{{ route('labtest.edit', ':labtest_id') }}";
            routeurl = routeurl.replace(':labtest_id', labtest_id);

            // console.log(n);
            if ($(".item-in-cart").toArray().map(el => el.getAttribute("data-id")).includes(labtest_id)) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Already Added',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 1800
                });
            } else {
                $.get(routeurl, function(data) {
                    var tr = $('#items').append(`<tr class="item-in-cart" data-id="${labtest_id}">
                        <td>${n}<input type="hidden"  value="${data.id}" class="id" name="id[]" id="id"/><input type="hidden"  value="${data.department}" class="department" name="department[]" id="department"/></td>
                        <td>${data.cat_name} <input type="hidden" value="${data.cat_name}" class="form-control cat_name border-0 bg-white" id="cat_name" name="cat_name[]" readonly></td>
                        <td>${Number(data.price).toFixed(2)}<input type="hidden" value="${data.price}" class="item-in-cart-cost form-control price border-0 bg-white"  id="price" name="price[]" readonly></td>
                        <td><button name="remove" class="btn btn-danger btn-sm remove" id="remove"><i class="fas fa-eraser"></i> </button></td>
                        </tr>`);
                    cartTotal();
                    var tr = $('#items1').append(`<tr data-id="${labtest_id}">
                        <td style="color: #000; width: 10px">${n1}</td>
                        <td style="color: #000; width: 20px">${data.cat_name}</td>
                        <td style="color: #000; width: 20px">${Number(data.price).toFixed(2)}</td>
                        </tr>`);
                });

                $('.items').delegate(".remove", "click", function() {
                    // $(this).closest('tr').remove();
                    // $(this).closest('tr1').remove();
                    var rowIndex = $(this).closest('tr').prop('rowIndex');
                    $('.items tr').filter(function() {
                        return this.rowIndex === rowIndex;
                    }).remove();
                    cartTotal();

                });

            }


        });



        function cartTotal() {
            let count = $(".item-in-cart-cost").length;
            // console.log(count);
            if (count > 0) {
                let totalCost = $(".item-in-cart-cost").toArray().map(el => $(el).val()).reduce((x, y) => Number(x) +
                    Number(y));
                $('#grandtotal').val(Number(totalCost).toFixed(2));
                // $('#total_').val(Number(totalCost).toFixed(2));
                $('#total_').val(Number(totalCost).toFixed(2));

                $('#subtotal').html(Number(totalCost).toFixed(2));
                $('#__total__').html(Number(totalCost).toFixed(2));
            } else {
                let totalCost = 0;
                $('#grandtotal').val(Number(totalCost).toFixed(2));
                $('#total_').val(Number(totalCost).toFixed(2));

                $('#subtotal').html(Number(totalCost).toFixed(2));
                $('#__total__').html(Number(totalCost).toFixed(2));
            }

        }

        $(function() {
            $('#grandtotal, #discount').keyup(function() {
                var value1 = parseFloat($('#grandtotal').val()) || 0;
                var value2 = parseFloat($('#discount').val()) || 0;
                var total_ = value1 - value2;

                $('#discount__').html(Number(value2).toFixed(2));
                $('#total_').val(Number(total_).toFixed(2));
                $('#__total__').html(Number(total_).toFixed(2));
            });
        });

        $(function() {
            $('#total_, #pay_').keyup(function() {
                var value1 = parseFloat($('#total_').val()) || 0;
                var value2 = parseFloat($('#pay_').val()) || 0;
                var total_ = value1 - value2;
                $('#return').val(Number(total_).toFixed(2));

                $('#pay__').html(Number(value2).toFixed(2));
                $('#return__').html(Number(total_).toFixed(2));
            });
        });

        $('.CustomerBillForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#CustomerBillForm')[0]);
            console.log(myformData);
            $.ajax({
                type: "post",
                url: "{{ route('billing.add') }}",
                data: myformData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#CustomerBillForm").find('input').val('');
                    $('#CustomerBillForm')[0].reset();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 1800
                    });
                    location.reload();
                    // table.draw();

                },
                error: function(error) {
                    console.log(error.responseJSON.message);
                    Swal.fire({
                        title: 'Alert!',
                        text: 'Something went wrong!',
                        // text: error.responseJSON.message,
                        icon: 'warning',
                        showConfirmButton: false,
                    });
                }
            });
        });
    </script>

    <script>
        function myFunction(el) {
            var getFullContent = document.body.innerHTML;
            var printsection = document.getElementById(el).innerHTML;
            document.body.innerHTML = printsection;
            window.print();
            document.body.innerHTML = getFullContent;

        }
    </script>
@endsection
