<!DOCTYPE html>
<html>
<head>
	<?php 
	include("../function/get_link_folder.php");
	include($direct.'core/header.php'); 


	?>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo $direct; ?>css/login.css" />
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
	<!-- BAR -->
	<?php 
	// include($direct.'core/navbar.php');
	?>
	
	<?php 

// LOGIN
	include("config.php");

	session_start();
	if(!isset($_SESSION['login_user'])){
		// Chưa đăng nhập
	}else{
    header("location:../");
	}

	if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form 

		$value_of_form = $_POST['value_of_form'];
		// giá trị check hoạt động gửi - đăng nhập - đăng ký
		if ($value_of_form == 'signin'){
			$myusername = mysqli_real_escape_string($db,$_POST['username']);
			$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
			if (($_POST['username']=='')||($_POST['password']=='')){
				echo "<script>Swal.fire('Username & password cannot be empty.')</script>";
			} else{


				$sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
				$result = mysqli_query($db,$sql);

				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	// $active = $row['active'];

				$count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

				if($count == 1) {
		// session_register("myusername");


					$_SESSION['login_user'] = $myusername;

					header("location: welcome.php");
				}else {
				// echo '<style>.incorect-pass{display: block;}</style>';
					echo "<script>Swal.fire('Incorrect username or password')</script>";
				}
			}
		} else if ($value_of_form=='signup'){
			$name = $_POST['display_name'];
			$username = $_POST['username'];
			$password =$_POST['password']; 
			$re_password = $_POST['re_password'];
			$email = $_POST['email']; 
			// Tìm trong database 

			if (($name=='')||($username=='')||($password=='')||($re_password=='')||($email=='')){
				echo "<script>Swal.fire('Cannot be empty.')</script>";


			} else{

				if ($password != $re_password) 
				{	
					echo "<script>Swal.fire('Repeat password is not match')</script>";
				} else{
				// check tài khoản tồn tại chưa?

					function username_exists($username,$db){
						$sql = "SELECT * FROM user WHERE username='$username'";
						$result = mysqli_query($db,$sql);
						$count = mysqli_num_rows($result);
						if ($count >= 1){
							return 1;
						} else{
							return 0;
						}
					}
	   		// check email tồn tại chưa?
					function email_exists($email,$db){
						$sql = "SELECT * FROM user WHERE email='$email'";
						$result = mysqli_query($db,$sql);
						$count = mysqli_num_rows($result);
						if ($count >= 1){
							return 1;
						} else{
							return 0;
						}
					}


					if (username_exists($username,$db) == 1){
						echo "<script>Swal.fire('Username already exists')</script>";
					} else if (email_exists($email,$db) == 1){
						echo "<script>Swal.fire('Email registered by another account')</script>";
					}else{
						$sql = "INSERT INTO user(id, username,password, email, phone, name) VALUES ('0','$username','$password','$email','','$name')";
						$result = mysqli_query($db,$sql);

						if ($result == 1){
							echo '<style>.signup-success{display: block;}</style>';
					// header("location: index.php");
						}
					}
				}
			}
		}
	}
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



						<!-- ĐĂNG NHẬP -->

						<form action="" method="post">
							<input type="text" name="value_of_form" style="display:none;" value="signin">
							<input type="text" name="username" placeholder="Username">
							<input type="password" name="password" placeholder="Password">
							<input type="checkbox" id="remember">
							<label for="remember">Keep me sign in</label>
							<p class="signup-success">Sign up success</p>

							<input class="btn-signin-submit" type="submit" value="Sign In">
							


							<a href="javascript:void(0)" class="btn-reset btn-fade">Recover your password <i class="fa fa-long-arrow-right"
								aria-hidden="true"></i></a>
								<a href="javascript:void(0)" class="btn-member btn-fade">Not a member yet? <i class="fa fa-long-arrow-right"
									aria-hidden="true"></i></a>

								</form>
							</div>




							<!-- ĐĂNG KÝ -->

							<div class="signup">
								<div class="title">
									<span>Sign Up</span>
									<p>Create a new account. You can sign up with your facebook or twitter accunt. Or your regular user
									login.</p>
								</div>

								<div id="customBtn" class="customGPlusSignIn">
									<span class="icon"></span>
									<span class="buttonText">Google</span>
								</div>

								<div class="or"><span>OR</span></div>

								<form action="" method="post">
									<input type="text" name="value_of_form" style="display:none;" value="signup">
									<input type="text" name="display_name" placeholder="Display name">
									<input type="text" name="username" placeholder="Username">
									<input type="text" name="email" placeholder="Email Address">
									<input type="password" name="password" placeholder="Password">
									<input type="password" name="re_password" placeholder="Repeat Password">
									<input class="btn-signin-submit" type="submit" value="Sign Up">


									<a href="javascript:void(0)" class="btn-login btn-fade">Already have an account, Sign In <i
										class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
									</form>
								</div>



								<!-- QUÊN PASS -->


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
