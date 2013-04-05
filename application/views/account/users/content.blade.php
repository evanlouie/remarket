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
  <span class="span9 well">

   <div id='usersContainer'>
    <div id='usersList'>
        <legend>Blocked Users</legend>

      <table id='blockedUsers' class="table well table-hover table-stiped">
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
      @if (sizeof($blocked)>0)
       <div id="pagerBlocked" style='position: relative;' class="pager">
            <form>
              <img class="first icon-fast-backward"/>
              <img class="icon-backward prev"/>
              <input type="text" class="pagedisplay"/>
              <img class="icon-forward next"/>
              <img class="last icon-fast-forward"/>
              <select class="pagesize">
                <option selected="selected"  value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option  value="40">40</option>
              </select>
            </form>
       </div>
       @endif
    <legend>Normal Users</legend>
      <table id='normalUsers' class="table well table-hover table-stiped">
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
      @if (sizeof($normal)>0)
       <div id="pagerNormal" style='position: relative;' class="pager">
            <form>
              <img class="first icon-fast-backward"/>
              <img class="icon-backward prev"/>
              <input type="text" class="pagedisplay"/>
              <img class="icon-forward next"/>
              <img class="last icon-fast-forward"/>
              <select class="pagesize">
                <option selected="selected"  value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option  value="40">40</option>
              </select>
            </form>
       </div>
       @endif
    </div>
  </div>
  </span>
</div>
<br>
 
<script>

function tablesort() {
	$("#normalUsers").tablesorter().tablesorterPager({container: $("#pagerNormal")});
	$('#pagerNormal').css('position', '');
	$('#blockedUsers').tablesorter().tablesorterPager({container: $("#pagerBlocked")});
	$('#pagerBlocked').css('position', '');
}
$(document).ready(function() 
    { 
       tablesort();
    } 
); 

  function refreshUsers() {
    $('#usersContainer').load('/account/users #usersList', function() {
		tablesort();	
	});
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