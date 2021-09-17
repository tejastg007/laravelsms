@extends('layouts.app')
@section('style')
    <style></style>
@endsection

@section('page-content')
    <div class="card text-capitalize">
        <div class="card-header ">
            <!-- Button trigger modal -->
            <span class="h5 m-0">upload study material</span>
            <a href='' type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#upload">
                upload
            </a>

            <!-- Modal -->
            <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('admin/uploadstudymaterial') }}" id="uploadform" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="courses">select course :</label>
                                    <select class="form-control" name="course" id="courses" required>
                                        <option value="" disabled selected></option>
                                        @php
                                            $courses = \App\Models\course_detail::where('status', 1)->get();
                                        @endphp
                                        @foreach ($courses as $course)
                                            <option value={{ $course->id }}>{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shortdesc"> short description :<span class="text-danger"
                                            style="font-size: 12px"> maximum limit:30 characters</span> </label>
                                    <input type="text" name="shortdesc" id="shortdesc" class="form-control" maxlength="20"
                                        placeholder="eg. study material name, etc" required>
                                </div>
                                <div class="form-group">
                                    <label for="detaileddesc"> detailed description :<span class="text-danger"
                                            style="font-size: 12px"> maximum limit:100 characters</span> </label>
                                    <input type="text" name="detaileddesc" id="detaileddesc" class="form-control"
                                        maxlength="100" placeholder="eg. content of the study material, usage etc."
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="link"> upload resource link : </label>
                                    <input type="url" name="link" id="link" class="form-control"
                                        placeholder="any link eg. youtube, google drive, website link" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="uploadform" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal ends --}}
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    <strong>{{ session('success')[0] }}</strong>
                </div>
            @elseif (session('successalready'))
                <div class="alert alert-warning">
                    <strong>{{ session('successalready')[0] }} <a
                            href="{{ route('admin.view-studymaterial', ['id' => session('successalready')[1]]) }}">view</a>
                    </strong>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    <strong>{{ session('error')[0] }}</strong>
                </div>
            @endif


            <table class="table border text-capitalize table-hover">
                <thead>
                    <tr>
                        <th>sr</th>
                        <th>course</th>
                        <th>description</th>
                        <th>date</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->coursename->name }}</td>
                            <td>{{ $record->short_description }}</td>
                            <td>{{ $record->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.view-studymaterial', ['id' => $record->id]) }}"
                                    class="btn btn-sm btn-primary ">view</a>
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
