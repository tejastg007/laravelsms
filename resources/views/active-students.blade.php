@extends('layouts.app')
@section('style')
    <style>

    </style>
@endsection

@section('page-content')
    <div class="card text-capitalize">
        <div class="card-header ">
            <p class="m-0 h5">currently learning Students</p>
        </div>
        <div class="card-body ">
            <p>total students: {{ $data->count() }}</p>
            <table class="table border text-capitalize table-hover ">
                <thead class="thead-light">
                    <tr>
                        <th>sr</th>
                        <th>studID</th>
                        <th>name</th>
                        <th>course</th>
                        <th>Course start</th>
                        <th>view</th>
                    </tr>
                </thead>
                <tbody >
                    @forelse ($data as $stud)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $stud->student_id }}</td>
                            <td>{{ $stud->name }}</td>
                            <td>{{ $stud->course->name }}</td>
                            <td>{{ $stud->course_start_date }}</td>
                            <td>
                                <a href="{{ route('admin.view-student', ['id' => $stud->id]) }}"
                                    class="btn btn-primary btn-sm ">view</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">no data found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
