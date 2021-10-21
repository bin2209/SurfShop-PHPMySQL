<?php
require("../TMQ/function.php");
if($TMQ['admin'] != 9){ header('Location: /'); }
require("head.php");
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
                                   
                                    <li class="active">Cài đặt tỉ lệ lật thẻ FreeFire</li>
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
<?php 
$dulieu = $db->query("SELECT * FROM `HK_tilelattheff`")->fetch();
if(isset($_POST['submit'])){
    $t89 = ($_POST['89']);
    $t111 = ($_POST['111']);
    $t120 = ($_POST['120']);
    $t250 = ($_POST['250']);
    $t500 = ($_POST['500']);
    $t3000 = ($_POST['3000']);
    $t5000 = ($_POST['50000']);
    $t12000 = ($_POST['12000']);
    $t25000 = ($_POST['25000']);
$tongcong = ($t89)+($t111)+($t120)+($t250)+($t500)+($t3000)+($t5000)+($t12000)+($t25000);
if (!$t89 && !$t111 && !$t120 && !$t250 && !$t500 && !$t3000 && !$t5000 && !$t12000 && !$t25000){
    echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                     Vui lòng điền đầy đủ thông tin!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}elseif($tongcong != 100){
    echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                    Tổng các phần quà phải cộng lại bằng 100.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}
else{
    $db->exec("UPDATE `HK_tilelattheff` SET `89` = '$t89' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilelattheff` SET `111` = '$t111' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilelattheff` SET `120` = '$t120' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilelattheff` SET `250` = '$t250' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilelattheff` SET `500` = '$t500' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilelattheff` SET `3000` = '$t3000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilelattheff` SET `5000` = '$t5000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilelattheff` SET `12000` = '$t12000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilelattheff` SET `25000` = '$t25000' WHERE `id` = '1'");
    echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                    Chỉnh sửa tỉ lệ thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}
}
?>
                        <form method="POST">
                        <div class="card">
                            <div class="card-header">
                                <strong>Chỉnh sửa tỉ lệ (%)</strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">89 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="89" id="89" value="<?php echo $dulieu['89'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">111 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="111" id="111" value="<?=$dulieu['111'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">120 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="120" id="120" value="<?=$dulieu['120'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">250 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="250" id="250" value="<?=$dulieu['250'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">500 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="500" id="500" value="<?=$dulieu['500'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">3000 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="3000" id="3000" value="<?=$dulieu['3000'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">5000 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="5000" id="5000" value="<?=$dulieu['5000'];?>">
                                    </div>
                                  
                                </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">12000 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="12000" id="12000" value="<?=$dulieu['12000'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">25000 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="25000" id="25000" value="<?=$dulieu['25000'];?>">
                                    </div>
                                  </div>
                               
                       <button type="submit" class="btn btn-outline-success" name="submit" id="submit">Submit</button>
                            </div>
                             
                            </div>
                            </form>
                           
                        </div>
                    </div>
                 
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div></div>
<?php
require('end.php');