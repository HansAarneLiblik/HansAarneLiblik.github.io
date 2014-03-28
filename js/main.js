$(document).ready(function () {
    if (document.location.hash == "" || document.location.hash == "#") {
        $("#content").load("kodu.html");
    } else {
        $("#content").load(document.location.hash.substr(1)+".html");
    }
//    $("#header").click(function () {
//        $("#content").load("kodu.html");
//    });
    $("#loginLink").click(function () {
        $("#content").load("login.html");
    });
    $("#registerLink").click(function () {
        $("#content").load("register.html");
    });
});
