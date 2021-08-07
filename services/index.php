<!DOCTYPE html>
<html>
<head>
	<?php include('../core/header.php'); 
	$GLOBALS['local_link']= $_SERVER['PHP_SELF'];
	$GLOBALS['host_link']=$_SERVER['HTTP_HOST'];
	?>
</head>
<body>
	<!-- BAR -->
	<?php include($host_link.'.../core/navbar.php'); 
	echo $host_link.'/core/navbar.php';
	
	?>
	<!-- ENDBAR -->

	<section>
		<div class="hero content-center">
			<!-- <h1 class="hero-h1 ">LST SURF DA NANG </h1> -->
			<img class="img-hero" src="img/logo-white">
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
			<div class="column-owner owner"><img class="" src="img/owner/kusan.jpg"/><h3 class="h3-dark content-center">Kusan Watah</h3><p>Giám đốc</p></div>
			<div class="column-owner owner"><img class="" src="img/owner/rhys.jpg"/><h3 class="h3-dark content-center">Rhys Emlet</h3><p>Giám đốc</p></div>
			<div class="column-owner owner"><img class="" src="img/owner/minhtan.jpg"/><h3 class="h3-dark content-center">Minh Tân</h3><p>Giám đốc</p></div>
		</div>
		<h1 class="surf-h2-dark content-center">Supporter</h1>
		<div class="row">
			<div class="column-owner owner"><img class="" src="img/owner/huyen.jpg"/><h3 class="h3-dark content-center">Nguyễn Huyền</h3><p>Phó giám đốc</p></div>
			<div class="column-owner owner"><img class="" src="img/owner/truong.jpg"/><h3 class="h3-dark content-center">Nguyễn Trường</h3><p>Website</p></div>
		</div>
	</section>



	<?php include('../core/footer.php'); ?>

</body>
</html>
