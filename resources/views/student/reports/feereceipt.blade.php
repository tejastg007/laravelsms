@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>fee receipt</title>
    <style>
        h1 {
            font-size: 45px !important
        }

        p {
            font-size: 22px !important
        }

        li {
            font-size: 18px !important
        }

        th,
        td {
            font-size: 18px !important
        }

        .total td {
            text-align: right;
            padding: 10px 20px
        }


        @media print {
            .no-print {
                display: none !important;
            }
        }

    </style>
</head>

<body onload="window.print()">
    <div class="container py-5 w-75 text-capitalize">
        <button onclick="window.print()" class="no-print btn btn-success btn-lg my-5">Print receipt</button>
        <div class="row">
            <div class="col-6">
                <h1> <strong> Madcraft </strong></h1>
                <h2 style="font-size: 40px"> <strong> Multitasking firm</strong></h2>
                <p>Date : {{ now()->format('d M Y') }} </p>
            </div>
            <div class="col-6">
                <img src="{{ asset('homepageimages/madcraft.png') }}" width="150px" class="float-right">
            </div>
        </div>
        <div>
            <p><strong>Address: near PWD office, behind karnataka bank, nippani road, chikodi, karnataka.</strong></p>
            <div class="row">
                <div class="col-6">
                    <p><strong>Phone : {{ $companydetails->phone1 . ' , ' . $companydetails->phone2 }}</strong></p>
                    <p><strong> Website: www.madcraftdigitalseva.com</strong></p>
                </div>
                <div class="col-6">
                    <p><strong>email : {{ $companydetails->email }}</strong></p>
                </div>
            </div>


            <hr>
            <h2 class="text-center"> <strong> Fee Receipt </strong></h2>
            <hr>
        </div>
        <div class="row">
            <div class="col-6">
                <p><strong>Student details :</strong></p>
                <p><strong>Name : </strong>{{ $data->name }}</p>
                <p><strong>student ID : </strong>{{ $data->student_id }}</p>
                <p><strong>registration date : </strong>{{ $data->registration_date }}</p>
                <p><strong>course starts on : </strong>{{ $data->course_start_date }}</p>
                <p><strong>course ends on : </strong>{{ $data->course_end_date }}</p>
            </div>
            <div class="col-6">
                <p><strong>course details :</strong></p>
                <p><strong>course name : </strong>{{ $data->course->name }}</p>
                <p><strong>course duration : </strong>{{ $data->course->duration }} Months</p>
                <p><strong>course registration fee : </strong>{{ $data->course->registration_fee }} Rs</p>
                <p><strong>total course fee :
                    </strong>{{ $data->course->registration_fee + $data->course->course_fee }} Rs</p>
            </div>
        </div>
        <div class="py-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>sr</th>
                        <th>type</th>
                        <th>amount</th>
                        <th>status</th>
                        <th>paid on</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $paid = 0;
                    @endphp
                    <tr>
                        @foreach ($data->feedetail as $fee)
                            @if ($fee->fee_type == 0)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>registration fee</td>
                        <td>{{ $data->course->registration_fee }}</td>
                        <td>
                            @if ($fee->status == 1)
                                @php
                                    $paid += $data->course->registration_fee;
                                @endphp
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
                                @php
                                    $paid += $data->course->course_fee / $data->course->installments;
                                @endphp
                                paid
                            @else
                                not paid
                            @endif
                        </td>
                        <td id="d{{ $fee->id }}"> @if ($fee->paid_on == null) not paid @elseif ($fee->paid_on) {{ $fee->paid_on }} @endif</td>
                    </tr>
                    @endif
                    @endforeach
                    <tr>
                        <td></td>
                        <td> <strong> total amount </strong></td>
                        <td> <strong> {{ $data->course->course_fee + $data->course->registration_fee }} Rs </strong>
                        </td>
                        <td> <strong> total paid </strong></td>
                        <td><strong>{{ $paid }} Rs</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <footer class="container w-75">
        <p style="font-size: 15px !important" class="text-right">note: this is computer generated receipt and does
            not need any signature</p>
        <p style="font-size: 15px !important" class="text-right">All T&C applied. Visit madcraftdigitalseva.com for
            more info.</p>
    </footer>
</body>

</html>
