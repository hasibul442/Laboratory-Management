@extends('Layout.master')
@section('title', 'Patients List')

@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Patients</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Patients</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Patients</h4>
                <h6 class="text-center">List of all Patients</h6>

                <div class="table-responsive">
                    <table class="table table-hover mb-0 patitent_datatable" id="patients-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Blood Group</th>
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

    <script>
        $(function() {
            var table = $('.patitent_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('patients.list') }}",
                },
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'patient_id',
                    name: 'patient_id'
                }, {
                    data: 'name',
                    name: 'name'
                },  {
                    data: 'mobile_phone',
                    name: 'mobile_phone'
                }, {
                    data: 'age',
                    name: 'age'
                }, {
                    data: 'gender',
                    name: 'gender'
                }, {
                    data: 'blood_group',
                    name: 'blood_group'
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                }, ],
                buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });
            $('body').on('click', '.deletebtn', function() {
                var id = $(this).data("id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "If You Remove A Employee, This System Also Remove User ID. You Will Not Be Able To Recover It!",
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
                            url: "{{ URL::route('patients.destroy', '') }}/" + id,
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Your file has been deleted.',
                                    icon: 'success',
                                    showConfirmButton: false,
                                });
                                table.draw();
                            },
                            error: function(data) {
                                Swal.fire({
                                    title: 'Alert!',
                                    text: 'Something Wrong',
                                    icon: 'alert',
                                    showConfirmButton: false,
                                });
                                // console.log('Error:', data);
                            }
                        })

                    }
                });
            });
        });


        $(document).on('change', '#status', function() {
            var id = $(this).attr('data-id');
            console.log(id);
            if (this.checked) {
                var catstatus = 'Active';
            } else {
                var catstatus = 'Pending';
            }
            var url = "{{ URL::route('patients.status', '') }}/" + id;
            $.ajax({
                dataType: "json",
                url: url,
                method: 'get',
                data: {
                    'id': id,
                    'status': catstatus
                },
                success: function(result1) {
                    console.log(result1);
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
                    alert(catstatus);
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
    </script>


@endsection
