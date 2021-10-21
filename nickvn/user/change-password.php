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
<?php

if(isset($_POST['change']) && $_SESSION["token"]==$_POST["_token"]){
$old = tmq_boc($_POST['old_pass']);
$new = tmq_boc($_POST['new_pass']);
$re_new = tmq_boc($_POST['re_new']);
echo md5('123456');
if(empty($old) || empty($new) || empty($re_new)){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                Nhập đủ thông tin.</div>
            </div>';
    
}elseif ($new != $re_new){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                 Mật khẩu mới không đúng.</div>
            </div>';
}elseif ($old != $TMQ['matkhau']){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
               Mật khẩu cũ không đúng.</div>
            </div>';            
}elseif($TMQ['matkhau'] == $new){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                   Mật khẩu cũ không được giống mật khẩu mới.
                </div>
            </div>';

}else{
    
    $db->exec("UPDATE `TMQ_user` SET `matkhau` = '".md5($new)."' WHERE `uid` = '".$TMQ["uid"]."'");
    echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                   Thành công, mật khẩu đã được đổi. </div>
            </div>';

    
    
    
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
					<h3 class="c-font-uppercase c-font-bold">Chuyển tiền</h3>
					<div class="c-line-left"></div>
				</div>
				

 <div class="text-center">
                    <center>

                        <h2 class="c-font-bold c-font-28">UID: <?=$uid?></h2>
                        <h2 class="c-font-22">Thành viên</h2>
                        <h2 class="c-font-22"></h2>
                        <h2 class="c-font-22 c-font-red"><?=number_format($TMQ['cash']);?>đ</h2>
                    </center>

                </div>
                
                <form class="form-horizontal"  method="POST">

                    <input type="hidden" name="_token" value="<?php echo $token ?>">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mật khẩu cũ:</label>
                        <div class="col-md-6">
                            <input class="form-control  c-square c-theme" name="old_pass" type="text" placeholder="Mật khẩu cũ" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mật khẩu mới:</label>
                        <div class="col-md-6">
                           <input class="form-control c-square c-theme " type="text" name="new_pass" placeholder="Mật khẩu mới" value="">
                        </div>
                    </div>
                
       
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nhập lại mật khẩu mới:</label>
                        <div class="col-md-6">
                            <input class="form-control c-square c-theme" name="re_new" type="text" placeholder="Nhập lại mật khẩu mới">
                        </div>
                    </div>
                  
                    <div class="form-group c-margin-t-40">
                        <div class="col-md-offset-3 col-md-6">
                            <button name="change"  class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block btn-confirm">Thực hiện</button>
                        </div>
                    </div>
                </form>

 
            </div>
        </div>
    </div>
    
<?php require('../TMQ/end.php'); ?>