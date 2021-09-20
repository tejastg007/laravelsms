<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>student portal - Madcraft Multitasking firm </title>
    <style>
        html::-webkit-scrollbar {
            display: none;
        }

        .navbar-nav li:hover a {
            color: white !important;
            background-color: black
        }

        .navbar-nav li {
            padding: 5px 10px;
        }

    </style>
    @yield('styles')
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top ">
        <div class="container text-capitalize">
            <a class="navbar-brand" href="{{ route('student.profile') }}">MADCRAFT</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('student.profile') }}">profile</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-dark" href="{{ route('student.mycourse') }}">my course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('student.feestatus') }}">fee status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('student.resources') }}">study resources</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('student.contact') }}">contact</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="">Logout</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container pt-5">
        <section class=" mt-4">
            @yield('page-content')
        </section>
    </div>
    @yield('scripts')
</body>

</html>
