@extends('student.layout.app')
@section('styles')
<style>
    tr td:nth-child(1) {
        width: 35%;
    }

    tr td:nth-child(2) {
        width: 5%;
    }

    tr td:nth-child(3) {
        width: 60%;
    }

    table tr td:nth-child(1) {
        text-align: right
    }

    .panel .panel-heading {
        /* background: #6441A5;
        background: -webkit-linear-gradient(to right, #2a0845, #6441A5);
        background: linear-gradient(to right, #2a0845, #6441A5); */
        background-color: #2c3e50;
        border-radius: 5px;
    }

    .panel .panel-heading a {
        color: white !important
    }

    .btn:focus {
        box-shadow: none !important;
    }

    .panel .panel-body {    
        /* background: #83a4d4;
        background: -webkit-linear-gradient(to right, #b6fbff, #83a4d4);
        background: linear-gradient(to right, #b6fbff, #83a4d4); */
        background-color: #bdc3c7;
        border-radius: 5px
    }

</style>
@endsection
@section('page-content')
<div class="row text-capitalize">
    <div class="col-12 col-lg-7">
        <div class="card">
            <div class="card-header">
                <p class="h5">Your course details </p>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>course name </td>
                            <td>:</td>
                            <td>{{ $data->course->name }}</td>
                        </tr>
                        <tr>
                            <td>course duration </td>
                            <td>:</td>
                            <td>{{ $data->course->duration }}</td>
                        </tr>
                        <tr>
                            <td>registration fee </td>
                            <td>:</td>
                            <td>{{ $data->course->registration_fee }} Rs</td>
                        </tr>
                        <tr>
                            <td>course fee </td>
                            <td>:</td>
                            <td>{{ $data->course->course_fee }} Rs</td>
                        </tr>
                        <tr>
                            <td>total fee </td>
                            <td>:</td>
                            <td>{{ $data->course->course_fee + $data->course->registration_fee }} Rs
                            </td>
                        </tr>
                        <tr>
                            <td>number of installments </td>
                            <td>:</td>
                            <td>{{ $data->course->installments }}</td>
                        </tr>
                        <tr>
                            <td>date of registration : </td>
                            <td>:</td>
                            <td>{{ $data->registration_date }}</td>
                        </tr>
                        <tr>
                            <td>course start date </td>
                            <td>:</td>
                            <td>{{ $data->course_start_date }}</td>
                        </tr>
                        <tr>
                            <td>course end date</td>
                            <td>:</td>
                            <td>{{ $data->course_end_date }}</td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="3">
                                <a href="{{ route("student.resources") }}" class="btn btn-info">view
                                    course study
                                    material</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5 mt-5 mt-lg-0 pb-5 pb-lg-0">
        <div class="card">
            <div class="card-header">
                <p class="h5">other available courses</p>
            </div>
            <div class="card-body" id="">
                <div class="panel-group" id="accordion">
                    @foreach($courses as $course)
                        <div class="panel panel-default my-1">
                            <div class="panel-heading">
                                <a class="panel-title btn btn-block text-left text-primary" data-toggle="collapse"
                                    data-parent="#accordion" href="#col{{ $course->id }}" aria-expanded="true">
                                    {{ $course->name }}</a>
                            </div>
                            <div id="col{{ $course->id }}" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>course name </td>
                                                <td>:</td>
                                                <td>{{ $course->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>course duration </td>
                                                <td>:</td>
                                                <td>{{ $course->duration }} months</td>
                                            </tr>
                                            <tr>
                                                <td>registration fee </td>
                                                <td>:</td>
                                                <td>{{ $course->registration_fee }} Rs</td>
                                            </tr>
                                            <tr>
                                                <td>course fee </td>
                                                <td>:</td>
                                                <td>{{ $course->course_fee }} Rs</td>
                                            </tr>
                                            <tr>
                                                <td>total fee </td>
                                                <td>:</td>
                                                <td>{{ $course->registration_fee + $course->course_fee }} Rs
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>number of installments </td>
                                                <td>:</td>
                                                <td>{{ $course->installments }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
