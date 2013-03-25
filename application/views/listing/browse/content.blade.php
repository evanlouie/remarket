<div class="container-fluid1">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading">My Listings</h1>
      </span>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div>
    <div class="row-fluid">
      <span class="span12">
        <form class="pull-center" action="listing" method='GET'>
          <h1 class="heading">Search</h1>
          <input class="textinput span8 textinput-1" type="text" name="q" placeholder="eg. Wood, Windows, Plumbing, etc...">
          <input class="textinput span2 textinput-1 textinput-2" type="text" name="minP" placeholder="Minimum price">
          <input class="textinput span2 textinput-1 textinput-2" type="text" name="maxP" placeholder="Maximum price">
          <input class="textinput span7 textinput-3" type="text" name="city" placeholder="City">
          <select name="category_id">
            <option value="all">All</option>
            @foreach ($categories as $c)
            <option value="{{$c->id}}">{{$c->title}}</option>
            @endforeach
          </select>
          <button class="btn btn-primary" type='submit'>Search</button>
        </form>
      </span>
    </div>
    <span></span>
  </div>
  <div class="row-fluid">
    <span class="span3">
      <div>
        <table class="table">
          <thead>
            <tr>
              <th class="cke_focus">Category</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <a class="dom-link" href="#">Wood</a>
              </td>
              <td>
                <a class="dom-link" href="#">Concrete</a>
              </td>
            </tr>
            <tr>
              <td>
                <a class="dom-link" href="#">Metal</a>
              </td>
              <td>
                <a class="dom-link" href="#">Appliances</a>
              </td>
            </tr>
            <tr>
              <td>
                <a class="dom-link" href="#">Ceramic</a>
              </td>
              <td>
                <a class="dom-link" href="#">Electrical</a>
              </td>
            </tr>
            <tr>
              <td>
                <a class="dom-link" href="#">Glass</a>
              </td>
              <td>
                <a class="dom-link" href="#">Plumbing</a>
              </td>
            </tr>
            <tr>
              <td>
                <a class="dom-link" href="#">Fabric</a>
              </td>
              <td>
                <a class="dom-link" href="#">Insulation</a>
              </td>
            </tr>
            <tr>
              <td>
                <a class="dom-link" href="#">Plastic</a>
              </td>
              <td>
                <a class="dom-link" href="#">Other</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </span>
    <span class="span9">
      <table class="table table-hover table-stiped">
        <thead>
          <tr>
            <th class="cke_focus cke_focus-1">Title</th>
            <th class="cke_focus cke_focus-2">Price</th>
            <th class="cke_focus cke_focus-3">Category</th>
            <th class="cke_focus cke_focus-4">Location</th>
            <th class="th-1">Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($listings as $listing)
          <tr>
            <td><a href="/listing/{{$listing->id}}">{{$listing->title}}</a></td>
            <td>${{$listing->price}}</td>
            <td>wood</td>
            <td class="td-1">{{$listing->location}}</td>
            <td>12/12/12</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </span>
  </div>
</div>