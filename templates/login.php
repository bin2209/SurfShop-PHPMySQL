<?php 
// FACEBOOK LOGIN
require_once 'facebookSDK/Facebook/autoload.php';
require_once 'facebookSDK/config.php';
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($_DOMAIN.'/facebookSDK/callback.php', $permissions);
// FACEBOOK LOGIN
if (isset($_SESSION['login'])==true){
	// echo "<script>window.location.href='account';</script>";
}else
// if (isset($_SESSION['login'])==false){ 
	?>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="assets/css/login.css" /> 
	<body>
		<section>
			<div class="wrapper-login">
				<div class="sign-panels">
					<!-- LOGIN -->
					<div class="login">
						<div class="title">
							<span><?=$LANG_signin; ?></span>
						</div>
						<div>
							<div id="customBtn" class="Btn-facebook" onclick="window.location = '<?=$loginUrl; ?>'">
								<img style="position: relative; left: -8px;" src="<?=$_DOMAIN?>/assets/img/icon/facebook-button.png">
								<span class="buttonText" >Log in With Facebook</span>
							</div>
						</div>
						<div class="or"><span><?=$LANG_or; ?></span></div>
						<form action="request_login/auth.php" method="post">
							<input type="email" name="email" placeholder="<?=$LANG_email; ?>" value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>" >
							<input type="password" name="password" placeholder="<?=$LANG_password; ?>">
							<input type="checkbox" id="remember">
							<label for="remember"><?=$LANG_remember; ?></label>
							<?php if (isset($_GET['error'])){ ?>
								<div class="alert alert-danger" role="alert"><?=htmlspecialchars($_GET['error'])?></div>
							<?php }else if (isset($_GET['success'])){ ?>
								<div class="alert alert-success" role="alert"><?=htmlspecialchars($_GET['success'])?></div>
							<?php } ?> 
							<button class="btn-signin-submit" type="submit" ><?=$LANG_signin; ?></button>
							<a href="javascript:void(0)" class="btn-reset btn-fade"><?=$LANG_recover_pass; ?> <i class="fa fa-long-arrow-right"
								aria-hidden="true"></i></a>
								<a href="javascript:void(0)" class="btn-member btn-fade"><?=$LANG_not_member; ?> <i class="fa fa-long-arrow-right"
									aria-hidden="true"></i></a>
								</form>
							</div>

							<!-- ĐĂNG KÝ -->
							<div class="signup">
								<div class="title">
									<span><?=$LANG_signup; ?></span>
								</div>
								<?php 
								if(isset($_GET['facebook_id'])){
									$google_login = true;
									$name = $_SESSION['BoNhoTam_name'];
									$email = $_SESSION['BoNhoTam_email'];
									$profile_pic = $_SESSION['BoNhoTam_pic'];
									$facebook_id = $_GET['facebook_id'];
									$password_dangky = md5($facebook_id);
								}
								?>
								<form action="request_login/signup.php" method="post">
									<?php 
									// Facebook LOGIN
									if(isset($_GET['facebook_id'])){?>
										<img style="width:90px; border: 4px solid #c1c1c0; border-radius: 50%; margin: 18px;" src="<?=(htmlspecialchars($profile_pic)) ?>">
										<input name="facebook_id" value="<?=(htmlspecialchars($facebook_id)) ?>" hidden>
										<input name="profile_pic" value="<?=(htmlspecialchars($profile_pic)) ?>" hidden>
										<input style="color:#12804d; border: 1.5px solid;" type="text" name="name" placeholder="<?=$LANG_name; ?>" value="<?php if(isset($_SESSION['BoNhoTam_name']))echo(htmlspecialchars($_SESSION['BoNhoTam_name'])) ?>"readonly>
										<input style="display:none;" type="text" name="email" placeholder="<?=$LANG_email; ?>" value="<?php if(isset($_SESSION['BoNhoTam_email']))echo(htmlspecialchars($_SESSION['BoNhoTam_email'])) ?>" hidden>
										<input style="display:none;" type="password" name="password" value="<?=$password_dangky?>" placeholder="<?=$LANG_password; ?>" hidden/>
										<input style="display:none;" type="password" name="re_password" value="<?=$password_dangky?>" placeholder="<?=$LANG_repeat_password; ?>"hidden/>
									<?php } else {?>
										<!-- // ĐĂNG KÝ BÌNH THƯỜNG -->
										<div id="customBtn" class="Btn-facebook" onclick="window.location = '<?=$loginUrl; ?>'">
											<img style="position: relative; left: -8px;" src="<?=$_DOMAIN?>/assets/img/icon/facebook-button.png">
											<span class="buttonText" >Log in With Facebook</span>
										</div>
										<div class="or"><span><?=$LANG_or; ?></span></div>
										<input type="text" name="name" placeholder="<?=$LANG_name; ?>" value="<?php if(isset($_GET['name']))echo(htmlspecialchars($_GET['name'])) ?>">
										<input type="text" name="email" placeholder="<?=$LANG_email; ?>" value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>">
										<input type="password" name="password" placeholder="<?=$LANG_password; ?>" >
										<input type="password" name="re_password" placeholder="<?=$LANG_repeat_password; ?>">

									<?php }
									?>
									<br>
									<!-- BÁO LỖI ĐĂNG KÝ -->
									<?php if (!isset($google_login)&&isset($_GET['signup-error'])) { ?>
										<div class="alert alert-danger" role="alert"><?=htmlspecialchars($_GET['signup-error'])?></div>
									<?php } ?>
									<button class="btn-signin-submit" type="submit" ><?=$LANG_signup; ?></button>
								</form>
								<a href="javascript:void(0)" class="btn-login btn-fade"><?=$LANG_yes_member; ?> <i
									class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
								</div>

								<!-- QUÊN PASS -->
								<div class="recover-password">
									<div class="title">
										<span><?=$LANG_recover_pass; ?></span>
										<p class="recover-title"><?=$LANG_recover_title; ?></p>
									</div>
									<form action="request_login/resetpass.php" method="post">
										<input type="email" name="email_reset" placeholder="<?=$LANG_email; ?>" id="resetPassword" required>
										<span class="error"></span>
										<button type="submit" class="btn-signin"><?=$LANG_recover_button; ?></button>
										<a href="javascript:void(0)" class="btn-login btn-fade"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> <?=$LANG_recover_back ;?> </a>
									</form>
									<div class="notification">
										<p>Good job. An email containing information on how to reset your passworld was sent to<span class="reset-mail"></span>. Please follow the instruction in that email to
										reset your password. Thanks!</p>
									</div>
								</div>
							</div>
						</div>
					</section>
				</body>
				<script type="text/javascript" src="assets/js/login.js"></script>
				<script>startApp();</script>
				<?php 
				require_once 'includes/footer.php'; 
				// RETURN ĐĂNG KÝ LỖI 
				if (isset($_GET['signup-error'])){
					echo '<script>$(`.login`).hide();$(`.signup`).fadeIn(300);</script>';
				}else
				// RETURN RESET PASS
				if (isset($_GET['mailsent'])){
					$email_sent = $_GET['mailsent'];
					if ($email_sent=="empty"){
						echo '<script> 
						$(`.login`).hide();$(`.recover-password`).fadeIn(300);
						$(`.error`).text(`Email not valid.`)
						</script>';
					}else{
						echo '<script> 
						$(`.login`).hide();$(`.recover-password`).fadeIn(300);
						$(`.reset-mail`).text(" '.$email_sent.'");
						$(`.recover-title`).hide();
						$(`.recover-password form`).hide();
						$(`.notification`).fadeIn(300);
						</script>';
					}
				}
				?>
				<?php
				//  }
				?>
