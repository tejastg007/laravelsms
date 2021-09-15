@extends('layouts.app')
@section('style')
    <style>

    </style>
@endsection

@section('page-content')
    <div class="card text-capitalize">
        <div class="card-header ">
            <p class="m-0 h5">All Students Till Now</p>
        </div>
        <div class="card-body ">
            <p>total students: {{ $data->count() }}</p>
            <table class="table border text-capitalize table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>sr</th>
                        <th>studID</th>
                        <th>name</th>
                        <th>course</th>
                        <th>status</th>
                        <th>view</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $stud)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $stud->student_id }}</td>
                            <td>{{ $stud->name }}</td>
                            <td>{{ $stud->course->name }}</td>
                            <td>
                                @if ($stud->status == 0)
                                    <span class="text-primary"> yet to start</span>
                                @elseif ($stud->status==1)
                                    <span class="text-success">learning</span>
                                @elseif($stud->status==-1)
                                    <span class="text-danger"> completed</span>
                                @elseif($stud->status==2)
                                    <span class="text-secondary"> abandoned</span>
                                @else
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.view-student', ['id' => $stud->id]) }}"
                                    class="btn btn-primary btn-sm ">view</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">no data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
