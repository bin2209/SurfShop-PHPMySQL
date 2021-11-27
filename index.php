<?php 
@session_start();
// $title = 'LST';

@require_once  'core/db_conn.php';
@require_once 'classes/Functions.php';

// KHỞI TẠO LẦN ĐẦU VÀO BAG || CỘT BAG DB
$stmt = $conn->prepare("SELECT * FROM bag WHERE email=?");
$ipv4 = $_SESSION['ipv4'];
$stmt->execute([$ipv4]);
$total_product = $stmt->rowCount();
if ($stmt->rowCount() === 0) {
	$sql = "INSERT INTO bag(id, email, item_id,item,quantity) VALUES (0,'$ipv4','','','')";
	$stmt=$conn->prepare($sql);
	$result = $stmt->execute();
}


$xss = new Anti_xss;

if (isset($_GET['act'])){
	
	$act = $xss->clean_up($_GET['act']);
	switch ($act) {

		case 'store':
		$page_title = 'Store';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';		
		include 'templates/store.php'; 
		break;

		case 'services':
		$page_title = 'Services';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';		
		require_once 'templates/services.php'; 
		break;

		case 'map':
		$page_title = 'Map';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';	
		require_once 'templates/map.php'; 
		break;

		case 'about':
		$page_title = 'About';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';
		require_once 'templates/about.php'; 
		break;

		case 'account':
		$page_title = 'Account';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';
		require_once 'account.php'; 
		break;
		
		case 'search':
		$page_title = 'Search';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';
		require_once 'search.php'; 
		break;
		
		case 'login':
		$page_title = 'Login';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';
		require_once 'login.php'; 
		break;

		case 'cart':
		$page_title = 'Cart';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';
		require_once 'templates/cart.php'; 
		break;

		case 'delivery':
		$page_title = 'Delivery';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';
		require_once 'templates/cart/delivery.php'; 
		break;

		case 'payment':
		$page_title = 'Payment';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';
		require_once 'templates/cart/payment.php'; 
		break;

		case 'confirmation':
		$page_title = 'Confirmation';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';
		require_once 'templates/cart/confirmation.php'; 
		break;

			
		case 'privacy-policy':
		$page_title = 'Privacy Policy';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';
		require_once 'templates/privacy-policy.php'; 
		break;


		default:
		$page_title = 'Home';
		@require_once  'includes/header.php'; 
		@require_once  'includes/navbar.php';
		require_once 'templates/home.php'; 
		break;
	}
}else{
	$page_title = 'Home';
	@require_once  'includes/header.php'; 
	@require_once  'includes/navbar.php';
	require_once 'templates/home.php'; 
	
}
require_once  'includes/footer.php';
?>