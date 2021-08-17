<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<?php include('core/header.php'); 

	?>
	
</head>
<body>
	<?php include('core/navbar.php'); 
	?>
	<div id="windy"></div>
	<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
	<script src="https://api.windy.com/assets/map-forecast/libBoot.js"></script>
	<style>
	#windy #bottom #progress-bar #playpause{
		z-index: 1;
	}
	#windy {
		width: 100%;
		height: 70vh;
	}
	#windy #logo{
		display: none;
	}
	#windy #embed-zoom{
		top: 70px !important;
	}
</style>
<script type="text/javascript">
	const options = {
    // Required: API key
    key: 'OlkUJle8QLXnVzMMup89Ijty9VMUKkwt', // REPLACE WITH YOUR KEY !!!

    // Put additional console output
    verbose: true,

    // Optional: Initial state of the map
    lat: 16.058,
    lon:  108.221,
    zoom: 5,
};

// Initialize Windy API
windyInit(options, windyAPI => {
    // windyAPI is ready, and contain 'map', 'store',
    // 'picker' and other usefull stuff

    const { map } = windyAPI;
    // .map is instance of Leaflet map

    L.popup()
    .setLatLng([16.058, 108.221])
    .setContent('LST Surf')
    .openOn(map);
});
</script>
<?php include('core/footer.php'); ?>
</body>
</html>