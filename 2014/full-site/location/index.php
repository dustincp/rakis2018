<?php include "../header.php" ?>
<style>
#map_canvas {
	height: 820px;
	width: 530px;
	margin: 50px 0 0 30px;
	float:right;
}
.mapPop h1 {
	margin:0 0 5px 0;
	font-family: 'Vollkorn', serif;
}
.mapPop p {
	margin:0 0 5px 0;
	font-family: 'Vollkorn', serif;
	color:#000;
	font-size:16px;
}
</style>
<div id="map_canvas"></div>
<h1>Rakis 2014 Site Map</h1>
<p>Rakis is located at the Quint Valley Fairgrounds in Byers, Co. Just 40 minutes from Denver International Airport, Byers is a small town with a well stocked general store and a motel. Strasburg, a few minutes west, has more lodging options and amenities.  </p>
<p>Get directions via <a href="https://www.google.com/maps/dir//39.7246748,-104.2160273/39.7259898,-104.2211878/@39.7247009,-104.219691,478m/data=!3m1!1e3!4m5!4m4!1m0!1m0!1m0!3e0" target="_blank">Google Maps</a>. Specific coordinates for the Rakis site entrance: 39.725960, -104.221156.</p>
<h1>Directions From the West (Denver, Co and the Airport)</h1>
<ul>
	<li>Follow I-70 E to US-36 E/N Main St in Byers. </li>
    <li>Take exit 316 from I-70 E.</li>
    <li>Turn left onto US-36 E/N Main St.</li>
	<li>Continue to follow US-36 E.</li>
	<li>Turn left onto Main St.</li>
    <li>Follow signs to gate.</li>
</ul>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvi3dxGLtirF9aUkCrlvgkvS7jYV967-8&sensor=false"></script>
<script>
var empire = new google.maps.LatLng(39.728447, -104.221203);

var styles = [
  {
    "stylers": [
      { "hue": "#851417" }
    ]
  }
];


var map;

var infowindow = new google.maps.InfoWindow();

