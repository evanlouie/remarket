<div class="container-fluid container-fluid-1">
  <div class="container">
</div>
</div>
<div class="container-fluid container-fluid-2">
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
    <span class="span9">
      <div class="hero-unit">
        <p>[ Here we would like to put some information about the initiative ]</p>
        <div class="btns">
          <a href="#" class="btn btn-primary btn-large">Learn More</a>
        </div>
      </div>
    </span>
    <span class="span3">
      @include('partials.forms.signup') 
    </span>
  </div>
</div>