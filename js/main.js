$.ajaxSetup({ cache: false });
$(document).ready(function () {
    if (document.location.hash == "" || document.location.hash == "#") {
        $(".left-content").load("kodu.php");
    } else {
		$(".left-content").load(document.location.hash.substr(1) + ".php");
		if (document.location.hash.indexOf("vaade.php?id=") != -1) {
			$(".left-content").load(document.location.hash.substr(1));
		}
    }
    $("#header").click(function () {
        $(".left-content").load("kodu.php");
    });
    $("#loginLink").click(function () {
        $(".left-content").load("login.php");
    });
    $("#registerLink").click(function () {
        $(".left-content").load("register.php");
    });
    $("#minu_amber").click(function () {
        $(".left-content").load("minu_amber.php");
    });
    $("#minu_profiil").click(function () {
        $(".left-content").load("minu_profiil.php");
    });
    $("#minu_seaded").click(function () {
        $(".left-content").load("minu_seaded.php");
    });
	$(document).on('click', '.uuedKoodid', function () {
		setTimeout(function(){
			$(".left-content").load(document.location.hash.substr(1));
		}, 10);
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
	
	setInterval(function(){
		$(".right-content").load("uued_koodid.php");
	}, 5000);
});
