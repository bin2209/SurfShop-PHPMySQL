<?php 
require 'google-api/vendor/autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('528710606946-804enqhnqqvguqkgdqjiprgrnhcdnmf6.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('FKfgs2ayBTyxUm33ztIR89Fr');
// Enter the Redirect URL
$client->setRedirectUri('https://localhost/google_login/login.php');
// $client->setRedirectUri('https://lstsurf.com/google_login/login.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

?>
