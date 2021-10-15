<?php
	// Nhận request từ sent mail về | Mục đích: check code từ email trong database
	// Nếu khớp thì hiện lên trang thay đổi pass
	// Bảo mật:  Làm trang đổi pass ngay trong file này | vì nếu lấy được file sẽ đổi tùy tiện
session_start();
require_once '../core/db_conn.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

if (isset($_GET['email'])&&isset($_GET['code'])){
	$reset_expiry = 300; // Thời gian mặc định hết hạn 5p 60x5=300 ~ Mặc định 300
	$expiry_limit = time() - $reset_expiry; // give an extra tolerence of 10 minutes
	$email = $_GET['email'];
	$code = $_GET['code'];

	$stmt = $conn->prepare("SELECT * FROM mail WHERE email=?");
	$stmt->execute([$email]);

	if ($stmt->rowCount() === 1) {
		$user = $stmt->fetch();

		$pass_reset_expiry = $user['pass_reset_expiry'];
		$pass_reset_key = $user['pass_reset_key'];
		if ($pass_reset_expiry>$expiry_limit){ // còn thời gian để check
			if ($code===$pass_reset_key){
				?>
				<link rel="stylesheet" href="../../assets/css/login.css" /> 
				<section>
					<div class="wrapper-login">
						<div class="sign-panels">
							<!-- LOGIN -->
							<div class="login">
								<div class="title">
									<span><?php echo $LANG_member_changepass ?></span>
								</div>
								<br>
								<form method="post">
									<input style="color:#12804d; border: 1.5px solid;" type="email" name="email" placeholder="Email" value="<?php echo $email ?>" readonly>
									<input type="password" name="password" placeholder="<?php echo $LANG_newpassword ?>">
									<input type="password" name="re_password" placeholder="<?php echo $LANG_renewpassword ?>">
									<br>
									<button class="btn-signin-submit" type="submit"><?php echo $LANG_member_changepass ?></button>
								</form>
							</div>
						</div>
					</div>
				</section>


				<?php 
				if(isset($_POST['password']) && isset($_POST['re_password'])){
					$password = $_POST['password'];
					$re_password = $_POST['re_password'];
					if (empty($password)){
						echo '<script>alert("Password is required");</script>';
					}else if (empty($re_password)){
						echo '<script>alert("Repeat password is required");</script>';
					}else if ($password != $re_password){
						echo '<script>alert("Repeat password is not match");</script>';
					}else{
						$password=password_hash($_POST["password"], PASSWORD_BCRYPT);
						$sql = 'UPDATE `user` SET `password`= "'.$password.'" WHERE email="'.$email.'"';
						$stmt=$conn->prepare($sql);
						$result = $stmt->execute();
						if($result){
							// Xóa thông tin ở bảng mail
							$stmt = $conn->prepare("DELETE FROM mail WHERE email=?");
							$stmt->execute([$email]);
							echo "<script>window.location.href='../../login.php?success=Thay đổi mật khẩu thành công';</script>";
						} 
					}
				}

			}else{
				echo "<script>window.location.href='../../login.php?error=Mã xác thực không chính xác $email';</script>";
			}
		}else{
			echo "<script>window.location.href='../../login.php?error=Hết thời gian yêu cầu của $email';</script>";
		}
		// echo $pass_reset_expiry;
		// echo $pass_reset_key;
	}else{
		echo "<script>window.location.href='../../login.php?error=Không tồn tại yêu cầu của $email';</script>";
	}
}else{
	echo "<script>window.location.href='../../login.php';</script>";
}
require_once '../includes/footer.php';
?>