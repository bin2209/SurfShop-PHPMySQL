	<?php
	// SET LANGUAGE COOKIE
	if (!isset($_COOKIE['language'])){
		$_COOKIE['language']='en';
		include $direct.'lang/en.php';
	}else if ($_COOKIE['language']=='vi'){
		include $direct.'lang/vn.php';	
	}else if ($_COOKIE['language']=='en'){
		include $direct.'lang/en.php';
	}
	?>
	