
<?php include('core/header.php'); 

?>

<?php
include('core/navbar.php');
?>
<div id="windy"></div>
<div class="thanks-windy">
	Thanks  <a href="https://www.windy.com">Windyty, SE;</a>
</div>

<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
<script src="https://api.windy.com/assets/map-forecast/libBoot.js"></script>

<style>
#windy #map-container .picker a{
	display: none;
}
#plugin-menu .plugin-content::before{
	display: none;
}
#windy #bottom #progress-bar #playpause{
	z-index: 1;
}
#windy {
	width: 100%;
	height: 84vh;
}
#windy #logo{
	display: none;
}
#windy .top-border{
	top: 68px !important;
}
#windy #embed-zoom{
	-webkit-transform: scale(1);
	    -ms-transform: scale(1);
	        transform: scale(1);
	top: 120px !important;
}
#windy #plugin-menu .plugin-content #layers-menu{
	top: 30px;
}
.menu-block{
	top: 30px;
}
#windy #mobile-ovr-select{
	-webkit-transform: scale(1,1);
	    -ms-transform: scale(1,1);
	        transform: scale(1,1);
}

#plugin-menu .plugin-content #layers-menu a{
	padding-left: 1em;
}
#plugin-menu .build-info{
	display: none;
}
#plugin-menu{
	height: 70vh;
	z-index: 1;
}
#windy .plugin-mobile-rhpane .plugin-content{
	-webkit-backdrop-filter: saturate(180%) blur(20px);
	        backdrop-filter: saturate(180%) blur(20px);
	background-color: rgba(0,0,0,0.8)!important;
}
#windy #plugin-menu .closing-x{
	left: auto;
}
.thanks-windy{
	text-align: center;
	color: #9e9e9e;
	position: relative;
	bottom: 0;
}
.thanks-windy a{
	width: -webkit-fill-available;
	text-decoration: none;
	color: #06f;
}
#windy .ui-switch{
	display: none;
}

</style>

<script src="js/map.js"></script>
<?php include('core/footer.php'); ?>
</body>
</html>