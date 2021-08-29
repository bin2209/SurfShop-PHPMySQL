
<?php 
include '../function/get_link_folder.php'; 
// HEADER
include($direct.'core/header.php');
// NAVBAR
include($direct.'core/navbar.php');
if (!isset($_SESSION['user_email'])){
	// header("Location: ../login/");
}

if (isset($_SESSION['user_email']) && isset($_SESSION['password'])) { 
	?>
	<?php  // LẤY USER DATA

	$stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
	$stmt->execute([$_SESSION['user_email']]);
	if ($stmt->rowCount() === 1) {
		$user = $stmt->fetch();
		$user_id = $user['id'];
		$user_email = $user['email'];
		$user_name = $user['name'];
		$user_avatar = $user['avatar'];
		$user_phone = $user['phone'];
		$user_about = $user['about'];
		$user_password = $user['password'];
	}
	?>




	<link href="../css/popup.css" rel="stylesheet">
	<section class=" store content-center" style="padding-top: 5em;">
		<div class="background-content">
			<div class="background-logo">
				<div class="logo-avt" style="width: auto;"><img src="<?php echo $user_avatar ?>"/></div>
			</div> 
			<h3 class="h3-dark content-center" style="padding-top:3em; width: auto; font-size:24px !important;"><?php echo $user_name ?></h3>
			<div class="infomation" style="width:auto;">
				<p><?php echo $user_about ?></p><hr>
				<i class="fas fa-envelope"></i> <p><?php echo $user_email ?></p><br>
				<i class="fas fa-phone-alt"></i> <p>
					<?php 
					if($user_phone == ''){
						echo 'None';
					} else
					if(isset($user_phone)){
						echo $user_phone;
					}  
					?>
				</p><br>
			</div>
			<div class="button-div">
				<button id="change-profile1" class="change-button"><i class="fas fa-pen" style=""></i> <?php echo $LANG_member_changeprofile; ?></button>
				<button id="change-profile2" class="change-button"><i class="fas fa-key" style=""></i> <?php echo $LANG_member_changepass; ?></button>
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
					<input type="text" name="change-name" value="<?php echo $user_name; ?>" required="true">
					<br>
					<label for="change-phone">Phone *</label>
					<br>
					<input type="text" name="change-phone" value="<?php echo $user_phone; ?>" required="true">
					<br>
					<label for="change-about">About </label>
					<br>
					<textarea name="change-about"><?php echo $user_about; ?></textarea>
					<br>
					<button type="submit" name="submit_change">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>

<?php

$user_id = $_SESSION['user_id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){ // Thay đổi thông tin cá nhân
	$value_of_form = $_POST['value_of_form'];
	if ($value_of_form == 'profile'){
		if (($_POST['change-name'] != $user_name)||($_POST['change-about']!= $user_about)||($_POST['change-phone']!= $user_phone) ) {
			$sql = 'UPDATE `user` SET `name`= "'.$_POST['change-name'].'", `about`="'.$_POST['change-about'].'", `phone`= "'.$_POST['change-phone'].'" WHERE  id="'.$user_id.'"';
			$stmt=$conn->prepare($sql);
			$result = $stmt->execute();
			if( $result ){
				echo '<script> window.location.reload();</script>';
			} 
			$stmt->free_result();
			$stmt->close();
		}
	} else if ($value_of_form == 'password') // Thay đổi mật khẩu 
	{ 
		$oldpw = $_POST["oldpw"];
		$newpw = password_hash($_POST["newpw"], PASSWORD_BCRYPT);
		$repeatpw = $_POST["repeatpw"];

		if (isset($oldpw) && isset($newpw) && isset($repeatpw)) // check space
		{	
		
			if (password_verify($oldpw, $user_password)) {
				$sql = 'UPDATE `user` SET `password`= "'.$newpw.'" WHERE  id="'.$user_id.'"';
				$stmt=$conn->prepare($sql);
				$result = $stmt->execute();
				if($result){
					// echo '<script> window.location.reload();</script>';
					echo '<script>Swal.fire(`Success!`, `Password was changed!`, `success` )</script>';
				} 
				$stmt->close();
			} else{
				echo '<script>Swal.fire(`Oops!`, `Old password not match`, `error` )</script>';
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
				<h1><?php echo $LANG_member_changepass; ?></h1>
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
<?php }

?>
