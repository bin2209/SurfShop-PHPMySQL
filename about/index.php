<?php 
include '../function/get_link_folder.php'; 
// HEADER
include($direct.'core/header.php');
// NAVBAR
include($direct.'core/navbar.php');
?>



	<section class=" store content-center">
		<h1 class="surf-h2-dark content-center"><?php echo $LANG_about ?></h1>
		<h1 class="surf-h2-dark content-center"><?php echo $LANG_owner ?></h1>
		<div class="row">
			<div class="column-owner owner"><img class="" src="<?php echo $direct; ?>img/owner/kusan.jpg"/><h3 class="h3-dark content-center">Kusan Watah</h3><p>CEO</p></div>
			<div class="column-owner owner"><img class="" src="<?php echo $direct; ?>img/owner/rhys.jpg"/><h3 class="h3-dark content-center">Rhys Emlet</h3><p>CEO</p></div>
			<div class="column-owner owner"><img class="" src="<?php echo $direct; ?>img/owner/minhtan.jpg"/><h3 class="h3-dark content-center">Minh Tân</h3><p>CEO</p></div>
		</div>
		<h1 class="surf-h2-dark content-center"><?php echo $LANG_support; ?></h1>
		<div class="row">
			<div class="column-owner owner"><img class="" src="<?php echo $direct; ?>img/owner/huyen.jpg"/><h3 class="h3-dark content-center">Nguyễn Huyền</h3><p>Vice Director</p></div>
			<div class="column-owner owner"><img class="" src="<?php echo $direct; ?>img/owner/truong.jpg"/><h3 class="h3-dark content-center">Nguyễn Trường</h3><p>Coder</p></div>
		</div>
	</section>
	<?php include($direct.'core/footer.php'); ?>
</body>
</html>
