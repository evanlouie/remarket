<div class="container-fluid container-fluid-1">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading"> <strong>Edit Location</strong> </h1>
      </span>
    </div>
  </div>
</div>
<div class="container-fluid container-fluid-2 well">
  <div class="row-fluid">
    <form action="/location/edit/{{ $location->id }}" method='post'>
      <div class="row-fluid">
        <div class='span12'>
          <h4 class="heading heading-5">Location</h4>
          <input class="textinput span12" type="text" name="address" id='address' placeholder="Address" value="{{$location->address}}">
          <select name="city" id='city' placeholder="City" class='span8'>
          	<option value="{{$location->city}}">{{$location->city}}</option>
              <option value="Vancouver">Vancouver</option>
              <option value="West Vancouver">West Vancouver</option>
              <option value="North Vancouver">North Vancouver</option>
              <option value="Richmond">Richmond</option>
              <option value="Burnaby/New Westminster">Burnaby/New Westminster</option>
              <option value="Coquitlam">Coquitlam</option>
              <option value="Delta/Surrey/Langley">Delta/Surrey/Langley</option>
        	</select>
          <input class="textinput span4" type="text" name="postal_code" id='postal_code' placeholder="Postal Code" value="{{$location->postal_code}}">
          <a class="btn btn-danger pull-left" href="/account/myLocations">Cancel Update</a>
          <button class="btn btn-success pull-right" id='updateButton' type='submit'/>Update Listing</button> 
        </div>
      </div>
    </form>
  </div>
</div>

<script>
$(document).on('click', '#updateButton', function() {
	postal_code = $('#postal_code').val();
	message="";
	var reg = /^[ABCEGHJKLMNPRSTVXYabceghjklmnprstvxy]{1}\d{1}[A-Za-z]{1} *\d{1}[A-Za-z]{1}\d{1}$/;
	if(!$('#postal_code').is(":disabled"))
	{
		if (reg.test(postal_code)) 
		{

		} 
		else 
		{
			message+= "Please insert proper Canadian postal code\n";
		}
	   
		if (message!='') 
		{
			alert(message);
			//e.preventDefault();
			return false;
		}
	}
})


	
</script>