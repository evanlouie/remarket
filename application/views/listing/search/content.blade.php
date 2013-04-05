 <div class="container-fluid1">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading">Browse Listings</h1>
      </span>
    </div>
  </div>
</div>

<div class="container-fluid containuer-fluid-2">
  <div>
    <div class="row-fluid">
      <span class="span12 well">
        <form class="pull-center" action="/listing" method='GET'>
          <h1 class="heading">Search</h1>
          <input class="textinput span8 textinput-1" type="text" name="q" placeholder="eg. Wood, Windows, Plumbing, etc...">
          <input class="textinput span2 textinput-1 textinput-2" type="number" step='any' name="minP" placeholder="Minimum price">
          <input class="textinput span2 textinput-1 textinput-2" type="number" step='any' name="maxP" placeholder="Maximum price">
          <input class="textinput span7 textinput-3" type="text" name="city" placeholder="City">
          <select name="category_id">
            <option value=''>All</option>
            @foreach ($categories as $c)
            <option value="{{$c->id}}">{{$c->title}}</option>
            @endforeach
          </select>
          <button class="btn btn-primary" type='submit'>Search</button>
        </form>
      </span>
    </div>
    <span></span>
  </div>
  <div class="row-fluid">
    <span class="span3 well">
      <div>
        <table class="table">
          <thead>
            <tr>
              <th class="cke_focus">Category</th>
            </tr>
          </thead>
          <tbody>
            @while(!empty($categories))
            <tr>
              <td>
                <?php $c = array_pop($categories) ?>
                <a class="dom-link" href="/listing?category_id={{$c->id}}">{{$c->title}}</a>
              </td>
              @if(!empty($categories))
                <td>
                  <?php $c = array_pop($categories) ?>
                  <a class="dom-link" href="/listing?category_id={{$c->id}}">{{$c->title}}</a>
                </td>
              @else
                <td></td>
              @endif
            </tr>
            @endwhile
          </tbody>
        </table>
      </div>
    </span>
    <span class="span9 well">
      <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Table View</a></li>
          <li><a id="getMap" href="#tabs-2">Map View</a></li>
        </ul>
        <div id="tabs-1">
          @if(sizeOf($listings) == 0)
          <h4> No results were found. </h4>
          @else
          <table id="tabletosort" class="table table-hover table-stiped">
            <thead>
              <tr>
                <th class="cke_focus cke_focus-1">Title</th>
                <th class="cke_focus cke_focus-2">Price</th>
                <th class="cke_focus cke_focus-3">Category</th>
                <th class="cke_focus cke_focus-4">Location</th>
                <th class="th-1">Date Posted</th>
              </tr>
            </thead>
            <tbody>
              @foreach($listings as $listing)
              <tr>
                <td><a href="/listing/{{$listing->id}}">{{$listing->title}}</a></td>
                <td>${{$listing->price}}</td>
                <td>{{$listing->category}}</td>
                <td class="td-1">{{$listing->location}}</td>
                <td>{{substr($listing->date_available,0,-9)}}</td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          @if(sizeof($listings)>0)
          <div id="pager" style='position: relative;' class="pager">
            <form>
              <img class="first icon-fast-backward"/>
              <img class="icon-backward prev"/>
              <input type="text" class="pagedisplay"/>
              <img class="icon-forward next"/>
              <img class="last icon-fast-forward"/>
              <select class="pagesize">
                <option selected="selected"  value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option  value="40">40</option>
              </select>
            </form>
          </div>
          @endif
        </div>
        <div id="tabs-2" class="span12" style="height:500px">
          <div id="map_canvas" style="width:100%;height:100%"></div>
        </div>
      </div>
    </div>
  </span>
</div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHQnPSIos4woqO1xkhsUh9Si5ebskymUo&sensor=true"></script>
<script>
$(function() {
  $( "#tabs" ).tabs();
});
</script>
<script type="text/javascript">
$(document).ready(function() 
    { 
        $("#tabletosort").tablesorter().tablesorterPager({container: $("#pager")});
        $('#pager').css('position', '')
    } 
); 

$(document).on('click', '#getMap', function() {
  initialize();
});

function clearIt() {
  document.getElementById('map_canvas').innerHTML = "";
}

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
    $title = $listing->title;
    $title = htmlspecialchars($title);
    // $title = str_replace("/", "&#92;", $title);
    // $title = str_replace("\\", '&#47;', $title);
    $title = str_replace("'", '&#039;', $title);
    $title = str_replace('"', '&quot', $title);
    $title = json_encode($title);
    $string = "geocoder.geocode( { 'address': '$listing->location'}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
          title:'".$title."'
        });
 var contentString = '<div class=" . '"' . 'text-center' . '"' . 
 "><h4>".addslashes($title)." - "."$"."$listing->price</h4><a href=" . '"/listing/'. $listing->id . '"' ."><button class=" . '"' . 'btn btn-primary type=' . '"' . 'button' . '"' . ">Check it out!</button></a></div>';
 var infowindow = new google.maps.InfoWindow({
  content: contentString
});
 google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
});
}
});";
    // $string = htmlspecialchars($string);
    // $string = str_replace("/", "&#92;", $string);
    // $string = str_replace("\\", '&#47;', $string);
    // // $string = str_replace("'", '&#039;', $string);
    // // $string = str_replace('"', '&quot', $string);
    echo $string;
}
?>
}
</script>