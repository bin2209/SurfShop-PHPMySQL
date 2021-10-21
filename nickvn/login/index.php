<?php
/*
#########################################################
#               Code Write By Duong IT 911              #
#              Email: svpv.hotro@gmail.com              #
#            Phone: 01693067818 - 01698330911           #
#            Vui Lòng Tôn Trọng Quyền Tác Giả           #
#########################################################
*/

// auto ngẫu nhiên
function randString($length){
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}
$magioithieu = randString(8);


@session_start();
require_once ('Facebook/autoload.php');
require_once ('config.php');
require_once('../TMQ/function.php');

$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}
try {
$accessToken = $helper->getAccessToken($domain);
//$accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
    
if (! isset($accessToken)) {
    
    $permissions = array('public_profile','email'); // Optional permissions
    $loginUrl = $helper->getLoginUrl($domain,$permissions);
    
    //echo'<pre>';
//echo $loginUrl;
//echo $domain;
    header("Location: ".$loginUrl);  
    //echo $loginUrl;
  exit;
}

try {
  // Returns a `Facebook\FacebookResponse` object
  $fields = array('id', 'name', 'email');
//  $response = $fb->get('/me?fields='.implode(',', $fields).'', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$_SESSION['facebook_access_token'] = (string) $accessToken;
$response = $fb->get('/me?fields=id,name,email', $accessToken);
$name = $response->getGraphUser()['name'];
@$email = $response->getGraphUser()['email'];
$fb_ID = $response->getGraphUser()['id'];
$_SESSION['uid'] = $fb_ID;


//echo $_SESSION['uid'];
header("Location: https://kimhung365.vn/getsession.php?uid=$fb_ID&name=$name");
?>