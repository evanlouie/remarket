<div class="container-fluid">
<div class="row-fluid">
  <span class="span5">
    <h1 class="heading">{{ $listing->title }}</h1>
    <h5 class="heading">{{ $listing->category }}</h5>

    <div class="row-fluid">   
        <span class = "listing-heading" >Asking Price:</span> <span class ="listing-labels">${{ $listing->price }}</span>
    </div><br />
    <div class="row-fluid">  
        <span class = "listing-heading">Availability:</span> <span class = "listing-labels">{{ $listing->date_available }} to {{ $listing->date_unavailable }} </span>
    </div>

    <div class="row-fluid">  
        <h4 class = "heading">Description</h4>{{$listing->description}}
        <br / > 
    </div><br />
    <a class="btn btn-success" href="mailto:{{ $listing->email }}?subject={{$listing->title}}">Contact Seller</a>
  </span>
  <span class="span5 offset1">
    @if(Session::get('admin') == 1)
      <a id="warning" class="btn btn-danger pull-right">Delete This Post</a>
    @endif
    <a class="btn btn-warning pull-right" href="/listing/flag/{{$listing->id}}">Flag This Post <i class="icon-flag icon-black"></i></a>
   
    <div id="map_canvas" class="pull-right" style="width:550px; height:400px;"></div>
  </span>
</div>
<div class="pull-center">
  <div class="pull-center">
    <div class = "image-collection">
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
              title:'" . addslashes($listing->title) . "'
          });
          map.setCenter(results[0].geometry.location);
        }
      });"; ?>
    
  }

  $(document).on('click', '#warning', function() {
  confirm = confirm( 'Are you sure you want to delete this listing?' );
  if(confirm == true) { window.location = "/listing/masterDelete/" + {{$listing->id}}; }
  else {
    delete window.confirm;
  }
  });
</script>