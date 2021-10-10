<?php 
session_start();
require_once  '../core/db_conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($email)) {
		header("Location: ../login.php?error=Email is required");
		exit;
	}else if (empty($password)){
		header("Location: ../login.php?error=Password is required&email=$email");
		exit;
	}else {
		$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
		$stmt->execute([$email]);

		if ($stmt->rowCount() === 1) {
			$user = $stmt->fetch();

			$user_id = $user['id'];
			$user_email = $user['email'];
			$user_password = $user['password'];
			$user_type= $user['type'];
			$user_avatar= $user['avatar'];
			$user_name= $user['name'];
			if ($email === $user_email) {
				if (password_verify($password, $user_password)) {
					// GÁN BIẾN TOÀN CỤC KHỞI TẠO THÔNG TIN NGƯỜI DÙNG
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_email'] = $user_email;
					$_SESSION['password'] = $user_password;
					$_SESSION['type'] = $user_type;
					$_SESSION['avatar'] = $user_avatar;
					$_SESSION['name'] = $user_name;
					
					header("Location: ../account");
					exit;
				}else {
					header("Location: ../login.php?error=Incorect User name or password&email=$email");
					exit;
				}
			}else {
				header("Location: ../login.php?error=Incorect User name or password&email=$email");
				exit;
			}
		}else {
			header("Location: ../login.php?error=Incorect User name or password&email=$email");
			exit;
		}
	}
}
