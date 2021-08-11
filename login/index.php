<?php 
$GLOBALS['local_link']= $_SERVER['PHP_SELF'];
$GLOBALS['host_link']= $_SERVER['HTTP_HOST'];
$link_directory = $_SERVER['PHP_SELF'];
$GLOBALS['direct'] = '';
$GLOBALS['link_directory_array'] = array('about/','services/','store/','login/');
for($i=0;$i<count($link_directory_array);$i++){
	$pos = strpos($link_directory,$link_directory_array[$i]);
	if ($pos == true){
		$direct = '../';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php 
	include($direct.'core/header.php'); 

	?>
	 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo $direct; ?>css/login.css" />
</head>
<body>
	<!-- BAR -->
	<?php include($direct.'core/navbar.php'); 
	
	?>
	

	<section class="box-content store content-center">
		<!-- <h1 class="surf-h2-dark content-center">Store</h1> -->
		<div class="wrapper-login">
			<div class="sign-panels">
				<div class="login">
					<div class="title">
						<span>Sign In</span>
						<p>Welcome back, please login to your account. You can login with google or by your regular
						user login.</p>
					</div>

					<div>
						<div id="customBtn" class="customGPlusSignIn">
							<span class="icon"></span>
							<span class="buttonText">Google</span>
						</div>
						<!-- <a href="#" class="btn-face"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>

							<a href="#" class="btn-twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a> -->
						</div>

						<div class="or"><span>OR</span></div>

						<form action="">
							<input type="text" placeholder="Username">
							<input type="password" placeholder="Password">
							<input type="checkbox" id="remember">
							<label for="remember">Keep me sign in</label>
							<a href="#" class="btn-signin">Sign In</a>

							<a href="javascript:void(0)" class="btn-reset btn-fade">Recover your password <i class="fa fa-long-arrow-right"
								aria-hidden="true"></i></a>
								<a href="javascript:void(0)" class="btn-member btn-fade">Not a member yet? <i class="fa fa-long-arrow-right"
									aria-hidden="true"></i></a>
								</form>
							</div>

							<div class="signup">
								<div class="title">
									<span>Sign Up</span>
									<p>Create a new account. You can sign up with your facebook or twitter accunt. Or your regular user
									login.</p>
								</div>

								<div>
									<a href="#" class="btn-face"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
									<a href="#" class="btn-twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
								</div>

								<div class="or"><span>OR</span></div>

								<form action="">
									<input type="text" placeholder="Username">
									<input type="text" placeholder="Email Address">
									<input type="password" placeholder="Password">
									<input type="password" placeholder="Repeat Password">

									<a href="#" class="btn-signin">Sign Up</a>
									<a href="javascript:void(0)" class="btn-login btn-fade">Already have an account, Sign In <i
										class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
									</form>
								</div>

								<div class="recover-password">
									<div class="title">
										<span>Recover Password</span>
										<p>Enter in the username or email associated with your account</p>
									</div>

									<form action="">
										<input type="email" placeholder="Username/Email Address" id="resetPassword" required>
										<span class="error"></span>
										<a href="javascript:void(0)" class="btn-signin btn-password">Submit Reset</a>
										<a href="javascript:void(0)" class="btn-login btn-fade"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Cancel
										and go back to Login page </a>
									</form>

									<div class="notification">
										<p>Good job. An email containing information on how to reset your passworld was sent to
											<span class="reset-mail"></span>. Please follow the instruction in that email to
										reset your password. Thanks!</p>
									</div>

								</div>
							</div>
						</div>

<!--
 * Created by Muhammed Erdem on 10.10.2017.
 *-->
</section>
<!-- <?php include($direct.'core/footer.php'); ?> -->
<script type="text/javascript" src="<?php echo $direct; ?>js/login.js"></script>
<script src="https://apis.google.com/js/api:client.js"></script>
<!-- GOOGLE.LOGIN  -->
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
</body>
</html>
