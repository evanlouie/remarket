<div class="container-fluid container-fluid-1">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading"> <strong>Post New Listing</strong> 
        </h1>
      </span>
    </div>
  </div>
</div>
<div class="container-fluid container-fluid-2">
  <div class="row-fluid">
    <span class="span6 span6-2">
      <form action="/listing/create" method='post'>
        <h4 class="heading pull-right heading-1">Price</h4>
        <h4 class="heading pull-left heading-2 heading-5">Title</h4>
        <input class="textinput span9 textinput-1" type="text" name="title" placeholder="Title">
        <input class="textinput span3 textinput-1" type="text" name="price" placeholder="Price">
        <h4 class="heading heading-3 heading-4">Listing Availability</h4>
        <input class="textinput span6 span6-1" type="text" name="date_available" placeholder="Date available from">
        <input class="textinput span6 span6-1" type="text" name="date_unavailable" placeholder="Date listing expires">
      
      <h4 class="heading heading-4">Category</h4>
      <select class="pull-left pull-left-1" name="category_id">
          @foreach ($categories as $c)
          <option value="{{$c->id}}">{{$c->title}}</option>
          @endforeach
      </select>
    </span>
    <span class="span6">
        <h4 class="heading heading-5">Location</h4>
        <select name="location_id" id='location-select'>
          <option value="0">Select a location</option>
          @foreach ($locations as $l)
          <option value="{{$l->id}}">{{ $l->address }}, {{ $l->city }}</option>
          @endforeach
        </select>
        <input type='checkbox' name='createListing' id='createListing' value='true'>Create a location</br>
        <input class="textinput span12 textinput-2 textinput-3" type="text" name="address" id='address' placeholder="Address" disabled='true'>
        <input class="textinput span8 textinput-3 textinput-4" type="text" name="city" id='city' placeholder="City" disabled='true'>
        <input class="textinput span4 textinput-2 textinput-3" type="text" name="postal_code" id='postal_code' placeholder="Postal Code" disabled='true'>
        <script>
          $(document).on('change', '#createListing', function() {
            if ($('#location-select').attr('disabled')) {
              $('#location-select').prop('disabled', false);
              $('#address').prop('disabled', true);
              $('#city').prop('disabled', true);
              $('#postal_code').prop('disabled', true);
            }
            else { 
              $('#location-select').prop('disabled', true);
              $('#address').prop('disabled', false);
              $('#city').prop('disabled', false);
              $('#postal_code').prop('disabled', false);
            }
          })
        </script>
    </span>
  </div>
  <div>
    <div class="row-fluid">
      <span class="span12">
        <h4 class="heading">Description</h4>
        <textarea class="span12" placeholder="Enter a brief description of your listing here." name="description"></textarea>
          <a class="btn btn-danger pull-left" href="/account/">Cancel Listing</a>
          <button class="btn btn-primary pull-right">Post Listing</button>
          <!-- <button class="btn btn-primary pull-center btn-primary-1">Add Images</button> -->
          <!-- @include('partials.forms.fileUpload') -->

        </form>
      </span>
    </div>
  </div>
</div>
