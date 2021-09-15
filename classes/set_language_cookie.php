	<?php
	$link_directory = $_SERVER['PHP_SELF'];
	$GLOBALS['direct'] = '';
	$GLOBALS['link_directory_array'] = array('/store/');
	for($i=0;$i<count($link_directory_array);$i++){
		$pos = strpos($link_directory,$link_directory_array[$i]);
		if ($pos == true){
			$direct = '../../';
		}else{
			$direct='';
		}
	}
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
	