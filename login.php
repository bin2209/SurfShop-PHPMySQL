<?php 
$title = 'Login';
include 'core/header.php';
include 'core/navbar.php';
include 'function/set_language_cookie.php';


if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])) { 
	?>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/login.css" /> 
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
							<div id="customBtn" class="customGPlusSignIn">
								<span class="icon"></span>
								<span class="buttonText">Google</span>
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
							<input class="btn-signin-submit" type="submit" value="<?php echo $LANG_signin; ?>">
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
								<div id="customBtn" class="customGPlusSignIn">
									<span class="icon"></span>
									<span class="buttonText">Google</span>
								</div>
								<div class="or"><span><?php echo $LANG_or; ?></span></div>
								<form action="login/signup.php" method="post">
									<input type="text" name="name" placeholder="<?php echo $LANG_name; ?>" value="<?php if(isset($_GET['name']))echo(htmlspecialchars($_GET['name'])) ?>">
									<input type="text" name="email" placeholder="<?php echo $LANG_email; ?>" value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>">
									<input type="password" name="password" placeholder="<?php echo $LANG_password; ?>">
									<input type="password" name="re_password" placeholder="<?php echo $LANG_repeat_password; ?>">
									<br>
									<!-- BÁO LỖI ĐĂNG KÝ -->
									<?php if (isset($_GET['signup-error'])) { ?>
										<div class="alert alert-danger" role="alert"><?=htmlspecialchars($_GET['signup-error'])?></div>
									<?php } ?>
									<input class="btn-signin-submit" type="submit" value="<?php echo $LANG_signup; ?>">
									<a href="javascript:void(0)" class="btn-login btn-fade"><?php echo $LANG_yes_member; ?> <i
										class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
									</form>
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
				
<script type="text/javascript" src="js/login.js"></script>
<script src="https://apis.google.com/js/api:client.js"></script>
<script>
	var googleUser = {};
	var startApp = function() {
		gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
      	client_id: 'YOUR_CLIENT_ID.apps.googleusercontent.com',
      	cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'additional_scope'
      });
      attachSignin(document.getElementById('customBtn'));
    });
	};

	function attachSignin(element) {
		console.log(element.id);
		auth2.attachClickHandler(element, {},
			function(googleUser) {
				document.getElementById('name').innerText = "Signed in: " +
				googleUser.getBasicProfile().getName();
			}, function(error) {
				alert(JSON.stringify(error, undefined, 2));
			});
	}
</script>
<script>startApp();</script>
<?php 
include 'core/footer.php'; 

				// RETURN ĐĂNG KÝ LỖI 
if (isset($_GET['signup-error'])){
	echo '<script>$(`.login`).hide();$(`.signup`).fadeIn(300);</script>';
}

?>

<?php 
}else {
	header("Location: ../member/");
}
?>
