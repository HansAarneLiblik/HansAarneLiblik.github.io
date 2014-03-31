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

<h3>Minu profiil</h3>
<table>
	<tbody>
		wolo
	</tbody>
</table>