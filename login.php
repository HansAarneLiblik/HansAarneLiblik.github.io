<?php
	session_start();
	
	
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$ctx = hash_init('md5');
		hash_update($ctx, $password);
		$hashed_pw = (string)hash_final($ctx);
		
		$dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
		$query_FB = "SELECT FBuser from users2 where username='$username'";
		$result_FB = pg_query($query_FB);
		
		$query1 = "SELECT count(id) FROM users2 WHERE username='$username' AND password='$hashed_pw'";
		$query2 = "SELECT id FROM users2 WHERE username='$username' AND password='$hashed_pw'";
		$result1 = pg_query($query1);
		
		if (pg_fetch_row($resultFB)[0]=="f" or pg_fetch_row($result1)[0]==0){
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
<table>
	<tr>
		<td>
			<form id="login" action="login.php" method="post" accept-charset="UTF-8">
					<table>
						<tr>
							<td><label for="username">Kasutajanimi </label></td>
							<td><input class="vorm" type="text" name="username" id="username" maxlength="20" required /></td>
						</tr>
						<tr>
							<td><label for="password">Parool </label></td>
							<td><input class="vorm" type="password" name="password" id="password" maxlength="50" required /></td>
						</tr>
					</table>
					<input type="submit" name="Submit" value="Logi sisse" />
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
			<div id="fblogin">
				<a href="FBlogin.php"><img src="FBbutton.PNg"></a>
			</div>
		</td>
	</tr>
</table>
