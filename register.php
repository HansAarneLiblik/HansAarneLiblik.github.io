<?php
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$firstname = $_POST['firstname'];
    //$lastname = $_POST['lastname'];
    $email = $_POST['email'];
    //$bday = $_POST['bday'];
    
    //echo $username, "<br>", $password, "<br>", $firstname, "<br>", $lastname, "<br>", $email;
        
    $ctx = hash_init('md5');
    hash_update($ctx, $password);
    $hashed_pw = (string)hash_final($ctx);

    $dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
    //$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=vrl4ever");
    //$query = "insert into users (username, password, firstname, lastname, email, date_of_birth) VALUES ('$username', '$hashed_pw', '$firstname', '$lastname', '$email', '$bday')";
    $query = "insert into users (username, password, email) VALUES ('$username', '$hashed_pw', '$email')";

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
