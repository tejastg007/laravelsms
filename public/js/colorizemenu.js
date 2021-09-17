var string = window.location;
var paths = [
    "/admin/dashboard",
    "/admin/new-admission",
    "/admin/active-students",
    "/admin/all-students",
    "/admin/batches",
    "/admin/courses",
    "/admin/fee-status",
    "/admin/report",
    "/admin/studymaterial",
    "/admin/notifications",
];
var c = 0;
for (let i of paths) {
    var path = string.pathname;
    if (i == path) {
        document
            .getElementsByClassName("menu-item")
            [c].classList.add("menu-item-active");
        document.getElementsByClassName("menu-item")[
            c
        ].children[0].style.color = "white";
    }
    c++;
}
