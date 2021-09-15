@extends('layouts.app')
@section('style')
    <style></style>
@endsection

@section('page-content')
    <a href="{{ URL::previous() }}" class="btn btn-primary"> <i class="fa fa-long-arrow-alt-left"></i> Back </a>
    <div class="card mt-3 text-capitalize">
        <div class="card-header">
            <p class="h5 m-0">fee-details : {{ $data->name }}</p>
        </div>
        <div class="card-body">
            <p class="text-sm ">course- {{ $data->course->name }}</p>
            <form>
                <table class="table border">
                    <thead>

                        <tr>
                            <th>sr</th>
                            <th>type</th>
                            <th>amount</th>
                            <th>status</th>
                            <th>date paid on</th>
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
                                        <div class="custom-control custom-switch">
                                            <input class="custom-control-input" id="i{{ $fee->id }}" type="checkbox"
                                                value="{{ $fee->id }}" @if ($fee->status == 1) checked @endif
                                                onclick="updatefee(this.value)">
                                            <label class="custom-control-label" for="i{{ $fee->id }}"></label>
                                        </div>

                                    </td>
                                    <td id="d{{ $fee->id }}"> @if ($fee->paid_on == null) not paid @elseif($fee->paid_on !=null) {{ $fee->paid_on }} @endif</td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>installment {{ $loop->index }}</td>
                                    <td>{{ $data->course->course_fee / $data->course->installments }}</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input class="custom-control-input" id="i{{ $fee->id }}" type="checkbox"
                                                value="{{ $fee->id }}" @if ($fee->status == 1) checked @endif
                                                onclick="updatefee(this.value)">
                                            <label class="custom-control-label" for="i{{ $fee->id }}"></label>
                                        </div>
                                    </td>
                                    <td id="d{{ $fee->id }}"> @if ($fee->paid_on == null) not paid @elseif ($fee->paid_on) {{ $fee->paid_on }} @endif</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary my-3">receipt</a>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            updatefee = function(feeid) {
                var status;
                if ($("#i" + feeid).prop('checked') == true) {
                    status = 1;
                } else {
                    status = 0;
                }
                $.ajax({
                    url: '{{ url('admin/fee-action') }}',
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': feeid,
                        'status': status
                    },
                    success: function(data) {
                        if (data['paidon'] == null)
                            $("#d" + feeid).text('not paid');
                        else
                            $("#d" + feeid).text(data['paidon']);
                    }
                });
            }
        });
    </script>
@endsection
