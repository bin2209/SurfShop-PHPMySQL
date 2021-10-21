
<?php require('../TMQ/function.php'); ?>

<?
if($_POST[type] == 'so20k'){
//$pos = rand(1,8);

$dulieutile = $db->query("SELECT * FROM `HK_tilevongquayff`")->fetch();
$phanqua = array('100' => $dulieutile[100], '250' => $dulieutile[250], '470' => $dulieutile[470], '1000' => $dulieutile[1000], '3000' => $dulieutile[3000], '5000' => $dulieutile[5000], '11999' => $dulieutile[11999], '50' => $dulieutile[50]);

$mangphanqua = array();
foreach ($phanqua as $phanqua=>$value)
{
    $mangphanqua = array_merge($mangphanqua, array_fill(0, $value, $phanqua));
}



$kc = ($mangphanqua[array_rand($mangphanqua)]);

if($kc == 250){
$pos = 1;
$name = "250 Kim Cương";
}elseif($kc == 470){
$pos = 2;
$name = "470 Kim cương";
}elseif($kc == 1000){
$pos = 3;
$name = "1000 Kim cương";
}elseif($kc == 3000){
$pos = 4;
$name = "3000 Kim cương";
}elseif($kc == 5000){
$pos = 5;
$name = "5000 Kim cương";
}elseif($kc == 11999){
$pos = 6;
$name = "11.999 Kim cương";
}elseif($kc == 50){
$pos = 7;
$name = "50 Kim cương";
}elseif($kc == 100){
$pos = 8;
$name = "100 Kim Cương";
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


$db->exec("INSERT INTO `CVH_quayvk` SET
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