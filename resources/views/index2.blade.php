@extends('layouts.app')
@section('style')
    <style>
        @import 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css';

    </style>
@endsection


@section('page-content')
    <div class="container text-capitalize">
        <div class="row">
            <div class="col-8 border p-2">
                <form action="index2" method="get">
                    <div class="form-group">
                        <select name="courses[]" id="" class="select form-control w-100" multiple>
                            @foreach ($courses as $course)
                                <option value="{{ $course->name }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex align-items-end">
                        <div class="form-group">
                            <label for="" class="p-0 m-0">start date</label>
                            <input type="date" name="startdate" class="form-control" placeholder="select start date"
                                @if (!empty($_GET['startdate']))value="{{ $_GET['startdate'] }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="" class="p-0 m-0">end date</label>
                            <input type="date" name="enddate" class="form-control" placeholder="select end date"
                                @if (!empty($_GET['enddate']))value="{{ $_GET['enddate'] }}" @endif>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary ml-2">view</button>
                            <a href="{{ url('report') }}" class="btn btn-danger">reset all</a>
                        </div>
                    </div>
                </form>
                <div class="download-btns pb-2">
                    <a href="#" class="btn  btn-primary">download PDF</a>
                    <a href="#" class="btn  btn-success">Print statement</a>
                </div>
                <div>
                    {{-- <p>{{ $_GET['courses'] }}</p> --}}
                    <table class="table border text-capitalize table-hover">
                        <thead>
                            <tr>
                                <th>sr</th>
                                <th>name</th>
                                <th>course</th>
                                <th>amount</th>
                                <th>date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($_GET['courses']))
                                @foreach ($feedata as $record)
                                    @if (in_array($record->studname->course->name, $_GET['courses']))
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $record->studname->name }}</td>
                                            {{-- <td>{{ $record->studname }}</td> --}}
                                            <td>{{ $record->studname->course->name }}</td>
                                            @if ($record->fee_type == 0)
                                            <td>{{ $record->studname->course->registration_fee }}</td>@else
                                                <td>{{ $record->studname->course->course_fee / $record->studname->course->installments }}
                                                </td>
                                            @endif
                                            <td>{{ $record->paid_on }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($feedata as $record)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $record->studname->name }}</td>
                                        {{-- <td>{{ $record->studname }}</td> --}}
                                        <td>{{ $record->studname->course->name }}</td>
                                        @if ($record->fee_type == 0)
                                        <td>{{ $record->studname->course->registration_fee }}</td>@else
                                            <td>{{ $record->studname->course->course_fee / $record->studname->course->installments }}
                                            </td>
                                        @endif
                                        <td>{{ $record->paid_on }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select').select2({
                placeholder: 'Select courses ....',
                closeOnSelect: false,
                tags: true,
                tokenSeparators: [',', ' ']
            });
        });
    </script>
@endsection
