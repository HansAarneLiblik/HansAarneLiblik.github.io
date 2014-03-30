<?php
    $name = $_POST['codeName'];
    $code = $_POST['koodiLahter'];
    $expiration = $_POST['expiration'];
    $privacy = $_POST['privacy'];
    $e_code = pg_escape_string($code);
    session_start();
    if (isset($_SESSION['id'])) {
        $uid = $_SESSION['id'];
    } else {
        $uid = 1;
    
    }
    if ($privacy=="P") {
        $privacy = "TRUE";
    } else {
        $privacy = "FALSE";
    }
    
    $dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
    $query = "insert into codes (name, author_id, content, privacy) VALUES ('$name', '$uid', '{$e_code}', '$privacy')";
    $result = pg_query($query);        
    pg_free_result($result);
    
    $query = "select id from codes where name='$name' and author_id='$uid' and content='{$e_code}' limit 1";
    $result = pg_query($query);
    $row = pg_fetch_row($result);
    $createdId = $row[0];
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
        <?php
            header("Location: /vaade.php?id=$createdId");
            exit;
        ?>

        siit peaks vaate lehele suunama millalgi tulevikus
    </body>
</html>
