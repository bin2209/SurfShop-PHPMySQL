<?php
session_start();
require_once( 'Facebook/autoload.php' );
require_once( 'config.php' );
require_once( '../core/db_conn.php' );

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
  $response = $fb->get('/me?fields=id,name,email,picture.width(720).height(720)', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}
// Logged in
$userFB = $response->getGraphUser();
$userFB_id = $userFB->getId();
$userFB_name = $userFB->getName();
// $userFB_email = $userFB->getEmail();
$userFB_pic = $userFB->getPicture();
$userFB_pic = $userFB_pic['url'];

// Từ đây bạn xử lý kiểm tra thông tin user trong database sau đó xử lý.
// Check bằng ID FACEBOOK 
$stmt = $conn->prepare("SELECT * FROM user WHERE facebook_id=?");
$stmt->execute([$userFB_id]);
if ($stmt->rowCount() === 1) {
    // Đã tồn tại ID trong db \\ LẤY DATA TRONG DB
    $user = $stmt->fetch();
    $user_id = $user["id"]; 
    $_SESSION['user_id'] = $user["id"]; 
    $_SESSION['user_email'] = $user["email"];
    $_SESSION['password'] = $user["password"];
    $_SESSION['login_id'] = $user["id"]; 
    $_SESSION['type'] = $user["type"]; 
    $_SESSION['avatar'] = $user["avatar"]; 
    $_SESSION['name'] = $user["name"]; 
    $_SESSION['login'] = true;
    $_SESSION['ipv4'] = $_SESSION['ipv4'];
    $_SESSION['fb_access_token'] = (string) $accessToken;
    // Trường hợp chưa đăng ký email ở Facebook 
    // Không lấy email ở Facebook nhưng phải cấp email tạm theo dạng ID+@lstsurf.com 
    // Sau đó set [xacthuc] = NULL rồi tiến hàng đổi lại email trong account 
    // echo "<script>window.top.location='../cart';</script>";
    header('Location: ../cart');
    exit;
}else{
    // ĐĂNG KÝ -> Cấp email mới dạng ID+@lstsurf.com xong rồi khách tự vào đổi lại email
    $_SESSION['BoNhoTam_name'] = $userFB_name;
    $_SESSION['BoNhoTam_email'] = $userFB_id.'@facebook.com';
    $_SESSION['BoNhoTam_pic'] = $userFB_pic;
    // echo "<script>window.top.location='../login.php?signup-error=Facebook Account - Enter new password&facebook_id=$userFB_id';</script>";
    header("Location: ../login?signup-error=Facebook Account - Enter new password&facebook_id=$userFB_id");
    exit;
}
// echo 'Name:'. $userFB_name;
// echo 'Email:' . $userFB_email;
// echo '<img src="'.$userFB_pic.'">';






?>