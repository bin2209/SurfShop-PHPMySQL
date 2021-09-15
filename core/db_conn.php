<?php 
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/classes/Functions.php');

// Thông tin chung
$_DOMAIN = 'https://localhost/';
date_default_timezone_set('Asia/Ho_Chi_Minh'); 
$date_current = '';
$date_current = date("Y-m-d H:i:sa");


// Kết nối DB
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "lst";

try {
  $conn = new PDO("mysql:host=$sName;dbname=$db_name",$uName, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}