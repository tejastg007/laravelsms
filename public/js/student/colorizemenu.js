var string = window.location;
var paths = [
    "/student/profile",
    "/student/mycourse",
    "/student/feestatus",
    "/student/resources",
    "/student/contact",
];

var c = 0;
for (let i of paths) {
    var path = string.pathname;
    if (i == path) {
        document.getElementsByClassName("nav-item")[c].classList.add("active");
    }
    c++;
}
