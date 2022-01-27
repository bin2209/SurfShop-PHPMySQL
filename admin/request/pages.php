<?php
include '../../core/db_conn.php';
session_start();
$id = $_POST['id'];
$type = $_POST['type']; // remove_product | change_product
$meta_keywords = $_POST['meta_keywords'];
$meta_description = $_POST['meta_description'];

if (isset($id) && isset($type)&&isset($_SESSION['type'])==1){
    $sql = "UPDATE meta_tags SET meta_keywords='$meta_keywords',meta_description='$meta_description' WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
}
?>