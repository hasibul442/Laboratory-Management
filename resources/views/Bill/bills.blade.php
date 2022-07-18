@extends('layout.master')
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
                                        <td><a  href="javascript:void(0);" class="labtest" id="labtest" data-id="{{ $test->id }}">{{ $test->cat_name }}</a></td>
                                        <td>{{ $test->price }}</td>
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
                        <form class="insert-form MedicineSellForm" id="MedicineSellForm" method="post">
                            @csrf
                            <table class="table  nowrap table-borderless table_field table-sm"
                                id="table_field">
                                <thead>
                                    <tr>
                                        <th> S/N </th>
                                        <th> Test Name </th>
                                        <th> Test Price </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody id="items">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p>Sub Total (BDT) :</p>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control getsubtotal"
                                                name="gtotal" id="grandtotal" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p>Discount (BDT) :</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="discount"
                                                value="0.00" name="discount">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p>Total (BDT) :</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="total_"
                                                name="total_" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p>Paid By :</p>
                                        </td>
                                        <td>
                                            <select name="paidby" class="form-control" id="paidby"
                                                name="paidby">
                                                <option value="Cash">Cash</option>
                                                <option value="Card">Card</option>
                                                <option value="Mobile Banking">Mobile Banking</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p>Pay :</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="pay_"
                                                name="pay">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <p>Due/Return :</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="return"
                                                name="return">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <p>Approval Code :</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="address"
                                                name="abbroval_code">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <br />
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-success" name="submit"
                                    id="submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '#labtest', function () {
            var labtest_id = $(this).attr('data-id');
            // console.log(labtest_id);
            var n = ($('#items tr').length - 0) + 1;
            if ($(".item-in-cart").toArray().map(el => el.getAttribute("data-id")).includes(labtest_id)) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Already Added',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 1800
                });
            }
            else{
                $.get("/labtest/edit/" + labtest_id, function(data){
                     var tr = $('#items').append(`<tr class="item-in-cart" data-id="${labtest_id}">
                        <td><input value="${n}" class="form-control cat_name border-0 bg-white" readonly/><input type="hidden"  value="${data.id}" class="id" name="id[]" id="id"</td>
                        <td><input type="text" value="${data.cat_name}" class="form-control cat_name border-0 bg-white"  id="cat_name" name="cat_name[]" readonly></td>
                        <td><input type="text" value="${data.price}" class="item-in-cart-cost form-control price border-0 bg-white"  id="price" name="price[]" readonly></td>
                        <td><button name="remove" class="btn btn-danger btn-sm remove" id="remove"><i class="fas fa-eraser"></i> </button></td>'+
                        </tr>`);
                    // $('.getsubtotal').val(function(i, val) {
                    //     return parseFloat(val) + parseFloat(data.price);
                    // });
                    // $('#grandtotal').val(function(i, val) {
                    //     return parseFloat(val) + parseFloat(data.price);
                    // });
                    // $('#total_').val(function(i, val) {
                    //     return parseFloat(val) + parseFloat(data.price);
                    // });
                    cartTotal();
                });
            }
            $("#items").delegate("#remove", "click", function() {
                $(this).closest('tr').remove();
                cartTotal();

            });

        });

        function cartTotal() {
            let count = $(".item-in-cart-cost").length;


            if (count > 0) {
                let totalCost = $(".item-in-cart-cost").toArray().map(el => $(el).val()).reduce((x, y) => Number(x) +
                    Number(y));
                $('#grandtotal').val(Number(totalCost).toFixed(2));
                $('#total_').val(Number(totalCost).toFixed(2));
            } else {
                let totalCost = 0;
                $('#total_').val(Number(totalCost).toFixed(2));
            }

        }
    </script>
@endsection
