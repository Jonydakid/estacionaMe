var platform = new H.service.Platform({
  app_id: 'bXEZB3NR8OQPdhLumUdA',
  app_code: 'AH7q6HHHJeKoeTtGYjyBVQ',
});
//Step 2: initialize a map  - not specificing a location will give a whole world view.
var map = new H.Map(document.getElementById('map'),
  platform.createDefaultLayers().normal.map,{
    	zoom:10,
    	center :{lat:-32.832, lng:-70.598}

    }
);
//Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)

var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

var geocoderService = platform.getGeocodingService();

if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(position => {
		map.setCenter({
			lat:position.coords.latitude,
			lng:position.coords.longitude
		});
		geocoderService.reverseGeocode({
			mode:"retrieveAddress",
			maxresults:1,
			prox: position.coords.latitude + ","+position.coords.longitude
		},
		success=>{

			console.log(success.Response);
		},
		error=>{
			console.error(error);
		}
			
			)
	});

}
