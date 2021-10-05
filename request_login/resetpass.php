<?php
require_once  '../core/db_conn.php';
@require_once  '../mail/src/mail.php';
@require_once  '../mail/src/settings.php';
@require '../mail/vendor/autoload.php';
@require '../mail/src/mail.php';

$reset_expiry = 86400;  // time validity of reset key in seconds

if (isset($_POST['email_reset'])){
	$email_reset = $_POST['email_reset'];
	echo $email_reset;
	if (empty($email_reset)){
		header("Location: ../login?mailsent=empty");	
	}else{

		// thành công sent mail
		// lập code 
		$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
		$stmt->execute([$email_reset]);
		if ($stmt->rowCount() === 1) {
			//EMAIL TỒN TẠI -> LẬP CODE -> GỬI MAIL

			// KHỞI TẠO GIÁ TRỊ 
			$no_valid_key = ($row['pass_reset_key'] == '' || ($row['pass_reset_key'] != '' && $row['pass_reset_expiry'] < (time() - $reset_expiry)));
			$key = ($no_valid_key ? md5(microtime()) : $row['pass_reset_key']);
			$expiry = ($no_valid_key ? time() + $reset_expiry : $row['pass_reset_expiry']);


			// THÊM GIÁ TRỊ VÀO DB 
			$sql = "INSERT INTO mail(id, email, pass_reset_key, pass_reset_time) 
			VALUES 			('0','$email_reset','$key','$expiry')";



			$stmt=$conn->prepare($sql);
			$result = $stmt->execute();

			
			// SENT MAIL 	
			sentmail();
			// sendmail(array(
			// 	'to' => $row['email'],
			// 	'subject' => $Translation['password reset subject'],
			// 	'message' => $NoiDungMail
			// ));

			
			

			
			
			header("Location: ../login?mailsent=$email_reset");
		}else if($stmt->rowCount() < 1){
			//EMAIL KHÔNG TỒN TẠI -> FALSE
			header("Location: ../login?error=$email_reset không tồn tại.");
		}

	}
}
?>