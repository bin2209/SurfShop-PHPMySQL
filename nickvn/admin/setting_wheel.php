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
                                   
                                    <li class="active">Cài đặt tỉ lệ vòng quay FreeFire 17K</li>
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
$dulieu = $db->query("SELECT * FROM `HK_tilevongquayff`")->fetch();
if(isset($_POST['submit'])){
    $trat = ($_POST['trat']);
    $t80 = ($_POST['80']);
    $t150 = ($_POST['150']);
    $t250 = ($_POST['250']);
    $t1000 = ($_POST['1000']);
    $t1500 = ($_POST['1500']);
    $t3000 = ($_POST['3000']);
    $t5000 = ($_POST['5000']);
$tongcong = ($trat)+($t80)+($t150)+($t250)+($t1000)+($t1500)+($t3000)+($t5000);
if (!$trat && !$t80 && !$t150 && !$t250 && !$t1000 && !$t1500 && !$t3000 && !$t5000){
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
    $db->exec("UPDATE `HK_tilevongquayff` SET `trat` = '$trat' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayff` SET `80` = '$t80' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayff` SET `150` = '$t150' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayff` SET `250` = '$t250' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayff` SET `1000` = '$t1000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayff` SET `1500` = '$t1500' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayff` SET `3000` = '$t3000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquayff` SET `5000` = '$t5000' WHERE `id` = '1'");
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
                                    <label class=" form-control-label">Trật (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="trat" id="trat" value="<?php echo $dulieu['trat'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">80 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="80" id="80" value="<?=$dulieu['80'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">150 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="150" id="150" value="<?=$dulieu['150'];?>">
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
                                    <label class=" form-control-label">1000 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="1000" id="1000" value="<?=$dulieu['1000'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">1500 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="1500" id="1500" value="<?=$dulieu['1500'];?>">
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