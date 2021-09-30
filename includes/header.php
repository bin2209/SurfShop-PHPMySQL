<?php
$link_directory = $_SERVER['PHP_SELF'];
$GLOBALS['direct'] = '';
$GLOBALS['link_directory_array'] = array('/store/');
for($i=0;$i<count($link_directory_array);$i++){
  $pos = strpos($link_directory,$link_directory_array[$i]);
  if ($pos == true){
    $direct1 = '../../';
    $direct2 = '../../';
  }else{
    $direct1 = '';
    $direct2 = '';
  }
}

@require_once $direct1.'core/db_conn.php';
@require_once $direct2.'classes/set_language_cookie.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="Keywords" content="surf, surfing, surfer, surfboard, surfergirl, surflife, surfers, surfphotography, surfersparadise, surftrip, surfgirl, surfinglife, surfacedesign, surface, surfsup, surfacepattern, surfstyle, surfboards, surfart, surfacepatterndesign, surfline, surfandturf, surfwear, surfcity, SURFERphotos, Surfshop, surfcamp, surfschool, surflinelocalpro, surfgirls, surfphoto, surfcoast, surfskate, surfingiseverything, surfspot, surfernutrition, surfista, surfacepro, surfe, surfphotos, surfporn, surffishing, surfergirls, surfnoturf, surfingmagazine, surfculture, surfcityUSA, surfingphotography, surfingday, surferboy, surfpics, skate, skateboarding, skateboard, skatelife, skater, skatepark, skateeverydamnday, skateordie, skateanddestroy, skateboarder, skateboardingisfun, skatergirl, skateboards, skateshop, skatespot, skatecrunch, skateGram, skateclipsdaily, skaters, skates, skatefam, skatephotoaday, skatewear, skaterguy, SkateGirl, skateallday, skatermemes, skateaholic, skateday, skatesubmit, surfboard, surfboards, surfboardart, surfboarding, surfboardshaping, surfboardshaper, surfboarddesign, surfboardbag, surfboardforsale, surfboardbuyandsell, surfboardcovers, surfboarder, surfboardfactory, surfboardscustom, surfboardsbydonaldtakayama, surfboardcover, surfboardfins, SurfboardShape, surfboardpaints, surfboardnext, surfboardprints, surfboardquiver, surfboardrack, surfboardrental, surfboardresin, surfboardshorts, surfboardsale, surfboardsandshotguns, surfboardsock, surfboardsbyclutch">
  <meta name="Description" content="Surf shop, Skate shop, Rentals, Repairs, Lessons, and Custom boards">
  <meta property="og:image" content="https://lstsurf.com/assets/img/og-image.jpg" />
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="vi_VN" />
  <meta property="og:url" content="<?php echo $_DOMAIN ?>" />
  <meta property="og:site_name" content="LSTsurf" />
  <title>LST SURF </title> 
  <link rel="icon" type="image/x-icon" href="<?php echo $_DOMAIN ?>/assets/img/favicon.ico" />
  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo $_DOMAIN ?>/assets/css/style.css" />
  <link rel="stylesheet" href="<?php echo $_DOMAIN ?>/assets/css/reponsive.css" />
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

  <!-- JS -->
  <script src="https://kit.fontawesome.com/7c7aa69b90.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
	<!-- Messenger Plugin chat Code -->
  <div id="fb-root"></div>

  <!-- Your Plugin chat code -->
  <div id="fb-customer-chat" class="fb-customerchat">
  </div>

  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "102598422088761");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v11.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>