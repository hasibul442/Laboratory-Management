@extends('Layout.master')
@section('title', 'Patient Details')
@section('content')

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('patients.list') }}">Patients</a></li>
                            <li class="breadcrumb-item active">Details</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Patients Details</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-3">{{ $patient->name }}</h3>

                <div class="row mt-5">
                    <div class="col-md-8">
                        <table class="table display table-borderless">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Patient Id</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $patient->patient_id }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Home Phone</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $patient->home_phone }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Mobile Phone</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $patient->mobile_phone }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Gender</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $patient->gender }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Address</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $patient->address }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Blood Group</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $patient->blood_group }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Note</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $patient->note }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="col-md-4">
                        {{-- <img src="{{ asset('assets/HMS/patient/' . $patient->users->profile_photo_path) }}"
                            alt="{{ $patient->users->profile_photo_path }}" class="img-fluid rounded-circle"
                            style="width: 200px; height: 200px" /> --}}

                        <table class="table display table-borderless mt-3">
                            <tbody>
                                {{-- <tr>
                                    <td class="font-weight-bold">Account Status</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $patient->users->status }}</td>
                                </tr> --}}
                                <tr>
                                    <td class="font-weight-bold">Referred By</td>
                                    <td class="text-center">:</td>
                                    <td>
                                        @if ($patient->referred_by == 'none')
                                            None
                                        @else
                                            {{ $patient->referral->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Register By</td>
                                    <td class="text-center">:</td>
                                    <td>{{ $patient->registerd_by }}</td>
                                </tr>
                                {{-- <tr>
                                    <td class="font-weight-bold">Approved By</td>
                                    <td class="text-center">:</td>
                                    <td>
                                        @if ($patient->aprrovel_by == null)
                                            Not Approved Yet

                                        @else
                                            {{ $patient->aprrovel_by }}

                                    @endif
                                </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>


                <table class="table display table-bordered mt-3 text-center">
                    <thead>
                        <tr>
                            <th>Age</th>
                            <th>LMP</th>
                            <th>BP</th>
                            <th>Height</th>
                            <th>Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $patient->age }}</td>
                            <td>{{ $patient->lmp }}</td>
                            <td>{{ $patient->bp }}</td>
                            <td>{{ $patient->height }}</td>
                            <td>{{ $patient->weight }}</td>
                        </tr>
                </table>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <a href="{{ route('patients.list') }}" class="btn btn-primary">Back</a>
                        <button onclick="window.print()" class="btn btn-success float-right">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
