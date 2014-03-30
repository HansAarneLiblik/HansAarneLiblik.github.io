$(document).ready(function () {
    if (document.location.hash == "" || document.location.hash == "#") {
        $(".left-content").load("kodu.html");
    } else {
        $(".left-content").load(document.location.hash.substr(1) + ".html");
		if (document.location.hash == "#login") {
			$(".left-content").load(document.location.hash.substr(1) + ".php");
		}
    }
    $("#header").click(function () {
        $(".left-content").load("kodu.html");
    });
    $("#loginLink").click(function () {
        $(".left-content").load("login.php");
    });
    $("#registerLink").click(function () {
        $(".left-content").load("register.html");
    });
    $("#minu_amber").click(function () {
        $(".left-content").load("minu_amber.html");
    });
    $("#minu_profiil").click(function () {
        $(".left-content").load("minu_profiil.html");
    });
    $("#minu_seaded").click(function () {
        $(".left-content").load("minu_seaded.html");
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
