<div class="container container-1">
  <div class="container">
    <h1 class="heading pull-left">My Location</h1>
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
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($listings as $listing)
        <tr>
          <td><a href="/listing/edit/{{$listing->id}}">{{$listing->title}}</a></td>
          <td class="td-1">{{ $listing->location->address }}, {{ $listing->location->city }}, {{ $listing->location->postal_code }}</td>
          <td>{{ $listing->category }}</td>
          <td>{{substr($listing->date_unavailable, 0, -9)}}</td>
          <td><a href="/listing/edit/{{$listing->id}}" class="btn btn-primary btn-small">Edit</a></td>
          <td><a id="{{ $listing->id }}" class="warning btn btn-danger btn-small"><i class="icon icon-trash pull-center"></i></a></td>
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
  $('#myListings').attr('class', 'active');
</script>