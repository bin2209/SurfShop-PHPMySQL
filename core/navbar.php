	<?php 
	$GLOBALS['local_link']= $_SERVER['PHP_SELF'];
	$GLOBALS['host_link']= $_SERVER['HTTP_HOST'];
	$link_directory = $_SERVER['PHP_SELF'];
	$GLOBALS['direct'] = '';

	$GLOBALS['link_directory_array'] = array('about/','services/','store/','login/','member/');

	for($i=0;$i<count($link_directory_array);$i++){
		$pos = strpos($link_directory,$link_directory_array[$i]);
		if ($pos == true){
			$direct = '../';
		}
	}


	session_start();

	?>
	<nav class="globalbar">
		<label for="active-cart" class="bag menu"><i class="fas fa-shopping-cart"></i></label>
		<div class="logo menu">
			<a class="mobile" href="index.html">
				<img class="logo-img" src="<?php echo $direct; ?>img/logo-gray.png"/>
				<!-- <div class="menu"> LST Surf</div> -->
			</a>
			<ul class="desktop">
				<li><a href="../store">Store</a></li>
				<li><a href="../services">Services</a></li>
				<li><a href="../map.php">Map</a></li>
				<li><a href="../about">About</a></li>
			</ul>
		</div>
	<label class="menu-btn menu desktop"><a href="../"><img class="logo-imgdesktop" src="<?php echo $direct; ?>img/logo-gray.png"/></a></label>
	<label for="active" class="menu-btn menu mobile"><i class="fas fa-bars"></i></label>
</nav>

<input type="checkbox" id="active">
<input type="checkbox" id="active-cart">
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
		<li>Your bag is empty.</li>
		<hr>
		<li class="login-box">
			<?php 
			$login_direct = $direct."login";
			$member_direct = $direct."member";

			if(!isset($_SESSION['login_user'])){
				echo '<button onclick="window.location.href=`'.$login_direct.'`"><img class="" src="'.$direct.'img/logo-gray.png" width="36"/>';
			} else {
				echo '<button style="min-width:250px;" onclick="window.location.href=`'.$member_direct.'`"><img class="" src="'.$direct.'img/logo-gray.png" width="36"/>';
			}
			?>

			<?php 
			if(!isset($_SESSION['login_user'])){
				$logged=0;
				echo '<p>Login with LST account</p>';
			} else {
				echo '<p>'.$_SESSION['login_user'].'</p>';
				$logged=1;
			}

			?>
		</button>
		<br>

		<?php if($logged==1){
			echo '<button style="margin:10px 0; min-width:250px; min-height: 47.43px;" onclick="window.location.href=`logout.php`"><i class="fas fa-sign-out-alt" style="font-size: 26px;"></i><p style="top: -4px;
    left: 6px;">Loggout</p></button>';
		}?>
	</li>
</ul>
</div>
	<!-- End Menu-content -->