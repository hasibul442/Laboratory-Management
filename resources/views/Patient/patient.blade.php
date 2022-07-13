@extends('layout.master')
@section('title', 'Patients')

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
                <p class="text-right">
                    <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fas fa-plus"></i> Add Employee</button>
                </p>
                <h6 class="text-center">List of all Patients</h6>

                <div class="table-responsive">
                    <table class="table table-hover mb-0 ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->id }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->email }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ $patient->address }}</td>
                                    <td>
                                        <a href="{{ route('patients.edit', $patient->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('patients.show', $patient->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('patients.destroy', $patient->id) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div> <!-- container -->


    {{-- Employees Add Models Start --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form role="form" class="parsley-examples">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Email<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="email" required parsley-type="email" class="form-control"
                                        id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hori-pass1" class="col-sm-4 col-form-label">Password<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input id="hori-pass1" type="password" placeholder="Password" required
                                        class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hori-pass2" class="col-sm-4 col-form-label">Confirm Password
                                <span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input data-parsley-equalto="#hori-pass1" type="password" required
                                        placeholder="Password" class="form-control" id="hori-pass2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="webSite" class="col-sm-4 col-form-label">Web Site<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="url" required parsley-type="url" class="form-control"
                                        id="webSite" placeholder="URL">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4">
                                <div class="checkbox checkbox-purple">
                                    <input id="checkbox6" type="checkbox">
                                    <label for="checkbox6">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-sm-8 offset-sm-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Register
                                </button>
                                <button type="button"  data-dismiss="modal" class="btn btn-light waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- Employees Add Models End --}}


@endsection
