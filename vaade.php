<?php
    $codeId = $_GET['id'];
    $e_id = pg_escape_string($codeId);
    $dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
    $query = "select name, content from codes where id='{$e_id}'";
    $result = pg_query($query);
    $row =  pg_fetch_row($result);  
    $codeName = $row[0];
    $content = $row[1];
    pg_free_result($result);
    pg_close($dbconn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/StyleSheet.css" />
        <meta charset="utf-8" />
        <title><?php
            echo "$codeName";
            ?></title>
    </head>
    <body>
        asute algelisel vaate lehel
        <br>
        <?php
            echo "<h1> $codeName </h1>";
            echo "<p><textarea readonly id=\"codeBox\" name=\"koodiLahter\">$content</textarea></p>";
            
        ?>

    </body>
</html>
