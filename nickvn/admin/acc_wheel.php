<?php 
require('../TMQ/function.php');
if($TMQ['admin'] == 0){
    header('Location: /');
    exit;
}
require('head.php');?>

<?php
                        if($TMQ['admin'] == 9){
if(isset($_GET['del'])){
    $id = tmq_boc($_GET['del']);
   $check = $db->query("SELECT * FROM `danhsachthezing` WHERE `id` = '".$id."'")->fetch();

if($check[id] == null){
echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Lỗi</span>
                                        Thẻ #'.$id.' không tồn tại.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}else{
    $db->query("DELETE FROM `danhsachthezing` WHERE `id` = '$id'");
    echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        Thẻ #'.$id.' đã bị xóa thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}
}
}
?>

    <link rel="stylesheet" href="/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css">
 
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

        <!-- Header-->
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
                                    
                                    <li class="active">Danh sách thẻ vòng quay</li>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Danh sách thẻ vòng quay</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>Id</th>
                                            <th>Seri</th>
                                            <th>Mã thẻ</th>
                                            <th>Mệnh giá</th>
                                            <th>Thao tác</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
$get = $db->query("SELECT * FROM `danhsachthezing`"); //lấy danh sách bài viết theo chuyên mục
while($row = $get->fetch()){
?>
                                        <tr>
                                            <td><?=$row['id'];?></td>
                                            <td><?=$row['seri'];?></td>
                                            <td><?=$row['mathe'];?></td>
                                            <td><?=$row['menhgia'];?></td>
                                            <td><a href="?del=<?=$row['id'];?>"><i class="ti-close"></i></a></td>
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
<?php require('end.php'); ?>