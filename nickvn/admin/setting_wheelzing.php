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
                                   
                                    <li class="active">Cài đặt tỉ lệ vòng quay thẻ zing 20K</li>
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
$dulieu = $db->query("SELECT * FROM `HK_tilevongquaythezing`")->fetch();
if(isset($_POST['submit'])){
    $trat = ($_POST['trat']);
    $t20k = ($_POST['20k']);
    $t40k = ($_POST['40k']);
    $t50k = ($_POST['50k']);
    $t100k = ($_POST['100k']);
    $t200k = ($_POST['200k']);
    $t500k = ($_POST['500k']);
    $random = ($_POST['random']);
$tongcong = ($trat)+($t20k)+($t40k)+($t50k)+($t100k)+($t200k)+($t500k)+($random);
if (!$trat && !$t20k && !$t40k && !$t50k && !$t100k && !$t200k && !$t500k && !$random){
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
    $db->exec("UPDATE `HK_tilevongquaythezing` SET `0k` = '$trat' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquaythezing` SET `20k` = '$t20k' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquaythezing` SET `40k` = '$t40k' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquaythezing` SET `50k` = '$t50k' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquaythezing` SET `100k` = '$t100k' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquaythezing` SET `200k` = '$t200k' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquaythezing` SET `500k` = '$t500k' WHERE `id` = '1'");
    $db->exec("UPDATE `HK_tilevongquaythezing` SET `random` = '$random' WHERE `id` = '1'");
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
                                  
                                        <input class="form-control" name="trat" id="trat" value="<?php echo $dulieu['0k'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Thẻ 20K (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="20k" id="20K" value="<?=$dulieu['20k'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Thẻ 40K (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="40k" id="40k" value="<?=$dulieu['40k'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Thẻ 50K (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="50k" id="50k" value="<?=$dulieu['50k'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Thẻ 100K (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="100k" id="100k" value="<?=$dulieu['100k'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Thẻ 200K (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="200k" id="200k" value="<?=$dulieu['200k'];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Thẻ 500k (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="500k" id="500k" value="<?=$dulieu['500k'];?>">
                                    </div>
                                  
                                </div>
                                </div>
                                <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Ngẫu nhiên (%):</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="random" id="random" value="<?=$dulieu['random'];?>">
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