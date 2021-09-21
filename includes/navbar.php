<?php 
$link_directory = $_SERVER['PHP_SELF'];
$GLOBALS['direct'] = '';
$GLOBALS['link_directory_array'] = array('/store/');
for($i=0;$i<count($link_directory_array);$i++){
	$pos = strpos($link_directory,$link_directory_array[$i]);
	if ($pos == true){
		$direct1 = '../../';
		$direct2 = '../../';
	}else{
		$direct1 = '';
		$direct2 = '';
	}
}
require_once $direct1.'core/db_conn.php';
require_once $direct2.'classes/set_language_cookie.php';
?>

<nav class="globalbar">
	<?php
	if(!isset($_SESSION['user_email'])){
		// CHƯA ĐĂNG NHẬP // MOBILE
		echo '
		<label class="bag menu dropmenubtn mobile" onclick="location.href=`'.$_DOMAIN.'/login.php`"><img class="dropmenubtn" src="'.$_DOMAIN.'/assets/img/icon/bag.svg" style="width: 19px; position: relative; top: -10px;"></label>';
	} else {
		// ĐÃ ĐĂNG NHẬP // MOBILE
		echo '
		<label class="bag menu dropmenubtn mobile"><img class="dropmenubtn" onclick="Dropdown()" src="'.$_DOMAIN.'/assets/img/icon/bag.svg" style="width: 19px; position: relative; top: -10px;"></label>';
		
	}
	?>
	<div class="logo menu">
		<ul class="desktop">
			<li class="desktop-home"><a href="/"><img class="logo-imgdesktop" src="<?php echo $_DOMAIN ?>/assets/img/logo-gray.png"/></a></li>
			<li class="desktop-store"><a href="/store"><?php echo $LANG_store ?></a></li>
			<li class="desktop-services"><a href="/services"><?php echo $LANG_services ?></a></li>
			<li class="desktop-map"><a href="/map"><?php echo $LANG_map ?></a></li>
			<li class="desktop-about"><a href="/about"><?php echo $LANG_about ?></a></li>
			<?php 	if(!isset($_SESSION['user_email'])){
				// CHƯA ĐĂNG NHẬP // PC
				echo '<li><a href="'.$_DOMAIN.'/login.php"><img src="'.$_DOMAIN.'/assets/img/icon/bag.svg" style="width: 19px; position: relative; top: 19px;"></a></li>';
			}else {
				// ĐÃ ĐĂNG NHẬP // PC
				echo '<li><img class="dropmenubtn" onclick="Dropdown()" src="'.$_DOMAIN.'/assets/img/icon/bag.svg" style="width: 19px; position: relative; top: 19px;"></li>';
			}
			?>
		</ul>
		<?php 

		if(isset($_SESSION['user_email'])){
			// CHECK SỐ LƯỢNG ITEM ĐÃ ĐẶT
			function get_item_bag($email,$conn){
				$stmt = $conn->prepare("SELECT email, item_id FROM bag WHERE email=?");
				$stmt->execute([$email]);
				if ($stmt->rowCount() === 1) {
					$bag =	$stmt->fetch();
					$bag_item = $bag['item_id'];
					if ($bag['item_id']==''){
						return '0';
					}
				}
				$array_bag_item = explode(',',$bag_item);
				return count($array_bag_item);
			}

			echo '	
			<div id="Dropdownmenu" class="dropdown-content ">
			<a href="'.$_DOMAIN.'/member"><img src="'.$_DOMAIN.'/assets/img/account.svg"/><p>'.$LANG_bag.'</p></a><span class="order-dropdown">'.get_item_bag($_SESSION['user_email'],$conn).'</span>
			<hr>
			<a href="'.$_DOMAIN.'/logout.php"><img src="'.$_DOMAIN.'/assets/img/signIn.svg"/><p>'.$LANG_logout.'</p></a>
			</div>';
		}

		?>
	</div>
	<label for="active" class="menu-btn menu mobile"><i class="fas fa-bars"></i></label>
	<label class="menu-btn menu mobile" style="margin-left: auto; margin-right: auto; height: auto; left: 0; position: relative; top: 2px;"><a href="/"><img style="height:50px; width:50px;" src="<?php echo $_DOMAIN ?>/assets/img/logo-gray.png"/></a></label>
</nav>

<input type="checkbox" id="active">

<!-- Menu-content var closewrapper = document.getElementsByClassName('menu-btn menu mobile'); for (var i=0;i<closewrapper.length;i+=1){ closewrapper [i].click(); }-->
	<div class="wrapper" onclick="">
		<ul>
			<li class="search-box"><i class="fas fa-search"></i>
				<form id="search" action="search.php" method="get">
					<input type="text" name="src" placeholder="Search">
					<input type='submit' style="display:none;"/>
				</form>
			</li>
			<li class="mobile-services"><a href="/services"><?php echo $LANG_services ?></a></li>
			<li class="mobile-store"><a href="/store"><?php echo $LANG_store ?></a></li>
			<li class="mobile-map"><a href="/map"><?php echo $LANG_map ?></a></li>
			<li class="mobile-about"><a href="/about"><?php echo $LANG_about ?></a></li>
		</ul>
	</div>

	<!-- End Menu-content -->
	<script type="text/javascript">
			/* When the user clicks on the button, 
			toggle between hiding and showing the dropdown content */
			function Dropdown() {
				console.log("dropdown")
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