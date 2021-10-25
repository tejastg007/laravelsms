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
                            <p style="font-size: 16px" class="m-0">
                                <strong>
                                    <a href="{{ $res->url }}" target="_blank">{{ $res->short_description }}</a>
                                </strong>
                            </p>
                            <p class="m-0">{{ $res->detailed_description }}
                            </p>
                            <p style="font-size:12px;" class="text-right m-0">
                                {{ $res->created_at }}
                            </p>
                            <div class="d-flex justify-content-end">
                                <a href="{{ $res->url }}" target="_blank"
                                    class="btn btn-primary btn-sm ">view/download</a>
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
