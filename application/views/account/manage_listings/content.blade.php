<div class="container-fluid">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading">My Listings</h1>
      </span>
    </div>
  </div>
</div>

<div class="row-fluid">
  {{ render( 'account.partials.sidebar' ) }}
  <span class="span9 well">
    <table class="table table-hover table-stiped">
      <thead>
        <tr>
          <th>Title</th>
          <th>Location</th>
          <th>Category</th>
          <th>Listing Expires</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($listings as $listing)
        <tr>
          <td><a href="/listing/{{$listing->id}}">{{$listing->title}}</a></td>
          <td class="td-1">{{ $listing->location->address }}, {{ $listing->location->city }}, {{ $listing->location->postal_code }}</td>
          <td>{{ $listing->category }}</td>
          <td>{{substr($listing->date_unavailable, 0, -9)}}</td>
          <td><a href="/listing/edit/{{$listing->id}}" class="btn btn-primary btn-small">Edit</a></td>
          <td><a id="{{ $listing->id }}" class="warning btn btn-danger btn-small"><i class="icon-trash pull-center"></i></a></td>
        </tr>
        @endforeach
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
  </span>
</div>
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
  confirm = confirm( 'Are you sure you want to delete this listing?' );
  if(confirm == true) { window.location = "/listing/delete/" + id; }
  else {
    delete window.confirm;
  }
});
$('#myListings').attr('class', 'active');
</script>