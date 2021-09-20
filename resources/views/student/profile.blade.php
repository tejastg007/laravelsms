@extends('student.layout.app')
@section('page-content')
    <div class="row text-capitalize">
        <div class="col-lg-8 col-12 ">
            <div class="card">
                <div class="card-header">
                    <p class="h5">update profile details</p>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <li><strong> {{ $error }}</strong></li>
                            @endforeach
                        </div>
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif

                    <form action="{{ route('student.profile.update') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="name">name :</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $data->name }}"
                                    required>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="gender">gender :</label>
                                <input type="text" name="" id="gender" class="form-control" value="{{ $data->gender }}"
                                    required disabled>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="studid">student ID :</label>
                                <input type="text" name="student_id" id="studid" class="form-control"
                                    value="{{ $data->student_id }}" required disabled>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="dob">date of birth:</label>
                                <input type="date" name="dob" id="dob" class="form-control" value="{{ $data->dob }}"
                                    required>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="mobile">mobile:</label>
                                <input type="number" name="mobile" id="mobile" class="form-control"
                                    value="{{ $data->phone }}" required>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="address">address:</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ $data->address }}" required>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <button type="submit" class="btn btn-success btn-block">Udpate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-5 mt-lg-0 pb-5 pb-lg-0">
            <div class="card">
                <div class="card-header">
                    <p class="h5">update password</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.password.update') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="cpassword">current password:</label>
                                <input type="password" name="cpassword" id="password" class="form-control" value=""
                                    required>
                            </div>
                            <div class="form-group col-12 ">
                                <label for="password">new password:</label>
                                <input type="password" name="password" id="password" class="form-control" value=""
                                    required>
                            </div>
                            <div class="form-group col-12">
                                <label for="passwordconfirm">confirm password:</label>
                                <input type="password" name="password_confirmation" id="passwordconfirm"
                                    class="form-control" value="" required>
                            </div>
                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-success btn-block">Udpate</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
