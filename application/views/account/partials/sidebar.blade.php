<span class="span3">
<div>
	<ul class="nav nav-list bs-docs-sidenav" >
	  <li id="myListings"><a href="myListings">Manage Listings <i class="icon icon-chevron-right pull-right"></i></a></li>
	  <li id="myLocations"><a href="myLocations">Manage Locations <i class="icon icon-chevron-right pull-right icon-chevron-right-1"></i></a></li>
	  <li id="wishlist"><a href="/wishlist/{{ Session::get('id') }}">My Wishlist <i class="icon icon-chevron-right pull-right icon-chevron-right-1"></i></a></li>
	  <li id="details"><a href="edit">Change Account Details <i class="icon icon-chevron-right pull-right"></i></a></li>
	</ul>	
	<a href="/listing/create" class="btn btn-success btn-large btn-style">Add new listing</a>
	<a href="/listing" class="btn btn-info btn-large btn-style">Browse Listings</a>	
</div>
</span>	