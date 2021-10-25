<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <title>student portal - Madcraft Multitasking firm </title>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        body {
            background: #0f0c29;
            background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);
            background: linear-gradient(to right, #24243e, #302b63, #0f0c29);
        }

        .navbar {
            background-color: #1abc9c !important;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 2px;
            /* padding: 9px; */
            border-radius: 5px;
            color: white !important;
        }

        .navbar-brand:hover {
            color: white;
        }

        .navbar ul li {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2px 10px;
            margin: 0px 5px;
            color: white !important;
        }

        .navbar-nav li a {
            color: white !important;
            margin: 0px 5px
        }

        .navbar-nav li:hover {
            color: white !important;
            background-color: #16a085;
            border-radius: 50px;
        }

        .navbar-nav li.active {
            color: white !important;
            background-color: #16a085;
            border-radius: 50px
        }

        .navbar-nav li:hover a {
            color: white !important;
        }

        .navbar-nav li {
            /* padding: 10px 15px; */
        }

        .logout a {
            color: white !important;
            background-color: #8e44ad;
            border-radius: 5px;
            padding: 5px 10px;
        }

        /* pages style */
        .card {
            background-color: white !important;
            border: 0px !important;
        }

        .card-header {
            background: #fe8c00;
            background: -webkit-linear-gradient(to right, #f83600, #fe8c00);
            background: linear-gradient(to right, #f83600, #fe8c00);
            color: white !important;
            letter-spacing: 1px;
        }

    </style>
    @yield('styles')
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg  navbar-light bg-light fixed-top">
            <div class="container text-capitalize">
                <a class="navbar-brand" href="{{ route('student.profile') }}">MADCRAFT</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <i class="fa fa-user-circle"></i> <a class="nav-link text-dark"
                                href="{{ route('student.profile') }}">profile</a>
                        </li>
                        <li class="nav-item ">
                            <i class="fa fa-book"></i> <a class="nav-link text-dark"
                                href="{{ route('student.mycourse') }}">my
                                course</a>
                        </li>
                        <li class="nav-item">
                            <i class="fa fa-money-bill-alt"></i> <a class="nav-link text-dark"
                                href="{{ route('student.feestatus') }}">fee
                                status</a>
                        </li>
                        <li class="nav-item">
                            <i class="fa fa-school"></i> <a class="nav-link text-dark"
                                href="{{ route('student.resources') }}">study
                                resources</a>
                        </li>
                        <li class="nav-item">
                            <i class="fa fa-mail-bulk"></i> <a class="nav-link text-dark"
                                href="{{ route('student.contact') }}">contact</a>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0 logout   d-sm-flex justify-content-center">
                        <a href="{{ route('student.logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('student.logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container pt-5 pages">
            <section class="mt-5">
                @yield('page-content')
            </section>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/student/colorizemenu.js') }}"></script>
        @yield('scripts')

</body>

</html>
