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
    <title>fee report</title>
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
    <div class="container text-capitalize w-70 py-5">
        <button onclick="window.print()" class="no-print btn btn-success btn-lg my-5">Print report</button>
        <div class="row">
            <div class="col-6">
                <h1> <strong> Madcraft </strong></h1>
                <h2 style="font-size: 40px"> <strong> Multitasking firm</strong></h2>
                <h2> <strong> Fee Report </strong></h2>
                <p>Date : {{ now()->format('d M Y') }} </p>
            </div>
            <div class="col-6">
                <img src="{{ asset('homepageimages/madcraft.png') }}" width="150px" class="float-right">
            </div>
        </div>
        <hr>
        <p><strong>Address: near PWD office, behind karnataka bank, nippani road, chikodi, karnataka.</strong></p>
        <hr>
        <div class="row">
            <div class="col-6">
                <p class="h5"><strong>Report Info : </strong></p>
                @if ($_GET['startdate'] == '' || $_GET['enddate'] == '')
                    <p class="p-0 m-0"> <strong> records from : </strong>
                        {{ Carbon::now()->startOfYear()->format('d M Y') }} </p>
                    <p class="p-0 m-0"> <strong> records to : </strong> {{ today()->format('d M Y') }} </p>
                @else
                    <p class="p-0 m-0"> <strong> records from :
                        </strong>{{ Carbon::parse($_GET['startdate'])->format('d M Y') }}</p>
                    <p class="p-0 m-0"> <strong> records to : </strong>
                        {{ Carbon::parse($_GET['enddate'])->format('d M Y') }} </p>
                @endif
            </div>

            <div class="col-6">
                <p class="p-0 m-0"><strong>selected courses:</strong></p>
                @if (isset($_GET['courses']))
                    <ul class="">
                      @foreach ($_GET['courses'] as $course)
                        <li>{{ $course }}</li>
                      @endforeach
                    </ul>
                @else
                <ul>
                    <li>All</li>
                </ul>
                @endif
            </div>
        </div>

        <div class="
                        row">
                        <table class="table table-bordered mt-5 col-12">
                            <tr>
                                <th style="width:5%">sr</th>
                                <th style=" width:35%">name</th>
                                <th style=" width:30%">course</th>
                                <th style=" width:15%">amount</th>
                                <th style=" width:25%">date</th>
                            </tr>

                            <tbody>

                                @if (!empty($_GET['courses']))
                                    @php
                                        $total = 0;
                                        $i = 0;
                                    @endphp
                                    @foreach ($feedata as $record)
                                        @if (in_array($record->studname->course->name, $_GET['courses']))
                                            @php $i++; @endphp
                                            <tr>
                                                <td>@php echo $i; @endphp</td>
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
                                    @php
                                        $total = 0;
                                        $i = 0;
                                    @endphp
                                    @foreach ($feedata as $record)
                                        @php $i++; @endphp
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
                        </table>
            </div>
            <table align="right" class="total mb-5">
                <tr>
                    <td>total entries :</td>
                    <td> @php
                        echo $i;
                    @endphp</td>
                </tr>
                <tr>
                    <td>total collection :</td>
                    <td> @php
                        echo $total . ' Rs';
                    @endphp</td>
                </tr>
            </table>
        </div>
</body>

</html>
