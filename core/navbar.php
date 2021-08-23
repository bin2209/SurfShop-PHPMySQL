	<?php 
	session_start();
	include $direct.'login/config.php';
	$GLOBALS['local_link']= $_SERVER['PHP_SELF'];
	$GLOBALS['host_link']= $_SERVER['HTTP_HOST'];
	$link_directory = $_SERVER['PHP_SELF'];
	$GLOBALS['direct'] = '';
	$GLOBALS['link_directory_array'] = array('about/','services/','store/','login/','member/');
	$GLOBALS['logged'] = 0;
	for($i=0;$i<count($link_directory_array);$i++){
		$pos = strpos($link_directory,$link_directory_array[$i]);
		if ($pos == true){
			$direct = '../';
		}
	}
	include $direct.'function/set_language_cookie.php';

	
	?>



	<style type="text/css">
	/*menu*/
	.wrapper{
		display: none;
		z-index: 2;
		position: fixed;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		background: rgba(0,0,0,0.8);
		-webkit-backdrop-filter: saturate(180%) blur(20px);
		backdrop-filter: saturate(180%) blur(20px);
		-webkit-clip-path: circle(0px at calc(0% - 45px) 0px);
		clip-path: circle(0px at calc(0% - 45px) 0px);
		-webkit-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
		transition: all 0.3s ease-in-out;
	}
	#active:checked ~ .wrapper{
		-webkit-clip-path: circle(75%);
		clip-path: circle(75%);
		display: block;
	}
	/*menu-cart*/
	.wrapper-cart{
		z-index: 2;
		position: fixed;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		background: rgba(0,0,0,0.8);
		-webkit-backdrop-filter: saturate(180%) blur(20px);
		backdrop-filter: saturate(180%) blur(20px);
		-webkit-clip-path: circle(0px at calc(100% - 45px) 0px);
		clip-path: circle(0px at calc(100% - 45px) 0px);
		-webkit-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
		transition: all 0.3s ease-in-out;
	}
	#active-cart:checked ~ .wrapper-cart{
		-webkit-clip-path: circle(75%);
		clip-path: circle(75%);
	}
</style>
<nav class="globalbar">
	<?php

	if(!isset($_SESSION['login_user'])){
		$logged = 0;
		echo '<label class="bag menu dropmenubtn"  onclick="Dropdown();"> <i class="fas fa-caret-down dropmenubtn"></i></label>';
		echo '	
		<div id="Dropdownmenu" class="dropdown-content ">
		
		<a href="../logout.php"><img src="../img/signIn.svg"/><p>'.$LANG_signin.'</p></a>
		</div>';
	} else {


		$usercheck = $_SESSION['login_user'];

		$sql= 'SELECT * FROM `user` WHERE username="'.$usercheck.'"';
		$result = mysqli_query($db,$sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$avatar= $row["avatar"];
			}
		}

			// echo '<a  href="'.$direct.'/member"><label class="bag menu" style="right: 138px;"></label></a> ';

		echo '
		<label class="bag menu dropmenubtn"  onclick="Dropdown();">'.$_SESSION['login_user'].' <i class="fas fa-caret-down dropmenubtn"></i></label>';
		echo '	
		<div id="Dropdownmenu" class="dropdown-content ">
		<a href="../member"><img src="../img/account.svg"/><p>Account</p></a>
		<hr>
		<a href="../logout.php"><img src="../img/signIn.svg"/><p>Sign out</p></a>
		</div>';
		$logged=1;
	}
	?>



	<div class="logo menu">
		<a class="mobile" href="../index.php">
			<img class="logo-img" src="<?php echo $direct; ?>img/logo-gray.png"/>
			<!-- <div class="menu"> LST Surf</div> -->
		</a>
		<ul class="desktop">
			<li><a href="../store"><?php echo $LANG_store ?></a></li>
			<li><a href="../services"><?php echo $LANG_services ?></a></li>
			<li><a href="../map.php"><?php echo $LANG_map ?></a></li>
			<li><a href="../about"><?php echo $LANG_about ?></a></li>
		</ul>
	</div>
	<label class="menu-btn menu desktop"><a href="../"><img class="logo-imgdesktop" src="<?php echo $direct; ?>img/logo-gray.png"/></a></label>
	<label for="active" class="menu-btn menu mobile"><i class="fas fa-bars"></i></label>
</nav>

<input type="checkbox" id="active">
<!-- <input type="checkbox" id="active-cart"> -->
<!-- Menu-content -->
<div class="wrapper">
	<ul>
		<li class="search-box"><i class="fas fa-search"></i><input type="text" name="" placeholder="Search"></li>
		<li><a href="../">Home</a></li>
		<li><a href="../services">Services</a></li>
		<li><a href="../store">Store</a></li>
		<li><a href="../map.php">Map</a></li>
		<li><a href="../about">About</a></li>
	</ul>
</div>

<!-- IF NOT LOGIN MENU-->
<div class="wrapper-cart">
	<ul>
		<li class="login-box">
			<?php 

			$login_direct = $direct."login";
			$member_direct = $direct."member";

			if(!isset($_SESSION['login_user'])){
				echo '<button onclick="window.location.href=`'.$login_direct.'`"><img class="" src="'.$direct.'img/logo-gray.png" width="36"/>';
			} else {
				echo '<button  style="min-width:250px;" onclick="window.location.href=`'.$member_direct.'`"><img class="" src="'.$direct.'img/logo-gray.png" width="36"/>';
			}
			?>


		</button>
		<br>

		<?php if($logged==1){
			echo '<button style="margin:10px 0; min-width:250px; min-height: 47.43px;" onclick="window.location.href=`logout.php`"><i class="fas fa-sign-out-alt" style="font-size: 26px;"></i><p style="top: -4px;
			left: 6px;">Loggout</p></button>';
		}
		?>
	</li>
</ul>
</div>


<!-- End Menu-content -->
<script type="text/javascript">
			/* When the user clicks on the button, 
			toggle between hiding and showing the dropdown content */
			function Dropdown() {
				document.getElementById("Dropdownmenu").classList.toggle("show");
			}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
	
	if (!event.target.matches('.dropmenubtn')) {
		var dropdowns = document.getElementsByClassName("dropdown-content");
		var i;
		for (i = 0; i < dropdowns.length; i++) {
			var openDropdown = dropdowns[i];
			if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			}
		}
	}

}
</script>