<?php
include '../core/db_conn.php';
@session_start();
if (isset($_POST['id']) && $_SERVER['REQUEST_METHOD']=='POST'){
	// if (1){

	$id = $_POST['id'];
	// $id = 2;

	if ($_SESSION['login']==false){
		$email = $_SESSION['ipv4'];
	}else{
		$email = $_SESSION['user_email'];
	}


	// TAKE DATA IN BAG || CHẠY ĐỒNG THỜI 2 CỘT ITEM_ID, ITEM
	// BÀI TOÁN: ARRAY 0,1,2,4,6,7 |ITEM_ID
	// TÌM             | | | | | 		
	// RA 			   0 1 2 3 4     

	function remove_bag($email,$conn,$id){
		$stmt = $conn->prepare("SELECT * FROM bag WHERE email=?");
		$stmt->execute([$email]);
		if ($stmt->rowCount() === 1) {
			$bag =	$stmt->fetch();
			$bag_item = $bag['item'];
			$bag_item_id = $bag['item_id'];
			$bag_item_quantity = $bag['quantity'];

			$bag_item = explode(',',$bag_item);
			$bag_item_id = explode(',',$bag_item_id); // mảng item_id
			$bag_item_quantity = explode(',',$bag_item_quantity); // mảng quantity
			$vitrixoa = array_search($id,$bag_item);  // tìm id trong item_id để ra vị trí trong item & item_id để xóa
		}
		// XÓA VỊ TRÍ
		unset($bag_item[$vitrixoa]);
		unset($bag_item_id[$vitrixoa]);
		unset($bag_item_quantity[$vitrixoa]);

		$bag_item = implode(',',$bag_item); // Ghép mảng
		$bag_item_id = implode(',',$bag_item_id); // Ghép mảng
		$bag_item_quantity = implode(',',$bag_item_quantity); // Ghép mảng

		// var_dump($bag_item);
		// var_dump($bag_item_id);
		// var_dump($bag_item_quantity);

		$stmt = $conn->prepare("UPDATE bag SET item_id = '$bag_item_id', item = '$bag_item', quantity = '$bag_item_quantity'  WHERE email = ?");
		$stmt->execute([$email]);
	}
		remove_bag($email,$conn,$id);

	exit;
}

?>