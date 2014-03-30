<?php
    $name = $_POST['codeName'];
    $code = $_POST['koodiLahter'];
    $e_code = pg_escape_string($code);
    session_start();
    if (isset($_SESSION['id'])) {
        $uid = $_SESSION['id'];
    } else {
        $uid = 1;
       
    }

    $dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
    $query = "insert into codes (name, author_id, content) VALUES ('$name', '$uid', '{$e_code}')";
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    pg_free_result($result);
    pg_close($dbconn);
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        siit peaks vaate lehele suunama millalgi tulevikus
    </body>
</html>
