<?php
include '../core/db_conn.php';

@session_start();
if (isset($_POST['id']) && $_SERVER['REQUEST_METHOD']=='POST'){


	// if(1){
	$id = $_POST['id'];
	if ($_SESSION['login']==false){
		$email = $_SESSION['ipv4'];
	}else{
		$email = $_SESSION['user_email'];
	}
	// $id=1;
	// $email = 'binazurestudio@gmail.com';


		// $email = '42.116.105.112';
	// TAKE DATA IN BAG || CHẠY ĐỒNG THỜI 2 CỘT ITEM_ID, ITEM
	function get_item_bag_value($email,$conn){
		$stmt = $conn->prepare("SELECT email, item_id FROM bag WHERE email='$email'");
		$stmt->execute();
		if ($stmt->rowCount() === 1) {
			$bag =	$stmt->fetch();
			return $bag['item_id'];
		}
	}

	
	// TAKE DATA IN BAG
		// NẾU LÀ ĐƠN HÀNG ĐẦU TIÊN | KHÔNG CÓ DẤU ',' SAU ID 
	if(get_item_bag_value($email,$conn)==''){
			$stmt = $conn->prepare("UPDATE bag SET item_id = 0, item = $id WHERE email = '$email'");
			$stmt->execute();

			// echo $json;
			// echo json_encode($data);
		}else{	
			$array = get_item_bag_value($email,$conn);
			$array = explode(',',$array);
			$int = end($array);
			$int = (int)$int;
			$int = $int+1;
			$stmt = $conn->prepare("UPDATE bag SET item_id = CONCAT( item_id , ',$int' ), item = CONCAT( item , ',$id' )  WHERE email = ?");
			$stmt->execute([$email]);
		}
	exit;
}

?>