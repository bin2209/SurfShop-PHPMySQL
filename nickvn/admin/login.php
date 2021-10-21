<?php 
/*
**********************************************************
+ Tên code: website gạch thẻ                             +
+ Người viết: TMQ                                        +
+ Vui lòng không xóa bản quyền để tôn trọng tác giả      +
+ LIÊN HỆ: tmquang0209@gmail.com                         +
**********************************************************
*/
require('../TMQ/function.php');
if(!empty($_SESSION['pass2'])){
    header('Location: /admin');
}
?>
<title>Login Admin Cpanel V5.0</title>
<link rel="shortcut icon" href="/admin/images/favicon.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
   <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="/admin">
                        <img src="https://taptin.vn/images/2019/06/25/image.png" height="100" alt="logo">
                    </a>
                </div>
                <div class="login-form">
                <center>    
                <?php 

if(isset($_POST['login'])){

    $matkhau = $_POST['password'];
  
    if(!isset($uid)){
     echo'Vui lòng đăng nhập ngoài trang chủ trước.';   
    }elseif(md5($matkhau) != $TMQ['pass']){
        echo'Mật khẩu không chính xác.';
    }else{
        $_SESSION['pass2'] =  $matkhau;
        echo'Thành công.';
     echo'<meta http-equiv="refresh" content="3;url=/admin">
        <script type="text/javascript">
            window.location.href = "/admin"
        </script>';
    }
}

?></center>
                    <form method="POST">

                        <div class="form-group">
                            <label>Bảng Điều Khiển Admin</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                      
                        <button name="login" type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng nhập</button>
                      
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
