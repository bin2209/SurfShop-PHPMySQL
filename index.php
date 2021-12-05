<?php 
session_start();
require_once  'core/db_conn.php';
require_once 'classes/Functions.php';
require_once 'classes/set_language_cookie.php';

if (!isset($_SESSION['ipv4'])&&!isset($_SESSION['login'])){
	// KHỞI TẠO BAN ĐẦU CHƯA CÓ SESSION GÌ CẢ. 
	// KHI ĐĂNG NHẬP SẼ KHÔNG CHẠY IF NÀY
    $_SESSION['login'] = false;
    $_SESSION['ipv4'] = getIPAddress();
    $_SESSION['avatar'] = '../assets/img/default-user.png';
	$_SESSION['name'] = $LANG_customer;
	$_SESSION['user_email'] = $_SESSION['ipv4'];
    // KHỞI TẠO LẦN ĐẦU VÀO BAG || CỘT BAG DB // Do IP khác nhau nên phải tạo mới bag khi khác IP
    $stmt = $conn->prepare("SELECT * FROM bag WHERE email=?");
    $stmt->execute([$_SESSION['user_email']]);
    if ($stmt->rowCount() === 0) {
		$emailcheck = $_SESSION['user_email'];
        $sql = "INSERT INTO bag(id, email, item_id,item,quantity) VALUES (0,'$emailcheck','','','')";
        $stmt=$conn->prepare($sql);
        $result = $stmt->execute();
    }
}

// Khởi tạo giá trị bình thường 
if (isset($_SESSION['login'])){
	$emailcheck = $_SESSION['user_email'];
	$stmt = $conn->prepare("SELECT * FROM bag WHERE email= '$emailcheck'");
	$stmt->execute();
	if ($stmt->rowCount() === 1) {
		$bag = $stmt->fetch();
		$_SESSION['bag_item'] = $bag['item'];
		$_SESSION['bag_item_id'] = $bag['item_id'];
		$_SESSION['bag_quantity'] = $bag['quantity'];
	}
}

// var_dump($_SESSION);
$xss = new Anti_xss;

if (isset($_GET['act'])){
	$act = $xss->clean_up($_GET['act']);
	switch ($act) {
		case 'store':
		$page_title = 'Store';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';		
		include 'templates/store.php'; 
		break;

		case 'services':
		$page_title = 'Services';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';		
		require_once 'templates/services.php'; 
		break;

		case 'map':
		$page_title = 'Map';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';	
		require_once 'templates/map.php'; 
		break;

		case 'about':
		$page_title = 'About';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';
		require_once 'templates/about.php'; 
		break;

		case 'account':
		$page_title = 'Account';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';
		require_once 'account.php'; 
		break;
		
		case 'search':
		$page_title = 'Search';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';
		require_once 'templates/search.php'; 
		break;
		
		case 'login':
		$page_title = 'Login';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';
		require_once 'login.php'; 
		break;

		case 'cart':
		$page_title = 'Cart';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';
		require_once 'templates/cart.php'; 
		break;

		case 'delivery':
		$page_title = 'Delivery';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';
		require_once 'templates/cart/delivery.php'; 
		break;

		case 'payment':
		$page_title = 'Payment';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';
		require_once 'templates/cart/payment.php'; 
		break;

		case 'confirmation':
		$page_title = 'Confirmation';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';
		require_once 'templates/cart/confirmation.php'; 
		break;

			
		case 'privacy-policy':
		$page_title = 'Privacy Policy';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';
		require_once 'templates/privacy-policy.php'; 
		break;


		default:
		$page_title = 'Surf shop, Skate shop, Rentals, Repairs, Lessons, and Custom boards';
		require_once  'includes/header.php'; 
		require_once  'includes/navbar.php';
		require_once 'templates/home.php'; 
		break;
	}
}else{
	$page_title = 'Surf shop, Skate shop, Rentals, Repairs, Lessons, and Custom boards';
	require_once  'includes/header.php'; 
	require_once  'includes/navbar.php';
	require_once 'templates/home.php'; 
	
}
require_once  'includes/footer.php';
?>