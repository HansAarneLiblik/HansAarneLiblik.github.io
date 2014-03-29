<?php
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $ctx = hash_init('md5');
    hash_update($ctx, $password);
    $hashed_pw = (string)hash_final($ctx);

    $dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
    $query = "insert into users2 (username, password, email) VALUES ('$username', '$hashed_pw', '$email')";

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
        <?php
            echo "Registreerumine õnnestus!<br /><a href=\"./#login\">Logi sisse</a>" 
        ?>
    </body>
</html>
