<div class="container container-1">
  <div class="container">
    <h1 class="heading pull-left">My Listings</h1>
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
          <td class="td-1">{{$listing->location->address}}</td>
          <td>{{ var_dump($listing->categorie()->get()) }}</td>
          <td>{{substr($listing->date_unavailable, 0, -9)}}</td>
          <td><a href="/listing/edit/{{$listing->id}}" class="btn btn-primary btn-small">Edit</a></td>
          <td><a id="warning" href="/listing/delete/{{$listing->id}}" class="btn btn-danger btn-small"><i class="icon icon-trash pull-center"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </span>
</div>
<script>
  $('#warning').on('click', function() {
    if(confirm( 'Are you sure you want to delete this listing?' )){};
  })
</script>