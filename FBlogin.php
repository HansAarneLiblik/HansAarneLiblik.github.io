	<?php
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  require_once('src/facebook.php');

  $config = array(
    'appId' => '1435696383339121',
    'secret' => '4facdef0e2b8241d1d0e6047cb0913a8',
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();

    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        $user_profile = $facebook->api('/me','GET');
		
		$username = $user_profile['id'];
		$first_name = $user_profile['first_name'];
		$last_name = $user_profile['last_name'];
		$email = $user_profile['username']. "@facebook.com";
		
		echo $username;
		echo "<br>";
		echo $first_name;
		echo "<br>";
		echo $last_name;
		echo "<br>";
		echo $email;
		
		$dbconn = pg_connect("host=vrl.liblik.ee port=5432 dbname=veebirak user=postgres password=lollakas");
		$query1 = "select count(id) from users2 where username='$username'";
		$result1 = pg_query($query1) or die('Query failed: ' . pg_last_error());
		if (pg_fetch_row($result1)[0]==0) {
			$query = "insert into users2 (username, password, email, firstname, lastname, FBuser) VALUES ('$username', 'FB', '$email', '$first_name', '$last_name', 'TRUE')";    
			$result = pg_query($query) or die('Query failed: ' . pg_last_error());    
			pg_free_result($result);
			$query2 = "SELECT id FROM users2 WHERE username='$username'";
			$result2 = pg_query($query2);
			$userid = pg_fetch_row($result2)[0];
			$_SESSION['user'] = $first_name;
			$_SESSION['id'] = $userid;
			pg_close($dbconn);
			header('Location: index.php');
			exit();
		} else {
			$_SESSION['user'] = $first_name;
			$_SESSION['id'] = $userid;
			pg_close($dbconn);
			header('Location: index.php');
			exit();
		}
		
		pg_close($dbconn);

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl();
		header('Location: $login_url');		
        //echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {
      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl();
	  header('Location:'.$login_url.'');
      //echo 'Please <a href="' . $login_url . '">login.</a>';
    }
  ?>