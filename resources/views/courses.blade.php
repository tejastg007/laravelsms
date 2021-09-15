@extends('layouts.app')
@section('style')
    <style></style>
@endsection


@section('page-content')
    <a href="{{ route('admin.add-course') }}" class="btn btn-primary text-capitalize"> add new course </a>
    <div class="card mt-3 text-capitalize">
        <div class="card-header">
            <p class="h5 m-0">all courses
                {{-- <span class="h6 text-danger"> - by default, currently learning students are displayed under course section</span> --}}
            </p>
        </div>
        <div class="card-body">
            <table class="table border text-capitalize table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>sr</th>
                        <th>course name</th>
                        <th>students learning</th>
                        <th>view</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $course->name }}</td>
                            @php
                                $i = 0;
                                foreach ($studdata as $stud) {
                                    if ($stud->status == 1 && $stud->course->name == $course->name) {
                                        $i++;
                                    }
                                }
                            @endphp
                            <td>@php echo $i @endphp</td>
                            <td><a href="{{ route('admin.courses.view-course', ['id' => $course->id]) }}"
                                    class="btn btn-sm btn-success">view</a>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('scripts')
@endsection
