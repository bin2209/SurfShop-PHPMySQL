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
                                   
                                    <li class="active">Cài đặt shop</li>
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
if(isset($_POST['submit'])){
    $taikhoan = tmq_boc($_POST['taikhoan']);
    $pass = tmq_boc($_POST['pass']);
    $port = tmq_boc($_POST['port']);
    $db->exec("UPDATE `TMQ_setting` SET `text` = '$taikhoan' WHERE `key` = 'email'");
    $db->exec("UPDATE `TMQ_setting` SET `text` = '$pass' WHERE `key` = 'pass_email'");
    $db->exec("UPDATE `TMQ_setting` SET `text` = '$port' WHERE `key` = 'port'");
}
?>
                        <form method="POST">
                        <div class="card">
                            <div class="card-header">
                                <strong>Chỉnh sửa email</strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Tài khoản Email:</label>
                                    <div class="input-group">
                                  
                                        <input class="form-control" name="taikhoan" id="taikhoan" value="<?=caidat('email');?>">
                                    </div>
                                  
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Mật khẩu Email:</label>
                                    <div class="input-group">
                                        
                                        <input class="form-control" name="pass" id="pass" value="<?=caidat('pass_email');?>">
                                    </div>
                                  
                                </div>
                                
                                
                                 <div class="form-group">
                                    <label class=" form-control-label">Port</label>
                                    <div class="input-group">
                                        <input class="form-control" name="port" id="port" value="<?=caidat('port');?>">
                                    </div>
                                  
                                </div>
                                
                               
                            
                        <button type="submit" class="btn btn-outline-success" name="submit" id="submit">Submit</button>
                            </div>
                             <h2 style="color:red;">Đảm bảo rằng các bạn đã bật các mục sau trong tài khoản gmail:</h2>
                            <h3>Bật quyền truy cập kém an toàn.</h3>
                            <h3>Tắt hết trạng thái bảo mật.</h3>
                            <h3>Cho phép truy cập vào tài khoản google của bạn <a href="https://accounts.google.com/DisplayUnlockCaptcha">TẠI ĐÂY</a></h3>
                            </div>
                            </form>
                           
                        </div>
                    </div>
                 
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div></div>
<?php
require('end.php');