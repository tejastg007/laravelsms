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
            <h1 class="display-3">Hi, {{ Auth::user()->name }}</h1>
            <hr class="my-2">
            <p class="lead">update details here !</p>
        </div>
        <div class="row justify-content-around  bg-transparent form-container text-capitalize">
            <form class="col-5 bg-white shadow-lg p-3 ">
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
            <form class="col-5 bg-white p-3 shadow-lg">
                <p class="my-3 h5">update password</p>
                <div class="form-group ">
                    <label for="cpassword">current password :</label>
                    <input type="password" name="cpassword" id="cpassword" class="form-control">
                </div>
                <div class="form-group ">
                    <label for="newpassword">new password :</label>
                    <input type="password" name="newpassword" id="newpassword" class="form-control">
                </div>
                <div class="form-group ">
                    <label for="confirmp">confirm password :</label>
                    <input type="password" name="confirmp" id="confirmp" class="form-control">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mt-3">Update</button>
                </div>
            </form>
        </div>
@endsection

@section('scripts')
@endsection
