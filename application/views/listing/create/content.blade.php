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
        <input class="textinput span12" type="text" name="title" title="Max 50 characters" maxlength='50' placeholder="Title">
      </div>
      <div class="input-prepend input-append span2">
        <h4 class="heading heading-5">Price</h4>
        <span class="add-on">$</span>
        <input class="textinput span12 textinput-1" type="number" step='any' min='0' value="0" name="price" placeholder="Price">
      </div>
</div>
   <div class="row-fluid">
      <h4 class="heading heading-3 heading-4">Listing Availability</h4>
      <input class="textinput span4" style='cursor:pointer; background:#fff' readonly="readonly" type="text" id="date_available" name="date_available" placeholder="Date available from">
      <input class="textinput span4" style='cursor:pointer; background:#fff' readonly="readonly" type="text" id="date_unavailable" name="date_unavailable" placeholder="Date listing expires">
      
      <h4 class="heading heading-4">Category</h4>
      <select class="pull-left pull-left-1 span2" name="category_id">
        @foreach ($categories as $c)
        <option value="{{$c->id}}">{{$c->title}}</option>
        @endforeach
      </select>
  </div>

    <div class="row-fluid">
      <span class="span6">
        <h4 class="heading heading-5">Location</h4>
        Select a prexisting location:<br />
        <select name="location_id" id='location-select' class="span9">
          <option value="0">Select a location</option>
          @foreach ($locations as $l)
          <option value="{{$l->id}}">{{ $l->address }}, {{ $l->city }}, {{ $l->postal_code }}</option>
          @endforeach
        </select><br />
        Otherwise, create a location:
        <input type='checkbox' name='createListing' id='createListing' value='true'><br />
        <input class="textinput" type="text" name="address" id='address' placeholder="Address" disabled='true'>
        <!-- <input class="textinput" type="text" name="city" id='city' placeholder="City" disabled='true'> -->
        <select name="city" id='city' placeholder="City" disabled='true'>
          <option value="Vancouver">Vancouver</option>
          <option value="West Vancouver">West Vancouver</option>
          <option value="North Vancouver">North Vancouver</option>
          <option value="Richmond">Richmond</option>
          <option value="Burnaby/New Westminster">Burnaby/New Westminster</option>
          <option value="Coquitlam">Coquitlam</option>
          <option value="Delta/Surrey/Langley">Delta/Surrey/Langley</option>
        </select>
        <input class="textinput" type="text" name="postal_code" id='postal_code' placeholder="Postal Code" disabled='true'>
        <script>
        var postal_code;
          $(document).on('change', '#postal_code', function() {
            postal_code=$('#postal_code').val();
          })
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
        var start, startyear, startmonth, startday, end, endyear, endmonth, endday;
        $(document).on('change', '#date_available', function() {
            start = $('#date_available').val();
            // end = $('date_unavailable').val();
            startyear = start.substring(0,4);
            // endyear= end.substring(0,4);
            startmonth = start.substring(5,7);
            // endmonth = end.substring(5,7);
            startday= start.substring(8,10);
            // endday = end.substring(8,10);
        })
        $(document).on('change', '#date_unavailable', function() {
            // start = $('#date_available').val();
            end = $('#date_unavailable').val();
            // startyear = start.substring(0,4);
            endyear= end.substring(0,4);
            // startmonth = start.substring(5,7);
            endmonth = end.substring(5,7);
            // startday= start.substring(8,10);
            endday = end.substring(8,10);
        })
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
    <div>
      <div class="row-fluid">
        <span class="span8">
          <h4 class="heading">Description</h4>
          <textarea class="span12" placeholder="Enter a brief description of your listing here." name="description"></textarea>
         
         <div class="row-fluid">
          <a class="btn btn-danger pull-left" href="/account/">Cancel Listing</a>
          <button id='postButton' class="btn btn-primary pull-right">Post Listing</button>
          <!-- <button class="btn btn-primary pull-center btn-primary-1">Add Images</button> -->
          </div>

        </form>
        <script>
            $(document).on('click', '#postButton', function(e) {
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
              var reg = /^[ABCEGHJKLMNPRSTVXYabceghjklmnprstvxy]{1}\d{1}[A-Za-z]{1} *\d{1}[A-Za-z]{1}\d{1}$/;
              if (reg.test(postal_code)) {

              } else {
                message+= "Please insert proper Canadian postal code\n";
              }
              $('select:enabled').each(function() {
                  if($(this).val() == '0') {
                    message += "Please select a valid location\n";
                  }
                })
              if(startday>endday || startmonth>endmonth || startyear>endyear)
              {
                message += "Please select an available date which occures before the expiry date\n";
              }
              
              if (message!='') {
                alert(message);
                e.preventDefault();
              }
            })

            $(document).ready(function() {
              $(document).tooltip();
            })
          </script>
      </span>
    </div>
  </div>
  <!-- @include('partials.forms.fileUpload') -->
</div>
