<?php
	session_start();
    if (isset($_POST['username'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$ctx = hash_init('md5');
		hash_update($ctx, $password);
		$hashed_pw = (string)hash_final($ctx);
		
		$dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
		$query1 = "select count(id) from users2 where username='$username'";
		$result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
		if (pg_fetch_row($result1)[0]==0) {
			$query = "insert into users2 (username, password, email) VALUES ('$username', '$hashed_pw', '$email')";    
			$result = pg_query($query) or die('Query failed: ' . pg_last_error());    
			pg_free_result($result);
			header('Location: index.php#login');
			exit();
		} else {
			$arg = "Kasutaja juba olemas";
			$_SESSION['error'] =  $arg;
			pg_close($dbconn);
			header('Location: index.php#register');
			exit();
		}
		
		pg_close($dbconn);
	}
    
?>
<table>
	<tr>
		<td>
			<form id="register" action="register.php" method="post" accept-charset="UTF-8">
				<table>
					<tr>
						<td><label for="username">Kasutajanimi*</label></td>
						<td><input class="vorm" type="text" name="username" id="username" maxlength="20" required /></td>
					</tr>
					<tr>
						<td><label for="password">Parool*</label></td>
						<td><input class="vorm" type="password" name="password" id="password" maxlength="50" required /></td>
					</tr>
					<!--<tr>
						<td><label for="firstname">Eesnimi*</label></td>
						<td><input class="vorm" type="text" name="firstname" id="firstname" maxlength="32" required /></td>
					</tr>
					<tr>
						<td><label for="lastname">Perenimi*</label></td>
						<td><input class="vorm" type="text" name="lastname" id="lastname" maxlength="32" required /></td>
					</tr>-->
					<tr>
						<td><label for="email">E-mail*</label></td>
						<td><input class="vorm" type="text" name="email" id="email" maxlength="32" required /></td>
					</tr>
					<!--<tr>
						<td><label for="bday">Sünnipäev:</label></td>
						<td><input class="vorm" type="text" name="bday" id="bday" maxlength="50" /></td>
					</tr>-->
				</table>
				<input type="submit" name="Submit" value="Registreeru" />
			</form>
		</td>
			<?php
				if (isset($_SESSION['error'])) {
					if ($_SESSION['error'] != "") {
						echo $_SESSION['error'];
						$_SESSION['error'] = "";
					}
				}
			?>
		<td>
		</td>
	</tr>
</table>