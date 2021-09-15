<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>
    {{-- data tables --}}
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
</head>
<style>
    /* global styles */
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    a,
    a:hover {
        text-decoration: none !important;
    }

    .card-header {
        background-color: white !important;
    }

    /* global styles end*/


    /* left column sidebar */
    .left-column,
    .right-column,
    .todo-column {
        position: relative;
        max-height: 100vh;
        height: 100vh;
        overflow: scroll;
    }

    .left-column {
        background-color: white !important;
    }

    .right-column {
        overflow: auto;
    }

    .menu-item {
        display: block;
        color: black;
        text-transform: capitalize;
        padding: 10px;
        margin: 5px 0px
    }

    .menu-item:hover {
        background-color: rgb(0, 174, 218);
        border-radius: 5px;
        color: white;
    }

    .menu-item-active {
        background-color: rgb(0, 174, 218);
        border-radius: 5px;
        color: white;
    }

    .menu-item:hover i {
        color: white
    }

    .menu-item i {
        color: gray;
        width: 25px;
        font-size: 18px !important;
        margin-right: 10px;
    }

    /* sidebar ends */

    /* profile button */
    .admin-setting-container {
        position: fixed;
        right: 0px;
        top: 0px;
        z-index: 1000;
    }

    .admin-setting {
        position: relative;
        opacity: 0.3;
        background-color: gray;
        padding: 10px;
        display: flex;
    }

    .admin-setting.dropdown-toggle::before {
        content: none !important;
    }

    .admin-setting-container .dropdown-menu a.text-left {
        /* padding: 0.3rem 0rem !important */
    }

    .admin-setting i {
        font-size: 30px;
        color: white
    }

    .admin-setting .dropdown-menu a {
        color: black;
    }

    .admin-setting .dropdown-menu a i {
        margin: 0px 10px
    }

    /* profie button end */

    /* todo column */

    .todo-container {
        /* height: max-content; */
    }

    .displaynone {
        display: none !important;
    }

    .tasks a {
        font-size: 18px;
        padding: 5px 10px
    }

    /* todo column end*/

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

        {{-- data container --}}
        <div class="row data-container">
            {{-- left column --}}
            <div class="left-column col-2 px-0">
                <div class="left-top">
                    <a href="{{ url('/dashboard') }}"
                        class="justify-content-center align-items-center d-flex m-0 py-4 h3"
                        style="font-weight:bold; letter-spacing:2px">MADCRAFT</a>
                </div>
                {{-- left menu bar --}}
                <div class="left-menu p-2">
                    <a href="{{ route('admin.dashboard') }}" class="menu-item"> <i class="fas fa-columns"></i>
                        dashboard
                    </a>
                    <a href="{{ route('admin.new-admission') }}" class="menu-item"> <i
                            class="fas fa-user-graduate"></i>
                        new
                        admission </a>
                    <a href="{{ route('admin.active-students') }}" class="menu-item"> <i
                            class="fas fa-chart-line"></i>
                        active
                        students </a>
                    <a href="{{ route('admin.all-students') }}" class="menu-item "> <i
                            class="fas fa-users"></i> all
                        students
                    </a>
                    <a href="{{ route('admin.batches') }}" class="menu-item"> <i class="fas fa-restroom"></i>
                        batches
                    </a>
                    <a href="{{ route('admin.courses') }}" class="menu-item"> <i class="fas fa-book"></i>
                        courses
                    </a>
                    <a href="{{ route('admin.fee-status') }}" class="menu-item"> <i
                            class="fas fa-rupee-sign "></i> fee
                        status </a>
                    <a href="{{ route('admin.report') }}" class="menu-item"> <i
                            class="fas fa-file-invoice "></i>
                        report</a>
                    <a href="{{ route('admin.notifications') }}" class="menu-item"> <i
                            class="fas fa-bell "></i>
                        notifications <span class="badge badge-danger">new</span> </a>
                </div>
            </div>

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

    {{-- all scripts --}}
    <script src="{{ asset('js/colorizemenu.js') }}"></script>
    {{-- datatable scripts for --}}
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('.table').DataTable({});
        });
    </script>
    {{-- for sorting the column date wise - https://stackoverflow.com/questions/12003222/datatable-date-sorting-dd-mm-yyyy-issue --}}

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
                        $(".task-success").css("display", "block");
                        $("#task").val("");
                    },
                });
            };

            taskcomplete = function(id, e) {
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
    @yield('scripts')
</body>

</html>
