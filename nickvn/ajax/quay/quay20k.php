
<?php require('../../TMQ/function.php'); ?>
<?
$errormessage = '';
$gift = '';
$vongquay = '';

$req = $db->query("SELECT * FROM `TMQ_nickthuong` WHERE `trangthai` = '0' AND `loai` = 'Nick Sơ Sinh' ORDER BY RAND() LIMIT 1")->fetch();
if($req == NULL){
$nickgui = 'NULL';
}else{
$idnick = $req['id'];
$taikhoan = $req['taikhoan'];
$matkhau = $req['matkhau'];
$sever = $req['server'];
$nickgui = 'tk: '.$taikhoan.' |mk: '.$matkhau.' |sv: '.$sever;
}

$reqs = $db->query("SELECT * FROM `TMQ_nickthuong` WHERE `trangthai` = '0' AND `loai` = 'Nick VIP' ORDER BY RAND() LIMIT 1")->fetch();
if($reqs == null){
$nickguis = 'NULL';
}else{
$idnicks = $reqs['id'];
$taikhoans = $reqs['taikhoan'];
$matkhaus = $reqs['matkhau'];
$severs = $reqs['sever'];
$nickguis = 'tk: '.$taikhoans.' |mk: '.$matkhaus.' |sv: '.$severs;
}

if(empty($uid)){
 $status = 3; // false
$errormessage = 'Vui lòng đăng nhập để quay thưởng. <div class="btn_muthem"><a href="/dang-nhap.php">Đăng nhập</a> <a href="/" class="btnxn">Trang chủ</a></div>';
}elseif($TMQ['cash'] < 20000){
$status = 3; // false
$errormessage = 'Bạn không đủ tiền trong tài khoản, vui lòng nạp thêm. <div class="btn_muthem"><a href="/nap-tien.html">Nạp ngay</a> <a href="/" class="btnxn">Trang chủ</a></div>';
}else{

    /*Tỷ lệ*/
    $random = rand(1,100);
    $tyle201 = rand(1,100);
    $tyle202 = rand(1,100);
    $tyle203 = rand(1,100);
    $tyle204 = rand(1,100);
    $tyle205 = rand(1,100);
    $tyle206 = rand(1,100);
    $tyle207 = rand(1,100);
    $tyle208 = rand(1,100);
    $tyle209 = rand(1,100);
    $tyle2010 = rand(1,100);


    
    if($random < $tyle201){
    $vongquay = 1;
    }elseif($random < $tyle202){
    $vongquay = 2;
    }elseif($random < $tyle203){
    $vongquay = 3;
    }elseif($random < $tyle204){
    $vongquay = 4;
    }elseif($random < $tyle205){
    $vongquay = 5;
    }elseif($random < $tyle206){
    $vongquay = 6;
    }elseif($random < $tyle207){
    $vongquay = 7;
    }elseif($random < $tyle208){
    $vongquay = 8;
    }elseif($random < $tyle209){
    $vongquay = 9;
    }elseif($random < $tyle2010){
    $vongquay = 10;
    }
    /*Tỷ lệ*/

	$status = 1; // true
	$loai = 20;

include 'qua20.php';

}
$loca = $vongquay * 1000;
		$vta = array(
			'status' => 'ERROR',
			'msg' => $errormessage,
			'ok' => $loca
		);
		echo(json_encode($vta));
		
		