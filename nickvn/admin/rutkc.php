<?php
require('../TMQ/function.php');
if($TMQ['admin'] != 9){
    header('Location: /admin');
    exit;
    
}
require('head.php'); 
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
                                    
                                    <li class="active">Quản lý rút kim cương</li>
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
                <div class="col-lg-12">
<?php

if(isset($_GET['ok'])){
    
    $id = intval($_GET['ok']);
    
    $db->exec("UPDATE `HK_rutkc` SET `trangthai` = '1' WHERE `id` = '$id'");
    
    echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                     Duyệt đơn rút kim cương ID #'.$id.' thành công
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}

elseif(isset($_GET['huy'])){
    
    $id = intval($_GET['huy']);
    
    $get = $db->query("SELECT * FROM `HK_rutkc` WHERE `id` = '$id'")->fetch();

    
    if($get['trangthai'] == '0'){
        
    $db->exec("UPDATE `HK_rutkc` SET `trangthai` = '2' WHERE `id` = '$id'");
    
    $db->exec("update `TMQ_user` set `kimcuong` = `kimcuong` + '". $get['kimcuong'] ."' where `uid` = '". $get['uid'] ."'");
    
    echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                    Hủy đơn rút kim cương ID #'.$id.' thành công
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}else{
     echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                     Đơn rút kim cương ID #'.$id.' đã bị hủy trước đó.                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}
    
    
}

?>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tài khoản người rút</th>
                                        <th scope="col">Người rút</th>
                                        <th scope="col">Id nhận kim cương</th>
                                        <th scope="col">Số kim cương</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$get = $db->query("SELECT * FROM `HK_rutkc`"); //lấy danh sách bài viết theo chuyên mục
foreach($get as $rt){
    $name_rut = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '". $rt['uid'] ."' ")->fetch();
    if($rt['trangthai'] == 0){
$trangthai = '<span style="font-weight: bold; color: brown">Chờ xử lý.</span>';
    }elseif($rt['trangthai'] == 1){
$trangthai = '<span style="font-weight: bold; color: blue">Thành công.</span>';
    }elseif($rt['trangthai'] == 2){
$trangthai = '<span style="font-weight: bold; color: red">Thất bại.</span>';
    }

    ?>
    
                                    <tr>
                                        <th scope="row"><?=$rt['id'];?></th>
                                        <td><?=$rt['uid'];?></td>
                                        <td><?=$name_rut['name'];?></td>
                                        <td><?=($rt['idnguoichoi']);?></td>
                                        <td><?=number_format($rt['kimcuong']);?> kim cương</td>
                                        <td><?=$trangthai;?></td>
                                        <td><a style="color: green;" href="?ok=<?=$rt['id'];?>">[DUYỆT]</a>
                                            <a style="color: red;"href="?huy=<?=$rt['id'];?>">[HỦY]</a></td>
                                    </tr>
                                    
                                  <?php } ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

              
</div>


</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div>



<?php
require('end.php');
?>