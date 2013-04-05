<div class="container-fluid" id="banner">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading" style="margin-left:97px;">{{$title}}</h1>
      </span>
    </div>
  </div>
</div>
<div class="container-fluid container-fluid-1">
  <div class="container-fluid" id="bodypages">
    <form action="/statistics/reply" method="post">
      <div class="span8 well">
        <fieldset>
          <label style="cursor:default">Did the listing lead to a successful transaction?</label>
          <label class="radio">
            <input type="radio" name="exchange_success" id="optionsRadios1" value="1" checked>
            Yes
          </label>
          <label class="radio">
            <input type="radio" name="exchange_success" id="optionsRadios2" value="0">
            No
          </label><br>
          <label style="cursor:default">What type of material was exchanged?</label>
          <input class="textinput" type="text" name="material_type"><br>
          <label style="cursor:default">Did you get any money out of the transaction? (Enter 0 if no money was exchanged)</label>
          <input class="textinput" type="text" name="monetary_value"><br>
          <button class="btn btn-success btn-large pull-left" type="submit">Submit</button>
        </fieldset>
      </div>
    </form>
  </div>
</div>