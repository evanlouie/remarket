<div class="container-fluid" id="banner">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading" style="margin-left:97px;">{{$page->title}}</h1>
      </span>
    </div>
  </div>
</div>


  <div class="container-fluid" id="bodypages">
    <div class="row-fluid">
      <span class="span3">
        <div>
          <ul class="nav nav-list bs-docs-sidenav" >
            @foreach ($pages as $list_page)
              <li id="{{$list_page->id}}"><a href="/about/{{$list_page->id}}">{{$list_page->title}}<i class="icon icon-chevron-right pull-right"></i></a></li>
            @endforeach
          </ul>
          @if(Session::get('admin') == 1)
            <br><legend class="text-center">Admin Options</legend>
            <a href="/about/create" class="span12 btn btn-success btn-style">Add a Page</a><br>
            <a href="/about/edit/{{$page->id}}" class="span12 btn btn-warning btn-style">Edit this Page</a><br>
            <a id="warning" class="span12 btn btn-danger btn-style">Delete this Page</a>
          @endif
        </div>
      </span> 
      <span class="span9 well" id="page-body">
        {{$page->body}}
      </span>
    </div>
  </div>
  <script>
    $(document).on('click', '#warning', function() {
      id = $(this).attr('id');
      confirm = confirm( 'Are you sure you want to delete this page?' );
      if(confirm == true) { window.location = "/about/delete/{{$page->id}}"; }
      else {
        delete window.confirm;
      }
    });
    $('#{{$page->id}}').attr('class', 'active');
  </script>
</div>