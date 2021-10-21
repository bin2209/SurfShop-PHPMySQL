<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('../TMQ/function.php'); 

$bank_id = trim(addslashes(htmlspecialchars($_POST['bank_id'])));
$holder_name = trim(addslashes(htmlspecialchars($_POST['holder_name'])));
$account_number = trim(addslashes(htmlspecialchars($_POST['account_number'])));
$brand = trim(addslashes(htmlspecialchars($_POST['brand'])));

$check= $db->query("SELECT * FROM `TMQ_bank`  WHERE `stk` = '$account_number' LIMIT 1")->fetch();

if(empty($bank_id) || empty($holder_name) || empty($account_number) || empty($brand)){
  echo'Vui lòng nhập đủ thông tin.';exit;   
}if($check[stk] == $account_number){
    echo'Thông tin đã tồn tại trên hệ thống.';exit;
}else{
    $db->exec("INSERT INTO `TMQ_bank` SET 
    `uid` = '$uid',
    `bank` = '".string_bank($bank_id)."' , 
    `ctk` = '$holder_name' , 
    `stk` = '$account_number' , 
    `chinhanh` = '$brand'
    ");
    echo'Thêm thành công.';exit;
}
    