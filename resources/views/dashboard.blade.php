@extends('layouts.app')
@section('style')
    <style>
        .course-card {
            max-width: 250px !important;
            width: 250px;
            margin: 8px;
        }

        .highcharts-credits {
            display: none !important;
        }

        .card{
            border:none !important
            /* border-left: 3px solid black !important; */
        }

        .card:nth-child(1) {
            background: #f12711;
            background: -webkit-linear-gradient(to right, #f5af19, #f12711);
            background: linear-gradient(to right, #f12711, #f5af19);
        }

        .card:nth-child(2) {
            background: #2193b0;
            background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);
            background: linear-gradient(to right, #2193b0, #6dd5ed);
        }

        .card:nth-child(3) {
            background: #6441A5;
            background: -webkit-linear-gradient(to right, #2a0845, #6441A5);
            background: linear-gradient(to right, #2a0845, #6441A5);
        }

    </style>
@endsection

@section('page-content')
    <div class="stats-container">
        <div class="row justify-content-around py-4 text-capitalize">
            <div class="card col-3">
                <div class="card-body text-white">
                    <p >total courses</p>
                    <h4>{{ $coursedata->count() }}</h4>
                </div>
            </div>
            <div class="card col-3">
                <div class="card-body text-white">
                    <p>students learning</p>
                    <h4>{{ $studdata->where('status','1')->count() }}</h4>
                </div>
            </div>
            <div class="card col-3">
                <div class="card-body text-white">
                    <p>students passed</p>
                    <h4>{{ $studdata->where('status','-1')->count() }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div id="chart-container">

    </div>
@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        var datas = <?php echo json_encode($datas); ?>;
    </script>
    <script src="{{ asset('js/chart.js') }}"></script>
@endsection
