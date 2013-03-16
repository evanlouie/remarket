<!-- pass the map's addresses as $listings->listing->address -->
<div id="map_canvas" style="width:100%; height:100%;"></div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHQnPSIos4woqO1xkhsUh9Si5ebskymUo&sensor=true"></script>
<script type="text/javascript">
	window.onload = initialize;

	var geocoder;
	var map;
	function initialize() {
		geocoder = new google.maps.Geocoder();
		var mapOptions = {
		center: new google.maps.LatLng(49.250, -123.111),
		zoom: 12,
		mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

		getAddresses();
	}

	function getAddresses() {
		var address = null;

		<?php foreach( $listings as $listing ) {
			echo "geocoder.geocode( { 'address': '$listing->address'}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						var marker = new google.maps.Marker({
						    map: map,
						    position: results[0].geometry.location,
						    title:'$listing->title'
						});
						var contentString = '<div class=" . '"' . 'text-center' . '"' . 
						"><h4>$listing->title - "."$"."$listing->price</h3><a href=" . '"/listing/'. $listing->id . '"' ."><button class=" . '"' . 'btn btn-primary type=' . '"' . 'button' . '"' . ">Check it out!</button></a></div>';
						var infowindow = new google.maps.InfoWindow({
						    content: contentString
						});
						google.maps.event.addListener(marker, 'click', function() {
							infowindow.open(map,marker);
						});
					} else {
					alert('Geocode was not successful for the following reason: ' + status);
					}
				});";
			}
		?>
	}
</script>