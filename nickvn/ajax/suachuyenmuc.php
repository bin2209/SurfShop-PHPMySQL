<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('../TMQ/function.php'); ?>
<?php
if(!empty($uid)){
    if($TMQ["admin"] == 9){
        $id = intval($_POST['id']);
    $name = trim(addslashes(htmlspecialchars($_POST['name'])));
    $img = trim(addslashes(htmlspecialchars($_POST['img'])));
    $thongbao = tmq_boc($_POST['thongbao']);
    $info1 = tmq_boc($_POST["info1"]);
    $info2 = tmq_boc($_POST["info2"]);
    $info3 = tmq_boc($_POST["info3"]);
    $info4 = tmq_boc($_POST["info4"]);
    if(empty($name) || empty($img)){
         echo' <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                     Vui lòng nhập đủ thông tin
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}else{
 $db->exec("UPDATE `TMQ_chuyenmuc` SET
 `ten` = '$name',
 `img` = '$img',
 `trangthai` = 'on',
 `thongbao` = '$thongbao',
 `thongtin_1` = '$info1',
 `thongtin_2` = '$info2',
 `thongtin_3` = '$info3',
 `thongtin_4` = '$info4',
 `date` = '".date('Y-m-d')."'
 WHERE `id` = '" . $id . "' ");   
  echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                      Chuyên mục '.$name.' đã sửa thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}

    }
}
    
