<?php require('../TMQ/function.php'); ?>
<?php
if(empty($uid)){
header('Location: /dang-nhap.php');
}    
?>
<?php require('../TMQ/head.php'); ?>
<div class="c-layout-page">
    
                <div class="container">
    <div class="col-md-12">
    <link rel="stylesheet" type="text/css" href="https://acclienminhgiare.vn/frontend/plugins/sweetalert2.min.css">
	
<script type="text/javascript" src="https://acclienminhgiare.vn/frontend/plugins/sweetalert2.min.js"></script>
<?php

if(isset($_POST['rutkimcuong']) && $_SESSION["token"]==$_POST["_token"]){
$idnguoichoi = trim(addslashes(htmlspecialchars($_POST['idnguoichoi'])));
$kimcuong = trim(addslashes(htmlspecialchars($_POST['kimcuong'])));
if(!$idnguoichoi && !$kimcuong){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                 Vui lòng nhập đầy đủ thông tin.</div>
            </div>';
    
}
elseif($idnguoichoi < 10000){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                 ID người chơi không hợp lệ.</div>
            </div>';
    
}elseif ($kimcuong != 45 && $kimcuong != 90 && $kimcuong != 230 && $kimcuong != 465 && $kimcuong != 950){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                 Bạn rút gói kim cương nào vậy?.</div>
            </div>';
            
}elseif($TMQ['kimcuong'] < $kimcuong){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    Bạn không đủ kim cương để rút.Vui lòng kiểm tra lại
                </div>
            </div>';

}elseif($_POST['captcha'] != $_SESSION['security_code']){
			echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    Captcha không chính xác.Vui lòng kiểm tra lại
                </div>
            </div>';
}else{
    //biến đổi số dư 
  $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = 'Rút ".number_format($kimcuong)." kim cương, kim cương còn lại sau khi giao dịch: ".number_format($TMQ['kimcuong'] - $kimcuong).".',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '".$TMQ['cash']."',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    //trừ kc
    $db->exec("UPDATE `TMQ_user` SET `kimcuong` = `kimcuong` - $kimcuong where `uid` = '$uid'");
    //lưu dữ liệu
    $db->exec("INSERT INTO `HK_rutkc` SET
    `uid` = '$uid',
    `idnguoichoi` = '".$idnguoichoi."',
    `kimcuong` = '$kimcuong',
    `trangthai` = '0',
    `time` = '". date('H:i:s d-m-Y') ."'");
    echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                   Thành công, đã rút '.number_format($kimcuong).' kim cương,vui lòng chờ admin duyệt đơn </div>
            </div>';

    
    
    
}
}
    
    

if(isset($_GET['huy'])){
    $id = intval($_GET['huy']);
    $get2 = $db->query("SELECT * FROM `HK_rutkc` WHERE `id` = '$id'")->fetch();
    $saugd = $TMQ['cash'];
    if($get2['uid'] != $uid){
        echo'
        <script>
        swal("Thông Báo!",  "ID này không thuộc về bạn.", "error");
        $("*").click(function() {
                               window.location.href = "/user/withdrawruby/2";
                            });
        </script>';
                
    }elseif($get2['trangthai'] != '0'){
        echo'
        <script>
        swal("Thông Báo!","Đơn này đã được duyệt.", "error");
        $("*").click(function() {
                                window.location.href = "/user/withdrawruby/2";
                            });
        </script>';
            
    }elseif($get2['id'] == null){
        echo'
        <script>
        swal("Thông Báo!","ID không tồn tại.", "error");
        $("*").click(function() {
                                window.location.href = "/user/withdrawruby/2";
                            });
        </script>';
        
            
    }else{
        
    $db->exec("DELETE FROM `HK_rutkc` WHERE `id` = '$id'");
    $db->exec("UPDATE `TMQ_user` SET `kimcuong` = '".$TMQ['kimcuong']."' + '".$get2['kimcuong']."'  where `uid` = '".$get2['uid']."'");
    
    //$db->exec("UPDATE `HK_rutkc` SET `trangthai` = '2' where `id` = '".$get['uid']."'");
    
     $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = 'Hủy lệnh rút kim cương với số kim cương ".number_format($get2['kimcuong'])." , kim cương còn lại sau khi giao dịch: ".number_format($TMQ['kimcuong'] + $get2['kimcuong']).".',
    `truocgd` = '".$TMQ['cash']."',
    `saugd` = '$saugd',
    `date` = '".date('H:i:s d-m-Y')."',
    `time` = '". time() ."'
    ");
    echo'
        <script>
        swal("Thông Báo!","Hủy lệnh rút kim cương thành công.", "success");
        $("*").click(function() {
                                window.location.href = "/user/withdrawruby/2";
                            });
        </script>';
            
            
    }
    


}
$salt = "Iui8*&@IJsad".date("Y-m-d H:i:s");
$token = md5($salt.TaoChuoiRandom(20)); // nhớ viết hàm random riêng
$_SESSION["token"] = $token;
?>
</div></div>
<?php require('head.php'); ?>

<div class="c-layout-sidebar-content ">
				<!-- BEGIN: PAGE CONTENT -->
				<!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
				<div class="c-content-title-1">
					<h3 class="c-font-uppercase c-font-bold">Rút kim cương</h3>
					<div class="c-line-left"></div>
				</div>
				

 <div class="text-center">
                    <center>

                        <h2 class="c-font-bold c-font-28">UID: <?=$uid?></h2>
                        <h2 class="c-font-22">Thành viên</h2>
                        <h2 class="c-font-22"></h2>
                        <h2 class="c-font-22 c-font-red"><?=number_format($TMQ['kimcuong']);?> kim cương</h2>
                    </center>

                </div>
                
                <form class="form-horizontal"  method="POST">

                    <input type="hidden" name="_token" value="<?php echo $token ?>">
                    <div class="form-group">
                        <label class="col-md-3 control-label">ID người chơi:</label>
                        <div class="col-md-6">
                            <input class="form-control  c-square c-theme" name="idnguoichoi" type="number" placeholder="Nhập ID người chơi" required="">
                        </div>
                    </div>
                   
                   
                   <div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Chọn gói kim cương:</b></label>
							<div class="col-md-6">
								<select name="kimcuong" id="kimcuong" class="form-control c-square c-theme">
									<option value="">
										Gói kim cương</option>
																        <option value="45">45 Kim Cương</option>
																        <option value="90">90 Kim Cương</option>
																        <option value="230">230 Kim Cương</option>
																		<option value="465">465 Kim Cương </option>
																		<option value="950">950 Kim Cương</option>
																	</select>
							</div>
						</div>
    
   
        
                 
                    <div class="form-group">
                        <label class="col-md-3 control-label"><b>Mã bảo vệ:</b></label>
                        <div class="col-md-6">
                            <div class="input-group">
                                    <span class="input-group-addon" style="padding: 0px;">
                                        <img src="/captcha.php" height="30px" id="imgcaptcha" onclick="document.getElementById('imgcaptcha').src ='/captcha.php?'+Math.random();document.getElementById('captcha').focus();">
                                    </span>
                                <input type="text" class="form-control c-square" id="captcha" name="captcha" placeholder="" maxlength="5" autocomplete="off" required="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group c-margin-t-40">
                        <div class="col-md-offset-3 col-md-6">
                            <button name="rutkimcuong"  class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block btn-confirm">Thực hiện</button>
                        </div>
                    </div>
                </form>

  <table id="charge_recent" class="table table-striped table-custom-res">

                    <tbody><tr>
                        <th>Thời gian</th>
                        <th>Id nhận kim cương</th>
                        <th>Số kim cương</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                       
                    </tr>
                    </tbody><tbody>  
<?php 
$dulieu = $db->query("SELECT * FROM `HK_rutkc` WHERE `uid` = '$uid' ORDER BY id DESC");
foreach($dulieu as $dl){
    if($dl['trangthai'] == 0){
$trangthai = '<span style="font-weight: bold; color: brown">Chờ xử lý.</span>';
    }elseif($dl['trangthai'] == 1){
$trangthai = '<span style="font-weight: bold; color: blue">Thành công.</span>';
    }elseif($dl['trangthai'] == 2){
$trangthai = '<span style="font-weight: bold; color: red">Thất bại.</span>';
    }
    
?><tr>
                    <td><?=$dl['time'];?></td>
                     <td><?php echo str_replace( substr(($dl['idnguoichoi']), -3), '***', ($dl['idnguoichoi']) );?></td>
                    <td><?=number_format($dl['kimcuong']);?></td>
                    <td><?=$trangthai;?></td>
                    <td><a href="?huy=<?=$dl['id'];?>" class="badge badge-danger">Hủy lệnh rút</a></td>
                   
                 </tr>       
                                        
<?php } ?></tbody>
                </table>
            </div>
        </div>
    </div>
    
<?php require('../TMQ/end.php'); ?>