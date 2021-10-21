
<?php require('../TMQ/function.php'); ?>

<?
if($_POST[type] == 'nimo'){
    $dulieutile = $db->query("SELECT * FROM `HK_tilevongquayff`")->fetch();
$phanquane = array('0' => $dulieutile[trat], '80' => $dulieutile[80], '150' => $dulieutile[150], '250' => $dulieutile[250], '1000' => $dulieutile[1000], '1500' => $dulieutile[1500], '3000' => $dulieutile[3000], '5000' => $dulieutile[5000]);

$mangphanquane = array();
foreach ($phanquane as $phanquane=>$valuene)
{
    $mangphanquane = array_merge($mangphanquane, array_fill(0, $valuene, $phanquane));
}



$kc = ($mangphanquane[array_rand($mangphanquane)]);

if($kc == 80){
$pos = 2;
$name = "80 Kim cương";
}if($kc == 150){
$pos = 3;
$name = "150 Kim cương";
}if($kc == 250){
$pos = 4;
$name = "250 Kim cương";
}if($kc == '1000'){
$pos = 5;
$name = "1000 Kim cương";
}if($kc == 1500){
$pos = 6;
$name = "1500 Kim cương";
}if($kc == 3000){
$pos = 7;
$name = "3000 Kim cương";
}if($kc == 5000){
$pos = 0;
$name = "5000 Kim cương";
}if($kc == 0){
$pos = 1;
$name = "Chúc Bạn May Mắn Lần Sau.";
}


	if(empty($uid)){
 $status = 'login'; // false
 $msg = 'Đăng nhập đi.';

$kimhungg3 = array('msg' => $msg,'status' => $status);
echo json_encode($kimhungg3);
}
elseif($TMQ['cash'] < 17000){
    $status = 'error'; // false
    $msg = 'Số tiền không đủ để thực hiện giao dịch, vui lòng nạp thêm tiền vào tài khoản.';
$kimhungg33 = array('msg' => $msg,'status' => $status);
echo json_encode($kimhungg33);
}
else{
    $status = 'success';
    $saugd = $TMQ['cash'] - 17000;
   $db->query("UPDATE `TMQ_user` SET `cash` = `cash` - '17000' WHERE `uid` = '". $uid ."'");
 $db->query("UPDATE `TMQ_user` SET `kimcuong` = `kimcuong` + '".$kc."' WHERE `uid` = '". $uid ."'");


$db->exec("INSERT INTO `HK_quayff` SET
    `nguoiquay` = '".$uid."',
    `kimcuong` = '".$kc."',
    `date` = '". date('H:i:s d-m-Y') ."',
    `time` = '".time()."'
    ");

$db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = ' Quay vòng quay freefire (nimo) với giá 17.000<sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    
$arr = array('status' => $status,'pos' => $pos, 'phanqua' => $name);
echo json_encode($arr);
}


//	$arr = array('status' => $status,'pos' => $pos, 'locale' => '1', 'input_auto' => '2','num_roll_remain' => '0', 'numrollbyorder' => '0','name' => $name);
//$kimhungg = array('msg' => $arr);


//echo json_encode($kimhungg);

//{"msg":{"name":"NICK RANDOM 9K","pos":4,"num_roll_remain":0},"status":"OK"}
}