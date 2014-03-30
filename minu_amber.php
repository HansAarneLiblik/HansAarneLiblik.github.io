<?php
	session_start();
?>
<h3>Minu ämber</h3>
<table class="pasteTable">
	<tbody>
		<tr class="tableHead">
			<th scope="col">Nr.</th>
			<th scope="col">ID</th>
			<th scope="col">Nimi</th>
			<th scope="col">Lisatud</th>
		</tr>
		<?php
			if (isset($_SESSION['id'])) {
				$id = $_SESSION['id'];
				$dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
				$query = "SELECT * FROM codes WHERE author_id='$id'";
				$result = pg_query($query);
				$i = 1;
				while ($val = pg_fetch_row($result)) {
					echo "<tr><td>$i. </td><td>$val[0]</td><td><a href=\"/vaade.php?id=$val[0]\">$val[1]</a></td>
					<td>$val[4]</td></tr>";
					$i = $i + 1;
				}
				pg_close($dbconn);
			}
		?>
	</tbody>
</table>
