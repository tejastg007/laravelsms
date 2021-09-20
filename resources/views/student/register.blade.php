<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>student register</title>
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('homepageimages/madcraft.png') }}" alt="" width="100px">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link h4" href="{{ route('student.login') }}">Login</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link h4" href="{{ route('student.register') }}">Register</a>
                    </li>

                </ul>
            </div>
        </nav>
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center text-uppercase">student registration</h2>
                    </div>

                    <div class="card-body">

                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session('error') }}</strong>
                            </div>
                        @else
                        @endif

                        <form method="POST" action="{{ route('student.register.action') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="studid"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Student ID') }}</label>

                                <div class="col-md-6">
                                    <input id="studid" type="text"
                                        class="form-control  @error('student_id') is-invalid
                                    @enderror"
                                        name="student_id" value="{{ old('student_id') }}" required>

                                    @error('student_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                    <a href="{{ route('student.login') }}" class="">already registerd? Login
                                        here!</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
