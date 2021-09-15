@php
use Carbon\Carbon;
@endphp
@extends('layouts.app')
@section('style')
    <style></style>
@endsection

@section('page-content')
    <a href="{{ URL::previous() }}" class="btn btn-primary "> <i class="fa fa-long-arrow-alt-left"></i> Back </a>
    @if ($vdata->status == 0)
        <span class="alert alert-danger " role="alert">
            <strong>you are viewing older version of course</strong>
        </span>
    @else
        <span class="alert alert-success " role="alert">
            <strong>you are viewing latest version of course</strong>
        </span>
    @endif

    <div class="card mt-3 text-capitalize">
        <div class="card-header">
            <p class="m-0 h5">course : {{ $vdata->name . ' V' . $vdata->version }}</p>
        </div>
        <div class="card-body">
            <div class="row mx-auto">
                <div class="col-6">
                    <div class="form-group">
                        <label>course name :</label>
                        <input class="form-control" value="{{ $vdata->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>course duration :</label>
                        <input class="form-control" value="{{ $vdata->duration }} Months" disabled>
                    </div>
                    <div class="form-group">
                        <label>registration fee :</label>
                        <input class="form-control" value="{{ $vdata->registration_fee }} Rs" disabled>
                    </div>
                    <div class="form-group">
                        <label>course fee :</label>
                        <input class="form-control" value="{{ $vdata->course_fee }} Rs" disabled>
                    </div>
                    <div class="form-group">
                        <label>no. of installments :</label>
                        <input class="form-control" value="{{ $vdata->installments }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>course version :</label>
                        <input class="form-control" value="{{ $vdata->version }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>course created at :</label>
                        <input class="form-control" value="{{ $vdata->created_at }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>course updated at :</label>
                        <input class="form-control" value="{{ $vdata->updated_at }}" disabled>
                    </div>
                </div>

                {{-- <div class="col-2"></div> --}}

                <div class="col-6">
                    <p class="h5">currently enrolled students :</p>
                    <p class="h6 mb-3 text-danger">total students : {{ $students->count() }}</p>
                    <table class="table border text-capitalize table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>sr</th>
                                <th>name</th>
                                <th>view</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td> <a href="{{ route('admin.view-student', ['id' => $student->id]) }}"
                                            class="btn btn-sm btn-success">view</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
