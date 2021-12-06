<?php 
if (isset($_SESSION['user_email']) && isset($_SESSION['password'])) { ?>
	<link href="../assets/css/account.css" rel="stylesheet">
	<link href="../assets/css/popup.css" rel="stylesheet">
	<!-- VALIDATION -->
	<script type="text/javascript" src="<?=$_DOMAIN?>/assets/js/validate/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?=$_DOMAIN?>/assets/js/validate/validate.rules.js"></script>	
	<section class="content-center">
		<div class="background-content">
			<div class="member-information">
				<div class="logo-avt"><img src="<?=$_SESSION['avatar']?>"/></div>
				<h3 class="h3-dark content-center"><?=$_SESSION['name']?></h3>
			</div> 

			<div class="account-information">
				<div id="infomation" class="infomation " style="width:auto;">
					<span><i class="fas fa-envelope"></i> <?=$LANG_email?>: <p><?=$_SESSION['user_email']?></p></span><br>
					<span><i class="fas fa-phone-alt"></i> <?=$LANG_phone?>: <p>
						<?php 
						if($_SESSION['user_phone'] == ''){
							echo 'None';
						}else{
							echo $_SESSION['user_phone'];
						}  
						?>
					</p></span><br>
					<span><i class="fas fa-shipping-fast"></i> <?php echo $LANG_address_delivery ?>:<p><?=$_SESSION['user_address']?>

				</p><span>
				</div>
				<div class="button-div">
					<button id="change-profile1" class="btn btn-primary"><i class="fas fa-pen" style=""></i> <?php echo $LANG_member_changeprofile; ?></button>
					<?php if (!isset($_SESSION['fb_access_token'])){?>
					<button id="change-profile2" class="btn btn-primary"><i class="fas fa-key" style=""></i> <?php echo $LANG_member_changepass; ?></button> <?php 
					}?>
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
					<input type="text" name="ChangeName" value="<?php echo $_SESSION['name']; ?>">
					<label for="ChangePhone"><?php echo $LANG_phone; ?> *</label>
					<input type="text" name="ChangePhone" value="<?php echo $_SESSION['user_phone']; ?>">
					<label for="ChangeAddress"><?php echo $LANG_address_delivery; ?> </label>
					<!-- <textarea name="ChangeAddress" placeholder="Số nhà / Ngõ, - Phường - Quận -  Quốc gia"><?php echo $_SESSION['user_address']; ?></textarea>
				 -->
					<select style="width: -webkit-fill-available;" class="Delivery-address-select" type="text" name="calc_shipping_provinces"
						placeholder="Province *">
					</select>
					<select style="width: -webkit-fill-available;" class="Delivery-address-select" type="text" name="calc_shipping_district"
						placeholder="District *">
					</select>
					<input class="Delivery-address-input" type="text" name="Ward" placeholder="<?=$LANG_ward?>">
					<input class="Delivery-address-input" type="text" name="StreetName"
						placeholder="<?=$LANG_streetname?> *">
					<input class="Delivery-address-input" type="text" name="BuildingName"
						placeholder="<?=$LANG_buildingname?>">
					<span style="margin-left: 9px;"><b><?=$LANG_country?>: Vietnam</b></span>
					<br>
					<button  type="submit" class="btn btn-primary" name="submit_change"><?php echo $LANG_save; ?></button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- PASSWORD -->
<?php 
if (!isset($_SESSION['fb_access_token'])){?>
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
<?php } ?>
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
<script type="text/javascript" src="<?=$_DOMAIN?>/assets/js/data-location.js"></script>

<?php 
include('includes/footer.php');
}else{
	echo '<script>window.location.href="/login"</script>';
}
?>

