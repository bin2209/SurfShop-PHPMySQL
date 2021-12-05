<?php
include '../core/db_conn.php';
session_start();
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
	function get_item_id($email,$conn){
		$stmt = $conn->prepare("SELECT email, item_id FROM bag WHERE email='$email'");
		$stmt->execute();
		if ($stmt->rowCount() === 1) {
			$bag =	$stmt->fetch();
			return $bag['item_id'];
		}
	}
	function check_exist_item_in_bag($email,$id,$conn){
		$stmt = $conn->prepare("SELECT email, item FROM bag WHERE email='$email'");
		$stmt->execute();
		if ($stmt->rowCount() === 1) {
			$bag =	$stmt->fetch();
			$array_item = $bag['item'];
			$array_item = explode(',',$array_item);
			// Tìm id xem có trùng trong $item ko?
			// Đổi thành array để check 
			$vitri = (array_search($id,$array_item));
			$vitri ++; //Để phân biệt giữa vị trí 0 và false
			if ($vitri==false){
				return 0;
			}else{
				return $vitri;
			}
		}else{
			return 0;
		}
	}
	
	// TAKE DATA IN BAG
	// NẾU LÀ ĐƠN HÀNG ĐẦU TIÊN | KHÔNG CÓ DẤU ',' SAU ID 
	if(get_item_id($email,$conn)=='')
	{
		// SET QUANTITY = 1
		$stmt = $conn->prepare("UPDATE bag SET item_id = 0, item = $id, quantity = 1 WHERE email = '$email'");
		$stmt->execute();
	}
	else if (check_exist_item_in_bag($email,$id,$conn)!=false) // Báo lỗi đã tồn tại 
	{	
		$vitri = check_exist_item_in_bag($email,$id,$conn);
		$vitri --;
		
		$stmt = $conn->prepare("SELECT email, quantity FROM bag WHERE email='$email'");
		$stmt->execute();
		$bag =	$stmt->fetch();
		$item_quantity = $bag['quantity']; // Lấy mảng
		$item_quantity = explode(',',$item_quantity); // Tách mảng
		$item_quantity[$vitri]++; // Cộng thêm số lượng vào vị trí đã tìm được 
		$item_quantity = implode(',',$item_quantity); // Ghép mảng
		$stmt = $conn->prepare("UPDATE bag SET quantity = '$item_quantity' WHERE email = '$email'");
		$stmt->execute([$email]);
	}
	else
	{	
		$array = get_item_id($email,$conn);
		$array = explode(',',$array);
		$int = end($array);
		$int = (int)$int;
		$int = $int+1;
		$stmt = $conn->prepare("UPDATE bag SET item_id = CONCAT( item_id , ',$int' ), item = CONCAT( item , ',$id' ), quantity = CONCAT( quantity , ',1' ) WHERE email = ?");
		$stmt->execute([$email]);
	}
	// exit;
}
?>