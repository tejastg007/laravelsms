@extends('layouts.app')
@section('style')
    <style>
        .form-container {
            margin-top: -80px
        }

        form {
            border-radius: 10px
        }

    </style>
@endsection

@section('page-content')
    <div class="jumbotron text-capitalize">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> <strong> {{ $error }}</strong></li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif
        <h1 class="display-3">Hi, {{ Auth::user()->name }}</h1>
        <hr class="my-2">
        <p class="lead">update details here !</p>
    </div>

    <div class="row justify-content-around  bg-transparent form-container text-capitalize">
        {{-- update email and name form --}}
        <form class="col-5 bg-white shadow-lg p-3 " method="post" action="{{ url('admin/updateprofile') }}">
            @csrf
            <p class="my-3 h5">Profile Details</p>
            <div class="form-group ">
                <label for="name">name :</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group ">
                <label for="name">email :</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success mt-3">Update</button>
            </div>
        </form>
        {{-- update email and name form --}}

        {{-- update password  form --}}
        <form class="col-5 bg-white p-3 shadow-lg" method="post" action="{{ url('admin/updatepassword') }}">
            @csrf
            <p class="my-3 h5">update password</p>
            <div class="form-group ">
                <label for="cpassword">current password :</label>
                <input type="password" name="old_password" id="cpassword" class="form-control">
            </div>
            <div class="form-group ">
                <label for="newpassword">new password :</label>
                <input type="password" name="password" id="newpassword" class="form-control">
            </div>
            <div class="form-group ">
                <label for="confirmp">confirm password :</label>
                <input type="password" name="password_confirmation" id="confirmp" class="form-control">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success mt-3">Update</button>
            </div>
        </form>
        {{-- update password  form --}}
    </div>
@endsection

@section('scripts')
@endsection
