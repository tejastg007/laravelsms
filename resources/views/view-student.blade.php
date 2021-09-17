@extends('layouts.app')
@section('style')
    <style></style>
@endsection

@section('page-content')
    <a href="{{ route('admin.active-students') }}" class="btn btn-primary"> <i class="fa fa-long-arrow-alt-left"></i> Back
    </a>

    <div class="card mt-3 text-capitalize">
        <div class="card-header">
            <span class="h5 text-bold m-0"> {{ $data->name }} </span>
            <span class="float-right">
                <a href="{{ route('admin.fee-details', ['id' => $data->id]) }}" class="btn btn-success">add fees</a>
                <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#upload-photo"
                    class="btn btn-primary">upload photo</a>
                {{-- <a class="btn btn-danger" data-toggle="tooltip" title="currently disabled">view attendance</a> --}}
            </span>
        </div>
        <div class="card-body">
            @error('student-photo')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong> {{ $message }}</strong>
                </div>
            @enderror
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong> {{ session('success') }}</strong>
                </div>
            @endif
            @if (session()->has('fail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong> {{ session('fail') }}</strong>
                </div>
            @endif



            <div class="personal-information text-capitalize">
                <p class="h5 mb-3 " style="font-weight:bold ">personal information</p>
                <form method="post" action="{{ url('admin/edit-student') }}" id="editInfo">
                    @csrf
                    <input type="number" name="id" hidden value="{{ $data->id }}">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">full name :</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}"
                                required>
                        </div>
                        <div class="col-6 form-group">
                            <label for="gender">gender :</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="male" selected>male</option>
                                <option value="female">female</option>
                            </select>
                            <script>
                                document.querySelector('#gender').value = "{{ $data->gender }}";
                            </script>
                        </div>
                        <div class="col-6 form-group">
                            <label for="dob">Date of birth :</label>
                            <input type="date" class="form-control" name="dob" id="dob" value="{{ $data->dob }}"
                                required>
                        </div>
                        <div class="form-group col-6">
                            <label for="address">address :</label>
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{ $data->address }}" required>
                        </div>

                        <div class="col-6 form-group">
                            <label for="phone">phone number :</label>
                            <input type="number" class="form-control" name="phone" id="phone"
                                value="{{ $data->phone }}" required>
                        </div>
                        <div class="col-6">
                            <img @if ($data->avatar == null)
                            src="{{ asset('homepageimages/blankimage.png') }}"
                        @else
                            src="{{ asset('avatars/' . $data->id . '.' . $data->avatar) }}"
                            @endif
                            alt="" style="width: 100px;height:100px">
                            {{-- <img src="{{ asset('storage/madcraft.png') }}" alt=""> --}}
                        </div>
                    </div>
                </form>

                <p class="h5 mb-3" style="font-weight:bold ">educational information</p>
                <div class="row">
                    <div class="col-6 form-group">
                        <label for="phone">student ID :</label>
                        <input type="text" class="form-control" name="" id="phone" readonly
                            value="{{ $data->student_id }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="course">course name :</label>
                        <input type="text" class="form-control" name="" id="course" readonly
                            value="{{ $data->course->name }}">
                    </div>
                    <div class="col-6 form-group">
                        <label for="">course duration :</label>
                        <input type="number" class="form-control" name="" id="" readonly
                            value="{{ $data->course->duration }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="">batch time :</label>
                        <input type="text" class="form-control" name="" id="" readonly
                            value="{{ $data->batch->start_time . ' - ' . $data->batch->end_time }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="">course start date :</label>
                        <input type="text" class="form-control" name="" id="" readonly
                            value="{{ $data->course_start_date }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="">course end date :</label>
                        <input type="text" class="form-control" name="" id="" readonly
                            value="{{ $data->course_end_date }}">
                    </div>
                </div>

                <p class="h5 my-3 " style="font-weight:bold ">additional information</p>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="">registration date :</label>
                        <input type="text" class="form-control" name="" id="" readonly
                            value="{{ $data->registration_date }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="">registration fees :</label>
                        <input type="number" class="form-control" name="" id="" readonly
                            value="{{ $data->course->registration_fee }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="">course fees :</label>
                        <input type="number" class="form-control" name="" id="" readonly
                            value="{{ $data->course->course_fee }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="">total fees :</label>
                        <input type="number" class="form-control" name="" id="" readonly
                            value="{{ $data->course->course_fee + $data->course->registration_fee }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="">number of installments :</label>
                        <input type="number" class="form-control" name="" id="" readonly
                            value="{{ $data->course->installments }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="">installments completed :</label>
                        <input type="text" class="form-control" name="" id="" readonly
                            value="{{ $data->feedetail->where('status', 1)->where('fee_type', '!=', 0)->count() }}">
                    </div>

                    <div class="form-group col-6">
                        <a href="{{ route('admin.fee-details', ['id' => $data->id]) }}" class="btn btn-info">view fee
                            details</a>
                    </div>

                </div>

                {{-- save and cancel buttons --}}
                <div class="row mt-3">
                    <div class="col-6">
                        <button type="submit" form="editInfo" class="btn btn-success">Save changes</button>
                        <a href="{{ URL::previous() }}" class="btn btn-danger">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- upload photo modal --}}
    <div class="modal fade text-capitalize" id="upload-photo" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">select photo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <a class="pb-3 d-block" href="https://image.online-convert.com/convert-to-jpg" target="_blank"
                        rel="nofollow">click
                        here to convert any image to JPG</a>
                    <form class="custom-file" method="post" action="{{ url('admin/upload-photo') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="number" name="id" value="{{ $data->id }}" hidden>
                        <input type="file" class="custom-file-input" name="student-photo" id="student-photo">
                        <label for="student-photo" class="custom-file-label">choose file</label>
                        <div class=" d-flex justify-content-end my-3">
                            <button type="submit" class="btn btn-success mx-2">save</button>
                            <button type="button" class="btn btn-danger mx-2" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
