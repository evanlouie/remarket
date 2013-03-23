
<form class="pull-center" action="" style="margin: 0 0 100px 0;">
<form class="pull-center" action="/listing" method="GET">
  <h1 class="heading">Search</h1>
  <div class='row-fluid'>
  <input class="textinput span8 textinput-1" type="text" name="keywords" placeholder="eg. Wood, Windows, Plumbing, etc...">
  <input class="textinput span2 textinput-1 textinput-2" type="text" name="minPrice" placeholder="Minimum price">
  <input class="textinput span2 textinput-1 textinput-2" type="text" name="maxPrice" placeholder="Maximum price">
  </div>
  <div class='row-fluid'>
    <input class="textinput span8 textinput-3" type="text" name="city" placeholder="City">
    <select name="" class='span4'>  
      <option value="Categories">Categories</option>
      <option value="Wood">Wood</option>
      <option value="Metal">Metal</option>
      <option value="Plumbing">Plumbing</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary span12 hidden-desktop">Search</button>
  <button type="submit" class="btn btn-primary span4 visible-desktop">Search</button>
</form>