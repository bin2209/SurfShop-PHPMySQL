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
                                   
                                    <li class="active">Cài đặt tỉ lệ vòng quay Bingo</li>
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
$dulieu = $db->query("SELECT * FROM `HK_tilebingo`")->fetch();
if(isset($_POST['submit'])){
    $trat = ($_POST['trat']);
    $t250 = ($_POST['250']);
    $t350 = ($_POST['350']);
    $t5000 = ($_POST['5000']);
    $t8000 = ($_POST['8000']);
    $t10000 = ($_POST['10000']);
    $t1000 = ($_POST['1000']);
    $t2000 = ($_POST['2000']);
    $t40 = ($_POST['40']);
    $t80 = ($_POST['80']);
    $t100 = ($_POST['100']);
$tongcong = ($trat)+($t250)+($t350)+($t5000)+($t8000)+($t10000)+($t1000)+($t2000) + ($t40) + ($t80) + ($t100);
if (!$trat && !$t250 && !$t350 && !$t5000 && !$t8000 && !$t10000 && !$t1000 && !$t2000 && !$t40 && !$t80 && !$t100){
    echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                     Vui lòng điền đầy đủ thông tin!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}
else{
    $db->exec("UPDATE `HK_tilebingo` SET `trat` = '$trat' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilebingo` SET `250` = '$t250' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilebingo` SET `350` = '$t350' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilebingo` SET `5000` = '$t5000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilebingo` SET `8000` = '$t8000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilebingo` SET `10000` = '$t10000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilebingo` SET `1000` = '$t1000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilebingo` SET `2000` = '$t2000' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilebingo` SET `40` = '$t40' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilebingo` SET `80` = '$t80' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilebingo` SET `100` = '$t100' WHERE `id` = '1'");
    
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
                            <div class="card-header">
                                <strong>Lưu ý: Tổng các tỉ lệ phải cộng lại = 100 (%),nếu không vòng quay đôi lúc sẽ bị lỗi.</strong>
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
                                    <label class=" form-control-label">250 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="250" id="250" value="<?=$dulieu['250'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">350 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="350" id="350" value="<?=$dulieu['350'];?>">
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
                                    <label class=" form-control-label">8000 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="8000" id="8000" value="<?=$dulieu['8000'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">10000 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="10000" id="10000" value="<?=$dulieu['10000'];?>">
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
                                    <label class=" form-control-label">2000 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="2000" id="2000" value="<?=$dulieu['2000'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">40 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="40" id="40" value="<?=$dulieu['40'];?>">
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
                                    <label class=" form-control-label">100 Kim Cương (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="100" id="100" value="<?=$dulieu['100'];?>">
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