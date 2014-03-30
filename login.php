<?php
	session_start();
	
	
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$ctx = hash_init('md5');
		hash_update($ctx, $password);
		$hashed_pw = (string)hash_final($ctx);
		
		$dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
		$query1 = "SELECT count(id) FROM users2 WHERE username='$username' AND password='$hashed_pw'";
		$query2 = "SELECT id FROM users2 WHERE username='$username' AND password='$hashed_pw'";
		$result1 = pg_query($query1);
		
		if (pg_fetch_row($result1)[0]==0){
			$arg = "Kasutajanimi või parool vale!";
			$_SESSION['error'] =  $arg;
			pg_close($dbconn);
			header('Location: index.php#login');
			exit();
		} else {
			$result2 = pg_query($query2);
			$userid = pg_fetch_row($result2)[0];
			$_SESSION['user'] = $username;
			$_SESSION['id'] = $userid;
			pg_close($dbconn);
			header('Location: index.php');
			exit();
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
    </head>
    <body>
<div class="left-content left">
<table>
<tr>
<td>
<form id="login" action="login.php" method="post" accept-charset="UTF-8">
    <fieldset>
        <legend>Logi sisse</legend>
        <p><label for="username">Kasutajanimi</label><input class="vorm" type="text" name="username" id="username" maxlength="20" required /></p>
        <p><label for="password">Parool</label><input class="vorm" type="password" name="password" id="password" maxlength="50" required /></p>
        <p><input type="submit" name="Submit" value="Logi sisse" />
        </p>
    </fieldset>
</form>
</td>
<td>
<?php
	if (isset($_SESSION['error'])) {
		if ($_SESSION['error'] != "") {
			echo $_SESSION['error'];
			$_SESSION['error'] = "";
		}
	}
?>
</td>
</tr>
</table>
</div>
<div class="right-content right">
    <h3>Uued koodid</h3>
    siin<br>
    on<br>
    uued<br>
    koodid<br>
    mis<br>
    on<br>
    tekitatud<br>
    teiste<br>
    poolt
</div>
    </body>
</html>
