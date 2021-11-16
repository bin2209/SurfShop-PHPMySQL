<?php
include '../core/db_conn.php';
@session_start();
if (isset($_POST['id']) && $_SERVER['REQUEST_METHOD']=='POST'){
	$id = $_POST['id'];
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
		$stmt = $conn->prepare("SELECT email, item_id, item FROM bag WHERE email=?");
		$stmt->execute([$email]);
		if ($stmt->rowCount() === 1) {
			$bag =	$stmt->fetch();
			$bag_item = $bag['item'];
			$bag_item_id = $bag['item_id'];
			$bag_item = explode(',',$bag_item);
			$bag_item_id = explode(',',$bag_item_id); // mảng item_id
			$vitrixoa = array_search($id,$bag_item_id,true);  // tìm id trong item_id để ra vị trí trong item & item_id để xóa
		}
		// XÓA VỊ TRÍ
		unset($bag_item_id[$vitrixoa]);
		unset($bag_item[$vitrixoa]);

		// NỐI THÀNH CHUỖI MỚI
		$new_array_item_id ='';
		$new_array_item ='';
		$count = 0;
		foreach ($bag_item_id as $id => $val) {
			if ($count==0){
				$new_array_item_id .= $bag_item_id[$id];
			}else{
				$new_array_item_id .= ','.$bag_item_id[$id];
			}
			$count++;
			unset($bag_item_id[$id]);
		}
		$count = 0;
		foreach ($bag_item as $id => $val) {
			if ($count==0){
				$new_array_item .= $bag_item[$id];
			}else{
				$new_array_item .= ','.$bag_item[$id];	
			}
			$count++;
			unset($bag_item[$id]);
		}

		// var_dump($new_array_item_id);
		// var_dump($new_array_item);

		$stmt = $conn->prepare("UPDATE bag SET item_id = '$new_array_item_id', item = '$new_array_item'  WHERE email = ?");
		$stmt->execute([$email]);
	}
	

		remove_bag($email,$conn,$id);
	exit;
}

?>