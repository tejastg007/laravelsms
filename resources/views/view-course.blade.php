@extends('layouts.app')
@section('style')
    <style></style>
@endsection

@section('page-content')
    <a href="{{ route('admin.courses') }}" class="btn btn-primary"> <i class="fa fa-long-arrow-alt-left"></i> Back </a>
    <div class="card mt-3 text-capitalize">
        <div class="card-header">
            <p class="m-0 h5">course : {{ $data->name . ' V' . $data->version }}
                <a href="#" class="h6" data-toggle="modal" data-target="#course-instructions">view course
                    edit
                    manual</a>
            </p>
            <!-- Modal -->
            <div class="modal fade" id="course-instructions" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">course edit instructions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ol class="text-lowercase ">
                                <li class="text-danger">edit the course only when you want to increase the fees,
                                    change
                                    the
                                    number of installments or change the course duration month. You can not change the
                                    course title at all.</li>
                                <li>after you update the course-fees / installments / duration, a new course entry will
                                    be
                                    created automatically with the same name of current course having same course ID but
                                    different version.</li>
                                <li>note that, the course id will be same forever for same course, only version will be
                                    upgraded. for eg. v1, v2, v3 and so on</li>
                                <li>whenever any changes take place, the new course will be live and old version will
                                    automatically be disabled, i.e. the new admissions will be done under the latest
                                    version
                                    of course </li>
                                <li>although, you can be able to see the version history of same course at the right
                                    side on
                                    this page along with the dates of course you modified on.</li>
                                <li class="text-success">different versions of same course are created to avoid the
                                    miscalculation of fee-records of the ongoing students incase if course is updated
                                    with
                                    latest fees.</li>
                            </ol>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal end --}}
        </div>
        <div class="card-body">
            <div class="row mx-auto">
                <div class="col-6">
                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session('timeerror') }}</strong>
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                        
                    @if ($errors->any())
                        <div class="alert  alert-danger" role="alert">
                            <strong>You have following errors :</strong>
                            <ul class=" list-unstyled ">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('admin/edit-course_action') }}" method="post" id="editform">
                        @csrf
                        <input type="number" value="{{ $data->id }}" name="id" hidden>
                        <div class="form-group">
                            <label for="course">course name </label>
                            <input type="text" class="form-control" name="course" id="course" readonly
                                value="{{ $data->name }}">
                        </div>
                        <div class="form-group">
                            <label for="duration">course duration months:</label>
                            <input type="number" class="form-control" name="duration" id="duration"
                                value="{{ $data->duration }}" onkeyup="updateinstall(this.value)">
                        </div>
                        <div class="form-group">
                            <label for="registration-fee"> registration fee :</label>
                            <input type="number" class="form-control" name="registrationfee" id="registration-fee"
                                value="{{ $data->registration_fee }}">
                        </div>
                        <div class="form-group">
                            <label for="course-fee"> course fee :</label>
                            <input type="text" class="form-control" name="coursefee" id="course-fee"
                                value="{{ $data->course_fee }}">
                        </div>
                        <div class="form-group">
                            <label for="installments"> no. of installments</label>
                            <input type="number" name="installments" id="installments" class="form-control"
                                value="{{ $data->installments }}">
                        </div>
                        <button type="submit" class="btn btn-primary" disabled id="savebtn">save changes </button>
                    </form>
                    <script>
                        function updateinstall(val) {
                            document.getElementById("installments").value = val;
                        }
                        var form = document.getElementById("editform");
                        form.addEventListener("input", function() {
                            $('#savebtn').prop('disabled', false);
                        });
                    </script>
                </div>
                {{-- <div class="col-1"></div> --}}
                <div class="col-6">
                    <p class="h5 mb-3">course version history:</p>
                    <table class="table border text-capitalize table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>sr.</th>
                                <th>name</th>
                                <th>view</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($versions as $version)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $version->name . ' V' . $version->version }}</td>
                                    <td><a href="{{ route('admin.course-version', ['id' => $version->id]) }}"
                                            class="btn btn-sm btn-success">details</a></td>
                                </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
