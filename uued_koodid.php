<h3>Uued koodid</h3>
<table class="newCodesTable">
	<?php
		$dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
		$query = "SELECT codes.id, codes.name, users2.firstname, users2.username FROM codes INNER JOIN users2 ON codes.author_id=users2.id WHERE codes.privacy=FALSE ORDER BY codes.time_stamp DESC LIMIT 10";
		$result = pg_query($query);
		$i = 1;
		while($val = pg_fetch_row($result)){
			echo "<tr><td>$i. </td><td><a href=\"#vaade.php?id=$val[0]\" class=\"uuedKoodid\">$val[1]</a></td></tr>";
			echo "<tr>";
			if($val[2]==""){
				echo "<td></td><td class=\"authorName\">- $val[3]</td>";
			} else {
				echo "<td></td><td class=\"authorName\">- $val[2]</td>";
			}
			echo "</tr>";
			$i = $i + 1;
		}
		pg_close($dbconn);
	?>
</table>