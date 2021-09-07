	<?php 
	session_start();
	
	
	include 'login/db_conn.php';
	include 'function/set_language_cookie.php';
	?>

	<nav class="globalbar">
		<?php
		if(!isset($_SESSION['user_email'])){
		// CHƯA ĐĂNG NHẬP
			echo '
			<label class="bag menu dropmenubtn mobile" onclick="location.href=`login.php`"><i class="fas fa-sign-in-alt" style="font-size: 20px; position: relative; top: 1px;"></i></label>';
			echo '	
			<div id="Dropdownmenu" class="dropdown-content ">
			<a href="login.php"><img src="../img/signIn.svg"/><p>'.$LANG_signin.'</p></a>
			</div>';
		} else {
		// ĐÃ ĐĂNG NHẬP
			echo '
			<label class="bag menu dropmenubtn mobile"><i class="fas fa-caret-down dropmenubtn" style="font-size: 20px; position: relative; top: 1px;" onclick="Dropdown()"></i></label>';
			echo '	
			<div id="Dropdownmenu" class="dropdown-content ">
			<a href="../member"><img src="../img/account.svg"/><p>Account</p></a>
			<hr>
			<a href="logout.php"><img src="../img/signIn.svg"/><p>Sign out</p></a>
			</div>';
		}
		?>
		<div class="logo menu">
			<ul class="desktop">
				<li class="desktop-home"><a href="/"><img class="logo-imgdesktop" src="img/logo-gray.png"/></a></li>
				<li class="desktop-store"><a href="store"><?php echo $LANG_store ?></a></li>
				<li class="desktop-services"><a href="services"><?php echo $LANG_services ?></a></li>
				<li class="desktop-map"><a href="map"><?php echo $LANG_map ?></a></li>
				<li class="desktop-about"><a href="about"><?php echo $LANG_about ?></a></li>
				<?php 	if(!isset($_SESSION['user_email'])){
				// CHƯA ĐĂNG NHẬP 
					echo '<li><a href="login.php"><i class="fas fa-sign-in-alt" style="font-size: 20px; position: relative; top: 1px;"></i></a></li>';
				}else {
				// ĐÃ ĐĂNG NHẬP
					echo '<li><i class="fas fa-caret-down dropmenubtn" style="font-size: 20px; position: relative; top: 1px;" onclick="Dropdown()"></i></li>';
				}
				?>
			</ul>
		</div>
		<label for="active" class="menu-btn menu mobile"><i class="fas fa-bars"></i></label>
		<label class="menu-btn menu mobile" style="margin-left: auto; margin-right: auto; height: auto; left: 0; position: relative; top: 2px;"><a href="/"><img style="height:50px; width:50px;" src="img/logo-gray.png"/></a></label>
	</nav>

	<input type="checkbox" id="active">

	<!-- Menu-content -->
	<div class="wrapper">
		<ul>
			<li class="search-box"><i class="fas fa-search"></i>
				<form id="search" action="search.php" method="get">
					<input type="text" name="src" placeholder="Search">
					<input type='submit' style="display:none;"/>
				</form>
			</li>
			<li><a href="../"><?php echo $LANG_home ?></a></li>
			<li><a href="services"><?php echo $LANG_services ?></a></li>
			<li><a href="store"><?php echo $LANG_store ?></a></li>
			<li><a href="map"><?php echo $LANG_map ?></a></li>
			<li><a href="about"><?php echo $LANG_about ?></a></li>
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