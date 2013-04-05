<div class="container-fluid">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading">Manage Locations</h1>
      </span>
    </div>
  </div>
</div>

<div class="row-fluid">
  {{ render( 'account.partials.sidebar' ) }}
  <span class="span9 well">
    <table class="table table-hover table-stiped"><br>
      <thead>
        <tr>
          <th>Address</th>
          <th>City</th>
          <th>Postal Code</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($locations as $location)
        <tr>
          <td><a href="/location/edit/{{$location->id}}">{{$location->address}}</a></td>
          <td>{{$location->city}}</td>
          <td>{{$location->postal_code}}</td>
          <td><a href="/location/edit/{{$location->id}}" class="btn btn-primary btn-small">Edit</a></td>
          <td><a id="{{ $location->id }}" class="warning btn btn-danger btn-small"><i class="icon-trash pull-center"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @if(sizeof($locations)>0)
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
  </span>
</div>
<br>
<script>
function tablesort() {
$(".table").tablesorter().tablesorterPager({container: $("#pager")});
        $('#pager').css('position', '')	
}
$(document).ready(function() 
    { 
       tablesort();
    } 
); 
$(document).on('click', '.warning', function() {
  id = $(this).attr('id');
  confirm = confirm( 'WARNING: Deleting a location will remove all existing listings with that location.' +
                      '\n\n Are you sure you want to delete this location?' );
  if(confirm == true) { window.location = "/location/delete/" + id; }
  else {
    delete window.confirm;
  }
});
$('#myLocations').attr('class', 'active');
</script>