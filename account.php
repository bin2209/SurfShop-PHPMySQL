<?php 
@session_start();
$title = 'Member';
@require_once 'includes/header.php';
@require_once 'includes/navbar.php';


if (!isset($_SESSION['user_email'])){
	// header("Location: ../");
}

if (isset($_SESSION['user_email']) && isset($_SESSION['password'])) { 
	?>
	<?php  
	// LẤY USER DATA
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

	// KHỞI TẠO LẦN ĐẦU VÀO BAG || CỘT BAG DB
	$stmt = $conn->prepare("SELECT * FROM bag WHERE email=?");
	$stmt->execute([$_SESSION['user_email']]);
	if ($stmt->rowCount() === 0) {
		$sql = "INSERT INTO bag(id, email, item_id,item) VALUES (0,'$user_email','','')";
		$stmt=$conn->prepare($sql);
		$result = $stmt->execute();
	}

	// LẤY BAG DATA
	$stmt = $conn->prepare("SELECT * FROM bag WHERE email=?");
	$stmt->execute([$_SESSION['user_email']]);
	if ($stmt->rowCount() === 1) {
		$bag = $stmt->fetch();
		$bag_item = $bag['item'];
		$bag_item_id = $bag['item_id'];
	}
	
	?>
	<link href="../assets/css/account.css" rel="stylesheet">
	<link href="../assets/css/popup.css" rel="stylesheet">
	<section class="content-center">
		<div class="background-content">
			<div class="member-information">
				<div class="logo-avt"><img src="<?php echo $user_avatar ?>"/></div>
				<h3 class="h3-dark content-center"><?php echo $user_name ?></h3>
			</div> 

			<div class="account-information">
				<div class="infomation " style="width:auto;">
					<span><i class="fas fa-envelope"></i> <?php echo $LANG_email ?>: <p><?php echo $user_email ?></p></span><br>
					<span><i class="fas fa-phone-alt"></i> <?php echo $LANG_phone ?>: <p>
						<?php 
						if($user_phone == ''){
							echo 'None';
						} else
						if(isset($user_phone)){
							echo $user_phone;
						}  
						?>
					</p></span><br>
					<span><i class="fas fa-shipping-fast"></i> <?php echo $LANG_address_delivery ?>:<p><?php echo $user_about ?>
						
					</p><span>
				</div>
				<div class="button-div">
					<button id="change-profile1" class="btn btn-primary"><i class="fas fa-pen" style=""></i> <?php echo $LANG_member_changeprofile; ?></button>
					<button id="change-profile2" class="btn btn-primary"><i class="fas fa-key" style=""></i> <?php echo $LANG_member_changepass; ?></button>
				</div>

			</div>
			
		</div> <!--  // backgound content -->
	</section>
</body>



<div class="pop-up pop-up-profile">
	<div class="content">
		<div class="container">
			<span class="close">close</span>
			<div class="title">
				<h1><?php echo $LANG_member_changeprofile; ?></h1>
			</div>
			<div class="change-profile">
				<form method="POST">
					<input type="text" style="display:none;"  name="value_of_form" value="profile" required="true">
					<label for="change-name"><?php echo $LANG_fullname; ?> *</label>
					<br>
					<input type="text" name="change-name" value="<?php echo $user_name; ?>" required="true">
					<br>
					<label for="change-phone"><?php echo $LANG_phone; ?> *</label>
					<br>
					<input type="text" name="change-phone" value="<?php echo $user_phone; ?>" required="true">
					<br>
					<label for="change-about"><?php echo $LANG_address_delivery; ?> </label>
					<br>
					<textarea name="change-about" placeholder="Số nhà / Ngõ, - Phường - Quận -  Quốc gia"><?php echo $user_about; ?></textarea>
					<br>
					<button type="submit" class="btn btn-primary" name="submit_change"><?php echo $LANG_save; ?></button>
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
					<label for="change-password"><?php echo $LANG_oldpassword; ?> * </label>
					<br>
					<input type="password" name="oldpw" placeholder="<?php echo $LANG_oldpassword; ?> " required="true">
					<br>
					<label for="change-about"><?php echo $LANG_newpassword; ?> *</label>
					<br>
					<input type="password" name="newpw" placeholder="<?php echo $LANG_newpassword; ?>" required="true">
					<br>
					<label for="change-phone"><?php echo $LANG_renewpassword; ?> * </label>
					<br>
					<input type="password" name="repeatpw" placeholder="<?php echo $LANG_newpassword; ?>" required="true">
					<br>
					<button type="submit" class="btn btn-primary" name="submit_change"><?php echo $LANG_save; ?></button>
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
			$('.content-center').addClass('blur-filter');
			$('footer').addClass('blur-filter');
		});
		$('#change-profile2').click(function(){
			$('.pop-up-password').addClass('open');
			$('.content-center').addClass('blur-filter');
			$('footer').addClass('blur-filter');
		});

		$('.pop-up .content .close').click(function(){
			$('.pop-up').removeClass('open');
			$('.content-center').removeClass('blur-filter');
			$('footer').removeClass('blur-filter');
		});
	</script>
<?php }
?>
<?php include('includes/footer.php'); ?>

