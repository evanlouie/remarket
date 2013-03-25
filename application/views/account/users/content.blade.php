<div class="container-fluid">
  <div class="container">
    <div class="row-fluid">
      <span class="span12">
        <h1 class="heading">Manage Users</h1>
      </span>
    </div>
  </div>
</div>
<div class="row-fluid">
  {{ render( 'account.partials.sidebar' ) }}
  <span class="span9">

   <div id='usersContainer'>
    <div id='usersList'>
        <legend>Blocked Users</legend>

      <table id='blockedUsers' class="table table-hover table-stiped">
        <thead>
          <tr>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($blocked as $user)
          <tr>
            <td>{{$user->email}}</td>
            <td><a accountid="{{$user->id}}" class='unblockbutton btn btn-mini btn-warning' href='/account/unblock/{{$user->id}}'>UnBlock</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <legend>Normal Users</legend>
      <table id='normalUsers' class="table table-hover table-stiped">
        <thead>
          <tr>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($normal as $user)
          <tr>
            <td>{{$user->email}}</td>
            <td><a accountid="{{$user->id}}" class='blockbutton btn btn-mini btn-warning' href='/account/block/{{$user->id}}'>Block</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </span>
</div>
<br>
 
<script>

  function refreshUsers() {
    $('#usersContainer').load('/account/users #usersList');
  }
  $(document).on('click', '.blockbutton', function(e) {
    accountid = $(this).attr('accountid');
    $.post("/account/block/"+accountid).done(function() {
      refreshUsers();
    })
    e.preventDefault();
  });
  $(document).on('click', '.unblockbutton', function(e) {
    accountid = $(this).attr('accountid');
    $.post("/account/unblock/"+accountid).done(function() {
      refreshUsers();
    })
    e.preventDefault();
  });
  $('#users').attr('class', 'active');
</script>