function initialize() {
	var mapOptions = {
	  zoom: 17,
	  mapTypeId: google.maps.MapTypeId.HYBRID,
	  center: empire,
	  maxZoom:17,
	  minZoom:15,
	  disableDefaultUI:'false'
	};

	map = new google.maps.Map(document.getElementById('map_canvas'),
			mapOptions);
	//map.setOptions({styles: styles});
	
	/*var rakisSite;
	var rakisCoords = [
		new google.maps.LatLng(39.731679, -104.223170),
		new google.maps.LatLng(39.730898, -104.220138),
		new google.maps.LatLng(39.726438, -104.219626),
		new google.maps.LatLng(39.725453, -104.221652),
		new google.maps.LatLng(39.726209, -104.223287),
		new google.maps.LatLng(39.731679, -104.223170)
	];	
	rakisSite = new google.maps.Polygon({
		paths: rakisCoords,
		strokeColor: '#851417',
		strokeOpacity: 0.8,
		strokeWeight: 2,
		fillColor: '#851417',
		fillOpacity: 0.3
	});
	rakisSite.setMap(map);*/
	
	var hallMarker = new google.maps.Marker({
		position: new google.maps.LatLng(39.725763, -104.221550),
		map: map,
		icon: '/img/map_icons/hall.png',
		title: 'The Great Hall'
	});
	var arenaMarker = new google.maps.Marker({
		position: new google.maps.LatLng(39.726806, -104.220409),
		map: map,
		icon: '/img/map_icons/arena.png',
		title: 'Warrior\'s Arena'
	});
	var fireMarker = new google.maps.Marker({
		position: new google.maps.LatLng(39.726705, -104.222140),
		map: map,
		icon: '/img/map_icons/fire.png',
		title: 'Fire Shrine'
	});
	var tavernMarker = new google.maps.Marker({
		position: new google.maps.LatLng(39.726434, -104.221411),
		map: map,
		icon: '/img/map_icons/tavern.png',
		title: 'A Mysterious Tavern'
	});
	var anchor1Marker = new google.maps.Marker({
		position: new google.maps.LatLng(39.725851, -104.220645),
		map: map,
		icon: '/img/map_icons/anchor.png',
		title: 'Dark Anchor'
	});
	var anchor2Marker = new google.maps.Marker({
		position: new google.maps.LatLng(39.727090, -104.221311),
		map: map,
		icon: '/img/map_icons/anchor.png',
		title: 'Dark Anchor'
	});
	var anchor3Marker = new google.maps.Marker({
		position: new google.maps.LatLng(39.729652, -104.221802),
		map: map,
		icon: '/img/map_icons/anchor.png',
		title: 'Dark Anchor'
	});
	var dragonMarker = new google.maps.Marker({
		position: new google.maps.LatLng(39.728153, -104.222702),
		map: map,
		icon: '/img/map_icons/dragon.png',
		title: 'Unknown Adventure'
	});
	var poi1Marker = new google.maps.Marker({
		position: new google.maps.LatLng(39.727710, -104.221002),
		map: map,
		icon: '/img/map_icons/poi1.png',
		title: 'Unknown Adventure'
	});
	var poi2Marker = new google.maps.Marker({
		position: new google.maps.LatLng(39.729045, -104.222433),
		map: map,
		icon: '/img/map_icons/poi2.png',
		title: 'Unknown Adventure'
	});
	var poi3Marker = new google.maps.Marker({
		position: new google.maps.LatLng(39.729724, -104.222917),
		map: map,
		icon: '/img/map_icons/poi3.png',
		title: 'Unknown Adventure'
	});
	var poi4Marker = new google.maps.Marker({
		position: new google.maps.LatLng(39.730094, -104.221236),
		map: map,
		icon: '/img/map_icons/poi4.png',
		title: 'Unknown Adventure'
	});

  var infoWindow = new google.maps.InfoWindow({
  });

  var hallPop = '<div class="mapPop">'+
      '<h1>The Great Hall</h1>'+
      '<p>Feasts and Imperial Court.</p>'+
      '</div>';
  var arenaPop = '<div class="mapPop">'+
      '<h1>Warrior\'s Arena</h1>'+
      '<p>A sandy arena where you can test your martial prowess. </p>'+
      '</div>';
  var tavernPop = '<div class="mapPop">'+
      '<h1>A Mysterious Tavern</h1>'+
      '<p>Quests and adventuring headquarters.</p>'+
      '</div>';
  var firePop = '<div class="mapPop">'+
      '<h1>Fire Shrine</h1>'+
      '<p>An excellent place to gather for entertainment.</p>'+
      '</div>';
  var anchorPop = '<div class="mapPop">'+
      '<h1>Dark Anchor</h1>'+
      '<p>A blight on our land.</p>'+
      '</div>';
  var unknownPop = '<div class="mapPop">'+
      '<h1>Unknown Adventure</h1>'+
      '<p>Check back for more information.</p>'+
      '</div>';
	  
  google.maps.event.addListener(hallMarker, 'click', function() {
	infoWindow.setContent(hallPop);
    infoWindow.open(map,hallMarker);
  });
  google.maps.event.addListener(arenaMarker, 'click', function() {
	infoWindow.setContent(arenaPop);
    infoWindow.open(map,arenaMarker);
  });
  google.maps.event.addListener(tavernMarker, 'click', function() {
	infoWindow.setContent(tavernPop);
    infoWindow.open(map,tavernMarker);
  });
  google.maps.event.addListener(fireMarker, 'click', function() {
	infoWindow.setContent(firePop);
    infoWindow.open(map,fireMarker);
  });
  google.maps.event.addListener(dragonMarker, 'click', function() {
	infoWindow.setContent(unknownPop);
    infoWindow.open(map,dragonMarker);
  });
  google.maps.event.addListener(poi1Marker, 'click', function() {
	infoWindow.setContent(unknownPop);
    infoWindow.open(map,poi1Marker);
  });
  google.maps.event.addListener(poi2Marker, 'click', function() {
	infoWindow.setContent(unknownPop);
    infoWindow.open(map,poi2Marker);
  });
  google.maps.event.addListener(poi3Marker, 'click', function() {
	infoWindow.setContent(unknownPop);
    infoWindow.open(map,poi3Marker);
  });
  google.maps.event.addListener(poi4Marker, 'click', function() {
	infoWindow.setContent(unknownPop);
    infoWindow.open(map,poi4Marker);
  });
  google.maps.event.addListener(anchor1Marker, 'click', function() {
	infoWindow.setContent(anchorPop);
    infoWindow.open(map,anchor1Marker);
  });
  google.maps.event.addListener(anchor2Marker, 'click', function() {
	infoWindow.setContent(anchorPop);
    infoWindow.open(map,anchor2Marker);
  });
  google.maps.event.addListener(anchor3Marker, 'click', function() {
	infoWindow.setContent(anchorPop);
    infoWindow.open(map,anchor3Marker);
  });
	
	var imageBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(39.72521125436648, -104.22402429580688),
      new google.maps.LatLng(39.73174632694736, -104.21847748756409));
	  
	rakisOverlay = new google.maps.GroundOverlay(
      '/img/map_icons/rakis_map.png',
      imageBounds);
  	rakisOverlay.setMap(map);
}

$(document).ready(function(){
	initialize();
});
</script>
<?php include "../footer.php" ?>