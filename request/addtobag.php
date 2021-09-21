<?php
include '../core/db_conn.php';
@session_start();

if (isset($_SESSION['user_email'])&&isset($_POST['id']) && $_SERVER['REQUEST_METHOD']=='POST'){
	$data['id'] = $_POST['id'];
	$id = $_POST['id'];
	$data['user_email'] = $_SESSION['user_email'];
	$email = $_SESSION['user_email'];

	//CHECK USER EXIST IN DATABASE
	function bool_checkuser($email,$conn){
		$stmt = $conn->prepare("SELECT email FROM user WHERE email=?");
		$stmt->execute([$email]);
		if ($stmt->rowCount() === 1) {
			return 1;
		}
	}

	//CHECK ID EXIST IN STORE
	function bool_checkstoreid($id,$conn){
		$stmt = $conn->prepare("SELECT id FROM store WHERE id=?");
		$stmt->execute([$id]);
		if ($stmt->rowCount() === 1) {
			return 1;
		}
	}

	// TAKE DATA IN BAG || CHẠY ĐỒNG THỜI 2 CỘT ITEM_ID, ITEM
	function get_item_bag($email,$conn){
		$stmt = $conn->prepare("SELECT email, item_id FROM bag WHERE email=?");
		$stmt->execute([$email]);
		if ($stmt->rowCount() === 1) {
			$bag =	$stmt->fetch();
			return $bag['item_id'];
		}
	}

	
	
	
	if (bool_checkuser($email,$conn)==true && bool_checkstoreid($id,$conn)==true){
		// TAKE DATA IN BAG
		// NẾU LÀ ĐƠN HÀNG ĐẦU TIÊN | KHÔNG CÓ DẤU ',' SAU ID 
		if(get_item_bag($email,$conn)==''){
			$stmt = $conn->prepare("UPDATE bag SET item_id = 0, item = $id WHERE email = ?");
			$stmt->execute([$email]);

			// echo $json;
			// echo json_encode($data);
		}else{	
			$array = get_item_bag($email,$conn);
			$array = explode(',',$array);
			$int = end($array);
			$int = (int)$int;
			$int = $int+1;
			$stmt = $conn->prepare("UPDATE bag SET item_id = CONCAT( item_id , ',$int' ), item = CONCAT( item , ',$id' )  WHERE email = ?");
			$stmt->execute([$email]);
		}
	}
	exit;
}

?>