<?php
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
