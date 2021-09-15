<?php
if(isset($_SESSION['google'])){
   include 'google_login/config.php';
$google_client->revokeToken();
}
session_start();
session_unset();
session_destroy();
header("Location: ../admin");

?>