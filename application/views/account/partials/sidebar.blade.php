<span class="span3">
	<div class="buttons">
		<a href="/listing/create" class="width btn btn-success btn-style">Post New Listing</a>
	</div>
	<div>
		<ul class="nav nav-list bs-docs-sidenav" >
			@if(Session::get('admin') == 1)
			<li id="flaggedListings"><a href="/account/flaggedListings">Flagged Listings <i class="icon icon-chevron-right pull-right"></i></a></li>
	  		<li id='users'><a href="/account/users">Users <i class="icon icon-chevron-right pull-right"></i></a></li>
	  		@endif
	  		<li id="myListings"><a href="/account/myListings">Manage Listings <i class="icon icon-chevron-right pull-right"></i></a></li>
	  		<li id="myLocations"><a href="/account/myLocations">Manage Locations <i class="icon icon-chevron-right pull-right icon-chevron-right-1"></i></a></li>
	  		<li id="wishlist"><a href="/wishlist">My Wishlist <i class="icon icon-chevron-right pull-right icon-chevron-right-1"></i></a></li>
	  		<li id="details"><a href="/account/edit">Change Account Details <i class="icon icon-chevron-right pull-right"></i></a></li>		
		</ul>
	</div>
</span>	
