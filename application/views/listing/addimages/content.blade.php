<div class="container-fluid container-fluid-1">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading"> <strong>Add Images</strong> 
        </h1>
      </span>
    </div>
  </div>
</div>
<div class="container-fluid container-fluid-2 well">
  <div class="row-fluid">
  <form id='uploadform' action="/image/upload/{{$listing->id}}" method="post" enctype="multipart/form-data">
      <input id="fileupload" type="file" name="file" class="btn btn-mini btn-info" multiple>
              <a class='btn btn-success pull-right' href='/account'>Done</a>

  </form>
         <div id='imagesHolder'>

          <ul class='thumbnails' id='images' class='span12'>
          @foreach($images as $image)
          <li class='span3'>
            <a class='thumbnail'href="/{{substr($image, 5)}}">
              <img src="/{{substr($image, 5)}}"/>
            </a>
            <button file="{{$image}}" class='deleteImage pull-right btn-warning btn-mini'>Delete</button>
          </li>
          @endforeach
          </ul>
         </div>

  </div>

</div>
<div id="loadingDiv" style='width:100%; height:100%; position:fixed; top:0; opacity:0.9; background-color:#123;'>
<img style='display:block; margin: 10% auto;' src='/img/loading.gif'/>
</div>
    <script>
    $(document).ready(function() {
      $('#loadingDiv').hide();
    })
      $(document).on('click', '.deleteImage', function() {
        $('#loadingDiv').show();
        fileurl = $(this).attr('file');
        $.post('/image/delete', {file: fileurl, listing_id: {{$listing->id}}}).done(function() {
          address = document.URL;
          $('#imagesHolder').load(address+" #images");
          $('#loadingDiv').hide();
        })
      })
    </script>
    <script src="/js/vendor/jquery.ui.widget.js"></script>
    <script src="/js/jquery.iframe-transport.js"></script>
    <script src="/js/jquery.fileupload.js"></script>
    <script src="/js/main.js"></script>
