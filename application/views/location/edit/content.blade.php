<div class="container-fluid container-fluid-1">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading"> <strong>Edit Location</strong> </h1>
      </span>
    </div>
  </div>
</div>
<div class="container-fluid container-fluid-2">
  <div class="row-fluid">
    <form action="/location/edit/{{ $location->id }}" method='post'>
      <div class="row-fluid">
        <div class='span12'>
          <h4 class="heading heading-5">Location</h4>
          <input class="textinput span12" type="text" name="address" id='address' placeholder="Address" value="{{$location->address}}">
          <input class="textinput span8" type="text" name="city" id='city' placeholder="City" value="{{$location->city}}">
          <input class="textinput span4" type="text" name="postal_code" id='postal_code' placeholder="Postal Code" value="{{$location->postal_code}}">
          <a class="btn btn-danger pull-left" href="/account/myLocations">Cancel Update</a>
          <button class="btn btn-success pull-right" id='updateButton' type='submit'/>Update Listing</button> 
        </div>
      </div>
    </form>
  </div>
</div>