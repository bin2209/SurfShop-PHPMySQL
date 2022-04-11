<?php 
$link_directory = $_SERVER['PHP_SELF'];
$GLOBALS['direct'] = '';
$GLOBALS['link_directory_array'] = array('/store/');
for($i=0;$i<count($link_directory_array);$i++){
	$pos = strpos($link_directory,$link_directory_array[$i]);
	if ($pos == true){
		$direct = '../../';
	}else{
		$direct = '';
	}
}
if(strpos($link_directory,'/verifyReset')){
	$direct='../';
}
@require_once $direct.'core/db_conn.php';
@require_once $direct.'classes/set_language_cookie.php';
?>

<nav class="globalbar">
    <?php
        if (isset($_SESSION['login'])){
            if ($_SESSION['login']==false){
                $soluongsanpham = get_item_bag($_SESSION['ipv4'],$conn);
            }else{
                $soluongsanpham = get_item_bag($_SESSION['user_email'],$conn);
            }
        }else{
            $soluongsanpham = 0;
        }
		//  ĐÃ ĐĂNG NHẬP // GIAO DIỆN: MOBILE
		echo '<label class=" bag menu dropmenubtn mobile"><img class="menu-icon dropmenubtn" src="'.$_DOMAIN.'/assets/img/icon/bag.svg" onclick="Dropdown()" style="width: 19px; position: relative; top: 10px;">
		<span class="number-menu-mobile">'.$soluongsanpham.'</span></label>';
	?>
    <div id="menu-main-menu" class="logo menu">
        <ul id="navbar-main" class="desktop collapse">
            <li class="search-box-mobile"><i class="fas fa-search"></i>
                <form id="search" action="search" method="get">
                    <input type="text" name="src" placeholder="Search">
                    <input type="submit" style="display:none;">
                </form>
            </li>
            <li><a href="/"><img class="logo-imgdesktop" src="<?=$_DOMAIN?>/assets/img/logo-gray.png" /></a>
            </li>
            <li><a href="/store"><?=$LANG_store?></a></li>
            <li><a href="/services"><?=$LANG_services ?></a></li>
            <li><a href="/map"><?=$LANG_map?></a></li>
            <li><a href="/about"><?=$LANG_about?></a></li>
            <li>
                <img class="dropmenubtn menu-icon search-icon" onclick="Searchdown()"
                    src="<?=$_DOMAIN?>/assets/img/icon/search.png"
                    style="width: 20px; position: relative; top: 19px; right: 44px;">
                <img class="dropmenubtn menu-icon" onclick="Dropdown()" src="<?=$_DOMAIN?>/assets/img/icon/bag.svg"
                    style="width: 19px; position: relative; top: 19px;">
                <span class="number-menu-pc"><?=$soluongsanpham?></span>
            </li>
        </ul>

    </div>

    <form id="search-pc" action="<?=$_DOMAIN?>/search" method="get">
        <img class="" src="<?=$_DOMAIN?>/assets/img/icon/search.png"
            style="width: 20px; position: relative; top: 19px; right: -7px;">
        <input type="text" name="src" placeholder="<?=$LANG_search?>">
        <input type="submit" style="display:none;">
        <img onclick="Searchclose()" class=" menu-icon" src="<?=$_DOMAIN?>/assets/img/icon/close.png"
            style="width: 18px; position: relative; top: 4px; right: -7px; cursor: pointer;">
    </form>

    <div id="Dropdownmenu" class="dropdown-content">
        <?php 
            if(!isset($_SESSION['login'])||$_SESSION['login']==false){
                echo '
                <a href="'.$_DOMAIN.'/cart"><img src="'.$_DOMAIN.'/assets/img/bag.svg"/><p>'.$LANG_bag.'</p></a><span class="order-dropdown">'.$soluongsanpham.'</span>
                <hr>
                <a href="'.$_DOMAIN.'/login"><img src="'.$_DOMAIN.'/assets/img/signIn.svg"/><p>'.$LANG_signin.'</p></a>
                ';
            }else if($_SESSION['login']==true){
                // MENU DROPDOWN CLICKED
                echo '
                <a href="'.$_DOMAIN.'/cart"><img src="'.$_DOMAIN.'/assets/img/bag.svg"/><p>'.$LANG_bag.'</p></a><span class="order-dropdown">'.$soluongsanpham.'</span>
                <hr>';
                if ($_SESSION['type']==1){
                    echo '
                    <a href="'.$_DOMAIN.'/admin"><img src="'.$_DOMAIN.'/assets/img/account.svg"/><p>'.$LANG_adminpage.'</p></a>
                    <hr>';
                }
                echo '	
                <a href="'.$_DOMAIN.'/account"><img src="'.$_DOMAIN.'/assets/img/account.svg"/><p>'.$LANG_account.'</p></a>
                <hr>
                <a href="'.$_DOMAIN.'/logout"><img src="'.$_DOMAIN.'/assets/img/signIn.svg"/><p>'.$LANG_logout.'</p></a>
                ';
            }
            ?>
    </div>

    <label id="#dropdown-button" data-toggle="collapse" data-target="#navbar-main" for="active"
        class="menu-btn menu mobile zindex-mobile"><img class="dropmenubtn menu-icon" src="<?=$_DOMAIN?>/assets/img/menu.svg"
            style="width: 20px; position: relative;"></label>

    <label type="button" class="menu-btn menu mobile" style="height: 44px; left: 0; position: relative; top: -4px;"><a
            href="/"><img style="height:50px; width:50px;" src="<?=$_DOMAIN ?>/assets/img/logo-gray.png" /></a></label>
</nav>