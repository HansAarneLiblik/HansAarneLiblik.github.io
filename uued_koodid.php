<h3>Uued koodid</h3>
<table>
	<?php
		$dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
		$query = "SELECT * FROM codes WHERE privacy=FALSE ORDER BY time_stamp DESC LIMIT 10";
		$result = pg_query($query);
		$i = 1;
		while($val = pg_fetch_row($result)){
			echo "<tr><td>$i. </td><td><a href=\"#vaade.php?id=$val[0]\" class=\"uuedKoodid\">$val[1]</a></td></tr>";
			$i = $i + 1;
		}
		pg_close($dbconn);
	?>
</table>