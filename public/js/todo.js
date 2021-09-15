function loaddata() {
    $.ajax({
        method: "post",
        url: "/loaddata",
        // processData: false,
        data: {
            _token: "{{ csrf_token() }}",
        },
        success: function (data) {
            $(".tasks").html(data.data);
        },
    });
    // return false;
}

$(function () {
    $.ajaxSetup({
        cache: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    addtask = function (e) {
        e.preventDefault();
        var task = $("#task").val();
        $.ajax({
            method: "post",
            url: "addtask",
            data: {
                task: task,
                _token: "{{ csrf_token() }}",
            },
            success: function (data) {
                loaddata();
                $(".task-success").css("display", "block");
                $("#task").val("");
            },
        });
    };

    taskcomplete = function (id, e) {
        $.ajax({
            method: "post",
            url: "/taskcomplete",
            data: {
                id: id,
                _token: "{{ csrf_token() }}",
            },
            success: function (data) {
                loaddata();
            },
        });
    };

    taskedit = function (id) {
        $(".task-actions.row-" + id).addClass("displaynone");
        $(".task-content.row-" + id).addClass("displaynone");
        $(".task-edit-save.row-" + id).css("display", "block");
        $(".task-edit.row-" + id).css("display", "block");
    };

    taskeditaction = function (id, e) {
        var task = $(".task-edit.row-" + id).val();
        $.ajax({
            method: "post",
            url: "/taskedit",
            data: {
                id: id,
                task: task,
                _token: "{{ csrf_token() }}",
            },
            success: function (data) {
                // alert(data.message)
                loaddata();
            },
        });
        return false;
    };

    taskdelete = function (id) {
        if (confirm("are you confirm to delete?")) {
            $.ajax({
                method: "post",
                url: "/taskdelete",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function (data) {
                    loaddata();
                },
            });
        } else {
            // alert("cancel")
        }
    };
});
