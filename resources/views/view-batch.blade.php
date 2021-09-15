@extends('layouts.app')
@section('style')
@endsection

@section('page-content')
    <a href="{{ URL::previous() }}" class="btn btn-primary"> <i class="fa fa-long-arrow-alt-left"></i> Back </a>
    <div class="card mt-3 text-capitalize">
        <div class="card-header">
            <span class="m-0 h5">view batch ID : {{ $batchinfo->id }}</span>
            <span class="h6 my-0 mx-3 float-right">
                {{ date('g:i A', strtotime(date('Y-m-d') . ' ' . $batchinfo->start_time)) . ' - ' . date('g:i A', strtotime(date('Y-m-d') . ' ' . $batchinfo->end_time)) }}</span>
        </div>
        <div class="card-body">
            <p>total students - {{ $batchdata->count() }}</p>
            <table class="table border text-capitalize table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>sr</th>
                        <th>studID</th>
                        <th>name</th>
                        <th>course</th>
                        <th>adm date</th>
                        <th>view</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($batchdata->getstudents as $stud)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $stud->student_id }}</td>
                            <td>{{ $stud->name }}</td>
                            <td>{{ $stud->course->name }}</td>
                            <td>{{ $stud->registration_date }}</td>
                            <td>
                                <a href="{{ route('admin.view-student', ['id' => $stud->id]) }}"
                                    class="btn btn-primary btn-sm ">view</a>
                            </td>
                        </tr>
                    @endforeach --}}
                    @foreach ($batchdata as $stud)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $stud->student_id }}</td>
                            <td>{{ $stud->name }}</td>
                            <td>{{ $stud->course->name }}</td>
                            <td>{{ $stud->registration_date }}</td>
                            <td>
                                <a href="{{ route('admin.view-student', ['id' => $stud->id]) }}"
                                    class="btn btn-primary btn-sm ">view</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
