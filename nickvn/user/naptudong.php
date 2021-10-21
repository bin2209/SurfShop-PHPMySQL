<?php require('../TMQ/function.php');
if(empty($uid)){
header('Location: /dang-nhap.php');
}    
?>
<?php require('../TMQ/head.php'); ?>
<div class="c-layout-page">
<?php require('head.php'); ?>
<?php
 
//chiết khấu nạp
$chietkhau = 100;

//config doicarnhanh
	$key = '1876873795'; //PartnerID, lấy từ website doicardnhanh.com thay vào trong cặp dấu '
	$secret = '33VFVUE6NA0Y15HX6SG74X1CU'; //PartnerKey lấy từ website doicardnhanh.com thay vào trong cặp dấu '
	
		function curl_post($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '');
		$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		curl_setopt($ch, CURLOPT_REFERER, $actual_link);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		
		return $result;
	}
?>
<div class="c-layout-sidebar-content ">
				<!-- BEGIN: PAGE CONTENT -->
				<!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
				<div class="c-content-title-1">
					<h3 class="c-font-uppercase c-font-bold">Nạp thẻ tự động</h3>
					<p>CHIẾT KHẤU THẺ 100K = 100K TRÊN SHOP</p>
					<div class="c-line-left"></div>
				</div>


<?php


