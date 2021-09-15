<?php
session_start();
include '../../login/db_conn.php';
// chua xong todolist.js
if (isset($_POST('type')&&isset($_POST['value']))){
	$type = $_POST['type'];
	if ($type == "add"){
		$stmt = $conn->prepare("INSERT INTO `todolist`(`task`) VALUES ("123");");
		$stmt->execute([$email]);
	}

}

?>