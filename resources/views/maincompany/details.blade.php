@extends('layout.master')
@section('title', 'Company Details')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Insert Lab Information</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Lab Information</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Lab Details</h3>

                <div class="row">
                    @foreach (App\Models\MainCompanys::where('id', 1)->get() as $lab)
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Lab Name:</th>
                                        <td>{{ $lab->lab_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $lab->lab_address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ $lab->lab_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $lab->lab_email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('/assets/HMS/lablogo/'.$lab->lab_image) }}" alt="{{ $lab->lab_name }}" class="img-fluid" />
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
