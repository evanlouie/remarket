<span class="span9">
  <table class="table table-hover table-stiped">
    <thead>
      <tr>
        <th class="cke_focus cke_focus-1">Title</th>
        <th class="cke_focus cke_focus-2">Price</th>
        <th class="cke_focus cke_focus-3">Category</th>
        <th class="cke_focus cke_focus-4">Location</th>
        <th class="th-1">Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach($listings as $listing)
      <tr>
        <td><a href="/listing/{{$listing->id}}">{{$listing->title}}</a></td>
        <td>${{$listing->price}}</td>
        <td>wood</td>
        <td class="td-1">{{$listing->location}}</td>
        <td>12/12/12</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</span>