$(document).ready(function () {
    if (document.location.hash == "" || document.location.hash == "#") {
        $("#content").load("kodu.html");
    } else {
        $("#content").load(document.location.hash.substr(1) + ".html");
		if (document.location.hash == "#login") {
			$("#content").load(document.location.hash.substr(1) + ".php");
		}
    }
    $("#header").click(function () {
        $("#content").load("kodu.html");
    });
    $("#loginLink").click(function () {
        $("#content").load("login.php");
    });
    $("#registerLink").click(function () {
        $("#content").load("register.html");
    });
    $("#minu_amber").click(function () {
        $("#content").load("minu_amber.html");
    });
    $("#profiil").click(function () {
        $("#content").load("minu_profiil.html");
    });
    $("#seaded").click(function () {
        $("#content").load("seaded.html");
    });
    $("#searchBox").focusin(function () {
        if (this.value == 'Otsing...') {
            this.value = '';
            this.style.color = '#000';
        }
    });

    $("#searchBox").focusout(function () {
        if (this.value == '') {
            this.value = 'Otsing...';
            this.style.color = '#BBB';
        }
    });



});
