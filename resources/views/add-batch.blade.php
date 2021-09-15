@php
use Carbon\Carbon;
@endphp
@extends('layouts.app')
@section('style')
    <style></style>
@endsection

@section('page-content')
    <a href="{{ URL::previous() }}" class="btn btn-primary"> <i class="fa fa-long-arrow-alt-left"></i> Back </a>
    <div class="card mt-3 text-capitalize">
        <div class="card-header">
            <p class="m-0 h5">add new batch</p>
        </div>
        <div class="card-body">
            <div class="row mx-auto">
                <div class="col-6">
                    @if (session()->has('timeerror'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session('timeerror') }}</strong>
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif

                    <form action="{{ url('admin/add-batch') }}" method="post">
                        @csrf
                        <div class="d-flex justify-content-around align-items-end">
                            <div class="form-group">
                                <label for="start-time">start time</label>
                                <input type="time" class="form-control" name="starttime" id="start-time"
                                    style="width:auto" required value="{{ old('starttime') }}">
                            </div>
                            <div class="form-group">
                                <label for="start-time">end time</label>
                                <input type="time" class="form-control" name="endtime" id="end-time" style="width:auto"
                                    required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <p class="mb-3 h5">currently active batches :</p>
                    <table class="table border text-capitalize table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>sr</th>
                                <th>Time</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $batch)
                                <tr>
                                    <td>{{ $loop->iteration }}
                                    </td>
                                    <td>{{ date('g:i A', strtotime(date('Y-m-d') . ' ' . $batch->start_time)) . ' - ' . date('g:i A', strtotime(date('Y-m-d') . ' ' . $batch->end_time)) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.batches.edit', ['batchid' => $batch->id]) }}"
                                            class="btn btn-success btn-sm">edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">no data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
