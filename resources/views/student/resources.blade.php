@extends('student.layout.app')
@section('styles')
    <style>
        .card-body {
            height: 450px;
            overflow-y: auto;
        }

    </style>
@endsection
@section('page-content')
    <div class="row text-capitalize">
        <div class="col-lg-8 col-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <p class="h5">Study Resources</p>
                    <p class="m-0">course : {{ $course }} </p>
                </div>
                <div class="card-body">
                    @forelse ($data as $res)
                        <div class="border-bottom py-1">
                            <p style="font-size: 16px" class="m-0"><strong> <a href="google.com"
                                        target="_blank">newbie
                                        book for excelt</a>
                                </strong></p>
                            <p class="m-0">this is the book for all students who want to learn something in life
                            </p>
                            <p style="
                                                                                                            font-size:12px;"
                                class="text-right m-0">
                                uploaded on
                                : 2
                                sept
                                2021
                            </p>
                            <div class="d-flex justify-content-end">
                                <a href="#" target="_blank" class="btn btn-primary btn-sm ">view/download</a>
                            </div>
                        </div>
                    @empty
                        <div>
                            <p class="text-center h4">no study material uploaded yet :)</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