if (isset($_POST['submit'])) {
    if (!isset($_POST['type']) || !isset($_POST['serial']) || !isset($_POST['pin'])) {
        $err = 'Bạn cần nhập đầy đủ thông tin';
    } 
	else {
		$type = tmq_boc($_POST['type']);
		$pin = tmq_boc($_POST['pin']);
		$serial = tmq_boc($_POST['serial']);
		$amount = tmq_boc($_POST['amount']);



        if ($type == '' || $serial == '' || $pin == '' || $amount == '') {
            $err = 'Bạn cần nhập đầy đủ thông tin';
        } else {
            $check = $db->query("SELECT * FROM `TMQ_napthe` WHERE `serial` = '".$serial."' AND `mathe` = '".$pin."'")->rowCount();
            if($check > 0){
                $err = 'Thẻ đã được sử dụng';
            }else{
                
                $dataPost="APIkey=$key&APIsecret=$secret&mathe=$pin&seri=$serial&type=$type&menhgia=$amount";
				$url= curl_post('https://doicardnhanh.com/card_charging_api/getcard.html?'.$dataPost);
				
				if($url == '')
					$err = 'Lỗi hệ thống, vui lòng thử lại sau';
				else {
					$obj = json_decode($url, false);
					if(isset($obj->status)) {

						// status: 99 : chờ xử lý
						// status: 1 : thành công
						// status: 2 : thành công nhưng sai mệnh giá
						// status: 3 : thẻ sai hoặc đã sử dụng
						// status: 4 : bảo trì
                        
                        if($obj->status == 0){
                            //lịch sử
                            $db->exec("INSERT INTO `TMQ_napthe` 
                                (`tranid`, `uid`, `serial`, `mathe`, `loaithe`, `menhgia`, `trangthai`, `date`) 
                                    VALUES 
                                ('".$obj->transaction_id."', '".$TMQ["uid"]."', '".$serial."', '".$pin."', '".$type."', '".$amount."', '0', '".date('d-m-Y')."')");
                            $success = 'Thẻ được chấp nhận và chờ xử lý';
                            
                        }elseif($obj->status == 1){
                            //lịch sử
                            $db->exec("INSERT INTO `TMQ_napthe` 
                                (`tranid`, `uid`, `serial`, `mathe`, `loaithe`, `menhgia`, `trangthai`, `date`) 
                                    VALUES 
                                ('".$obj->transaction_id."', '".$TMQ["uid"]."', '".$serial."', '".$pin."', '".$type."', '".$amount."', '1', '".date('d-m-Y')."')");
                            //cộng tiền
                            $amount = $chietkhau*$amount*0.01;
                            $db->exec("UPDATE `TMQ_user` SET `cash` = `cash` + '".$amount."' WHERE `uid` = '".$TMQ['uid']."'");
                            $success = 'Nạp thẻ thành công';
                        }else{
                            $err = $obj->msg;
                        }
                        /*
							echo '<pre>';
							print_r($obj);
							echo '</pre>';
						*/
					} else {
	                    $err = 'Lỗi hệ thống, vui lòng thử lại sau';		
	                }
				}
            
            
			
			
	
}
        }
    }
}
?>


 <form method="POST" action="">
                <div class="form-group">
                    <label>Loại thẻ:</label>
                     <select class="form-control" name="type">
                        <?php 
                          $mang_option = file_get_contents("https://doicardnhanh.com/card_charging_api/get_key_card.html");
                          echo $mang_option;
                         ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mệnh giá:</label>
                   <select class="form-control" name="amount">
                        <option value="">-- Chọn mệnh giá --</option>
                        <option value="10000">10,000đ</option>
                        <option value="20000">20,000đ</option>
                        <option value="30000">30,000đ</option>
                        <option value="50000">50,000đ</option>
                        <option value="100000">100,000đ</option>
                        <option value="200000">200,000đ</option>
                        <option value="300000">300,000đ</option>
                        <option value="500000">500,000đ</option>
                        <option value="1000000">1,000,000đ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Số seri:</label>
                    <input type="text" class="form-control" name="serial"/>
                </div>
                <div class="form-group">
                    <label>Mã thẻ:</label>
                    <input type="text" class="form-control" name="pin"/>
                </div>
                <div class="form-group">
                    <?php echo (isset($err)) ? '<div class="alert alert-danger" role="alert">' . $err . '</div>' : ''; ?>
                    <?php echo (isset($success)) ? '<div class="alert alert-success" role="alert">' . $success . '</div>' : ''; ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block" name="submit">NẠP NGAY</button>
                </div>
            </form>



	<table class="table cart-table">
			<thead>
                            <tr>
					<th>Trạng thái</th>
					<th>Serial</th>
					<th>Mã thẻ</th>
					<th>Loại thẻ</th>
					<th>Mệnh giá</th>
					<th>Thời gian</th>
					 </tr>
				</thead>
				<tbody>
<?php
$sotin1trang = 20;
if(isset($_GET['page'])){
 $page = intval($_GET['page']);
 }else{
 $page = 1;
 }
 $from = ($page - 1)* $sotin1trang;
if(isset($_POST['timkiem'])){
$get = $db->query("SELECT * FROM `TMQ_napthe` WHERE `uid` = '$uid' $start $end LIMIT $from,$sotin1trang");
}else{
$get = $db->query("SELECT * FROM `TMQ_napthe` WHERE `uid` = '$uid' LIMIT $from,$sotin1trang");
}
foreach($get as $nt){
    if($nt['trangthai'] == 0 && $nt['tranid']){
        $transaction = $nt['tranid'];
        $dataPost="APIkey=$key&APIsecret=$secret&transaction_id=$transaction";
	    $curl= curl_post('https://doicardnhanh.com/card_charging_api/check-status.html?'.$dataPost);
	
					if($curl){
						$obj = json_decode($curl, false);
                        if ($obj && (int)$obj->status1 != 0){
                                //trạng thái
                                $nt['trangthai'] = $obj->status1;
                                $db->exec("UPDATE `TMQ_napthe` SET `trangthai` = '".$obj->status1."' WHERE `id` = '".$nt['id']."'");
                            if($obj->status1 == 2){
                                //cộng tiền
                                $amount = $chietkhau*$nt['menhgia']*0.01;
                                $db->exec("UPDATE `TMQ_user` SET `cash` = `cash` + '".$amount."' WHERE `uid` = '".$nt['uid']."'");
                            }
                        }

								/*echo '<pre>';
								print_r($obj);
								echo '</pre>';*/

					}
    }
?>
    <tr>
        <td><span style="font-weight: bold; color: <?=status_luauytin($nt['trangthai'])['color']?>"><?=status_luauytin($nt['trangthai'])['status'];?></span></td>
        <td><?=$nt['serial'];?></td>
        <td><?=$nt['mathe'];?></td>
        <td><?=card_luauytin($nt['loaithe']);?></td>
        <td><?=number_format($nt['menhgia']);?><sup>đ</sup></td>
        <td><?=$nt['date'];?></td>
    </tr>
<?php } ?>
				</tbody>
				</table>
	<?php 
$tong = $db->query("SELECT * FROM `TMQ_napthe` WHERE `uid` = '$uid'")->rowcount();

if ($tong > $sotin1trang){
echo '<center>' . phantrang('/profile/nap-the-tu-dong.html?', $from, $tong, $sotin1trang) . '</center>';
} ?>

</div>	</div></div></div></div>
<?php require('../TMQ/end.php'); ?>