
<?php require('../TMQ/function.php'); ?>

<?

if($_POST['type'] == 'kimhunglatthefreefire'){
$randomkimhung = rand(1,100);
$dulieutile = $db->query("SELECT * FROM `HK_tilelattheff`")->fetch();
//$phanqua = array('89' => '60', '111' => '15', '120' => '5', '250' => '5', '500' => '5', '3000' => '4', '5000' => '3', '12000' => '2', '25000' => '1');
$phanqua = array('89' => $dulieutile[89], '111' => $dulieutile[111], '120' => $dulieutile[120], '250' => $dulieutile[250], '500' => $dulieutile[500], '3000' => $dulieutile[3000], '5000' => $dulieutile[5000], '12000' => $dulieutile[12000], '25000' => $dulieutile[25000]);

$mangphanqua = array();
foreach ($phanqua as $phanqua=>$value)
{
    $mangphanqua = array_merge($mangphanqua, array_fill(0, $value, $phanqua));
}

$kc = $mangphanqua[array_rand($mangphanqua)];
$img = '/latthe/'.$kc.'kc.jpg';

/*
if($randomkimhung > 0 && $randomkimhung <= 80){
$kc = '89';
$img = '/latthe/89kc.jpg';
}else
if($randomkimhung > 80 && $randomkimhung <= 85){
$kc = '111';
$img = '/latthe/111kc.jpg';
}else
if($randomkimhung > 85 && $randomkimhung <= 95){
$kc = '250';
$img = '/latthe/250kc.jpg';
}else
if($randomkimhung = 96){
$kc = '500';
$img = '/latthe/500kc.jpg';
}else
if($randomkimhung = 97){
$kc = '3000';
$img = '/latthe/3000kc.jpg';
}else
if($randomkimhung = 98){
$kc = '5000';
$img = '/latthe/5000kc.jpg';
}else
if($randomkimhung = 99){
$kc = '12000';
$img = '/latthe/12000kc.jpg';
}else
if($randomkimhung = 100){
$kc = '25000';
$img = '/latthe/25000kc.jpg';
}
*/

$xulythoigian = time()+2;


	if(empty($uid)){
 $status = 'login'; // false
 $msg = 'Đăng nhập đi, xem json cái lol.';
}
elseif($TMQ['cash'] < 50000){
    $status = 'error'; // false
    $msg = 'Số tiền không đủ để thực hiện giao dịch, vui lòng nạp thêm tiền vào tài khoản.';
}
else{
    $saugd = $TMQ['cash'] - 50000;
   $status = 'success'; // false
   $ketqua123 = 'success';
 $msg = 'Chúc mừng bạn đã trúng '.number_format($kc).' Kim Cương';
 $db->query("UPDATE `TMQ_user` SET `cash` = `cash` - '50000' WHERE `uid` = '". $uid ."'");
 $db->query("UPDATE `TMQ_user` SET `kimcuong` = `kimcuong` + '".$kc."' WHERE `uid` = '". $uid ."'");
$db->exec("INSERT INTO `HK_lattheff` SET
    `nguoiquay` = '".$uid."',
    `kimcuong` = '".$kc."',
    `date` = '". date('H:i:s d-m-Y') ."',
    `time` = '".time()."'
    ");
$db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = ' Lật thẻ freefire với giá 50.000<sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");


}

	$arr = array('status' => $status,'success' => $ketqua123, 'img' => $img,'msg' => $msg);

echo json_encode($arr);
}else{
    echo '?';
}