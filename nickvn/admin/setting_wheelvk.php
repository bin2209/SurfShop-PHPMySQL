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
                                   
                                    <li class="active">Cài đặt tỉ lệ vòng quay vũ khí ước mơ</li>
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
$dulieu = $db->query("SELECT * FROM `HK_tilevongquayvk`")->fetch();
if(isset($_POST['submit'])){
    $t100 = ($_POST['100']);
    $t250 = ($_POST['250']);
    $t470 = ($_POST['470']);
    $t1000 = ($_POST['1000']);
    $t3000 = ($_POST['3000']);
    $t5000 = ($_POST['5000']);
    $t11999 = ($_POST['11999']);
    $t50 = ($_POST['50']);
$tongcong = ($t100)+($t250)+($t470)+($t1000)+($t3000)+($t5000)+($t11999)+($t50);
if (!$t100 && !$t250 && !$t470 && !$t1000 && !$t3000 && !$t5000 && !$t11999 && !$t50){
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
    $db->exec("UPDATE `HK_tilevongquayvk` SET `100` = '$100' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayvk` SET `250` = '$t250' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayvk` SET `470` = '$t470' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayvk` SET `1000` = '$t1000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayvk` SET `3000` = '$t3000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayvk` SET `5000` = '$t5000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayvk` SET `11999` = '$t11999' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayvk` SET `50` = '$t50' WHERE `id` = '1'");
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
                                    <label class=" form-control-label">100 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="trat" id="trat" value="<?php echo $dulieu['trat'];?>">
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
                                    <label class=" form-control-label">470 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="470" id="470" value="<?=$dulieu['470'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">1000 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="1000" id="1000" value="<?=$dulieu['1000'];?>">
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
                                    <label class=" form-control-label">11999 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="11999" id="11999" value="<?=$dulieu['11999'];?>">
                                    </div>
                                  
                                </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">50 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="50" id="50" value="<?=$dulieu['50'];?>">
                                    </div>
                                  </div>
                                </div>
                               
                       <button type="submit" class="btn btn-outline-success" name="submit" id="submit">Sửa</button>
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