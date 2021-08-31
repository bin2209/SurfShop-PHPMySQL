<?php 
$title = 'About';
include('core/header.php'); 
include('core/navbar.php');
?>
<style type="text/css">.desktop-about{opacity: .56;}</style>


	<section class=" store content-center">
		<h1 class="surf-h2-dark content-center"><?php echo $LANG_about ?></h1>
		<h1 class="surf-h2-dark content-center"><?php echo $LANG_owner ?></h1>
		<div class="row">
			<div class="column-owner owner"><img class="" src="img/owner/kusan.jpg"/><h3 class="h3-dark content-center">Kusan Watah</h3><p>Co founder</p></div>
			<div class="column-owner owner"><img class="" src="img/owner/rhys.jpg"/><h3 class="h3-dark content-center">Rhys Emlet</h3><p>Co founder</p></div>
			<div class="column-owner owner"><img class="" src="img/owner/minhtan.jpg"/><h3 class="h3-dark content-center">Minh Tân</h3><p>Co founder</p></div>
		</div>
		<h1 class="surf-h2-dark content-center"><?php echo $LANG_support; ?></h1>
		<div class="row">
			<div class="column-owner owner"><img class="" src="img/owner/huyen.jpg"/><h3 class="h3-dark content-center">Nguyễn Huyền</h3><p>UI/UX designer</p></div>
			<div class="column-owner owner"><img class="" src="img/owner/truong.jpg"/><h3 class="h3-dark content-center">Nguyễn Trường</h3><p>Web designer</p></div>
		</div>
	</section>
	<?php include('core/footer.php'); ?>
</body>
</html>
