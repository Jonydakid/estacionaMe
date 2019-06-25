
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

var svgMarkup = '<svg width="24" height="24" ' +
  'xmlns="http://www.w3.org/2000/svg">' +
  '<rect stroke="white" fill="#1b468d" x="1" y="1" width="22" ' +
  'height="22" /><text x="12" y="18" font-size="12pt" ' +
  'font-family="Arial" font-weight="bold" text-anchor="middle" ' +
  'fill="white">H</text></svg>';

// Create an icon, an object holding the latitude and longitude, and a marker:
var icon = new H.map.Icon(svgMarkup),
  coords = {lat: 52.53075, lng: 13.3851},
  marker = new H.map.Marker(coords, {icon: icon});

// Add the marker to the map and center the map at the location of the marker:
map.addObject(marker);
map.setCenter(coords);