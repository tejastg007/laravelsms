<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>
    {{-- data tables --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
</head>
<style>
   

</style>
@yield('style')

<body>
    <div class="container-fluid">
        {{-- profile button --}}
        <div class="admin-setting-container dropdown dropleft text-capitalize">
            <a href="#" class="admin-setting dropdown-toggle " data-toggle="dropdown"> <i class="fa fa-cog"></i></a>
            <div class="dropdown-menu p-3">
                <a class="btn btn-block  text-left " href="{{ route('admin.profile') }}"> <i class="fa fa-user"></i>
                    profile</a>
                <div class="dropdown-divider"></div>
                <a class="btn btn-block text-left " href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i
                        class="fas fa-sign-out-alt"></i>
                    logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        {{-- profile button ends --}}

        {{-- search bar starts --}}
        @include('includes.search-panel')
        {{-- search bar ends --}}

        {{-- data container --}}
        <div class="row data-container">
            {{-- left column --}}
            @include('includes.leftbar')
            {{-- left column ends --}}
            {{-- main middle column --}}
            <div class="right-column col-7 mx-0 px-0">
                <div class="main-page">
                    <div class="container py-3">
                        @yield('page-content')
                    </div>
                </div>
            </div>
            <div class="todo-column col-3 mx-0 px-0  ">
                <div class="container">
                    @include('includes.todo')
                </div>
            </div>
        </div>
    </div>

    <div class="loader"
        style="position:fixed;top:0px;left:0px;width:100vw;height:100vh;background-color:rgba(128, 128, 128, 0.308);display:none">
        <h1 style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);">wait...</h1>
    </div>

    {{-- all scripts --}}
    {{-- datatable scripts for --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script src="{{ asset('js/colorizemenu.js') }}"></script>

    {{-- search-bar script --}}
    <script>
        $(function() {
            // display and hide search icon
            $('.search-bar').on({
                mouseenter: function() {
                    $('.search-input').css("display", "block")
                    $('.search-icon').css('display', 'none');
                },
                mouseleave: function() {
                    $('.search-input').css('display', 'none');
                    $('.search-icon').css('display', 'block')
                }
            });

            // hide search result panel on escape key press and close button
            document.addEventListener('keydown', function(event) {
                if (event.key === "Escape") {
                    $('.search-results').css('display', 'none');
                    $('.search-panel-container').css('display', 'none')
                }

            });
            closesearch = function() {
                $('.search-results').css('display', 'none');
                $('.search-panel-container').css('display', 'none')
            }

            //show search panel on input  
            searchstud = function(keyword) {
                $('.search-results').css('display', 'block');
                $('.search-panel-container').css('display', 'block');
                $.ajax({
                    method: "post",
                    url: '{{ url('admin/searchstud') }}',
                    // processData: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        keyword: keyword
                    },
                    success: function(data) {
                        // console.log(data);
                        // alert(data)
                        $(".search-result-container").html(data.data);
                    },
                });
            }
        });
    </script>





    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            // $('.table').DataTable({});
            $('.table').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel',
                ],
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        });

        function loadershow() {
            $('.loader').css('display', 'block');
        }

        function loaderhide() {
            $('.loader').css('display', 'none');
        }
    </script>

    {{-- todo task scripts --}}
    <script>
        function loaddata() {
            $.ajax({
                method: "post",
                url: '{{ url('admin/loaddata') }}',
                // processData: false,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    $(".tasks").html(data.data);
                    loaderhide();
                },
            });
            // return false;
        }

        $(function() {
            $.ajaxSetup({
                cache: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            addtask = function(e) {
                e.preventDefault();
                loadershow();
                var task = $("#task").val();
                $.ajax({
                    method: "post",
                    url: '{{ url('admin/addtask') }}',
                    data: {
                        task: task,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        loaddata();
                        $("#task").val("");
                    },
                });
            };

            taskcomplete = function(id, e) {
                loadershow();
                $.ajax({
                    method: "post",
                    url: '{{ url('admin/taskcomplete') }}',
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        loaddata();
                    },
                });
            };

            taskedit = function(id) {
                $(".task-actions.row-" + id).addClass("displaynone");
                $(".task-content.row-" + id).addClass("displaynone");
                $(".task-edit-save.row-" + id).css("display", "block");
                $(".task-edit.row-" + id).css("display", "block");
            };

            taskeditaction = function(id, e) {
                loadershow();
                var task = $(".task-edit.row-" + id).val();
                $.ajax({
                    method: "post",
                    url: '{{ url('admin/taskedit') }}',
                    data: {
                        id: id,
                        task: task,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        // alert(data.message)
                        loaddata();
                    },
                });
                return false;
            };

            taskdelete = function(id) {
                if (confirm("are you confirm to delete?")) {
                    loadershow();
                    $.ajax({
                        method: "post",
                        url: ' {{ url('admin/taskdelete') }}',
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            loaddata();
                        },
                    });
                } else {
                    // alert("cancel")
                }
            };
        });
    </script>
    {{-- todo task scripts ends --}}

    {{-- global search button --}}
    <script>
        $(function() {

        });
    </script>

    {{-- global search button ends --}}
    @yield('scripts')
</body>

</html>
