@extends('layouts.app')
@section('style')
    <style>
        @import 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css';

    </style>
@endsection


@section('page-content')
    <div class="card">
        <div class="card-header">
            <p class="h5 m-0">generate fee report</p>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/report') }}" method="get">
                <div class="form-group">
                    <select name="courses[]" id="" class="select form-control w-100" multiple>
                        @foreach ($courses as $course)
                            <option value="{{ $course->name }}" @if (!empty($_GET['courses']) && in_array($course->name, $_GET['courses']))selected='selected' @endif>{{ $course->name }}
                            </option>
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
                        <button type="submit" name="submit" value="submit" class="btn btn-primary ml-2">view</button>
                        <a href="{{ url('admin/report') }}" class="btn btn-danger">reset all</a>
                    </div>
                </div>
                <div class="download-btns pb-2">
                    <button formtarget="_blank" type="submit" name="downloadpdf" value="download"
                        class="btn btn-warning">print statement</button>
                </div>
            </form>

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
                        @php
                            $total = 0;
                            $i = 0;
                        @endphp
                        @if (!empty($_GET['courses']))
                            @foreach ($feedata as $record)
                                @if (in_array($record->studname->course->name, $_GET['courses']))
                                    @php $i++; @endphp
                                    <tr>
                                        <td>@php echo $i @endphp</td>
                                        <td>{{ $record->studname->name }}</td>
                                        {{-- <td>{{ $record->studname }}</td> --}}
                                        <td>{{ $record->studname->course->name }}</td>
                                        @if ($record->fee_type == 0)
                                            @php
                                                $total += $record->studname->course->registration_fee;
                                            @endphp
                                        <td>{{ $record->studname->course->registration_fee }}</td>@else
                                            @php
                                                $total += $record->studname->course->course_fee / $record->studname->course->installments;
                                            @endphp
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
                                        @php
                                            $total += $record->studname->course->registration_fee;
                                        @endphp
                                    <td>{{ $record->studname->course->registration_fee }}</td>@else
                                        @php
                                            $total += $record->studname->course->course_fee / $record->studname->course->installments;
                                        @endphp
                                        <td>{{ $record->studname->course->course_fee / $record->studname->course->installments }}
                                        </td>
                                    @endif
                                    <td>{{ $record->paid_on }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-center bg-success">
                                <b>
                                    total fee collection :
                                    @php
                                        echo $total . ' Rs';
                                    @endphp</b>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
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
