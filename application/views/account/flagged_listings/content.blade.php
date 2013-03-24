<div class="container-fluid">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading">Flagged Listings</h1>
      </span>
    </div>
  </div>
</div>

<div class="row-fluid">
  {{ render( 'account.partials.sidebar' ) }}
  <span class="span9">
    <table class="table table-hover table-stiped">
      <thead>
        <tr>
          <th>Title</th>
          <th>Location</th>
          <th>Category</th>
          <th>Listing Expires</th>
          <th>Flags</th>
          <th>Unflag</th>
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
          <td>
            @for( $i=1; $i <= $listing->flags; $i++ )
             <i class="icon-flag"></i>
            @endfor
          </td>
          <td><a id="{{ $listing->id }}" class="flag-warning btn btn-warning btn-small"><i class="icon-remove pull-center"></i></a></td>
          <td><a id="{{ $listing->id }}" class="warning btn btn-danger btn-small"><i class="icon-trash pull-center"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </span>
</div>
<script>
$(document).on('click', '.warning', function() {
  id = $(this).attr('id');
  confirm = confirm( 'Are you sure you want to delete this listing?' );
  if(confirm == true) { window.location = "/listing/delete/" + id; }
  else {
    delete window.confirm;
  }
});
$(document).on('click', '.flag-warning', function() {
  id = $(this).attr('id');
  confirm = confirm( 'Are you sure you want to remove all flags from this listing?' );
  if(confirm == true) { window.location = "/listing/unflag/" + id; }
  else {
    delete window.confirm;
  }
});
$('#flaggedListings').attr('class', 'active');
</script>