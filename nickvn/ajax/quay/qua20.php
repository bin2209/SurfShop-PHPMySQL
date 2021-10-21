<?php
$name = $TMQ["name"];

if($vongquay == 1){
    $gift = "20 triệu vàng";
    $nhan = "Đã Cộng Vào Tài Khoản";
    $db->exec("UPDATE `TMQ_user` SET `vang` = `vang` + 20000000 WHERE `uid` = '".$TMQ["uid"]."'");
}elseif($vongquay == 2){
    $gift = "Nick Sơ Sinh Có Đệ Tử";
    $nhan = $nickgui;
    $db->exec("UPDATE `TMQ_nickthuong` SET `trangthai` = '1' WHERE `id` = '$idnick'");
}elseif($vongquay == 3){
    $gift = "Nick Sơ Sinh Có Đệ Tử";
    $nhan = $nickgui;
    $db->exec("UPDATE `TMQ_nickthuong` SET `trangthai` = '1' WHERE `id` = '$idnick'");
}elseif($vongquay == 4){
    $gift = "Nick Sơ Sinh Có Đệ Tử";
    $nhan = $nickgui;
    $db->exec("UPDATE `TMQ_nickthuong` SET `trangthai` = '1' WHERE `id` = '$idnick'");
}elseif($vongquay == 5){
    $gift = "Nick Vip 300k Trở Lên";
    $nhan = $nickguis;
    $db->exec("UPDATE `TMQ_nickthuong` SET `trangthai` = '1' WHERE `id` = '$idnicks'");
}elseif($vongquay == 6){
    $gift = "X1 Ngọc Rồng 2 Sao";
    $nhan = null;
}elseif($vongquay == 7){
    $gift = "Nick Vip Trị Giá 300k Trở Lên";
    $nhan = $nickguis;
    $db->exec("UPDATE `TMQ_nickthuong` SET `trangthai` = '1' WHERE `id` = '$idnicks'");
}elseif($vongquay == 8){
    $gift = "50 Triệu Vàng";
    $nhan = "Đã Cộng Vào Tài Khoản";
    $db->exec("UPDATE `TMQ_user` SET `vang` = `vang` + 50000000 WHERE `uid` = '".$TMQ["uid"]."'");
}elseif($vongquay == 9){
    $gift = "10 Triệu Vàng";
    $nhan = "Đã Cộng Vào Tài Khoản";
    $db->exec("UPDATE `TMQ_user` SET `vang` = `vang` + 10000000 WHERE `uid` = '".$TMQ["uid"]."'");
}elseif($vongquay == 10){
    $gift = "20 Triệu vàng";
    $nhan = "Đã Cộng Vào Tài Khoản";
    $db->exec("UPDATE `TMQ_user` SET `vang` = `vang` + 20000000 WHERE `uid` = '".$TMQ["uid"]."'");
}
$saugd = $TMQ["cash"] - 20000;
 $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = 'Quay Vòng Quay 20.000<sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
$db->exec("UPDATE `TMQ_user` SET `cash` = `cash` - '20000' WHERE `uid` = '".$TMQ["uid"]."' ");
$db->exec("INSERT INTO `TMQ_lichsuquay` SET
		`uid`='".$TMQ["uid"]."',
		`name`='".$TMQ["name"]."',
		`goiqua`='".$gift."',
		`nhangift`='$nhan',
		`vongquay` = '".$vongquay."',
		`time`='".time()."',
		`loai` = '$loai'
		");
?>