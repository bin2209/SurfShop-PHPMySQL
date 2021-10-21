<?php require('../TMQ/function.php'); require('head.php'); ?>
<?php
$ketqua = "";
if(isset($_POST["upload"])){
    
    $info = addslashes($_POST['info']);
    $info = explode("\n", $info);
    $i = 0;
    
    foreach($info as $key){
         $cc = explode("|", $info[$i]);
         $check = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `thongtin` = 'RANDOM 10k' and `taikhoan` = '".$cc[0]."'")->fetch();
   if(!$cc[0] && !$cc[1]){
    $ketqua = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                      Vui lòng nhập đầy đủ thông tin.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
   }
   elseif($check[taikhoan] == $cc[0] && $check[id] != null){
    $ketqua = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                     Tài khoản: '.$cc[0].' đã tồn tại trên hệ thống.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
   }else{

           

   $db->exec("INSERT INTO `TMQ_baiviet` SET
    `uid` = '$uid',
    `taikhoan` = '".$cc[0]."',
            `matkhau` = '".$cc[1]."',
    `loainick` = '6',
    `giatien` = '10000',
    `img` = '/kimhung/lf4hrnSQNZ_1589880841.jpg',
    `thongtin` = 'RANDOM 10K',
    `trangthai` = '1',
    `time` = '". date('H:i:s d-m-Y') ."'
    "); 

             $ketqua = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                       Thêm thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                                    $i++;
   }
    }
    
}
?>


    <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Chuyên mục</a></li>
                                    <li class="active">Thêm acc random 10k</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">
                      <?=$ketqua;?>
                        
                        <div class="card">
                            <div class="card-header">
                                <strong>Đăng bài viết</strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                       <form method="POST">
                                <div class="form-group">
                                         
                                         
									 <div class="form-group">
                                    <label class=" form-control-label">Thông tin </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                        <textarea name="info" id="info" rows="9" placeholder="Bắt buộc" class="form-control"></textarea>
                                    </div>
                                    
                                </div>
                              
                            
                        <button type="submit" class="btn btn-outline-success" name="upload" id="upload">Thêm</button>
                        </form>
                            </div>
                            </div>
                        </div>
                    </div>
                 
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div>
<?php require('end.php'); ?>