<?php
require_once("../../core/db_conn.php");
if(isset($_GET['data'])){
$data = $_GET['data'];


$sql = "SELECT * FROM store WHERE name LIKE '$data%'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
echo $row['store']."</br>";
}
//Đóng kết nối
mysqli_close($conn);

}
?>