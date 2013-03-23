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
              <input class="textinput textinput-1 span12" type="text" name="title" placeholder="Title" maxlength="50" title="Max: 50 character" value="{{$listing->title}}">
            </div>
            <div class="input-prepend input-append span6">
              <h4 class="heading heading-5">Price</h4>
              <div class='span12'>
              <span class="add-on">$</span>
              <input class="textinput span11" type="number" step='any' min='0' name="price" placeholder="Price" value="{{$listing->price}}">
              </div>
            </div>  
          </div>
          <div class='row-fluid'>
            <div class='span6'>
              <h4 class="heading heading-5">Available</h4>
              <input style='cursor:pointer; background:#fff' class="textinput span12" type="text" name="date_available" readonly="readonly" id="date_available" placeholder='' value="{{substr($listing->date_available, 0,-9)}}">
            </div>
            <div class='span6'>
              <h4 class="heading heading-5">Unavailable</h4>
              <input class="textinput span12" style='cursor:pointer; background:#fff' type="text" name="date_unavailable" readonly="readonly" id="date_unavailable" placeholder="Date listing expires" value="{{substr($listing->date_unavailable,0,-9)}}">
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
          $('#date_available').datepicker({
              dateFormat: 'yy-mm-dd',
              // showButtonPanel: true,
              changeMonth: true,
              changeYear: true,
              // showOn: "button",
              // buttonImage: "images/calendar.gif",
              // buttonImageOnly: true,
              minDate: '0',
              maxDate: '+30D',
              inline: true
          });
          $('#date_unavailable').datepicker({
              dateFormat: 'yy-mm-dd',
              // showButtonPanel: true,
              changeMonth: true,
              changeYear: true,
              // showOn: "button",
              // buttonImage: "images/calendar.gif",
              // buttonImageOnly: true,
              minDate: '0',
              maxDate: '+30D',
              inline: true
          });
        </script>
    
</span>
    </div>


    </span>
  </div>
    <div class="row-fluid">
        <h4 class="heading">Description</h4>
        <textarea class="span12" rows='5'placeholder="Enter a brief description of your listing here. A More detailed description will allow more people to find you listing." title="Be descriptive" name="description">{{$listing->description}}</textarea>
          <a class="btn btn-danger pull-left" href="/account/">Cancel Update</a>
          <button class="btn btn-success pull-right" id='updateButton' type='submit'/>Update Listing</button> 
          <!-- <button class="btn btn-primary pull-center btn-primary-1">Add Images</button> -->
          <!-- @include('partials.forms.fileUpload') -->
          <script>
            $(document).on('click', '#updateButton', function(e) {
              message = '';
              $('input:enabled').each(function() {
                if ($(this).val() == '' && $(this).attr('name')!='description') {

                  if ($(this).attr('name')=='title') {
                    message += "Title field must be filled in\n";
                  }
                  if ($(this).attr('name')=='price') {
                    message += "Price field must be filled in\n";
                  }
                  if ($(this).attr('name')=='date_available') {
                    message += "Available date field must be filled in\n";
                  }
                  if ($(this).attr('name')=='date_unavailable') {
                    message += "Unavailable date field must be filled in\n";
                  }
                  if ($(this).attr('name')=='location_id') {
                    message += "Please choose a valid location\n";
                  }      
                }
              })
              if ($('input[name="address"]').val()=='' && 
                  $('input[name="city"]').val()=='' && 
                  $('input[name="postal_code"]').val()=='' && 
                  $('select[name="location_id"]').is(":disabled")) 
              {
                message += "Please provide at least one field in the location\n";
              }
              $('select:enabled').each(function() {
                  if($(this).val() == '0') {
                    message += "Please select a valid location\n";
                  }
                })
              
              if (message!='') {
                alert(message);
                e.preventDefault();
              }
            })

            $(document).ready(function() {
              $(document).tooltip();
            })
          </script>
        </form>
    </div>
