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
</head>
<body>
	<!-- BAR -->
	<?php include($direct.'core/navbar.php'); 
	// echo .'../core/navbar.php';
	
	?>
	<!-- ENDBAR -->

	<section>
		<div class="hero content-center">
			<!-- <h1 class="hero-h1 ">LST SURF DA NANG </h1> -->
			<img class="img-hero" src="<?php echo $direct; ?>img/logo-white">
		</div>
	</section>
<!-- 	<section class="box-content trending">
		<h1 class="surf-h2-light content-center">Trending</h1>
		<div class="surf">

			
		</div>
	</section> -->

	<section class=" store content-center">
		<h1 class="surf-h2-dark content-center">Owner</h1>
		<div class="row">
			<div class="column-owner owner"><img class="" src="<?php echo $direct; ?>img/owner/kusan.jpg"/><h3 class="h3-dark content-center">Kusan Watah</h3><p>CEO</p></div>
			<div class="column-owner owner"><img class="" src="<?php echo $direct; ?>img/owner/rhys.jpg"/><h3 class="h3-dark content-center">Rhys Emlet</h3><p>CEO</p></div>
			<div class="column-owner owner"><img class="" src="<?php echo $direct; ?>img/owner/minhtan.jpg"/><h3 class="h3-dark content-center">Minh Tân</h3><p>CEO</p></div>
		</div>
		<h1 class="surf-h2-dark content-center">Supporter</h1>
		<div class="row">
			<div class="column-owner owner"><img class="" src="<?php echo $direct; ?>img/owner/huyen.jpg"/><h3 class="h3-dark content-center">Nguyễn Huyền</h3><p>Vice Director</p></div>
			<div class="column-owner owner"><img class="" src="<?php echo $direct; ?>img/owner/truong.jpg"/><h3 class="h3-dark content-center">Nguyễn Trường</h3><p>Coder</p></div>
		</div>
	</section>
	<?php include($direct.'core/footer.php'); ?>
</body>
</html>
