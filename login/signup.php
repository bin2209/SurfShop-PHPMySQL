<?php 
session_start();
include 'db_conn.php';

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password'])) {


	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];


	if (empty($name)) {
			// MAIL TRÓNG
		header("Location: login.php?signup-error=Display name is required");
	}else if (empty($email)) { 
		header("Location: login.php?signup-error=Email is required&name=$name");
	}else if (empty($password)){
		// PASS TRÓNG
		header("Location: login.php?signup-error=Password is required&name=$name&email=$email");
	}else if (empty($re_password)){
		// REPASS TRÓNG
		header("Location: login.php?signup-error=Repeat password is required&name=$name&email=$email");
	}else if ($password != $re_password){
		// REPASS SAI
		header("Location: login.php?signup-error=Repeat password is not match&name=$name&email=$email");
	}else {
		$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
		$stmt->execute([$email]);
		if ($stmt->rowCount() === 1) {
			//EMAIL ĐÃ TỒN TẠI
			header("Location: login.php?signup-error=Email is already registered&name=$name&email=$email");
		} else{
			// THÀNH CÔNG
			$today = date("Y-m-d");
			$password=password_hash($_POST["password"], PASSWORD_BCRYPT);
			$sql = "
			INSERT INTO user(id, email, password, phone, name,avatar,sex,about,startdate,status) 
			VALUES 			('0','$email','$password','','$name','../img/default-user.png','0','','$today','0')";

			$stmt=$conn->prepare($sql);
			$result = $stmt->execute();
			if($result){
				// CHECK TỒN TẠI TIẾN THÀNH AUTO LOGIN
				$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
				$stmt->execute([$email]);
				if ($stmt->rowCount() === 1) {
					$user = $stmt->fetch();
					// KHỞI ĐỘNG GÁN BIẾN - KHỞI TẠO
					$_SESSION['user_id']= $user['id'];
					$_SESSION['user_email']= $user['email'];
					$_SESSION['password']= $user['password'];
					
					header("Location: ../member");
				}
			} 
			$stmt->close();
		}
	}
}
