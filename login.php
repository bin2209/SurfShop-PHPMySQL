<?php 

$title = 'Login';

require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'classes/set_language_cookie.php';
require_once 'google_login/config.php';

if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])) { 
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
							<span><?php echo $LANG_signin; ?></span>
						</div>

						<div>
							<div id="customBtn" class="customGPlusSignIn" onclick="window.location = '<?php echo $client->createAuthUrl(); ?>'">
								<span class="icon"></span>
								<span class="buttonText" >Google</span>
							</div>
						</div>
						<div class="or"><span><?php echo $LANG_or; ?></span></div>

						<form action="login/auth.php" method="post">
							<input type="email" name="email" placeholder="<?php echo $LANG_email; ?>" value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>" >

							<input type="password" name="password" placeholder="<?php echo $LANG_password; ?>">
							<input type="checkbox" id="remember">
							<label for="remember"><?php echo $LANG_remember; ?></label>
							<?php if (isset($_GET['error'])) { ?>
								<div class="alert alert-danger" role="alert"><?=htmlspecialchars($_GET['error'])?></div>
							<?php } ?>
							<button class="btn-signin-submit" type="submit" ><?php echo $LANG_signin; ?></button>
							<a href="javascript:void(0)" class="btn-reset btn-fade"><?php echo $LANG_recover_pass; ?> <i class="fa fa-long-arrow-right"
								aria-hidden="true"></i></a>

								<a href="javascript:void(0)" class="btn-member btn-fade"><?php echo $LANG_not_member; ?> <i class="fa fa-long-arrow-right"
									aria-hidden="true"></i></a>
								</form>

							</div>


							<!-- ĐĂNG KÝ -->

							<div class="signup">
								<div class="title">
									<span><?php echo $LANG_signup; ?></span>
								</div>
								<?php 
								if(isset($_GET['google_id'])&&isset($_GET['name'])&&isset($_GET['name'])&&isset($_GET['email'])&&isset($_GET['profile_pic'])){
									$google_login= true;
									$name = $_GET['name'];
									$email = $_GET['email'];
									$profile_pic = $_GET['profile_pic'];
									$google_id = $_GET['google_id'];

								}else{
									$url_login_google =  $client->createAuthUrl();
									echo '<div id="customBtn" class="customGPlusSignIn" onclick="window.location = '.$url_login_google.'">
									<span class="icon"></span>
									<span class="buttonText">Google</span>
									</div>
									';
								}

								?>
								

								<form action="login/signup.php" method="post">
									<?php 
									// GOOGLE LOGIN
									if(isset($google_login)){
										?>
										
										<img style="border: 4px solid #c1c1c0; border-radius: 50%; margin: 18px;" src="<?php echo (htmlspecialchars($profile_pic)) ?>">
										<input name="google_id" value="<?php echo (htmlspecialchars($google_id)) ?>" hidden>
										<input name="profile_pic" value="<?php echo (htmlspecialchars($profile_pic)) ?>" hidden>
										<input type="text" name="name" placeholder="<?php echo $LANG_name; ?>" value="<?php if(isset($_GET['name']))echo(htmlspecialchars($_GET['name'])) ?>" >
										<input style="color:#12804d;    border: 1.5px solid;" type="text" name="email" placeholder="<?php echo $LANG_email; ?>" value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>" readonly>
										<input type="password" name="password" placeholder="<?php echo $LANG_password; ?>" autofocus/>
										<input type="password" name="re_password" placeholder="<?php echo $LANG_repeat_password; ?>">

									<?php } else {?>
										<!-- // ĐĂNG KÝ BÌNH THƯỜNG -->
										<div class="or"><span><?php echo $LANG_or; ?></span></div>
										<input type="text" name="name" placeholder="<?php echo $LANG_name; ?>" value="<?php if(isset($_GET['name']))echo(htmlspecialchars($_GET['name'])) ?>">
										<input type="text" name="email" placeholder="<?php echo $LANG_email; ?>" value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>">
										<input type="password" name="password" placeholder="<?php echo $LANG_password; ?>" >
										<input type="password" name="re_password" placeholder="<?php echo $LANG_repeat_password; ?>">

									<?php }
									?>


									

									<br>
									<!-- BÁO LỖI ĐĂNG KÝ -->
									<?php if (!isset($google_login)&&isset($_GET['signup-error'])) { ?>
										<div class="alert alert-danger" role="alert"><?=htmlspecialchars($_GET['signup-error'])?></div>
									<?php } ?>
									<button class="btn-signin-submit" type="submit" ><?php echo $LANG_signup; ?></button>


								</form>
								<a href="javascript:void(0)" class="btn-login btn-fade"><?php echo $LANG_yes_member; ?> <i
									class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
								</div>

								<!-- QUÊN PASS -->
								<div class="recover-password">
									<div class="title">
										<span><?php echo $LANG_recover_pass; ?></span>
										<p><?php echo $LANG_recover_title; ?></p>
									</div>
									<form action="">
										<input type="email" placeholder="<?php echo $LANG_email; ?>" id="resetPassword" required>
										<span class="error"></span>
										<a href="javascript:void(0)" class="btn-signin btn-password"><?php echo $LANG_recover_button; ?></a>
										<a href="javascript:void(0)" class="btn-login btn-fade"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> <?php echo $LANG_recover_back ;?> </a>
									</form>

									<div class="notification">
										<p>Good job. An email containing information on how to reset your passworld was sent to
											<span class="reset-mail"></span>. Please follow the instruction in that email to
										reset your password. Thanks!</p>
									</div>
								</div>

							</div>
						</div>
					</section>

				</body>

				<script type="text/javascript" src="assets/js/login.js"></script>
				<script src="https://apis.google.com/js/api:client.js"></script>

				<script>startApp();</script>
				<?php 
				require_once 'includes/footer.php'; 

				// RETURN ĐĂNG KÝ LỖI 
				if (isset($_GET['signup-error'])){
					echo '<script>$(`.login`).hide();$(`.signup`).fadeIn(300);</script>';
				}?>

				<?php 
			}else {
				header("Location: ../member");
			}?>
