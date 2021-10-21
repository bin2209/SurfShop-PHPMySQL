<?php require('../TMQ/function.php'); ?>

<?
if($_POST[type] == 'so20k'){
$dulieutile = $db->query("SELECT * FROM `HK_tilevongquaythezing`")->fetch();
$phanqua = array('20k' => $dulieutile['20k'], '40k' => $dulieutile['40k'], '50k' => $dulieutile['50k'], '100k' => $dulieutile['100k'], '200k' => $dulieutile['200k'], '500k' => $dulieutile['500k'], '0k' => $dulieutile['0k'], 'random' => $dulieutile['random']);

$mangphanqua = array();
foreach ($phanqua as $phanqua=>$value)
{
    $mangphanqua = array_merge($mangphanqua, array_fill(0, $value, $phanqua));
}

$ketqua = ($mangphanqua[array_rand($mangphanqua)]);



if($ketqua == '20k'){
$pos = 8;
$name = "Thẻ Zing 20.000Đ";
$menhgia = '20000';
}elseif($ketqua == '40k'){
$pos = 1;
$name = "Thẻ Zing 40.000Đ";
$menhgia = '40000';
}
elseif($ketqua == '50k'){
$pos = 2;
$name = "Thẻ Zing 50.000Đ";
$menhgia = '50000';
}elseif($ketqua == '100k'){
$pos = 3;
$name = "Thẻ Zing 100.000Đ";
$menhgia = '100000';
}elseif($ketqua == '200k'){
$pos = 4;
$name = "Thẻ Zing 200.000Đ";
$menhgia = '200000';
}elseif($ketqua == '500k'){
$pos = 5;
$name = "Thẻ Zing 500.000Đ";
$menhgia = '500000';
}elseif($ketqua == '0k'){
$pos = 6;
$name = "Em Đen Lắm";
$menhgia = 0;
}elseif($ketqua == 'random'){
$pos = 7;
$name = "Thẻ Zing Ngẫu Nhiên";

$therandom = array('20k' => 20, '40k' => 20, '50k' => 20, '100k' => 20, '200k' => 20, '500k' => 0);

$mangphanqua2 = array();
foreach ($therandom as $therandom=>$value2)
{
    $mangphanqua2 = array_merge($mangphanqua2, array_fill(0, $value2, $therandom));
}
$menhgia = ($mangphanqua2[array_rand($mangphanqua2)]);
}



$check = $db->query("SELECT * FROM `danhsachthezing` WHERE `menhgia` = '$menhgia' OR `menhgia` = '$menhgia ' ")->fetch();


	if(empty($uid)){
 $status = 'LOGIN'; // false
 $msg = 'Đăng nhập đi, xem json cái lol.';

$kimhungg3 = array('msg' => $msg,'status' => $status);
echo json_encode($kimhungg3);
}
elseif($TMQ['cash'] < 20000){
    $status = 'ERROR'; // false
    $msg = 'Số tiền không đủ để thực hiện giao dịch, vui lòng nạp thêm tiền vào tài khoản.';
$kimhungg33 = array('msg' => $msg,'status' => $status);
echo json_encode($kimhungg33);
}
elseif($check['id'] == null){//lệnh này nếu kho thẻ hết thì auto quay trật
     $saugd = $TMQ['cash'] - 20000;
   $status = '1';
   $ketqua123 = 'success';
   $db->query("UPDATE `TMQ_user` SET `cash` = `cash` - '20000' WHERE `uid` = '". $uid ."'");

$db->exec("INSERT INTO `HK_quaythezing` SET
    `nguoiquay` = '".$uid."',
    `seri` = '0',
    `mathe` = '0',
    `menhgia` = '0',
    `date` = '". date('H:i:s d-m-Y') ."',
    `time` = '".time()."'
    ");

$db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = ' Quay vòng quay thẻ zing với giá 20.000<sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");


$arr = array('status' => $status,'pos' => 6, 'name' => 'Em Đen Lắm');
$kimhungg = array('msg' => $arr);
echo json_encode($kimhungg);
}
else{

    $saugd = $TMQ['cash'] - 20000;
   $status = '1';
   $ketqua123 = 'success';
   $db->query("UPDATE `TMQ_user` SET `cash` = `cash` - '20000' WHERE `uid` = '". $uid ."'");
   $db->query("DELETE FROM `danhsachthezing` WHERE `id` = $check[id] ");
$db->exec("INSERT INTO `HK_quaythezing` SET
    `nguoiquay` = '".$uid."',
    `seri` = '".$check[seri]."',
    `mathe` = '".$check[mathe]."',
    `menhgia` = '".$menhgia."',
    `date` = '". date('H:i:s d-m-Y') ."',
    `time` = '".time()."'
    ");

$db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = ' Quay vòng quay thẻ zing với giá 20.000<sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");


$arr = array('status' => $status,'pos' => $pos, 'name' => $name);
$kimhungg = array('msg' => $arr);
echo json_encode($kimhungg);
}


}