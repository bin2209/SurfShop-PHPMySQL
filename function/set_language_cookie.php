	<?php
	// SET LANGUAGE COOKIE
	if (!isset($_COOKIE['language'])){
		$_COOKIE['language']='en';
		include 'lang/en.php';
	}else if ($_COOKIE['language']=='vi'){
		include 'lang/vn.php';	
	}else if ($_COOKIE['language']=='en'){
		include 'lang/en.php';
	}
	?>
	