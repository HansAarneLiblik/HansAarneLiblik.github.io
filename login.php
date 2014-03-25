<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $ctx = hash_init('md5');
    hash_update($ctx, $password);
    $hashed_pw = (string)hash_final($ctx);
    
    $dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
    //$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=vrl4ever");
    $query1 = "SELECT count(id) FROM users WHERE username='$username' AND password='$hashed_pw'";
    $query2 = "SELECT id FROM users WHERE username='$username' AND password='$hashed_pw'";
    $result1 = pg_query($query1);
    
    if (pg_fetch_row($result1)[0]==0){
        $arg = "Kasutajanimi või parool vale!";
    } else {
        $result2 = pg_query($query2);
        $userid = pg_fetch_row($result2)[0];
        $arg = "Tere $username! <br/> ID = $userid";
    }
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
            echo $arg;
        ?>
    </body>
</html>
