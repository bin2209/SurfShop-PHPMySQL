<?php 
include '../function/get_link_folder.php'; 
// HEADER
include($direct.'core/header.php');
// NAVBAR
include($direct.'core/navbar.php');
?>

	<link href="../css/popup.css" rel="stylesheet">

	<section class=" store content-center" style="padding-top: 5em;">
		<h1 class="surf-h2-dark content-center">Hi 
			<?php 
			if ($logged==0) header("location:../login");
			// if(!isset($_SESSION['login_user'])){
			// 	header("location:../login");
			// } else{
			// 	echo $_SESSION['login_user'].' ! ';
			// }

			?>
		</h1>
		<br>
		<div class="background-content"><!--  // backgound content -->
			<div class="background-logo"><!--  // backgound image-logo & infomation -->

				<?php 
				if ($logged==1){
					$user_check = $_SESSION['login_user'];
					$sql= 'SELECT * FROM `user` WHERE username="'.$user_check.'"';
					$result = mysqli_query($db,$sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$name = $row["name"];
							$email = $row["email"];
							$phone = $row["phone"];
							$about = $row["about"];
							$serverpass = $row["password"];
							echo '<div class="logo-avt" style="width: auto;"><img src="'.$row["avatar"].'"/></div>';
							echo '</div>'; // backgound image-logo & infomation
							echo  '<h3 class="h3-dark content-center" style="padding-top:3em; width: auto; font-size:24px !important;">' . $row["name"]. '</h3>';
							echo '<div class="infomation" style="width:auto;">';
							echo '<p>'. $row["about"].'</p><hr>';
							echo '<i class="fas fa-envelope"></i> <p>'. $row["email"].'</p><br>';
							echo '<i class="fas fa-phone-alt"></i> <p>'. $row["phone"].'</p><br>';
						echo '</div>'; // infomation
					}
				} else {
					echo "0 results";
				}
			}
			?>

			<div class="button-div">
				<button id="change-profile1" class="change-button"><i class="fas fa-pen" style=""></i> Edit Your Profile</button>
				<button id="change-profile2" class="change-button"><i class="fas fa-key" style=""></i> Change Password</button>
			</div>

			
			
			<h3 class="h3-dark content-center" style="font-size:20px; font-weight:bold;padding-top:1.5em; width: auto;">Your Order</h3>
			
			<div class="order">
				<span class="order-span"></span>
			</div>


		</div> <!--  // backgound content -->
		

		

		<style type="text/css">


		section{
			background: #f0f2f5 !important;
		}
		hr{
			width: 40%;
			max-width: 400px;
		}
		.change-profile, .change-password {
			letter-spacing: -0.016em;
			text-align: center ;
			margin-right: auto;
			margin-left: auto;
		}
		.change-profile label{
			position: relative;
			left: 10%;
			float: left;
			font-size: 16px;
			font-weight: 600;
		}
		.change-profile input,textarea{
			width: 65%;
			min-width: 222px;
			font-size: 16px;
			position: relative;
			font-family: "SF Pro Text","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
			color: #191919;
			display: inline;
			padding: 10px 20px;
			border: 1px solid #ccc;
			margin: 4px;
			border-radius: 28px;
		}
		.change-profile textarea:hover{
			border-color: dimgray;
		}

		
		.change-profile input:hover{
			border-color: dimgray;
		}

		
		.order{
			margin-top: 1em;
			width: 40%;
			min-width: 400px;
			margin-left: auto;
			margin-right: auto;
			background: black;
		}
		.background-content{
			box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
			padding: 10px;
			border: 0px solid;
			border-radius: 2em;
			width: 70%;
			max-width: 1200px;
			min-width: 320px;
			margin-left: auto;
			background: white;
			margin-right: auto;
		}
		.background-logo{
			border-radius: 1.5em;
			background: rgb(0,0,8);
			background: linear-gradient(0deg, rgba(0,0,8,1) 0%, rgba(3,4,5,0.8911939775910365) 4%, rgba(252,252,252,0) 100%);
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;

		}
		.cover-img{
			background: black;
			width: 60%;
		}
		.button-div button{
			min-width: 200px;
			padding: 10px 6px;
			font-size: 16px;
			border: 0px solid;
			border-radius: 3px;
			color: white;
			font-weight: bold;
			background: #0071e3;
			margin: 10px;
		}

		.button-div button:hover{
			background: #0077ed;
		}
		.button-div button:active{
			background: #006edb;
		}
		.change-profile button{
			margin-right: auto;
			margin-left: auto;
			padding: 10px 33px;
			font-size: 16px;
			border: 0px solid;
			border-radius: 3px;
			color: white;
			font-weight: bold;
			background: #0071e3;
			margin-top: 10px;
			width: 40%;
		}
		.infomation i{
			display: inline;
			font-size: 16px;
		}
		.infomation p {
			display: inline;
			font-size: 16px;
			line-height: 1.4;
		}

		.logo-avt img{
			position: relative;
			top: 4em;
			padding: .25rem;
			background-color: #f5f6f9;
			border: 1px solid #dee2e6;
			max-width: 100%;
			height: auto;
			width: 150px;
			border-radius: 50%;
		}
	</style>
