<?php
include '../../core/db_conn.php';
session_start();
$id = $_POST['id'];
$type = $_POST['type'];

if (isset($id) && isset($type)&&isset($_SESSION['type'])==1){
	if ($type == "remove_product"){
		$stmt = $conn->prepare("DELETE FROM `store` WHERE id = ".$id."");
		$stmt->execute();
	}
}
?>