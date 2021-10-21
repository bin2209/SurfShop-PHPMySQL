<?php
	
require("../TMQ/function.php");
		/// Đoạn này lưu log lại để test, chạy thực bỏ đoạn này đi nhé
        $myfile = fopen("log-nap.txt", "a") or die("Unable to open file!");
		$txt = $_GET['callback_sign']."|".$_GET['status']."|".$_GET['pin']."|".$_GET['serial']."|".$_GET['amount'].$_GET['message']."\n";
		fwrite($myfile, $txt);
		fclose($myfile);
		/// END Đoạn này lưu log lại để test, chạy thực bỏ đoạn này đi nhé

		require_once('config.php');
        $callback_sign = md5($partner_key.$_GET['tranid'].$_GET['pin'].$_GET['serial']);
        
        if($_GET['callback_sign']!=$callback_sign){
               exit();
        }

		if(isset($_GET['status'])) {
			
			if ($_GET['status'] == "1") {
				
				// status = 1 ==> thẻ đúng + Cộng tiền cho khách bằng  $_GET['amount'] tại đây
					$query = $db->query("SELECT * FROM `TMQ_naphe` WHERE `mathe` = '".$_GET["pin"]."'")->fetch();
					$db->exec("UPDATE `TMQ_user` SET `cash` = `cash` + '".$_GET["amount"]."' WHERE `uid` = '".$query["uid"]."'");
					$db->exec("UPDATE `TMQ_napthe` SET `trangthai` = 'Thành công' WHERE `mathe` = '".$_GET["pin"]."'");
					$check_top = $db->query("SELECT * FROM `TMQ_topnap` WHERE `uid` = '".$query["uid"]."'");
					if($check_top->fetch()["uid"] == null){
					    $db->query("INSERT INTO `TMQ_topnap` SET
					    `uid` = '".$query["uid"]."',
					    `sotien` = '".$_GET["amount"]."',
					    `date` = '".date("d-m-Y")."',
					    ");
					}else{
					    $db->exec("UPDATE `TMQ_topnap` SET `sotien` = `sotien` + ".$_GET["amount"]." WHERE `uid` = '".$query["uid"]."' ");
					}
			}
			else {
				/// Thẻ sai hoặc đã được nạp
			//	//DEMO cập nhật trạng thái thẻ của khách nạp
	$db->exec("UPDATE `TMQ_napthe` SET `trangthai` = 'Thẻ sai' WHERE `mathe` = '".$_GET["pin"]."'");
			}
			
		}

?>