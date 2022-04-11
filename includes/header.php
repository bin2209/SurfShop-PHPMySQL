<!DOCTYPE html>
<html>
<head>
  <?php
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
    if (isset($_GET['act'])){
      $xss = new Anti_xss;
      $act = $xss->clean_up($_GET['act']);
    }else{
      $act = '';
    }

    $sql = "SELECT * FROM meta_tags WHERE meta_url = '$act'";
    $stmt = $conn->prepare($sql); 

    $stmt->execute();
    $meta_tags = $stmt->fetch();
    if ($stmt->rowCount() === 1) {
    $meta_title = $meta_tags['meta_title'];
    $meta_keywords = $meta_tags['meta_keywords'];
    $meta_description = $meta_tags['meta_description'];
    }else{
      $meta_title = '';
      $meta_keywords = '';
      $meta_description = '';
    }
  ?>
  <title>LST SURF - <?=$meta_title?></title> 
	<meta charset="utf-8">
  <link rel="shortcut icon" href="<?=$_DOMAIN?>/assets/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?=$_DOMAIN?>/assets/img/favicon.png">
  <link rel="image_src" href="<?=$_DOMAIN?>/assets/img/favicon.png"> 
  <link rel="search" type="application/opensearchdescription+xml" title="LST SURF" href="/opensearch.xml">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
  <meta name="keywords" content="<?=$meta_keywords?>">
  <meta name="description" content="<?=$meta_description?>">
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?=$actual_link?>" />
  <meta property="og:site_name" content="LST SURF" />
  <meta name="google-site-verification" content="Afpi_OW1-0LomXrDC-SwNRZSPuJ3JljpByI_aP956YY" />
  <!-- CSS -->
  <link rel="stylesheet" href="<?=$_DOMAIN?>/assets/css/style.min.css" />
  <link rel="stylesheet" href="<?=$_DOMAIN?>/assets/css/reponsive.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <!-- JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Sweet aleft  -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Owl carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
  <div id="fb-root"></div><!-- Messenger Plugin chat Code -->
  <div id="fb-customer-chat" class="fb-customerchat"></div><!-- Facebook Plugin chat code -->
  <script>var chatbox = document.getElementById('fb-customer-chat'); chatbox.setAttribute("page_id", "102598422088761"); chatbox.setAttribute("attribution", "biz_inbox"); window.fbAsyncInit = function() { FB.init({ xfbml            : true, version          : 'v11.0' }); }; (function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>