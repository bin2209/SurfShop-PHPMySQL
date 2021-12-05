<?php 
session_start();
include '../core/db_conn.php';
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];
	// NẾU TÀI KHOẢN LÀ FACEBOOK
	if (isset($_POST['profile_pic'])){
		$profile_pic = $_POST['profile_pic'];
		$xacthuc = 0;
		$facebook_id = $_POST['facebook_id'];;
	} else{
		$profile_pic = '../assets/img/default-user.png';
		$xacthuc = 0;
		$facebook_id = 0;
	}
	if (empty($name)) {
			// MAIL TRÓNG
		// header("Location: ../login.php?signup-error=Display name is required");
		echo "<script>window.top.location='../login.php?signup-error=Display name is required';</script>";
	}else if (empty($email)) { 
		// header("Location: ../login.php?signup-error=Email is required&name=$name");
		echo "<script>window.top.location='../login.php?signup-error=Email is required&name=$name';</script>";
	}else if (empty($password)){
		// PASS TRÓNG
		// header("Location: ../login.php?signup-error=Password is required&name=$name&email=$email");
		echo "<script>window.top.location='../login.php?signup-error=Password is required&name=$name&email=$email';</script>";
	}else if (empty($re_password)){
		// REPASS TRÓNG
		// header("Location: ../login.php?signup-error=Repeat password is required&name=$name&email=$email");
		echo "<script>window.top.location='../login.php?signup-error=Repeat password is required&name=$name&email=$email';</script>";
	}else if ($password != $re_password){
		// REPASS SAI
		// header("Location: ../login.php?signup-error=Repeat password is not match&name=$name&email=$email");
		echo "<script>window.top.location='../login.php?signup-error=Repeat password is not match&name=$name&email=$email';</script>";
	}else {
		$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
		$stmt->execute([$email]);
		if ($stmt->rowCount() === 1) {
			//EMAIL ĐÃ TỒN TẠI
			// header("Location: ../login.php?signup-error=Email is already registered&name=$name&email=$email");
			echo "<script>window.top.location='../login.php?signup-error=Email is already registered&name=$name&email=$email';</script>";
		} else{
			// THÀNH CÔNG
			$today = date("Y-m-d");
			$password=password_hash($_POST["password"], PASSWORD_BCRYPT);
			$sql = "
			INSERT INTO user(id, email, password, phone, name,avatar,type,address,startdate,status,facebook_id,xacthuc) 
			VALUES 			('0','$email','$password','','$name','$profile_pic','0','','$today','0','$facebook_id','$xacthuc')";
			$stmt=$conn->prepare($sql);
			$result = $stmt->execute();
			// TẠO GIỎ HÀNG MỚI
			$sqlbag = "
			INSERT INTO bag(id, email, item_id, item, quantity) 
			VALUES 			('0','$email','','','')";
			$stmt=$conn->prepare($sqlbag);
			$resultbag = $stmt->execute();

			if($result && $resultbag){
				// CHECK TỒN TẠI TIẾN THÀNH AUTO LOGIN
				$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
				$stmt->execute([$email]);
				if ($stmt->rowCount() === 1) {
					$user = $stmt->fetch();
					//KHỞI TẠO - GÁN BIẾN TOÀN CỤC KHỞI TẠO THÔNG TIN NGƯỜI DÙNG
					$_SESSION['user_id']= $user['id'];
					$_SESSION['user_email']= $user['email'];
					$_SESSION['password']= $user['password'];
					$_SESSION['user_phone']= $user['phone'];
					$_SESSION['user_address']= $user['address'];
					$_SESSION['type']= $user['type'];
					$_SESSION['avatar']= $user['avatar'];
					$_SESSION['name'] = $user['name'];
					$_SESSION['login'] = true;
					// header("Location: ../account");
					echo "<script>window.top.location='../account';</script>";
				}
			} 
		}
	}
}
