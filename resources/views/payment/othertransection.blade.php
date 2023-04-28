@extends('Layout.master')
@section('title', 'Other Transaction')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Other Transaction</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Other Transaction</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Other Transaction</h4>
                <form method="POST" class="mt-5" id="othertrans" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Account Head<span
                                class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" required parsley-type="text" class="form-control" id="name"
                                name="account_head">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-sm-4 col-form-label">Type<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <select class="form-control" id="type" required name="type">
                                <option disabled>Choose One Option</option>
                                <option value="Income">Income</option>
                                <option value="Expense">Expense</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Amount<span
                                class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" required parsley-type="text" class="form-control" id="amount"
                                name="amount">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-8 offset-sm-4">
                            <button onclick="history.back()" class="btn btn-info">Back</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#othertrans').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#othertrans')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('other.transection.store') }}",
                data: myformData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#othertrans").find('input').val('');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Transaction Done Successfully',
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
                        title: 'Opps...',
                        text: "Something went wrong! Please try again!",
                        icon: "warning",
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Yes'
                    });
                }
            });
        });
    </script>
@endsection
