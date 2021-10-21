<?php 
require('../TMQ/function.php');
$dulieutile = $db->query("SELECT * FROM `HK_tilebingo`")->fetch();
$phanqua = array('0' => $dulieutile[trat], '250' => $dulieutile[250], '350' => $dulieutile[350], '5000' => $dulieutile[5000], '8000' => $dulieutile[8000], '10000' => $dulieutile[10000], '1000' => $dulieutile[1000], '2000' => $dulieutile[2000], '40' => $dulieutile[40], '80' => $dulieutile[80], '100' => $dulieutile[100]);

$mangphanqua = array();
foreach ($phanqua as $phanqua=>$value)
{
    $mangphanqua = array_merge($mangphanqua, array_fill(0, $value, $phanqua));
}


$randompos = rand(1,11);
$kc = ($mangphanqua[array_rand($mangphanqua)]);
if($kc == 0){
$locale = '1';
$pos = $randompos;
$name = "Chúc bạn may mắn lần sau.";
}
elseif($kc == 250){
$locale = '0';
$pos = 1;
$name = "250 Kim cương";
}elseif($kc == 350){
$locale = '0';    
$pos = 2;
$name = "350 Kim cương";
}elseif($kc == 5000){
$locale = '0';
$pos = 3;
$name = "5.000 Kim cương";
}elseif($kc == 8000){
$locale = '0';
$pos = 5;
$name = "8.000 Kim cương";
}elseif($kc == 10000){
$locale = '0';
$pos = 6;
$name = "10.000 Kim cương";
}elseif($kc == 1000){
$locale = '0';
$pos = 7;
$name = "1.000 Kim cương";
}elseif($kc == 2000){
$locale = '0';
$pos = 8;
$name = "2.000 Kim cương";
}elseif($kc == 40){
$locale = '0';
$pos = 9;
$name = "40 Kim cương";
}elseif($kc == 80){
$locale = '0';
$pos = 10;
$name = "80 Kim cương";
}elseif($kc == 100){
$locale = '0';
$pos = 11;
$name = "100 Kim cương";
}






if(empty($uid)){
$arr = array('status' => 'LOGIN');
echo json_encode($arr);
    
}
elseif ($TMQ['cash'] < $dulieutile[wheel_price] ) {
$arr = array('status' => 'ERROR','msg' => 'Tài khoản của bạn không đủ,vui lòng nạp thêm tiền.');
echo json_encode($arr);
    
}
else{
    $saugd = $TMQ['cash'] - $dulieutile[wheel_price];
    if($kc == 0){
        $nhankc = 'Chúc bạn may mắn lần sau.';
    }else{
        $nhankc = "$kc Kim Cương";
    }
    $arr = array('locale' => $locale,'msg' => $name,'num_roll_remain' => number_format($TMQ['cash'] - $dulieutile[wheel_price]),'pos' => $pos);
echo json_encode($arr);

$db->exec("INSERT INTO `history_bingo` SET
    `username` = '".$uid."',
    `phanthuong` = '".$nhankc."',
    `date` = '". date('H:i:s d-m-Y') ."',
    `time` = '".time()."'
    ");

$db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = ' Quay vòng quay bingo với giá ".number_format($dulieutile[wheel_price])."<sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    
    
$db->query("UPDATE `TMQ_user` SET `cash` = `cash` - '".$dulieutile[wheel_price]."' WHERE `uid` = '". $uid ."'");
 $db->query("UPDATE `TMQ_user` SET `kimcuong` = `kimcuong` + '".$kc."' WHERE `uid` = '". $uid ."'");

}

