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
    <form action="/listing/create" method='post'>
      <div class="span6">
        <h4 class="heading">Title</h4>
        <input class="textinput span13" type="text" name="title" placeholder="Title">
      </div>
      <div class="span6">
        <h4 class="heading">Price</h4>
        <input class="textinput" type="text" name="price" placeholder="Price">
      </div>
</div>
   <div class="row-fluid">
      <h4 class="heading heading-3 heading-4">Listing Availability</h4>
      <input class="textinput span4" type="text" id="date_available" name="date_available" placeholder="Date available from">
      <input class="textinput span4" type="text" id="date_unavailable" name="date_unavailable" placeholder="Date listing expires">
      
      <h4 class="heading heading-4">Category</h4>
      <select class="pull-left pull-left-1" name="category_id">
        @foreach ($categories as $c)
        <option value="{{$c->id}}">{{$c->title}}</option>
        @endforeach
      </select>
  </div>

<div class="container-fluid container-fluid-2">
    <div class="row-fluid">
      <span class="span6">
        <h4 class="heading heading-5">Location</h4>
        Select a prexisting location:<br />
        <select name="location_id" id='location-select'>
          <option value="0">Select a location</option>
          @foreach ($locations as $l)
          <option value="{{$l->id}}">{{ $l->address }}, {{ $l->city }}</option>
          @endforeach
        </select><br />
        Otherwise, create a location:
        <input type='checkbox' name='createListing' id='createListing' value='true'><br />
        <input class="textinput" type="text" name="address" id='address' placeholder="Address" disabled='true'>
        <input class="textinput" type="text" name="city" id='city' placeholder="City" disabled='true'>
        <input class="textinput" type="text" name="postal_code" id='postal_code' placeholder="Postal Code" disabled='true'>
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
        });
        $('#date_available').datepicker({dateFormat: 'yy-mm-dd'});
        $('#date_unavailable').datepicker({dateFormat: 'yy-mm-dd'});
        </script>
      </span>

    </div>
    <div>
      <div class="row-fluid">
        <span class="span8">
          <h4 class="heading">Description</h4>
          <textarea class="span12" placeholder="Enter a brief description of your listing here." name="description"></textarea>
         
         <div class="row-fluid">
          <a class="btn btn-danger pull-left" href="/account/">Cancel Listing</a>
          <button class="btn btn-primary pull-right">Post Listing</button>
          <!-- <button class="btn btn-primary pull-center btn-primary-1">Add Images</button> -->
          </div>

        </form>
      </span>
    </div></div>
  </div>
  <!-- @include('partials.forms.fileUpload') -->
</div>
