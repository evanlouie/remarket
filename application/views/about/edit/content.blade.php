<div class="hero-unit" style="height:100px;">
    <h1 class="heading pull-left">Edit: {{ $page->title }}</h1>
</div>
<div class="container-fluid" style="margin-bottom:40px">
  <div class="row-fluid">
    <span class="span8 offset2">
      <form method="post">
        <label>Title: </label>
        <input class="textinput span3 textinput-1" value="{{ $page->title }}" type="text" name="title" placeholder="Title"><br>
         <label>Body: </label>
        <textarea class="span12" name="body" id="textarea" cols="45" rows="5" >
          {{ $page->body }}
        </textarea><br>
        <button class="btn btn-success pull-right" type="submit">Save Changes</button> 
        <a class="btn btn-danger pull-right" href="/about/{{$page->id}}" style="margin-right: 5px;">Discard Changes</a>
      </form>
    </span>
  </div>
</div>
<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  CKEDITOR.replace('textarea');
</script>