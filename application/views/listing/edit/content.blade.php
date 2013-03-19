    <div class="container-fluid container-fluid-1">
      <div class="container">
        <div class="row-fluid">
          <span class="span12">
            <h1 class="heading"> <strong>Edit Listing</strong> 
            </h1>
          </span>
        </div>
      </div>
    </div>
    <div class="container-fluid container-fluid-2">
    <div class="row-fluid">
      <form action="/listing/edit/{{ $listing->id }}" method='post'>

            <div class='row-fluid'>
            <div class='span6'>
              <h4 class="heading heading-5">Title</h4>
              <input class="textinput textinput-1 span12" type="text" name="title" placeholder="Title" value="{{$listing->title}}">
            </div>
            <div class="input-prepend input-append span6">
              <h4 class="heading heading-5">Price</h4>
              <div class='span12'>
              <span class="add-on">$</span>
              <input class="textinput span11" type="text" name="price" placeholder="Price" value="{{$listing->price}}">
              </div>
            </div>  
          </div>
          <div class='row-fluid'>
            <div class='span6'>
              <h4 class="heading heading-5">Available</h4>
              <input class="textinput span12" type="text" name="date_available" id="date_available" placeholder='' value="{{substr($listing->date_available, 0,-9)}}">
            </div>
            <div class='span6'>
              <h4 class="heading heading-5">Unavailable</h4>
              <input class="textinput span12" type="text" name="date_unavailable" id="date_unavailable" placeholder="Date listing expires" value="{{substr($listing->date_unavailable,0,-9)}}">
            </div>  
          </div>
          <div class='row-fluid'>
            <div class='span6'>
              <h4 class="heading heading-5">Category</h4>
              <select class="pull-left pull-left-1 span12" name="category_id">
              @foreach ($categories as $c)
              <option value="{{$c->id}}">{{$c->title}}</option>
              @endforeach
              </select>
            </div>
          </div>

          <div class="row-fluid">
            <div class='span12'>
              <h4 class="heading heading-5">Location</h4>
              Select a prexisting location:<br />
              <select class='span6' name="location_id" id='location-select'>
                <option value="{{$listing->location_id}}">test</option>
                @foreach ($locations as $l)
                <option value="{{$l->id}}">{{ $l->address }}, {{ $l->city }}</option>
                @endforeach
              </select>
<div class="row-fluid">
            <div class='span6'>
        <label>
          Otherwise, select to create a new location
          <input type='checkbox' name='createListing' id='createListing' value='true'>
        </label>
        <input class="textinput span12" type="text" name="address" id='address' placeholder="Address" disabled='true'>
        <input class="textinput span8" type="text" name="city" id='city' placeholder="City" disabled='true'>
        <input class="textinput span4" type="text" name="postal_code" id='postal_code' placeholder="Postal Code" disabled='true'>
        </div>
      </div>
    </div>
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


    </span>
  </div>
    <div class="row-fluid">
        <h4 class="heading">Description</h4>
        <textarea class="span12" placeholder="Enter a brief description of your listing here." name="description">{{$listing->description}}</textarea>
          <a class="btn btn-danger pull-left" href="/account/">Cancel Update</a>
          <button class="btn btn-success pull-right" type='submit'/>Update Listing
          <!-- <button class="btn btn-primary pull-center btn-primary-1">Add Images</button> -->
          <!-- @include('partials.forms.fileUpload') -->

        </form>
    </div>
