<?php require('../TMQ/function.php'); require('head.php'); ?>
<?php
$ketqua = "";
if(isset($_POST["upload"])){
    
    $info = addslashes($_POST['info']);
    $info = explode("\n", $info);
    $loai = tmq_boc($_POST['loainick']);
    $i = 0;
    
    foreach($info as $key){
         $cc = explode("/", $info[$i]);
         $check = $db->query("SELECT * FROM `danhsachthezing` WHERE `seri` = '".$cc[1]."' and `mathe` = '".$cc[2]."'")->fetch();
   if(!$cc[0] && !$cc[1] && !$cc[2]){
    $ketqua = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                      Vui lòng nhập đầy đủ thông tin.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
   }
   elseif($check[seri] == $cc[1] && $check[id] != null){
    $ketqua = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                      Thẻ có seri: '.$cc[1].' đã tồn tại trên hệ thống.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
   }elseif($check[mathe] == $cc[2] && $check[id] != null){
    $ketqua = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                      Thẻ có mã thẻ: '.$cc[2].' đã tồn tại trên hệ thống.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
   }else{

         $db->exec("INSERT INTO `danhsachthezing` SET
            `seri` = '".$cc[1]."',
            `mathe` = '".$cc[2]."',
            `menhgia` = '".$cc[0]."'");
           
             $ketqua = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                      Thẻ đã được thêm thành công.
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
                                    <li class="active">Thêm thẻ cào vòng quay</li>
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
                                         <label class=" form-control-label">Loại nick</label>
                                         
									 <div class="form-group">
                                    <label class=" form-control-label">Thông tin thẻ (MỆNH GIÁ/SERI/MÃ THẺ, mỗi thẻ cách 1 dòng)</label>
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