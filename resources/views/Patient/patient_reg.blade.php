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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patient</a></li>
                        <li class="breadcrumb-item active">New Patient</li>
                    </ol>
                </div>
                <h4 class="page-title">New Patient</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-body">
            <h3 class="text-center">New Patients Registration</h3>
            <h6 class="text-center text-danger">Please fill the form below to register a new patient</h6>
            <form method="POST" class="mt-5" enctype="multipart/form-data" action="{{ route('patients.store') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Full Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="name"
                                    name="name" placeholder="Mr. Jon Rechard">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="email" required parsley-type="text" class="form-control" id="email"
                                    name="email" placeholder="example@example.com">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="home_phone" class="col-sm-4 col-form-label">Home Phone<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="phone" required parsley-type="text" class="form-control" id="home_phone"
                                    name="home_phone" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile_phone" class="col-sm-4 col-form-label">Mobile Number<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="phone" required parsley-type="text" class="form-control" id="mobile_phone"
                                    name="mobile_phone" placeholder="Mobile Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-sm-4 col-form-label">Gender<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" id="gender" required name="gender">
                                    <option selected disabled>Choose One Option</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-sm-4 col-form-label">Age<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="number" required parsley-type="text" class="form-control" id="name"
                                    name="age" min="0" placeholder="25">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Address<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <textarea class="form-control" required id="address" name="address" placeholder="Address"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="blood_group" class="col-sm-4 col-form-label">Blood Group<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" id="blood_group" required name="blood_group">
                                    <option selected disabled>Choose One Option</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="lmp" class="col-sm-4 col-form-label">LMP<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="lmp"
                                    name="lmp">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="height" class="col-sm-4 col-form-label">Height<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="lmp"
                                    name="height" placeholder="201.2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="weight" class="col-sm-4 col-form-label">Weight<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="weight"
                                    name="weight" placeholder="170.5">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bp" class="col-sm-4 col-form-label">Blood pressure<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="bp"
                                    name="bp" placeholder="80/120">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salary" class="col-sm-4 col-form-label">Image<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="file" required class="form-control border-0" id="image"
                                    name="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="password" required class="form-control" id="password"
                                    name="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="referred_by" class="col-sm-4 col-form-label">Refrred By<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" id="referred_by" required name="referred_by">
                                    <option selected disabled>Choose One Option</option>
                                    <option value="none">None</option>
                                    @foreach (App\Models\Referrals::get() as $item)
                                    <option value={{ $item->id }}>{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Note<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <textarea class="form-control"  id="note" name="note"></textarea>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="form-group row mb-0">
                    <div class="col-sm-8 offset-sm-4">
                        <button onclick="history.back()" class="btn btn-info">Back</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light mr-1">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
   </div>
</div>
@endsection
