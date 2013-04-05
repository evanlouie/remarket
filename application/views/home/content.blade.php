<div class="container-fluid container-fluid-1" style="background:0;">
	<img src="/img/remarket2.png" />
  <div class="container">
  </div>
</div>
<div class="container-fluid container-fluid">
  <div class='row-fluid' style="position: absolute;top: 280px;left: 0px;">
      <span class="span12 well frontPageHolder" style='padding:0 20px;'>
        <form class="pull-center" action="listing" method='GET'>
          <h1 class="heading">Search Listings</h1>
          <input class="textinput span8 textinput-1" type="text" name="q" placeholder="eg. Wood, Windows, Plumbing, etc...">
          <input class="textinput span2 textinput-1 textinput-2" type="number" step='any' name="minP" placeholder="Minimum price">
          <input class="textinput span2 textinput-1 textinput-2" type="number" step='any' name="maxP" placeholder="Maximum price">
          <input class="textinput span6 textinput-3" type="text" name="city" placeholder="City">
          <select name="category_id">
            <option value="">All</option>
            @foreach ($categories as $c)
            <option value="{{$c->id}}">{{$c->title}}</option>
            @endforeach
          </select>
          <button class="btn btn-primary" type='submit' style="padding-left: 28px; padding-right: 28px; margin-right: 5px;">Search listings now!</button>
          </form>
      </span>
      </div>
  <div class="row-fluid" style=" position: absolute; top: 455px;left: 0;
">
    <span class="span9">
      <div class="hero-unit">
        <p>REMARKET is a part of Vancouver’s “Greenest City 2020” initiative. It functions as a communication hub through which providers and consumers of recyclable de-construction materials can connect and exchange goods. If you’d like to learn more about our site, or the movement behind it, please click “Learn More.”
</p>
        <div class="btns">
          <a href="/about/" class="btn btn-primary btn-large">Learn More</a>
          <a href="/listing/" class="btn btn-success btn-large">Browse Listings</a>
          <a href="/listing?q=&minP=&maxP=&city=&category_id=14" class="btn btn-info btn-large">Browse Events</a>
        </div>
      </div>
    </span>
    <span class="well span3">
      @include('partials.forms.signup') 
    </span>
  </div>
</div>

<div class="navbar-bottom">
  <div  style="border:none;
  position:absolute; top:800px; width:100%;
  max-width:960px; margin-left: auto; margin-right:auto; margin-top:30px">
    <form class="navbar-form pull-right" action="">
      <a href="/about" class="btn btn-link" style="text-shadow:none">About</a>
      <a href="/contact" class="btn btn-link" style="text-shadow:none">Contact Us</a>
      <a href="/home/terms">Terms of Use</a>
      <a>&copy; REMARKET 2013</a>
    </form>
  </div>
</div>