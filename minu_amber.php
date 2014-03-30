<?php
	session_start();
?>
<h3>Minu ämber</h3>
<table class="pasteTable">
	<tbody>
		<tr class="tableHead">
			<th scope="col">Nimi</th>
			<th scope="col">Lisatud</th>
			<th scope="col">Aegub</th>
		</tr>
		<tr>
			<?php
            	if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    $dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
                    $query = "SELECT id FROM codes WHERE author_id='$id'";
                    $result = pg_query($query);
                    while ($row = pg_fetch_row($result)) {
						echo "Id: $row[0]";
						echo "<br />\n";
					}
                }
            ?>
		</tr>
	</tbody>
</table>
