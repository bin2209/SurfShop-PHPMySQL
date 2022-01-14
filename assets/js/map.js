const options = {
		// key: 'TDKKiQbBHNjQ7myN3TE1JCfeMRoG1OVD', 
        key: 'OlkUJle8QLXnVzMMup89Ijty9VMUKkwt',
        
        verbose: true,

    // Optional: Initial state of the map
    lat: 16.058,
    lon:  108.221,
    zoom: 6,
};

// Initialize Windy API
windyInit(options, windyAPI => {
	const { picker, utils, broadcast, map } = windyAPI;
	const overlays = ['rain', 'wind', 'temp', 'clouds'];
	let i = 0;
    //PICKER
    picker.on('pickerOpened', latLon => {
        // picker has been opened at latLon coords
        console.log(latLon);

        const { lat, lon, values, overlay } = picker.getParams();
        // -> 48.4, 14.3, [ U,V, ], 'wind'
        console.log(lat, lon, values, overlay);

        const windObject = utils.wind2obj(values);
        console.log(windObject);
    });

    picker.on('pickerMoved', latLon => {
        // picker was dragged by user to latLon coords
        console.log(latLon);
    });

    picker.on('pickerClosed', () => {
        // picker was closed
    });

    // Wait since wather is rendered
    broadcast.once('redrawFinished', () => {
    	picker.open({ lat: 16.058, lon: 108.221 });
        // Opening of a picker (async)
    });
//BROADCAST 
setInterval(() => {
	i = i === 3 ? 0 : i + 1;
	store.set('overlay', overlays[i]);
}, 800);

    // Observe the most important broadcasts
    broadcast.on('paramsChanged', params => {
    	console.log('Params changed:', params);
    });

    broadcast.on('redrawFinished', params => {
    	console.log('Map was rendered:', params);
    });


    // .map is instance of Leaflet map

    L.popup()
    .setLatLng([16.058, 108.221])
    .setContent('LST Surf')
    .openOn(map);
});