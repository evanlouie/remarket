<span class="span3">
<div>
	<ul class="nav nav-list bs-docs-sidenav" >
	  	@foreach ($pages as $list_page)
    		The comment body is {{ $comment->body }}.
		@endforeach
	</ul>	
	<a href="/about/create" class="btn btn-success btn-large btn-style">Add new listing</a>
	<a href="/about/edit/{{$page->id}}" class="btn btn-info btn-large btn-style">Browse Listings</a>	
</div>
</span>	
