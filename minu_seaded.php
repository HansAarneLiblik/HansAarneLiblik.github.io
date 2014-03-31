<?php
    session_start();
    if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
		$dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
        $query = "SELECT * FROM users2 WHERE id='$id'";
		$result = pg_query($query);
		
		pg_close($dbconn);
	}
?>

<h3>Seaded</h3>
<table>
	<tbody>
		<tr>
			<td>Eesnimi: </td>
			<td><input type="text" name="firstName" value="Nimetu" /></td>
		</tr>
		<tr>
			<td>Perekonnanimi: </td>
			<td><input type="text" name="lastName" value="Nimetu" /></td>
		</tr>
		<tr>
			<td>Sünnikuupäev: </td>
			<td><input type="date" name="DoB"/></td>
		</tr>
		<tr>
			<td>E-mail: </td>
			<td><input type="text" name="email" value="Nimetu@vrl.liblik.ee" /></td>
		</tr>
		<tr>
			<td>Uus parool: </td>
			<td><input type="password" name="pswd"/></td>
		</tr>
		<tr>
			<td><input type="submit" name="Submit" value="Muuda" /></td>
		</tr>
	</tbody>
</table>