<div class="container-fluid">
<div class="row-fluid">
  <br><br><br><br><br><br><br><br><br><br>
  <span class="span5 offset1">
    <h1 class="heading">{{ $listing->title }}</h1>
    <h5 class="heading">{{ $listing->category }}</h5>
    <h4 class="heading">{{ $listing->price }}</h4>
    <div class="row-fluid">
      <span class="span6">
        <h4 class="heading">{{ $listing->date_available }}</h4>
      </span>
      <span class="span6">
        <h4 class="heading">{{ $listing->date_unavailable }}</h4>
      </span>
    </div>
    <a class="btn btn-success btn-large pull-center" href="mailto:{{ $listing->email }}?subject={{$listing->title}}">Contact Seller</a>
  </span>
  <span class="span5">
    <div id="map_canvas" style="width:300px; height:300px;"></div>
  </span>
</div>
<div class="pull-center">
  <div class="pull-center">
    <ul class="thumbnails">
      @foreach ($listing->images as $image)
      <li class="span2">
        <div class="thumbnail">
          <img src="http://placehold.it/900x600" class="image">
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>
<div>
  {{$listing->description}}
</div>
</div>
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
    <?php echo "geocoder.geocode( { 'address': '"
      . $location->address . ", " . $location->city . ", " . $location->postal_code .
      "'}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location,
              title:'$listing->title'
          });
          map.setCenter(results[0].geometry.location);
        }
      });"; ?>
    
  }
</script>