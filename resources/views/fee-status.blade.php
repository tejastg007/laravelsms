@extends('layouts.app')
@section('style')
    <style></style>
@endsection

@section('page-content')
    <div class="card text-capitalize ">
        <div class="card-header d-flex">
            <p class="mr-3 h5">fee status -</p>
        </div>
        <div class="card-body">

            <table class="table table-hover border">
                <thead class="thead-light">
                    <tr>
                        <th>sr</th>
                        <th>name</th>
                        <th>course</th>
                        <th>amount</th>
                        <th>date</th>
                        <th>view</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $stud)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $stud->studname->name }}</td>
                            <td>{{ $stud->studname->course->name }}</td>
                            @if ($stud->fee_type == 0)
                                <td>{{ $stud->studname->course->registration_fee }}</td>
                            @else
                                <td>{{ $stud->studname->course->course_fee / $stud->studname->course->installments }}
                                </td>
                            @endif
                            <td>{{ $stud->paid_on }}</td>
                            <td>
                                <a href="{{ route('admin.fee-details', ['id' => $stud->studname->id]) }}"
                                    class="btn btn-primary btn-sm">view</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
