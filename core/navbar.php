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


	session_start();

	?>
	<nav class="globalbar">
		<label for="active-cart" class="bag menu"><i class="fas fa-shopping-cart"></i></label>

		<div class="logo menu">
			<a href="index.html">
				<img class="logo-img" src="<?php echo $direct; ?>img/logo-gray.png"/>
				<!-- <div class="menu"> LST Surf</div> -->
			</a>
		</div>

		<label for="active" class="menu-btn menu"><i class="fas fa-bars"></i></label>

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
			<li><a href="../about">About</a></li>
		</ul>
	</div>

	<!-- IF NOT LOGIN MENU-->
	<div class="wrapper-cart">
		<ul>
			<li>Your bag is empty.</li>
			<li>Login</li>
			<li class="login-box">
				<button onclick="window.location.href='<?php echo $direct; ?>login'"><img class="" src="<?php echo $direct; ?>img/logo-gray.png" width="36"/>
					<?php 
					if(!isset($_SESSION['login_user'])){
						echo '<p>Login with LST account</p>';
						die();
					} else {
						echo $_SESSION['login_user'];
					}
					?>
				</button>
			</li>
		</ul>
	</div>
	<!-- End Menu-content -->