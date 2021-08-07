<!-- get_direct_inside_folder -->

$GLOBALS['local_link']= $_SERVER['PHP_SELF'];
$GLOBALS['host_link']= $_SERVER['HTTP_HOST'];
	// echo $GLOBALS['host_link'];
$link_directory = $_SERVER['PHP_SELF'];
$link_find = 'services/';
	// echo $link_directory;
	// echo $link_find;

$pos = strpos($link_directory,$link_find);
$GLOBALS['direct'] = '';

if ($pos == true){
	$direct = '../';
}

// echo $direct;
