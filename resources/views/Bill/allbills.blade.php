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
                <table class="display table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient Name</th>
                            <th>Patient ID</th>
                            <th>All Test</th>
                            <th>Bill Date</th>
                            <th>Bill Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($bills) --}}
                        @foreach ($bills as $bill)
                            <tr>
                                <td>{{ $bill->id }}</td>
                                <td>{{ $bill->users->name }}</td>
                                <td>{{ $bill->patient_id }}</td>
                                <td>
                                    {{-- {{ json_decode($bill->all_test) }} --}}
                                    @php
                                        $all_test = json_decode($bill->all_test);
                                    @endphp
                                    {{-- @dump($all_test); --}}
                                    @foreach ($all_test as $test)
                                        {{ $test->test_name }}
                                        <br>
                                        {{ $test->test_price }}
                                    @endforeach
                                </td>
                                <td>{{ $bill->created_at->format('d-m-Y') }}</td>
                                <td>{{ $bill->amount }}</td>
                                <td>
                                    {{-- <a href="{{ route('bills.show', $bill->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('bills.edit', $bill->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{ route('bills.delete', $bill->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
