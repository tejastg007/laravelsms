@extends('layouts.app')
@section('style')
    <style></style>
@endsection

@section('page-content')
    <a href="{{ route('admin.studymaterial') }} " class="btn btn-primary mb-2"><i class="fa fa-long-arrow-alt-left"></i>
        Back</a>
    <div class="card text-capitalize">
        <div class="card-header">
            <p class="h5 m-0">study resource</p>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('success') }}</strong>
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif
            <form action="{{ url('admin/editstudymaterial') }}" method="post">
                @csrf
                <input type="number" value="{{ $data->id }}" name="id" hidden>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="courses">course :</label>
                        <select class="form-control" name="course" id="courses">
                            @php
                                $courses = \App\Models\course_detail::where('status', 1)->get();
                            @endphp
                            @foreach ($courses as $course)
                                <option value={{ $course->id }} @if ($course->id == $data->course_id)selected @endif>{{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="shortdesc"> short description :<span class="text-danger" style="font-size: 12px">
                                maximum limit:30 characters</span> </label>
                        <input type="text" name="shortdesc" id="shortdesc" class="form-control" maxlength="20"
                            placeholder="eg. study material name, etc" value="{{ $data->short_description }}" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="detaileddesc"> detailed description :<span class="text-danger"
                                style="font-size: 12px"> maximum limit:100 characters</span> </label>
                        <textarea type="text" name="detaileddesc" id="detaileddesc" class="form-control" maxlength="100"
                            placeholder="eg. content of the study material, usage etc."
                            required>{{ $data->detailed_description }}</textarea>
                    </div>
                    <div class="form-group col-6">
                        <label for="">date :</label>
                        <input type="text" name="" id="" class="form-control" placeholder="{{ $data->created_at }}"
                            disabled>
                    </div>
                    <div class="form-group col-6">
                        <label for="link"> resource link : </label>
                        <input type="url" name="link" id="link" class="form-control"
                            placeholder="any link eg. youtube, google drive, website link" value="{{ $data->url }}"
                            required>
                    </div>
                    <div class="form-group col-2">
                        <label for=""></label>
                        <input type="submit" class="form-control btn btn-success" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
