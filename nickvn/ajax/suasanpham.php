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
    $id = trim(addslashes(htmlspecialchars(intval($_POST['id']))));
    $taikhoan = trim(addslashes(htmlspecialchars($_POST['taikhoan'])));
    $matkhau = trim(addslashes(htmlspecialchars($_POST['matkhau'])));
    $loainick = trim(addslashes(htmlspecialchars($_POST['loainick'])));
    $giatien = abs(intval($_POST['giatien']));
    $thongtin = trim(addslashes(htmlspecialchars($_POST['thongtin'])));
    $img = trim(addslashes(htmlspecialchars($_POST['img'])));
    $info1 = tmq_boc($_POST["thongtin1"]);
    $info2 = tmq_boc($_POST["thongtin2"]);
    $info3 = tmq_boc($_POST["thongtin3"]);
    $info4 = tmq_boc($_POST["thongtin4"]);
    
    //kiểm tra uid
    $check = $db->query("SELECT * FROM `TMQ_baiviet` WHERE `id` = '$id'")->fetch();
    if($check["uid"] == $uid){
if(empty($taikhoan) || empty($matkhau) ||empty($giatien) ||empty($thongtin) ||empty($img))    {
    echo'<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                       Vui lòng nhập đủ thông tin cần thiết.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}else{
    $db->exec("UPDATE `TMQ_baiviet` SET
    `uid` = '$uid',
    `taikhoan` = '$taikhoan',
    `matkhau` = '$matkhau',
    `loainick` = '$loainick',
    `giatien` = '$giatien',
    `thongtin` = '$thongtin',
    `thongtin_1` = '$info1',
    `thongtin_2` = '$info2',
    `thongtin_3` = '$info3',
    `thongtin_4` = '$info4',
    `img` = '$img',
    `time` = '". date('H:i:s d-m-Y') ."'
    WHERE `id` = '$id'
    ");
    echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                       Tài khoản đã được sửa thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                }
       }
}
