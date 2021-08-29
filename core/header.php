<!DOCTYPE html>
<html>
<head>
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LST SURF</title>
	<link rel="icon" type="image/x-icon" href="<?php echo $direct; ?>favicon.ico" />
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo $direct; ?>css/style.css" />
	<link rel="stylesheet" href="<?php echo $direct; ?>css/reponsive.css" />
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