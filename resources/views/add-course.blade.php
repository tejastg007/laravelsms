@extends('layouts.app')
@section('style')
    <style></style>
@endsection

@section('page-content')
    <a href="{{ URL::previous() }}" class="btn btn-primary"> <i class="fa fa-long-arrow-alt-left"></i> Back </a>
    <div class="card mt-3 text-capitalize">
        <div class="card-header">
            <p class="m-0 h5">add new course</p>
        </div>
        <div class="card-body">
            <div class="row mx-auto">
                <div class="col-6">
                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('admin/add-course') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="course">enter course name :</label>
                            <input type="text" class="form-control" name="course" id="course" required
                                value="{{ old('course') }}">
                        </div>
                        <div class="form-group">
                            <label for="duration">course duration months:</label>
                            <input type="number" class="form-control" name="duration" id="duration" required
                                onkeyup="setinstallments(this.value)" value="{{ old('duration') }}">
                        </div>
                        <div class="form-group">
                            <label for="registration-fee">enter registration fee :</label>
                            <input type="number" class="form-control" name="registrationfee" id="registration-fee"
                                required value="{{ old('registrationfee') }}">
                        </div>
                        <div class="form-group">
                            <label for="course-fee">enter course fee :</label>
                            <input type="number" class="form-control" name="coursefee" id="course-fee" required
                                value="{{ old('coursefee') }}">
                            <p class="h6 text-danger ">course fee + registration fee = total fee</p>
                        </div>
                        <div class="form-group">
                            <label for="installments">enter no. of installments</label>
                            <input type="number" name="installments" id="installments" class="form-control" required
                                value="{{ old('installments') }}">
                            <p class="h6 text-danger ">each installment amount = course fee/no. of installments</p>
                        </div>
                        <button type="submit" class="btn btn-primary">Add course </button>
                        <script>
                            function setinstallments(value) {
                                document.getElementById('installments').value = value
                            }
                        </script>
                    </form>


                </div>
                {{-- <div class="col-2"></div> --}}
                <div class="col-6">
                    <p class="h5 mb-3"><u> currently active courses :</u></p>
                    <table class="table border text-capitalize table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>sr</th>
                                <th>name</th>
                                <th>detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->unique('name') as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td><a href="{{ route('admin.courses.view-course', ['id' => $course->id]) }}"
                                            class="btn btn-success btn-sm">view</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
