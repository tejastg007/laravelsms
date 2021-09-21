<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>login- madcraft multitasking firm</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('homepageimages/madcraft.png') }}" alt="" width="100px">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                </ul>
            </div>
        </nav>
        <div class="row justify-content-center col-12 col-lg-7 mx-auto ">
            <div class="col-md-12">
                <div class="card text-capitalize">
                    <div class="card-header">
                        <p class="h4 text-center">choose your institute</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""></label>
                            <select class="custom-select" name="" id="class">
                                <option selected>Select institute</option>
                                <option value="http://madcraftdigitalseva.com/student">Madcraft, Ichalkaranji</option>
                                <option value="http://ka.madcraftdigitalseva.com/student">Madcraft, Chikodi, Karnataka
                                </option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#class').on('change', function(e) {
                var dest = this.value;
                window.location.href = dest;
            })
        });
    </script>
</body>

</html>
