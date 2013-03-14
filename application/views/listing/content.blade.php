<div class="container-fluid">
<div class="row-fluid">
  <span class="span6">
    <h1 class="heading">{{ $listing->title }}</h1>
    <h5 class="heading">{{ $listing->category }}</h5>
    <h4 class="heading">{{ $listing->price }}</h4>
    <div class="row-fluid">
      <span class="span6">
        <h4 class="heading">{{ $listing->date_available }}</h4>
      </span>
      <span class="span6">
        <h4 class="heading">{{ $listing->date_unavailable }}</h4>
      </span>
    </div>
    <a class="btn btn-success btn-large pull-center" href="mailto:{{ $listing->email }}?subject={{$listing->title}}">Contact Seller</a>
  </span>
  <span class="span6">
    <div class="div-1"></div>
  </span>
</div>
<div class="pull-center">
  <div class="pull-center">
    <ul class="thumbnails">
      @foreach ($listing->images as $image)
      <li class="span2">
        <div class="thumbnail">
          <img src="http://placehold.it/900x600" class="image">
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>
<div>
  {{$listing->description}}
</div>
</div>