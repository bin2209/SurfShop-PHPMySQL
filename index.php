<?php 
@session_start();
// $title = 'LST';
require_once  'includes/header.php'; 
require_once  'includes/navbar.php';
require_once  'core/db_conn.php';




$xss = new Anti_xss;

if (isset($_GET['act'])){
	$act = $xss->clean_up($_GET['act']);
	switch ($act) {
		case 'store':
		
		$title = 'Store';
		include 'templates/store.php'; 

		break;

		case 'services':
		require_once 'templates/services.php'; 
		break;

		case 'map':
		require_once 'templates/map.php'; 
		break;

		case 'about':
		require_once 'templates/about.php'; 
		break;

		case 'member':
		require_once 'member.php'; 
		break;
		
		case 'search':
		require_once 'search.php'; 
		break;
		
		case 'login':
		require_once 'login.php'; 
		break;

		case 'products':
		require_once 'templates/products/index.php'; 
		break;


		default:
		
		require_once 'templates/home.php'; 
		break;
	}
}else{


	require_once 'templates/home.php'; 
}

require_once  'includes/footer.php';
?>