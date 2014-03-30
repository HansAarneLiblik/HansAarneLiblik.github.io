<?php
	if(!isset($_GET['id']) or $_GET['id']==""){
		header('Location: index.php');
	}
    $codeId = $_GET['id'];
    $e_id = pg_escape_string($codeId);
    $dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
    $query1 = "select privacy from codes where id ='{$e_id}'";
    $result1 = pg_query($query1);
    $row =  pg_fetch_row($result1);
    $privacy = $row[0];
    if ($privacy=="f") {        
        $query = "select name, content from codes where id='{$e_id}'";
        $result = pg_query($query);
        $row =  pg_fetch_row($result);  
        $codeName = $row[0];
        $content = $row[1];
        $content2 = "<h1> $codeName </h1><p><textarea readonly id=\"codeBox\" name=\"koodiLahter\">$content</textarea></p>";
        pg_free_result($result);
    } else {
        session_start();
        if (isset($_SESSION['id'])) {
            $author_id = $_SESSION['id'];
            $query2 = "select name, content from codes where id='{$e_id}' and author_id=$author_id";
            $result2 = pg_query($query2);
            $row1 =  pg_fetch_row($result2);
            if ($row1[0]=="") {
                $content2 = "teil puudub ligipääs antud koodile";
            } else {
                $codeName = $row1[0];
                $content = $row1[1];
                $content2 = "<h1> $codeName </h1><p><textarea readonly id=\"codeBox\" name=\"koodiLahter\">$content</textarea></p>";
            }
    
        } else {
            $content2 = "teil puudub ligipääs antud koodile";
        }
    }    
    
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
        asute algelisel vaate lehel<br>
        <br>
        <?php
            echo $content2;
            
        ?>

    </body>
</html>
