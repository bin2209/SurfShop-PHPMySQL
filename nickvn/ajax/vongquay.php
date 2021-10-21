
<?php require('../TMQ/function.php'); ?>

<?
if($_POST[type] == 'so20k'){
//$pos = rand(1,8);

$dulieutile = $db->query("SELECT * FROM `HK_tilevongquayff`")->fetch();
$phanqua = array('0' => $dulieutile[trat], '80' => $dulieutile[80], '150' => $dulieutile[150], '250' => $dulieutile[250], '1000' => $dulieutile[1000], '1500' => $dulieutile[1500], '3000' => $dulieutile[3000], '5000' => $dulieutile[5000]);

$mangphanqua = array();
foreach ($phanqua as $phanqua=>$value)
{
    $mangphanqua = array_merge($mangphanqua, array_fill(0, $value, $phanqua));
}



$kc = ($mangphanqua[array_rand($mangphanqua)]);

if($kc == 80){
$pos = 1;
$name = "80 Kim cương";
}elseif($kc == 150){
$pos = 2;
$name = "150 Kim cương";
}elseif($kc == 250){
$pos = 3;
$name = "250 Kim cương";
}elseif($kc == 1000){
$pos = 4;
$name = "1000 Kim cương";
}elseif($kc == 1500){
$pos = 5;
$name = "1500 Kim cương";
}elseif($kc == 3000){
$pos = 6;
$name = "3000 Kim cương";
}elseif($kc == 5000){
$pos = 7;
$name = "5000 Kim cương";
}elseif($kc == 0){
$pos = 8;
$name = "Du lịch mùa hè.";
}


	if(empty($uid)){
 $status = 'LOGIN'; // false
 $msg = 'Đăng nhập đi, xem json cái lol.';

$kimhungg3 = array('msg' => $msg,'status' => $status);
echo json_encode($kimhungg3);
}
elseif($TMQ['cash'] < 17000){
    $status = 'ERROR'; // false
    $msg = 'Số tiền không đủ để thực hiện giao dịch, vui lòng nạp thêm tiền vào tài khoản.';
$kimhungg33 = array('msg' => $msg,'status' => $status);
echo json_encode($kimhungg33);
}
else{
    $saugd = $TMQ['cash'] - 17000;
   $status = '1';
   $ketqua123 = 'success';
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
    `noidung` = ' Quay vòng quay freefire với giá 17.000<sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    
$arr = array('status' => $status,'pos' => $pos, 'name' => $name, 'input_auto ' => '1');
$kimhungg = array('msg' => $arr);
echo json_encode($kimhungg);
}


//	$arr = array('status' => $status,'pos' => $pos, 'locale' => '1', 'input_auto' => '2','num_roll_remain' => '0', 'numrollbyorder' => '0','name' => $name);
//$kimhungg = array('msg' => $arr);


//echo json_encode($kimhungg);

//{"msg":{"name":"NICK RANDOM 9K","pos":4,"num_roll_remain":0},"status":"OK"}
}