@extends('student.layout.app')
@section('page-content')
    <div class="row text-capitalize">
        <div class="col-12 col-lg-8 mx-auto pb-5 pb-lg-0">
            <div class="card">
                <div class="card-header">
                    <p class="h5">your fee details</p>
                    <a href="{{ route('student.fee-receipt', ['id' => Auth::user()->student_id]) }}"
                        class="btn btn-primary" target="_blank">
                        print/download</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>sr</th>
                                <th>fee type</th>
                                <th>amount</th>
                                <th>status</th>
                                <th>paid on</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data->feedetail as $fee)
                                @if ($fee->fee_type == 0)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>registration fee</td>
                                        <td>{{ $data->course->registration_fee }}</td>
                                        <td>
                                            @if ($fee->status == 1)
                                                paid
                                            @else
                                                not paid
                                            @endif
                                        </td>
                                        <td id="d{{ $fee->id }}"> @if ($fee->paid_on == null) not paid @elseif($fee->paid_on !=null) {{ $fee->paid_on }} @endif</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>installment {{ $loop->index }}</td>
                                        <td>{{ $data->course->course_fee / $data->course->installments }}</td>
                                        <td>
                                            @if ($fee->status == 1)
                                                paid
                                            @else
                                                not paid
                                            @endif
                                        </td>
                                        <td id="d{{ $fee->id }}"> @if ($fee->paid_on == null) not paid @elseif ($fee->paid_on) {{ $fee->paid_on }} @endif</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
