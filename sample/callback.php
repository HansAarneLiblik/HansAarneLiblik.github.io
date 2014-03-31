<?php
require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_PlusService.php';

session_start();
/*
if (isset($_GET['state']) && $_SESSION['state'] != $_GET['state']) {
  header('HTTP/ 401 Invalid state parameter');
  exit;
}
*/
$client = new Google_Client();
$client->setApplicationName('KoodiÄmber');
$client->setClientId('168796522751-dlh7sdlf5g50k050669mlm4gqb4t3fm9.apps.googleusercontent.com');
$client->setClientSecret('kpLrEeqACxJx7g1wpSt0AHWV');
$client->setRedirectUri('http://vrl.liblik.ee/sample/callback.php');
$client->setDeveloperKey('AIzaSyBSMrCwJO2NWXjI_Mb8SaO5c8sXC85MCQo');
$plus = new Google_PlusService($client);

$auth = new Google_Oauth2($client);


if (isset($_GET['code'])) {
  $client->authenticate();
  // Get your access and refresh tokens, which are both contained in the
  // following response, which is in a JSON structure:
  $jsonTokens = $client->getAccessToken();
  $_SESSION['token'] = $jsonTokens;
  // Store the tokens or otherwise handle the behavior now that you have
  // successfully connected the user and exchanged the code for tokens. You
  // will likely redirect to a different location in your app at thsi point.
  //$redirect = 'http://localhost/';

  $me = $plus->people->get('me');
  
 
  echo '<pre>'; 
	print_r($me);
	echo '</pre>';
  
  //echo $plus;
  
  /*
  $user = $google_oauthV2->userinfo->get();
  $user_id 				= $user['id'];
	  $user_name 			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
	  $email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
	  $profile_url 			= filter_var($user['link'], FILTER_VALIDATE_URL);
	  $profile_image_url 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
	  */
  
  //print_r($plus);
  //header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
  
}

?>