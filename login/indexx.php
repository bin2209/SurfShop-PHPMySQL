<?php 
include '../function/get_link_folder.php'; 
// HEADER
include($direct.'core/header.php');
include $direct.'function/set_language_cookie.php';
?>

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo $direct; ?>css/login.css" />
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- BAR -->
	<?php 

// LOGIN
	include("config.php");
		session_start();
	if(!isset($_SESSION['login_user'])){
		// include($direct.'core/navbar.php');

		// Chưa đăng nhập
	}else{
		header("Refresh:0");
		header("location:../../");
		
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
						header("location:../");
				}else {
				// echo '<style>.incorect-pass{display: block;}</style>';
					echo "<script>Swal.fire('Incorrect username or password')</script>";
				}
			}

		} else if ($value_of_form=='signup') // ĐĂNG KÝ
		{
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
					<span><a href="../" style="color: #3a3a3a;font-size: 20px;text-decoration: none;color: #595959; font-weight: bold;"><i class="fas fa-arrow-left"></i> Home</a></span>
					<br>

					<div class="title">
						<span><?php echo $LANG_signin; ?></span>
					
						
					</div>

					<div>
						<div id="customBtn" class="customGPlusSignIn">
							<span class="icon"></span>
							<span class="buttonText">Google</span>
						</div>
						<!-- <a href="#" class="btn-face"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
							<a href="#" class="btn-twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a> -->
						</div>

						<div class="or"><span><?php echo $LANG_or; ?></span></div>



						<!-- ĐĂNG NHẬP -->

						<form action="" method="post">
							<input type="text" name="value_of_form" style="display:none;" value="signin">
							<input type="text" name="username" placeholder="<?php echo $LANG_username; ?>">
							<input type="password" name="password" placeholder="<?php echo $LANG_password; ?>">
							<input type="checkbox" id="remember">
							<label for="remember"><?php echo $LANG_remember; ?></label>
							<p class="signup-success">Sign up success</p>

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

								<form action="" method="post">
									<input type="text" name="value_of_form" style="display:none;" value="signup">
									<input type="text" name="display_name" placeholder="<?php echo $LANG_name; ?>">
									<input type="text" name="username" placeholder="<?php echo $LANG_username; ?>">
									<input type="text" name="email" placeholder="<?php echo $LANG_email; ?>">
									<input type="password" name="password" placeholder="<?php echo $LANG_password; ?>">
									<input type="password" name="re_password" placeholder="<?php echo $LANG_repeat_password; ?>">
									<br>
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