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
<div class="container-fluid container-fluid-2">
  <div class="row-fluid">
  <form id='uploadform' action="/image/upload/{{$listing->id}}" method="post" enctype="multipart/form-data">
      <input id="fileupload" type="file" name="file" multiple>
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

    <script>
      $(document).on('click', '.deleteImage', function() {
        fileurl = $(this).attr('file');
        $.post('/image/delete', {file: fileurl, listing_id: {{$listing->id}}}).done(function() {
          address = document.URL;
          $('#imagesHolder').load(address+" #images");
        })
      })
    </script>
    <script src="/js/vendor/jquery.ui.widget.js"></script>
    <script src="/js/jquery.iframe-transport.js"></script>
    <script src="/js/jquery.fileupload.js"></script>
    <script src="/js/main.js"></script>
