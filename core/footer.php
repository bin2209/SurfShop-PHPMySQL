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

	?>
	<footer>
		<div class="language">
			<p class="language-p">Language:</p> 
			<span id="english" class="lang lang-eng">United States</span> 
			<span id="vietnam" class="lang lang-vn">Tiếng Việt</span>
		</div>

		<br>
		<br>
		<a href="https://fb.com/LSTsurf/" target="_blank"><img class="icon-social" src="<?php echo $direct; ?>img/icon/facebook.png"></a>
		<a href="mailto:lst.surf.skate@gmail.com" target="_blank"><img class="icon-social" src="<?php echo $direct; ?>img/icon/mail.png"></a>
		<br>
		10 Mỹ Đa Đông 10, Phường Mỹ An, Quận Ngũ Hành Sơn, Thành phố Đà Nẵng, Việt Nam
		<hr>
		<span class="footer-info">MST:0402106581</span>
		<div class="footer-copyright"> Copyright © 2021 LSTsurf. All rights reserved.</div>
		<br>
	</footer>
	<script type="text/javascript" src="<?php echo $direct; ?>js/build.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
