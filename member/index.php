<?php 
include("../function/get_link_folder.php");

?>

<!DOCTYPE html>
<html>
<head>
	<?php 
	include("../login/config.php");
	include($direct.'core/header.php'); 

	?>
	<link href="../css/popup.css" rel="stylesheet">
</head>
<body>
	<!-- BAR -->
	<?php include($direct.'core/navbar.php'); ?>
	<!-- ENDBAR -->

	<section class=" store content-center" style="padding-top: 5em;">
		<h1 class="surf-h2-dark content-center">Hi 
			<?php 

			if(!isset($_SESSION['login_user'])){
				header("location:../login");
			} else{
				echo $_SESSION['login_user'].' ! ';
			}

			?>
		</h1>
		<br>
		<div class="background-content"><!--  // backgound content -->
			<div class="background-logo"><!--  // backgound image-logo & infomation -->

				<?php 
				$user_check = $_SESSION['login_user'];
				$sql= 'SELECT * FROM `user` WHERE username="'.$user_check.'"';
				$result = mysqli_query($db,$sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$name = $row["name"];
						$email = $row["email"];
						$phone = $row["phone"];
						$about = $row["about"];
						echo '<div class="logo-avt" style="width: auto;"><img src="'.$row["avatar"].'"/></div>';
							echo '</div>'; // backgound image-logo & infomation
							echo  '<h3 class="h3-dark content-center" style="padding-top:3em; width: auto; font-size:24px !important;">' . $row["name"]. '</h3>';
							echo '<div class="infomation" style="width:auto;">';
							echo '<p>'. $row["about"].'</p><hr>';
							echo '<i class="fas fa-envelope"></i> <p>'. $row["email"].'</p><br>';
							echo '<i class="fas fa-phone-alt"></i> <p>'. $row["phone"].'</p><br>';
						echo '</div>'; // infomation
					}
				} else {
					echo "0 results";
				}
				?>

				<div class="button-div">
					<button id="change-profile1" class="change-button"><i class="fas fa-pen" style=""></i> Edit Your Profile</button>
					<button id="change-profile2" class="change-button"><i class="fas fa-key" style=""></i> Change Password</button>
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
				text-align: left ;
				margin-right: auto;
				margin-left: auto;
				width: 400px;
			}
			.change-profile label{
				position: relative;
				left: 16px;
				font-size: 14px;
				font-weight: 600;
			}
			.change-profile input,textarea{
				left: 10px;
				position: relative;
				font-family: "SF Pro Text","SF Pro Icons","Helvetica Neue","Helvetica","Arial",sans-serif;
				color: #191919;
				display: inline;
				width: 80%;
				padding: 10px 20px;
				border: 1px solid #ccc;
				margin: 4px;
				border-radius: 20px;
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
				min-width: 400px;
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
				<label for="change-name">Full Name </label><input type="text" name="change-name" placeholder="" value="<?php echo $name; ?>">
				<label for="change-about">About </label>
				<textarea name="change-about"><?php echo $about; ?></textarea>
				<label for="change-phone">Phone </label><input type="text" name="change-phone" placeholder="" value="<?php echo $phone; ?>">
				<div class="content title">
				<button>Save</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="pop-up pop-up-password">
	<div class="content">
		<div class="container">
			<span class="close">close</span>
			<div class="title">
				<h1>Change Password</h1>
			</div>

			<div class="change-profile">
				<label for="change-password">Old Password </label><input type="password" name="change-name" placeholder="" value="">
				<label for="change-about">New Password </label><input type="password" name="change-about" placeholder="" value="">
				<label for="change-phone">Repeat New Password </label><input type="password" name="change-phone" placeholder="" value="">
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
