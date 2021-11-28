<?php
require_once  '../core/db_conn.php';
require_once '../mail/vendor/autoload.php';
require_once  '../mail/src/mail.php';

// time validity of reset key in seconds | 10 phút x 60 = 600 | Thời gian hết hạn 
$reset_expiry = 600;  

function rowCountTable($table,$email_reset,$conn){
	$stmt = $conn->prepare("SELECT * FROM $table WHERE email=?");
	$stmt->execute([$email_reset]);
	return $stmt->rowCount();
}

if (isset($_POST['email_reset'])){
		$expiry_limit = time() - $reset_expiry; 
		$email_reset = $_POST['email_reset'];
		// echo $email_reset;
		if (empty($email_reset)){
			// header("Location: ../login?mailsent=empty");	
			echo "<script>window.top.location='../login?mailsent=empty';</script>";
		}else{
			if (rowCountTable('user',$email_reset,$conn) === 1) {
				//EMAIL TỒN TẠI -> LẬP CODE -> GỬI MAIL

				
				// KHỞI TẠO GIÁ TRỊ 
				
				$key = md5(microtime());
				$expiry =  time() + $reset_expiry;

				// Gán nội dung mail | Có thể set $LANG theo cookie

				$addAddress_email = $email_reset;
				$Subject_name = 'Reset Password Notification';
				// $File_html_content = '../mail/src/content/reset_pass.html';

				// determine password reset URL
				$ResetLink = $_DOMAIN."/verifyReset/$email_reset/$key";
				

				$NoiDungMail = file_get_contents('../mail/src/content/reset_pass.html');

				$NoiDungMail = str_replace('<DISPLAY_NAME>', $email_reset, $NoiDungMail);
				$NoiDungMail = str_replace('<RESET_LINK>', $ResetLink, $NoiDungMail);
				
				$File_html_content = $NoiDungMail;
				// echo $File_html_content;

				// SENT MAIL || THÊM GIÁ TRỊ VÀO DB 
				if (sentmail($File_html_content,$addAddress_email,$Subject_name)==1){
					$rowCountTableMail = rowCountTable('mail',$email_reset,$conn);
					if($rowCountTableMail===0){
						$sql = "INSERT INTO mail(id, email, pass_reset_key, pass_reset_expiry) 
						VALUES 					('0','$email_reset','$key','$expiry')";
						$stmt=$conn->prepare($sql);
						$result = $stmt->execute();
					}else if ($rowCountTableMail===1){
						$stmt = $conn->prepare("UPDATE mail SET pass_reset_key = '$key', pass_reset_expiry = '$expiry' WHERE email=?");
						$stmt->execute([$email_reset]);
					}
					echo "<script>window.top.location='../login.php?mailsent=".$email_reset."';</script>";
					// exit;
				}

			}else if(rowCountTable('user',$email_reset,$conn) < 1){
			//EMAIL KHÔNG TỒN TẠI -> FALSE
				echo "<script>window.top.location='../login.php?error=$email_reset không tồn tại.';</script>";
				// header("Location: ../login.php?error=$email_reset không tồn tại.");
				// exit;
			}

		}
	}
?>