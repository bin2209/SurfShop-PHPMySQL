<?php 
@session_start();
@require_once 'includes/header.php';
@require_once 'includes/navbar.php';

// if (!isset($_SESSION['user_email'])){
// 	echo "<script>window.top.location='login';</script>";
// 	exit;
// }

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
		$user_address = $user['address'];
		$user_type = $user['type'];
		$user_password = $user['password'];
	}

	// KHỞI TẠO LẦN ĐẦU VÀO BAG || CỘT BAG DB
	$stmt = $conn->prepare("SELECT * FROM bag WHERE email=?");
	$stmt->execute([$_SESSION['user_email']]);
	if ($stmt->rowCount() === 0) {
		$sql = "INSERT INTO bag(id, email, item_id,item,quantity) VALUES (0,'$user_email','','','')";
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
	<!-- VALIDATION -->
	<script type="text/javascript" src="<?=$_DOMAIN?>/assets/js/validate/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?=$_DOMAIN?>/assets/js/validate/validate.rules.js"></script>	

	<section class="content-center">
		<div class="background-content">
			<div class="member-information">
				<div class="logo-avt"><img src="<?php echo $user_avatar ?>"/></div>
				<h3 class="h3-dark content-center"><?php echo $user_name ?></h3>
			</div> 

			<div class="account-information">
				<div id="infomation" class="infomation " style="width:auto;">
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
					<span><i class="fas fa-shipping-fast"></i> <?php echo $LANG_address_delivery ?>:<p><?php echo $user_address ?>

				</p><span>
				</div>
				<div class="button-div">
					<button id="change-profile1" class="btn btn-primary"><i class="fas fa-pen" style=""></i> <?php echo $LANG_member_changeprofile; ?></button>
					<button id="change-profile2" class="btn btn-primary"><i class="fas fa-key" style=""></i> <?php echo $LANG_member_changepass; ?></button>
				</div>
			</div>
		</div> 
	</section>
</body>
<!-- PROFILE -->
<div class="pop-up pop-up-profile">
	<div class="content">
		<div class="container">
			<span class="close">close</span>
			<div class="title">
				<h1><?php echo $LANG_member_changeprofile; ?></h1>
			</div>
			<div  class="change-profile">
				<form method="POST" id="change-profile">
					<input type="text" style="display:none;"  name="value_of_form" value="profile">
					<label for="ChangeName"><?php echo $LANG_fullname; ?> *</label>
					<input type="text" name="ChangeName" value="<?php echo $user_name; ?>">
					<label for="ChangePhone"><?php echo $LANG_phone; ?> *</label>
					<input type="text" name="ChangePhone" value="<?php echo $user_phone; ?>">
					<label for="ChangeAddress"><?php echo $LANG_address_delivery; ?> </label>
					<textarea name="ChangeAddress" placeholder="Số nhà / Ngõ, - Phường - Quận -  Quốc gia"><?php echo $user_address; ?></textarea>
					<button  type="submit" class="btn btn-primary" name="submit_change"><?php echo $LANG_save; ?></button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- PASSWORD -->
<div class="pop-up pop-up-password">
	<div class="content">
		<div class="container">
			<span class="close">close</span>
			<div class="title">
				<h1><?php echo $LANG_member_changepass; ?></h1>
			</div>
			<div class="change-profile">
				<form method="POST" id="change-password">
					<input type="text" style="display:none;"  name="value_of_form" value="password" required="true">

					<label for="oldpw"><?php echo $LANG_oldpassword; ?> * </label>
					<input type="password" name="oldpw" placeholder="<?php echo $LANG_oldpassword; ?> " required="true">

					<label for="newpw"><?php echo $LANG_newpassword; ?> *</label>
					<input type="password" id="newpw" name="newpw" placeholder="<?php echo $LANG_newpassword; ?>" required="true">

					<label for="repeatpw"><?php echo $LANG_renewpassword; ?> * </label>
					<input type="password" name="repeatpw" placeholder="<?php echo $LANG_newpassword; ?>" required="true">

					<button type="submit" class="btn btn-primary" name="submit_change"><?php echo $LANG_save; ?></button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
$user_id = $_SESSION['user_id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
	// Thay đổi thông tin cá nhân
	$value_of_form = $_POST['value_of_form'];
	if ($value_of_form == 'profile'){
		if (($_POST['ChangeName'] != $user_name)||($_POST['ChangeAddress']!= $user_address)||($_POST['ChangePhone']!= $user_phone) ) {
			$sql = 'UPDATE `user` SET `name`= "'.$_POST['ChangeName'].'", `address`="'.$_POST['ChangeAddress'].'", `phone`= "'.$_POST['ChangePhone'].'" WHERE  id="'.$user_id.'"';
			$stmt=$conn->prepare($sql);
			$result = $stmt->execute();
			if($result){
				echo '<script>
				$("#infomation").load(location.href+" #infomation>*","");
				Swal.fire(`Success!`, `Profile was changed!`, `success`)
				</script>';
			} 
		}
	} 

	// Thay đổi mật khẩu 
	if ($value_of_form == 'password'){ 
		$oldpw = $_POST["oldpw"];
		$newpw = password_hash($_POST["newpw"], PASSWORD_BCRYPT);
		$repeatpw = $_POST["repeatpw"];
		if ($_POST["newpw"] != $repeatpw){
			echo '<script>Swal.fire(`Oops!`, `Repassword not match`, `error` )</script>';
		}else
		if (isset($oldpw) && isset($newpw) && isset($repeatpw)){	// check space
			if (password_verify($oldpw, $user_password)) {
				$sql = 'UPDATE `user` SET `password`= "'.$newpw.'" WHERE  id="'.$user_id.'"';
				$stmt=$conn->prepare($sql);
				$result = $stmt->execute();
				if($result){
					echo '<script>Swal.fire(`Success!`, `Password was changed!`, `success`)</script>';
				} 
			} else{
				echo '<script>Swal.fire(`Oops!`, `Old password not match`, `error` )</script>';
			}
		}else{
			echo '<script>Swal.fire(`Oops!`, `Please fill the field`, `error` )</script>';
		}
	}
}
?>

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
include('includes/footer.php');
?>

