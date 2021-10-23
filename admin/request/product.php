<?php
include '../../core/db_conn.php';
session_start();
$id = $_POST['id'];
$type = $_POST['type']; // xác nhận quyền admin


if (isset($id) && isset($type)&&isset($_SESSION['type'])==1){
	if ($type == "remove_product"){
		$lastID = $conn->query("SELECT folder FROM store WHERE id = $id")->fetch();
		$lastID = (int)$lastID[0];
	

		$pathRemoveFolder = "../../uploads/products/$lastID"; // lấy cột folder trong db
		
		//remove all file in folder
		$files = glob("$pathRemoveFolder/{,.}*", GLOB_BRACE); // get all file names
		foreach($files as $file){ // iterate files
			if(is_file($file)) {
		    unlink($file); // delete file
			}
		}
		// Lúc này thư mục đã tróng | tiến hành remove folder
		rmdir($pathRemoveFolder); 
		

		//remove file 
		$images = $conn->query("SELECT images FROM store WHERE id = $id")->fetch();
		$images = (string)$images[0];
		$pathRemoveImages = "../../uploads/products/$images"; // lấy cột Images trong db
		unlink($pathRemoveImages); 

		$stmt = $conn->prepare("DELETE FROM `store` WHERE id = ".$id."");
		$stmt->execute();
	}

	
}

?>