</section>

<?php include($direct.'core/footer.php'); ?>
</body>
<div class="pop-up pop-up-profile">
	<div class="content">
		<div class="container">
			<span class="close">close</span>
			<div class="title">
				<h1>Profile</h1>
			</div>
			<div class="change-profile">
				<form method="POST">
					<input type="text" style="display:none;"  name="value_of_form" value="profile" required="true">
					<label for="change-name">Full Name *</label>
					<br>
					<input type="text" name="change-name" value="<?php echo $name; ?>" required="true">
					<br>
					<label for="change-phone">Phone *</label>
					<br>
					<input type="text" name="change-phone" value="<?php echo $phone; ?>" required="true">
					<br>
					<label for="change-about">About </label>
					<br>
					<textarea name="change-about"><?php echo $about; ?></textarea>
					<br>
					<button type="submit" name="submit_change">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>

<?php

$user_check = $_SESSION['login_user'];
if($_SERVER["REQUEST_METHOD"] == "POST"){ // Thay đổi thông tin cá nhân
	$value_of_form = $_POST['value_of_form'];

	if ($value_of_form == 'profile'){
		if (($_POST['change-name'] != $name)||($_POST['change-about']!= $about)||($_POST['change-phone']!= $phone) ) {
			$sql = 'UPDATE `user` SET `name`= "'.$_POST['change-name'].'", `about`="'.$_POST['change-about'].'", `phone`= "'.$_POST['change-phone'].'" WHERE  username="'.$user_check.'"';
			echo $sql;
			if (mysqli_query($db,$sql)){
				echo '<script> window.location.reload();</script>';
			}
		} 
	} else if ($value_of_form == 'password') // Thay đổi mật khẩu 
	{ 
		$oldpw = $_POST["oldpw"];
		$newpw = $_POST["newpw"];
		$repeatpw = $_POST["repeatpw"];
		if (($oldpw == '')||($newpw== '')||($repeatpw== '')) // check space
		{
			echo '<script> alert("Need to enter something");</script>';
		} else if ($serverpass!=$oldpw){
			echo 'Old password not match';
		} else if (strlen($newpw)<=8){
			echo 'Password more 8 character';
		} else if($newpw!=$repeatpw){
			echo 'Repeat password not match'; 
		} else{
			$sql = 'UPDATE `user` SET `password`= "'.$newpw.'" WHERE  username="'.$user_check.'"';
			echo $sql;
			if (mysqli_query($db,$sql)){
				echo 'Success'; 
				echo '<script> window.location.reload();</script>';
			}
		}
	}
}
?>
<div class="pop-up pop-up-password">
	<div class="content">
		<div class="container">
			<span class="close">close</span>
			<div class="title">
				<h1>Change Password</h1>
			</div>

			<div class="change-profile">
				<form method="POST">
					<input type="text" style="display:none;"  name="value_of_form" value="password" required="true">
					<label for="change-password">Old Password * </label>
					<br>
					<input type="password" name="oldpw" placeholder="Old Password" required="true">
					<br>
					<label for="change-about">New Password *</label>
					<br>
					<input type="password" name="newpw" placeholder="New Password" required="true">
					<br>
					<label for="change-phone">Repeat New Password * </label>
					<br>
					<input type="password" name="repeatpw" placeholder="Repeat New Password" required="true">
					<br>
					<button type="submit" name="submit_change">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
</html>
<script type="text/javascript">
		//POPUP
		$('#change-profile1').click(function(){
			$('.pop-up-profile').addClass('open');
			$('.store').addClass('blur-filter');
			$('footer').addClass('blur-filter');
		});
		$('#change-profile2').click(function(){
			$('.pop-up-password').addClass('open');
			$('.store').addClass('blur-filter');
			$('footer').addClass('blur-filter');
		});

		$('.pop-up .content .close').click(function(){
			$('.pop-up').removeClass('open');
			$('.store').removeClass('blur-filter');
			$('footer').removeClass('blur-filter');
		});
	</script>
