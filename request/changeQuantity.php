<?php
include '../core/db_conn.php';
@session_start();
if (isset($_POST['id']) && isset($_POST['value']) && $_SERVER['REQUEST_METHOD']=='POST'){
	// if (1){
    $id = $_POST['id'];
    $value = $_POST['value'];   // value == '-1' or '+1'
    if ($_SESSION['login']==false){
        $email = $_SESSION['ipv4'];
    }else{
        $email = $_SESSION['user_email'];
    }    
        
    function changeQuantityDown($email,$id,$conn){
		$stmt = $conn->prepare("SELECT * FROM bag WHERE email=?");
		$stmt->execute([$email]);
		if ($stmt->rowCount() === 1) {
			$bag =	$stmt->fetch();
            $bag_item = $bag['item'];
			$bag_item_quantity = $bag['quantity'];
			$bag_item = explode(',',$bag_item); // mảng item
            $bag_item_quantity = explode(',',$bag_item_quantity); // mảng quantity
			$vitri = array_search($id,$bag_item);  // tìm id trong item_id để ra vị trí trong item & item_id để thay đổi
		}
		// DOWN QUANTITY VỊ TRÍ
		$bag_item_quantity[$vitri]--;
		$bag_item_quantity = implode(',',$bag_item_quantity); // Ghép mảng
		$stmt = $conn->prepare("UPDATE bag SET quantity = '$bag_item_quantity'  WHERE email = ?");
		$stmt->execute([$email]);
	}

    function changeQuantityUp($email,$id,$conn){
		$stmt = $conn->prepare("SELECT * FROM bag WHERE email=?");
		$stmt->execute([$email]);
		if ($stmt->rowCount() === 1) {
			$bag =	$stmt->fetch();
            $bag_item = $bag['item'];
			$bag_item_quantity = $bag['quantity'];
			$bag_item = explode(',',$bag_item); // mảng item
            $bag_item_quantity = explode(',',$bag_item_quantity); // mảng quantity
			$vitri = array_search($id,$bag_item);  // tìm id trong item_id để ra vị trí trong item & item_id để thay đổi
		}
		// UP QUANTITY VỊ TRÍ
		$bag_item_quantity[$vitri]++;
		$bag_item_quantity = implode(',',$bag_item_quantity); // Ghép mảng
		$stmt = $conn->prepare("UPDATE bag SET quantity = '$bag_item_quantity'  WHERE email = ?");
		$stmt->execute([$email]);
	}
    
    if ($value=='-1'){
        changeQuantityDown($email,$id,$conn);
    } 
    if ($value == '+1'){
        changeQuantityUp($email,$id,$conn);
    }
	exit;
}
?>