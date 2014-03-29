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
		$_SESSION['error'] =  $arg;
		pg_close($dbconn);
		header('Location: index.php#login');
    } else {
        $result2 = pg_query($query2);
        $userid = pg_fetch_row($result2)[0];
        
		session_start();
		
		$_SESSION['user'] = $username;
		$_SESSION['id'] = $userid;
    }
    pg_close($dbconn);
	header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
            
			if (isset($_SESSION['user'])) {
				echo "Tere, ".$_SESSION['user']."!";
			}
        ?>
        <br />
        <a href="index.php">Kui sa näed seda, siis kliki palun siia, et minna tagasi esilehele.</a>
    </body>
</html>
