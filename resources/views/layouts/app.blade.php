<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
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

    {{-- all scripts --}}
    <script src="{{ asset('js/colorizemenu.js') }}"></script>
    {{-- datatable scripts for --}}
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
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
