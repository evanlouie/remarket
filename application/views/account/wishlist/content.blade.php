<div class="container-fluid">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading">My Wishlist</h1>
      </span>
    </div>
  </div>
</div>
<div class="row-fluid">
  {{ render( 'account.partials.sidebar' ) }}
  <span class="span9 well">
    <legend>My Tags</legend>
    <form class='form-inline'>
      <fieldset>
        <input type="text" placeholder="Add Tags" id="addTagInput">
        <button class="btn" id="addTagButton">Add</button>
      </fieldset>
    </form>
    <div id='tagsContainer'>
      <div id='tags'>
       @foreach($tags as $tag)
       <button tagid="{{$tag->id}}"class='btn-mini btn-warning delete-tag' style='margin:3px;'>{{$tag->item}}</button>
       @endforeach
     </div>
   </div>
   <div id='listingsContainer'>
      <table id='listings' class="table table-hover table-stiped">
        <thead>
          <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Category</th>
            <th>Listing Expires</th>
          </tr>
        </thead>
        <tbody>
          @foreach($listings as $listing)
          <tr>
            <td><a href="/listing/{{$listing->id}}">{{$listing->title}}</a></td>
            <td class="td-1">{{$listing->location->address}}, {{$listing->location->city}} {{$listing->location->postal_code}}</td>
            <td>{{$listing->category->title}}</td>
            <td>{{substr($listing->date_unavailable,0,-9)}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
    </div>
    @if(sizeof($tags)>0)
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
  function addTag() {
    string = $('#addTagInput').val();
    $.post("/wishlist/add", {tags: string}).done(function() {
      $('#tagsContainer').load('/wishlist/ #tags', function() 
	  { 
	  	$('#listingsContainer').load('/wishlist/ #listings', function() { 
			tablesort();
		});
	  })
      
    });
  }
  $(document).on('click', '.warning', function() {
    id = $(this).attr('id');
    confirm = confirm( 'Are you sure you want to delete this listing?' );
    if(confirm == true) {
      window.location = "/listing/delete/" + id; 
    }
    else {
      delete window.confirm;
    }
  });
  $(document).on('keypress', '#addTagInput', function(e) {
    if (e.which==13)
    {
      addTag();
      return false;
    }
  });
  $(document).on('click', '#addTagButton', function() {
    addTag();
    return false;
  });
  $(document).on('click', '.delete-tag', function() 
  {
    tagid = $(this).attr('tagid');
    confirm = confirm("Are you sure you want to delete this tag?");
    if(confirm==true) 
    {
      $.post("/wishlist/delete/", {tag_id: tagid}).done(function() {
        $('#tagsContainer').load('/wishlist/ #tags', function() {
			$('#listingsContainer').load('/wishlist/ #listings', function() {
				tablesort();	
			});	
		});
        
        delete window.confirm;
      });
    }
    else
    {
      alert('error');
    }
  });
  $('#wishlist').attr('class', 'active');

</script>