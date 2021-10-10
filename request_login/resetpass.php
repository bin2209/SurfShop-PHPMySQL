<?php
require_once  '../core/db_conn.php';

require_once '../mail/vendor/autoload.php';
require_once  '../mail/src/mail.php';

$reset_expiry = 86400;  // time validity of reset key in seconds

if (isset($_POST['email_reset'])){
		$expiry_limit = time() - $reset_expiry - 900; // give an extra tolerence of 15 minutes
		$email_reset = $_POST['email_reset'];
		// echo $email_reset;
		if (empty($email_reset)){
			header("Location: ../login?mailsent=empty");	
		}else{

		// thành công sent mail
		// check user exist || TABLE: user
			$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
			$stmt->execute([$email_reset]);
			

			if ($stmt->rowCount() === 1) {
				//EMAIL TỒN TẠI -> LẬP CODE -> GỬI MAIL
				$stmt = $conn->prepare("SELECT * FROM mail WHERE email=?");
				$stmt->execute([$email_reset]);
				$row = $stmt->fetch();
				// KHỞI TẠO GIÁ TRỊ 

				$no_valid_key = ($row['pass_reset_key'] == '' || ($row['pass_reset_key'] != '' && $row['pass_reset_expiry'] < (time() - $reset_expiry)));
				$key = ($no_valid_key ? md5(microtime()) : $row['pass_reset_key']);
				$expiry = ($no_valid_key ? time() + $reset_expiry : $row['pass_reset_expiry']);


				// THÊM GIÁ TRỊ VÀO DB 
				




				$File_html_content = '../mail/src/content/reset_pass.html';
				// SENT MAIL 
				if (sentmail($File_html_content)==1){
					$sql = "INSERT INTO mail(id, email, pass_reset_key, pass_reset_expiry) 
									VALUES 			('0','$email_reset','$key','$expiry')";
					$stmt=$conn->prepare($sql);
					$result = $stmt->execute();
					// header("Location: ../login.php?mailsent=$email_reset");	
				}



			}else if($stmt->rowCount() < 1){
			//EMAIL KHÔNG TỒN TẠI -> FALSE
				header("Location: ../login?error=$email_reset không tồn tại.");
			}

		}
	}
?>