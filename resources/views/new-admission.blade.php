@extends('layouts.app')
@section('style')
    <style>
        input {
            /* border: 1px solid rgb(231, 231, 231) !important; */
        }

    </style>
@endsection

@section('page-content')
    <form method="post" action="{{ url('admin/new-admission') }}">
        @csrf
        <div class="card text-capitalize p-0 mx-auto  shadow-sm ">
            <div class="card-header">
                <p class="h4">new admission</p>
            </div>
            <div class="card-body ">

                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('success')['successmsg'] }} <a
                                href="{{ route('admin.fee-details', ['id' => session('success')['id']]) }}">get fee
                                receipt!</a></strong>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ session('error') }} !</strong>
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">name :</label>
                    <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="name">gender :</label>
                    <select name="gender" id="gender" class="form-control" value="{{ old('gender') }}">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">DOB :</label>
                    <input type="date" class="form-control" name="dob" id="dob" required value="{{ old('dob') }}">
                </div>
                <div class="form-group">
                    <label for="">mobile :</label>
                    <input type="number" class="form-control" name="mobile" id="mobile" required
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        type="number" maxlength="10" value="{{ old('mobile') }}">
                </div>
                <div class="form-group">
                    <label for="">address :</label>
                    <input type="text" class="form-control" name="address" id="address" required
                        value="{{ old('address') }}">
                </div>
                <div class="form-group">
                    <label for="name">course :</label>
                    <select name="course" id="course" class="form-control" required>
                        <option value="" disabled selected></option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="startdate">course start date :</label>
                    <input type="date" class="form-control" name="startdate" id="startdate"
                        value="{{ old('startdate') }}">
                </div>
                <div class="form-group">
                    <label for="name">batch :</label>
                    <select name="batch" id="batch" class="form-control" required value="{{ old('batch') }}">
                        <option value="" disabled selected></option>
                        @foreach ($batches as $batch)
                            <option value="{{ $batch->id }}">{{ $batch->start_time . ' : ' . $batch->end_time }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">duration :</label>
                    <input type="text" class="form-control" name="duration" id="duration" readonly>
                </div>
                <div class="form-group">
                    <label for="">registration fees :</label>
                    <input type="text" class="form-control" name="" id="registrationfee" disabled>
                </div>
                <div class="form-group">
                    <label for="">course fees :</label>
                    <input type="text" class="form-control" name="" id="coursefee" disabled>
                </div>
                <div class="form-group">
                    <label for="">total fees :</label>
                    <input type="text" class="form-control" name="" id="totalfee" disabled>
                </div>

                <button type="submit" class="btn btn-success mr-3">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $(function() {
            $("#course").change(function() {
                var value = $("#course").val()

                $.ajax({
                    url: '{{ url('admin/course-details') }}',
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        courseid: value
                    },
                    success: function(data) {
                        $("#duration").val(data.duration)
                        $("#registrationfee").val(data.registrationfee)
                        $("#coursefee").val(data.coursefee)
                        $("#totalfee").val((data.coursefee) + (data.registrationfee))
                    }
                })
            });
        });
    </script>
@endsection
